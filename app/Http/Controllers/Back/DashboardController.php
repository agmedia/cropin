<?php

namespace App\Http\Controllers\Back;

use App\Helpers\Chart;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Back\Catalog\Product;
use App\Models\Back\Orders\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $data['countlistings'] = Product::query()->whereIn('status', ['1'])->count();

        $query = Product::query();

        $products = $query->orderByDesc('created_at')->limit(10)->get();


        return view('back.dashboard', compact('data', 'products'));
    }

}
