<?php

namespace App\Http\Controllers\Front;

use App\Helpers\Helper;
use App\Helpers\LanguageHelper;
use App\Helpers\Query;
use App\Helpers\Recaptcha;
use App\Helpers\Session\CheckoutSession;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontBaseController;
use App\Imports\ProductImport;
use App\Mail\ContactFormMessage;
use App\Models\Front\Catalog\Page;
use App\Models\Front\Catalog\Product;
use App\Models\Front\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class HomeController extends FrontBaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listings_query = Query::getListingFromSearch($request);

        $categories = Product::resolveCategories();
        $cities     = Product::query()->pluck('city')->unique();
        $locations  = Product::getLocationsFromListings($listings_query);
        $listings   = $listings_query->paginate(12);

        return view('front.home', compact('listings', 'categories', 'cities', 'locations'));
    }


    /**
     * @param Apartment $apartment
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function resolveRoute(Request $request, Product $product)
    {
        $menu = $product->resolveMenuList();

        $viewed = DB::update('update products set viewed = viewed + 1');



        return view('front.product', compact('product', 'menu'));
    }


    /**
     * @param Faq $faq
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function faq()
    {
        $faqs = Faq::where('status', 1)->orderBy('sort_order')->get();

        return view('front.faq', compact('faqs'));
    }


    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function contact(Request $request)
    {
        $owner = Helper::getBasicInfo();

        return view('front.contact', compact('owner'));
    }


    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function sendContactMessage(Request $request)
    {
        dd($request->toArray());
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'message' => 'required',
        ]);

        // Recaptcha
        $recaptcha = (new Recaptcha())->check($request->toArray());

        if ( ! $recaptcha->ok()) {
            return back()->withErrors(['error' => __('front/common.recapta_error')]);
        }

        $message = $request->toArray();

        dispatch(function () use ($message) {
            Mail::to(Helper::getBasicInfo()->email)->send(new ContactFormMessage($message));
        })->afterResponse();

        return redirect()->back()->with(['success' => __('front/common.message_success')]);
    }

}
