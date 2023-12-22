<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Services\SmsService;

class OrderController extends Controller
{
    // Index
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('backend.order.index', compact('orders'));
    }
    // Show
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('backend.order.show', compact('order'));
    }
    // Mark as processing
    public function markAsProcessing($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 1;
        $order->save();

        $message = "প্রিয় {$order->customer_name}, আপনার অর্ডারটি (#{$order->id}) সফলভাবে প্রেরণ করা হয়েছে। আগামী ৩ দিনের মধ্যে আপনি আপনার পার্সেলটি হাতে পেয়ে যাবেন। BoroMokam.com এর সাথে থাকার জন্য আপনাকে অসংখ্য ধন্যবাদ।";
        app(SmsService::class)->sendSms($order->customer_phone, $message);
        
        $alert = ['type' => 'success', 'message' => 'Order marked as processing'];
        return redirect()->back()->with($alert);
    }
    // Mark as delivered
    public function markAsDelivered($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 2;
        $order->save();
        
        $alert = ['type' => 'success', 'message' => 'Order marked as delivered'];
        return redirect()->back()->with($alert);
    }
    // Mark as canceled
    public function markAsCanceled($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 3;
        $order->save();
        
        $alert = ['type' => 'success', 'message' => 'Order marked as canceled'];
        return redirect()->back()->with($alert);
    }

    // cronDeliveredOrders
    public function cronDeliveredOrders(){
        $orders = Order::where('status', 1)->where('updated_at', '<', now()->subDays(6))->get();
        foreach($orders as $order){
            $order->status = 2;
            $order->save();
        }
        return $orders->count() . ' orders marked as delivered';
    }
}
