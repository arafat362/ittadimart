<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Services\SmsService;

class DashboardController extends Controller
{
    // index
    public function index()
    {
        $total_products = Product::count();
        $total_orders = Order::count();
        $total_pending_orders = Order::where('status', 0)->count();
        $total_delivered_orders = Order::where('status', 2)->count();
        return view('backend.dashboard', compact('total_products', 'total_orders', 'total_pending_orders', 'total_delivered_orders'));
    }

    // checkBalance
    public function smsBalance()
    {
        $balance = app(SmsService::class)->checkBalance();
        $sms_available = floor($balance / 0.35003);
        return $sms_available;
    }
}
