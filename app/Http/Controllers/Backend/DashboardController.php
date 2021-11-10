<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use App\Models\Inquire;
use App\Models\CustomizeInquiry;

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
        $inquire = Inquire::where('status','Pending')->get()->count();
        $customize_inquiry = CustomizeInquiry::where('status','Pending')->get()->count();

        return view('backend.dashboard',[
            'pending_orders' => $pending_orders,
            'package' => $package,
            'inquire' => $inquire,
            'customize_inquiry' => $customize_inquiry
        ]);
    }
}
