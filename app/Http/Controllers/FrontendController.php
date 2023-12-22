<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Services\SmsService;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    private $featured_categories;

    public function __construct()
    {
        $this->featured_categories = Category::whereIn('id', explode(',', getSetting('featured_categories')))->get();
    }

    public function getAllSubcategoryIds($category)
    {
        $subcategoryIds = [];

        foreach ($category->children as $subcategory) {
            $subcategoryIds[] = $subcategory->id;
            $subcategoryIds = array_merge($subcategoryIds, $this->getAllSubcategoryIds($subcategory));
        }

        return $subcategoryIds;
    }


    // index
    public function index()
    {
        // $featured_categories = $this->featured_categories;
        // $latest = Product::latest()->take(8)->get();

        // $cosmetics_category = Category::find(50);
        // $cosmeticsSubcategoryIds = $this->getAllSubcategoryIds($cosmetics_category);
        // $cosmeticsSubcategoryIds[] = $cosmetics_category->id; // Add the current category id
        // $cosmetics = Product::whereIn('category_id', $cosmeticsSubcategoryIds)->take(8)->get();

        // $baby_and_kids_category = Category::find(25);
        // $babyAndKidsSubcategoryIds = $this->getAllSubcategoryIds($baby_and_kids_category);
        // $babyAndKidsSubcategoryIds[] = $baby_and_kids_category->id; // Add the current category id
        // $baby_and_kids = Product::whereIn('category_id', $babyAndKidsSubcategoryIds)->take(8)->get();

        // $womens_fashion_category = Category::find(22);
        // $womensFashionSubcategoryIds = $this->getAllSubcategoryIds($womens_fashion_category);
        // $womensFashionSubcategoryIds[] = $womens_fashion_category->id; // Add the current category id
        // $womens_fashion = Product::whereIn('category_id', $womensFashionSubcategoryIds,)->take(8)->get();

        // return view('frontend.index', compact('latest', 'featured_categories', 'cosmetics_category', 'womens_fashion_category', 'cosmetics', 'womens_fashion', 'baby_and_kids_category', 'baby_and_kids'));

        return view('welcome');
    }
    // product
    public function product($slug)
    {
        $featured_categories = $this->featured_categories;
        $product = Product::where('slug', $slug)->firstOrFail();
        $related_products = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(6)->get();
        return view('frontend.product', compact('featured_categories', 'product', 'related_products'));
    }
    // category
    public function category($slug)
    {
        $featured_categories = $this->featured_categories;
        $category = Category::where('slug', $slug)->firstOrFail();

        $subcategoryIds = $this->getAllSubcategoryIds($category);
        $subcategoryIds[] = $category->id; // Add the current category id

        $products = Product::whereIn('category_id', $subcategoryIds)->paginate(16);
        return view('frontend.category', compact('featured_categories', 'category', 'products'));
    }
    // checkout
    public function checkout($id, Request $request)
    {
        $featured_categories = $this->featured_categories;
        $product = Product::findOrFail($id);
        $quantity = $request->quantity ?? 1;
        return view('frontend.checkout', compact('product', 'quantity'));
    }
    // placeOrder
    public function placeOrder(Request $request){

        // dd($request->all());

        if (empty($request->products) || !is_array($request->products)) {
            return response()->json([
                'status' => 'error',
                'message' => 'অবৈধ প্রোডাক্ট তথ্য'
            ]);
        }
        
        // Initialize order details array
        $orderDetails = [];
        
        foreach ($request->products as $productData) {
            // Validate product ID and quantity
            if (!isset($productData['id']) || !isset($productData['quantity'])) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'অবৈধ প্রোডাক্ট তথ্য'
                ]);
            }
        
            $productId = $productData['id'];
            $quantity = $productData['quantity'];
        
            // Find the product
            $product = Product::find($productId);
            if (empty($product)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'প্রোডাক্ট খুজে পাওয়া যায়নি'
                ]);
            }
        
            // Validate quantity
            if (!is_numeric($quantity) || $quantity < 1) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'প্রোডাক্ট পরিমাণ অবৈধ'
                ]);
            }
        
            // Add product details to the orderDetails array
            $orderDetails[] = [
                'product_id' => $productId,
                'product_name' => $product->name,
                'product_thumbnail' => $product->thumbnail,
                'quantity' => $quantity,
                'price' => $product->sale_price,
                'total' => $product->sale_price * $quantity
            ];
        }
        
        // Validate user information
        if (empty($request->name) || empty($request->phone) || empty($request->address)) {
            return response()->json([
                'status' => 'error',
                'message' => 'সকল তথ্য পূরণ করুন'
            ]);
        } elseif (!preg_match('/^01[3-9]\d{8}$/', $request->phone)) {
            return response()->json([
                'status' => 'error',
                'message' => 'সঠিক ফোন নাম্বার দিন'
            ]);
        }

        // Check If Multiple Order with smae data within 15 minute
        $lastOrder = Order::where('customer_phone', $request->phone)->where('created_at', '>=', now()->subMinutes(15))->latest()->first();
        if ($lastOrder) {
            return response()->json([
                'status' => 'error',
                'message' => 'আপনি একটি অর্ডার দিয়েছেন, অন্য অর্ডার দিতে পারবেন ১৫ মিনিট পরে'
            ]);
        }
        
        // Create Order model instance
        $order = new Order();
        $order->customer_name = $request->name;
        $order->customer_phone = $request->phone;
        $order->customer_address = $request->address;
        $order->order_details = $orderDetails;
        $order->subtotal = array_sum(array_column($orderDetails, 'total'));
        $order->note = $request->note ?? null;
        $order->save();

        // $message = "প্রিয় {$request->customer_name},\nআপনার অর্ডারটি সফলভাবে গ্রহণ করা হয়েছে।\nআপনার অর্ডার আইডি #{$order->id}।\nখুব শীঘ্রই আমাদের একজন প্রতিনিধি আপনার সাথে যোগাযোগ করবে।\nধন্যবাদ";
        // app(SmsService::class)->sendSms($request->customer_phone, $message, true);

        return response()->json([
            'status' => 'success',
            'message' => 'অর্ডার সফলভাবে সম্পন্ন হয়েছে',
            'order_id' => $order->id,
        ]);
    }

    // setLocale
    public function setLocale($locale)
    {
        if(!in_array($locale, ['en', 'bn'])){
            abort(404);
        }
        
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
