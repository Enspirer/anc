<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pending_orders = Order::where('status','Pending')->get()->count();
        $package = Package::where('status','Approved')->get()->count();

        return view('backend.dashboard',[
            'pending_orders' => $pending_orders,
            'package' => $package
        ]);
    }
}
