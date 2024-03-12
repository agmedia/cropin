<?php

namespace App\Http\Controllers\Back\Catalog;

use App\Helpers\Helper;
use App\Helpers\Image;
use App\Models\Back\Catalog\Product;
use App\Models\Back\Catalog\ProductImage;
use App\Models\Back\Catalog\Widget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $query->where('city', 'LIKE', '%' . $request->input('search') . '%')->orWhere;
        }

        $products = $query->orderByDesc('created_at')
                          ->paginate(config('settings.pagination.back'))->appends($request->query());

        return view('back.catalog.product.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $working_hours = (new Product())->getDefaultWorkingHours();

        return view('back.catalog.product.edit', compact('working_hours'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->toArray());
        $product = new Product();
        $stored  = $product->validateRequest($request)->store();

        if ($stored) {
            $stored->storeImages($request);

            return redirect()->route('product.edit', ['product' => $stored]);
        }

        return redirect()->back()->with(['error' => 'Whoops..! error while saving.']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $existing_images = Product::getExistingImages($product);
        $working_hours   = json_decode($product->working_hours, true);

        return view('back.catalog.product.edit', compact('product', 'existing_images', 'working_hours'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $updated = $product->validateRequest($request)->edit();

        if ($updated) {
            $updated->storeImages($request);

            return redirect()->back()->with(['success' => 'Listing has been saved succesfully!']);
        }

        return redirect()->back()->with(['error' => 'Whoops..! error while saving.']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('id') && $request->input('id')) {
            try {
                Product::query()->where('id', $request->input('id'))->delete();
            } catch (\Exception $e) {
                Log::info($e->getMessage());
            }

            return response()->json(['success' => 200]);
        }

        return response()->json(['error' => 300]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyImage(Request $request)
    {
        Log::info($request->toArray());
        if ($request->has('data')) {
            $image = ProductImage::find($request->input('data'));

            $deleted = $image->delete();

            if ($deleted) {
                $path = Image::cleanPath('product', $image->product_id, $image->image);
                Image::delete('product', $image->product_id, $path);

                return response()->json(['success' => 200]);
            }
        }

        return response()->json(['error' => 400]);
    }


    /**
     * @param Page $page
     */
    private function flush(Product $product): void
    {
        Cache::forget('prod.' . $product->id);
    }

}
