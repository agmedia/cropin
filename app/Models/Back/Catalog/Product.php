<?php

namespace App\Models\Back\Catalog;

use App\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
     * @var string
     */
    protected $locale;

    /**
     * @var Request
     */
    private $request;


    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->locale = current_locale();
    }


    /**
     * @param bool $all
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id')->orderBy('sort_order');
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

        return $this->hasOne(ProductTranslation::class, 'product_id')->where('lang', $this->locale)->first();
    }



    /*******************************************************************************
     *                                Copyright : AGmedia                           *
     *                              email: filip@agmedia.hr                         *
     *******************************************************************************/

    /**
     * @param Request $request
     *
     * @return $this
     */
    public function validateRequest(Request $request)
    {
        $request->validate([
            'title.*' => 'required'
        ]);

        $this->setRequest($request);

        return $this;
    }


    /**
     * @return Product|null
     */
    public function store(): Product|null
    {
        if ( ! $this->request) {
            return null;
        }

        $id = $this->insertGetId($this->getModelArray());

        if ($id) {
            $product = $this->find($id);

            ProductTranslation::saveTranslations($this->request, $product);

            return $product;
        }

        return null;
    }


    /**
     * @return Product|$this|null
     */
    public function edit(): Product|null
    {
        if ( ! $this->request) {
            return null;
        }

        $updated = $this->update($this->getModelArray(false));

        if ($updated) {
            ProductTranslation::saveTranslations($this->request, $this);

            return $this;
        }

        return null;
    }


    /**
     * @return bool|mixed
     */
    public function storeImages(Request $request = null)
    {
        if ( ! $request) {
            $request = $this->request;
        }

        return (new ProductImage())->store($this->find($this->id), $request);
    }

    /*******************************************************************************
     *                                Copyright : AGmedia                           *
     *                              email: filip@agmedia.hr                         *
     *******************************************************************************/

    /**
     * @param bool $insert
     *
     * @return array
     */
    private function getModelArray(bool $insert = true): array
    {
        $working_hours = $this->resolveWorkingHours();

        $response = [
            'hash'          => Str::random(),
            'address'       => $this->request->address,
            'zip'           => $this->request->zip,
            'city'          => $this->request->city,
            'street'        => $this->request->street,
            'country'       => $this->request->country,
            'category'      => $this->request->category,
            'lat'           => $this->request->lat,
            'lon'           => $this->request->lon,
            'phone'         => $this->request->phone,
            'email'         => $this->request->email,
            'web'           => $this->request->web,
            'facebook'      => $this->request->facebook,
            'instagram'     => $this->request->instagram,
            'tiktok'        => $this->request->tiktok,
            'working_hours' => $working_hours,
            'menu'          => $this->request->menu,
            'image'         => 'images/all/1.jpg',
            'sort_order'    => 0,
            'featured'      => 1,
            'status'        => (isset($this->request->status) and $this->request->status == 'on') ? 1 : 0,
            'updated_at'    => Carbon::now()
        ];

        if ($insert) {
            $response['created_at'] = Carbon::now();
        }

        return $response;
    }


    /**
     * Set Product Model request variable.
     *
     * @param $request
     *
     * @return void
     */
    private function setRequest($request): void
    {
        $this->request = $request;
    }


    private function resolveWorkingHours()
    {
        $arr = [
            'monday' => [
                'open'  => $this->request->monday_open,
                'close' => $this->request->monday_close,
                'status' => (isset($this->request->monday_not_working) and $this->request->monday_not_working == 'on') ? 1 : 0,
            ],
            'tuesday' => [
                'open'  => $this->request->tuesday_open,
                'close' => $this->request->tuesday_close,
                'status' => (isset($this->request->tuesday_not_working) and $this->request->tuesday_not_working == 'on') ? 1 : 0,
            ],
            'wednesday' => [
                'open'  => $this->request->wednesday_open,
                'close' => $this->request->wednesday_close,
                'status' => (isset($this->request->wednesday_not_working) and $this->request->wednesday_not_working == 'on') ? 1 : 0,
            ],
            'thursday' => [
                'open'  => $this->request->thursday_open,
                'close' => $this->request->thursday_close,
                'status' => (isset($this->request->thursday_not_working) and $this->request->thursday_not_working == 'on') ? 1 : 0,
            ],
            'friday' => [
                'open'  => $this->request->friday_open,
                'close' => $this->request->friday_close,
                'status' => (isset($this->request->friday_not_working) and $this->request->friday_not_working == 'on') ? 1 : 0,
            ],
            'saturday' => [
                'open'  => $this->request->saturday_open,
                'close' => $this->request->saturday_close,
                'status' => (isset($this->request->saturday_not_working) and $this->request->saturday_not_working == 'on') ? 1 : 0,
            ],
            'sunday' => [
                'open'  => $this->request->sunday_open,
                'close' => $this->request->sunday_close,
                'status' => (isset($this->request->sunday_not_working) and $this->request->sunday_not_working == 'on') ? 1 : 0,
            ],
        ];

        return json_encode($arr);
    }

    /*******************************************************************************
     *                                Copyright : AGmedia                           *
     *                              email: filip@agmedia.hr                         *
     *******************************************************************************/

    /**
     * @param Apartment|null $product
     *
     * @return array
     */
    public static function getExistingImages(Product $product = null): array
    {
        if ( ! $product || empty($product)) {
            return [];
        }

        $response = [];
        $images   = $product->images()->get();

        foreach ($images as $image) {
            $response[$image->id] = [
                'id'         => $image->id,
                'image'      => $image->image,
                'default'    => $image->default,
                'published'  => $image->published,
                'sort_order' => $image->sort_order,
            ];

            foreach (ag_lang() as $lang) {
                $title = isset($image->translation($lang->code)->title) ? $image->translation($lang->code)->title : '';
                $alt   = isset($image->translation($lang->code)->alt) ? $image->translation($lang->code)->alt : '';

                $response[$image->id]['title'][$lang->code] = $title;
                $response[$image->id]['alt'][$lang->code]   = $alt;
            }
        }

        return $response;
    }

}
