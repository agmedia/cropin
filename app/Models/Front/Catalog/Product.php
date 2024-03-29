<?php

namespace App\Models\Front\Catalog;

use App\Helpers\Currency;
use App\Helpers\Query;
use App\Models\Back\Catalog\ProductTranslation;
use App\Models\Back\Settings\Settings;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Bouncer;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

/**
 *
 */
class Product extends Model
{

    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @var string[]
     */
    protected $appends = [
        'thumb'
    ];

    /**
     * @var string
     */
    protected $locale = 'en';


    /**
     * Gallery constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->locale = current_locale();
    }


    /**
     * @param $locale
     *
     * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed
     */
    public function getRouteKey()
    {
        return $this->translation(current_locale())->slug;
    }


    /**
     * @param $value
     * @param $field
     *
     * @return Model|never|null
     */
    public function resolveRouteBinding($value, $field = NULL)
    {
        return static::query()->whereHas('translation', function ($query) use ($value) {
            $query->where('slug', $value);
        })->first() ?? abort(404);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id')->where('published', 1)->orderBy('sort_order');
    }


    /**
     * @param null  $lang
     * @param false $all
     *
     * @return Model|\Illuminate\Database\Eloquent\Relations\HasMany|\Illuminate\Database\Eloquent\Relations\HasOne|object|null
     */
    public function translation($lang = null, bool $all = false)
    {
        if ($lang) {
            return $this->hasOne(ProductTranslation::class, 'product_id')->where('lang', $lang)->first();
        }

        if ($all) {
            return $this->hasMany(ProductTranslation::class, 'product_id');
        }

        return $this->hasOne(ProductTranslation::class, 'product_id')->where('lang', $this->locale);
    }


    /**
     * @param $value
     *
     * @return array|string|string[]
     */
    public function getImageAttribute($value)
    {
        return config('settings.images_domain') . str_replace('.jpg', '.webp', $value);
    }


    /**
     * @param $value
     *
     * @return array|string|string[]
     */
    public function getThumbAttribute($value)
    {
        return str_replace('.webp', '-thumb.webp', $this->image);
    }


    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 1);
    }


    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeInactive(Builder $query): Builder
    {
        return $query->where('status', 0);
    }


    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeLast(Builder $query, $count = 12): Builder
    {
        return $query->where('status', 1)->orderBy('created_at', 'desc')->limit($count);
    }


    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopePopular(Builder $query, $count = 12): Builder
    {
        return $query->where('status', 1)->orderBy('viewed', 'desc')->limit($count);
    }


    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeFeatured(Builder $query, $count = 12): Builder
    {
        return $query->where('status', 1)->where('featured', 1)->limit($count);
    }

    /*******************************************************************************
     *                                Copyright : AGmedia                           *
     *                              email: filip@agmedia.hr                         *
     *******************************************************************************/

    /**
     * @param Request         $request
     * @param Collection|null $ids
     *
     * @return Builder
     */
    public function filter(Request $request, Collection $ids = null): Builder
    {
        $query = $this->newQuery();

        $query->active();

        if ($ids && $ids->count() && ! \request()->has('pojam')) {
            $query->whereIn('id', $ids->unique());
        }

        if ($request->has('ids') && $request->input('ids') != '') {
            $_ids = explode(',', substr($request->input('ids'), 1, -1));
            $query->whereIn('id', collect($_ids)->unique());
        }

        if ($request->has('group')) {
            $group = $request->input('group');

            $query->whereHas('categories', function ($query) use ($request, $group) {
                $query->where('group', 'like', '%' . $group . '%');
            });
        }

        if ($request->has('cat')) {
            $query->whereHas('categories', function ($query) use ($request) {
                $query->where('category_id', $request->input('cat'));
            });
        }

        if ($request->has('sort')) {
            $sort = $request->input('sort');

            if ($sort == 'novi') {
                $query->orderBy('created_at', 'desc');
            }

            if ($sort == 'price_up') {
                $query->orderBy('price');
            }

            if ($sort == 'price_down') {
                $query->orderBy('price', 'desc');
            }

            if ($sort == 'naziv_up') {
                $query->orderBy('name');
            }

            if ($sort == 'naziv_down') {
                $query->orderBy('name', 'desc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        return $query;
    }


    /**
     * @return array
     */
    public function resolveMenuList(): array
    {
        $response = [];

        if ($this->menu) {
            foreach (json_decode($this->menu, true) as $item) {
                if (isset($item['group'][current_locale()])) {
                    $response[$item['group'][current_locale()]][] = $item;
                }
            }
        }

        return $response;
    }


    /**
     * @return array
     */
    public static function resolveCategories(): array
    {
        return config('settings.categories');
    }


    /**
     * @param Builder $listings
     *
     * @return array
     */
    public static function getLocationsFromListings(Builder $listings, Request $request): array
    {
        $should_fill_response = false;
        $response = [];

        if ($request->has('category') || $request->has('location')) {
            $should_fill_response = true;
        }

        if ($should_fill_response) {
            foreach ($listings->get() as $item) {
                if ($item->lon && $item->lat) {
                    $response[] = [
                        'title' => $item->translation->title,
                        'url' => route('resolve.route', ['product' => $item]),
                        'image' => asset($item->images()->first()->image),
                        'category' => config('settings.categories')[$item->category][current_locale()],
                        'address' => $item->street . ', ' . $item->zip . ', ' . $item->city,
                        'phone' => $item->phone,
                        'upute' => $item->translation->title .'+' . $item->street . '+' . $item->zip .'+' . $item->city . ','. $item->country,
                        'rating' => '5',
                        'reviews' => '0',
                        'latitude' => $item->lon,
                        'longitude' => $item->lat,
                    ];
                }
            }
        }

        return $response;
    }


    /**
     * @param Builder $listings
     *
     * @return array
     */
    public static function getNavigationFromListings(): array
    {
        $response = [];
        $listings = Query::getListingNav(request());

        foreach ($listings->get()->groupBy('category') as $group_id => $items) {
            if ($items->count()) {
                $category = config('settings.categories')[$group_id][current_locale()];

                $response[$category] = $items->sortBy('city')->pluck('city')->unique();
            }
        }

        return $response;
    }

}
