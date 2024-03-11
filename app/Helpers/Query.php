<?php

namespace App\Helpers;

use App\Models\Front\Catalog\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Query
{

    /**
     * @param Request $request
     *
     * @return Builder
     */
    public static function getListingFromSearch(Request $request): Builder
    {
        $query = Product::query();

        $query->active();

        if ($request->has('category')) {
            $id = collect(config('settings.categories'))->where(current_locale(), $request->input('category'))->keys()->first();

            $query->where('category', $id);
        }
        if ($request->has('location')) {
            $query->where('city', $request->input('location'));
        }

        return $query;
    }

}