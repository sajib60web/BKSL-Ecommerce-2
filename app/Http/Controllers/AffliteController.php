<?php

namespace App\Http\Controllers;

use App\Shipping;
use App\ShopperOrder;
use App\UserAdmin;
use App\MainCategories;
use App\ProductImage;
use App\Product;
use App\Product_size;
use App\SubCategories;
use Session;
use App\Info;
use App\Brand;
use App\Orders;
use App\Payment;
use App\Division;
use App\OrderDetail;
use Cart;
use App\Customer;
use App\Country;
use Illuminate\Http\Request;
use DB;
use PDF;

class AffliteController extends Controller
{

    public function index(){

        $products = Product::where('status', 1)->paginate(16);

        $product_id = [];
        foreach ($products as $key => $product){
            $product_id[$key] = $product->id;
        }

        $images = ProductImage::whereIn('product_id', $product_id)->get();

        $categories = MainCategories::where('status', 1)->get();
        return view('customTemplate.affiliatePage.index', [
            'products' => $products,
            'categories' => $categories,
            'images' => $images
        ]);
    }



    public function view_allflite($id){

        $posts = Product::orderBy('id', 'desc')->get();


        $user = UserAdmin::where('id', $id)->first();
        $products = Product::where('admin_id', $id)->paginate(16);

        $product_id = [];
        foreach ($products as $key => $product){
            $product_id[$key] = $product->id;
        }

        $images = ProductImage::whereIn('product_id', $product_id)->get();

        $categories = MainCategories::where('status', 1)->get();
        return view('customTemplate.afflite-index', [
            'products' => $products,
            'categories' => $categories,
            'user' => $user,
            'images' => $images,
            'posts' => $posts
        ]);
    }

    //** Searching Panel Start **//

    public function search(Request $request)
    {

            $search = $request->Input('search');
            $products = DB::table('products')
                ->where('product_name_eng', 'LIKE', "%" . $search . "%")
                ->take(5)
                ->get();
            $posts = Product::orderBy('id', 'desc')->take(5)->get();

            $product_id = [];
            foreach ($products as $key => $product) {
                $product_id[$key] = $product->id;
            }


            $images = ProductImage::whereIn('product_id', $product_id)->take(5)->get();

            $categories = MainCategories::where('status', 1)->take(5)->get();
            return view('customTemplate.search', [
                'products' => $products,
                'categories' => $categories,
                'images' => $images,
                'posts' => $posts
            ]);

    }

    public function search_product(Request $request){
        $product_search = $request->input('product_search');
        $products = DB::table('products')->where('product_name_eng', 'LIKE', "%" .$product_search . "%")->take(5)->get();
        $product_id = [];
        foreach ($products as $key => $product){
            $product_id[$key] = $product->id;
        }

        $images = ProductImage::whereIn('product_id', $product_id)->take(5)->get();
        $categories = MainCategories::where('status', 1)->take(5)->get();
        $posts = Product::orderBy('id', 'desc')->take(5)->get();
        return view('customTemplate.affiliatePage.search-product',[
            'products' => $products,
            'images' => $images,
            'categories' => $categories,
            'posts' => $posts
        ]);
    }


    //** Searching Panel end **//


    public function view_affiliate_product($id){
        $categories = MainCategories::where('status', 1)->get();
        $products = Product::where('id', $id)->take(5)->paginate(15);
        $product  = Product::where('id', $id)->first();
        $product_id = [];
        foreach ($products as $key => $product) {
            $product_id[$key] = $product->id;
        }
        $product_images = ProductImage::where('product_id', $id)->limit(3)->get();
        $mainCategory = MainCategories::where('id', $product->main_category_id)->first();
        $subCategory  = SubCategories::where('id', $product->sub_category_id)->first();
        $images = ProductImage::whereIn('product_id', $product_id)->get();
        $sizes        = Product_size::where('product_id', $id)->get();
        $size_arry = count($sizes);
        if ($product){
            $product->view_total += 1;
            $product->update();
        }
        $url =  url()->current();
        $sts = 0;
//        if (Session::get('lang') == null){
//            $this->language();
//        }
        $reletedProducts = Product::where('sub_category_id', $product->sub_category_id)->orderBy('id', 'desc')->limit(5)->get();
        $rpId = array();
        foreach ($reletedProducts as $key => $reletedProduct){
            $rpId[$key] = $reletedProduct->id;
        }
        $rp_image = ProductImage::whereIn('product_id', $rpId)->select('small_image', 'product_id')->get();

        $info = Info::where('id', 1)->first();
        return view('customTemplate.affiliatePage.afflite-product-view',compact('categories', 'products', 'images',
            'sizes', 'size_arry', 'product_images', 'mainCategory', 'subCategory','product','url','sts', 'info', 'rp_image', 'reletedProducts'
            ));
    }

    public function view_affiliate_category($id){
        $category_name = MainCategories::where('id', $id)->first();
        $cat_products = Product::where('main_category_id', $id)->where('status', 1)->orderBy('id', 'desk')->take(5)->paginate(16);
        $sub_categories = SubCategories::where('main_category_id', $id)->orderBy('id', 'desk')->get();
        $categories = MainCategories::where('status', 1)->get();
        $brands = Brand::orderBy('id', 'desk')->get();
        $images = ProductImage::all();
        return view('customTemplate.affiliatePage.afflite-category-product', [
            'products'   => $cat_products,
            'sub_categories' => $sub_categories,
            'category_name'  => $category_name,
            'brands'         => $brands,
            'images'         => $images,
            'categories'    => $categories
        ]);
    }

    public function category_search(Request $request){
        $category_product_search = $request->input('category_search');
        $products = DB::table('products')->where('product_name_eng', 'LIKE', "%" .$category_product_search . "%")->take(5)->get();
        $category_name = MainCategories::where('id', $request->id)->first();
        $cat_products = Product::where('main_category_id', $request->id)->where('status', 1)->orderBy('id', 'desk')->take(5)->get();
        $sub_categories = SubCategories::where('main_category_id', $request->id)->orderBy('id', 'desk')->get();
        $categories = MainCategories::where('status', 1)->get();
        $brands = Brand::orderBy('id', 'desk')->get();
        $images = ProductImage::all();
        return view('customTemplate.affiliatePage.afflite-category-search', [
            'products'   => $cat_products,
            'sub_categories' => $sub_categories,
            'category_name'  => $category_name,
            'brands'         => $brands,
            'images'         => $images,
            'categories'    => $categories,
            'products' => $products
        ]);
    }

    public function add_cart(Request $request){
        $product = Product::where('id', $request->product_id)->first();
        $adminUser = UserAdmin::where('id', $product->admin_id)->first();
        $images   = ProductImage::where('product_id', $request->product_id)->first();
        $image    = $images->small_image;
        Cart::add([
            'id' => $product->id,
            'name' => $product->product_name_eng,
            'price' => $product->product_price_eng,
            'quantity' => $request->product_qty,
            'attributes' => array(
                'size'   => $request->product_size,
                'image'  => $image,
                'admin_id' => $product->admin_id,
                'admin_name' => $adminUser->user_name
            )
        ]);

        $cartContent = Cart::getContent();
        if($request->btn == 'orderNow'){
            return redirect('/register-affiliate-customer');
        }else{
            return back();
        }


    }

    public function cart_page(){

        $cartContents = Cart::getContent();
        $categories = MainCategories::where('status', 1)->get();
        $subTotal = Cart::getSubTotal();
        Session::put('pubSubTotal', $subTotal);
        return view('customTemplate.affiliatePage.cart-page', [
            'cartContents' => $cartContents,
            'subTotal'     => $subTotal,
            'categories'  => $categories
        ]);
    }

//** Logout System **//

    public function customer_Logout(){
        Session::forget('customer_id');
        Session::forget('customer_name');
        return redirect('/index');
    }

//** Logout System **//

    public function register_affiliate_customer(){
            return view('customTemplate.affiliatePage.register');
    }

    protected function customerRegistionValidation($request){
        $request->validate([
            'customer_name' => 'required',
            'customer_phone_number' => 'required | numeric',
            'customer_email' => 'required | email',
            'customer_password' => 'required',
            'customer_confirm_password' => 'required',
        ]);
    }

    public function save_affiliate_customer(Request $request){
        $this->customerRegistionValidation($request);
        $customer = new Customer();
        $customer->customer_name = $request->customer_name;
        $customer->customer_phone_number = $request->customer_phone_number;
        $customer->customer_email = $request->customer_email;
        $customer->customer_password = $request->customer_password;
        $customer->customer_confirm_password = $request->customer_confirm_password;
        $customer->save();
        if ($customer->id){
            Session::put('customer_id', $customer->id);
            Session::put('customer_name', $customer->customer_name);
            return redirect('/billing-page');
        }


    }


    public function affiliateLogin(Request $request)
    {
        $customer = Customer::where('customer_email', $request->customer_email)->first();
        if ($customer){
            Session::put('customer_id', $customer->id);
            Session::put('customer_name', $customer->customer_name);
            return redirect('/billing-page');
        }else{
            return redirect('/register-affiliate-customer')->with('message', 'Invalid Login');
        }


    }

    public function customer_bill_page(){
        if(Session::get('customer_id')) {
            $customer = Customer::where('id', Session::get('customer_id'))->first();
            return view('customTemplate.affiliatePage.affiliate-billing', compact('customer'));
        }else{
            return redirect('/register-affiliate-customer');
        }
    }

    public function customer_bill_save(Request $request){
        $customer = Customer::where('id', $request->customer_id)->first();
        $customer->customer_name = $request->customer_name;
        $customer->customer_phone_number = $request->customer_phone_number;
        $customer->customer_email = $request->customer_email;
        $customer->customer_address  = $request->customer_address;
        $customer->update();
        $customer = Customer::where('id', $customer->id)->first();
        if ($customer->member_cart_id > 0){
            $member_cart = MemberCart::where('id', $customer->member_cart_id)->first();
            Session::put('discount', $member_cart->member_cart_discount);

        }
        Session::put('billing_id', $customer->id);
        return redirect('/shiping-page');
    }


    public function customer_shipping_page(){
        if(Session::get('billing_id')) {
            $customer = Customer::where('id', Session::get('customer_id'))->first();
            $countries = Country::where('status', 1)->get();
            return view('customTemplate.affiliatePage.shipping-info',[
                'customer' => $customer,
                'countries' => $countries
            ]);
        }else{
            return redirect('/billing-page')->with('message', 'You Must Full Fill Your Billing Information');
        }
    }

    public function payment_info(){
        if(Session::get('shipping_id')) {
            return view('customTemplate.affiliatePage.payment-info');
        }else{
            return redirect('/shiping-page')->with('message', 'You Must Be Full Fill Your Shipping Information');
        }
    }

    public function customer_shipping_save(Request $request){
        $shipping = new Shipping();
        $shipping->ship_customer_name = $request->ship_customer_name;
        $shipping->customer_id = Session::get('customer_id');
        $shipping->ship_customer_phone_number = $request->ship_customer_phone_number;
        $shipping->ship_customer_email = $request->ship_customer_email;
        $shipping->ship_country = $request->ship_country;
        $shipping->ship_division = $request->ship_division;
        $shipping->ship_charge = $request->ship_charge;
        $shipping->ship_customer_address = $request->ship_customer_address;
        $shipping->save();
        Session::put('shipping_id', $shipping->id);
        Session::put('shipCharge', $request->ship_charge);
        return redirect('/payment-info');
    }


    public function success_order()
    {
        if (Session::get('customer_id') && Session::get('shipping_id') && Session::get('payment_id')) {

            $order = Orders::where('id', Session::get('order_id'))->first();
            $billing_info = Customer::where('id', $order->customer_id)->first();
            $shipping_info = Shipping::where('id', $order->shipping_id)->first();
            $country = Country::where('id', $shipping_info->ship_country)->first();
            $division = Division::where('id', $shipping_info->ship_division)->first();
            $order_details = OrderDetail::where('order_id', $order->id)->get();
            $payment = Payment::where('order_id', $order->id)->first();

            return view('customTemplate.affiliatePage.success-order',[
                'order' => $order,
                'order_details' => $order_details,
                'billing_info' => $billing_info,
                'shipping_info' => $shipping_info,
                'country'  => $country,
                'division'  => $division,
                'payment'  => $payment
            ]);
        }

    }

    public function success_order_save(Request $request){

        $payment_type = $request->payment_type;
        if ($payment_type == 'cash') {
            $order = new Orders();
            $order->customer_id = Session::get('customer_id');
            $order->shipping_id = Session::get('shipping_id');

            if (Session::get('discount')) {
                $order->order_total = (Session::get('pubSubTotal') - (((Session::get('pubSubTotal')) * (Session::get('discount'))) / 100)) + Session::get('shipCharge');
            } else {
                $order->order_total = Session::get('pubSubTotal') + Session::get('shipCharge');
            }

            $order->order_total_main = Cart::getSubTotal();
            $order->save();
            Session::put('order_id', $order->id);


            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $payment_type;
            $payment->save();
            $cartContents = Cart::getContent();

            foreach ($cartContents as $cartContent) {
                $order_detail = new OrderDetail();
                $order_detail->order_id = $order->id;
                $order_detail->product_id = $cartContent->id;
                $order_detail->product_name = $cartContent->name;
                $order_detail->product_price = $cartContent->price;
                $order_detail->product_qty = $cartContent->quantity;
                $order_detail->product_size = $cartContent->attributes->size;
                $order_detail->admin_id = $cartContent->attributes->admin_id;
                $order_detail->admin_name = $cartContent->attributes->admin_name;
                $order_detail->save();
            }

            Cart::clear();
            Session::put('payment_id', 1);
            return redirect('/success-order');
        }elseif ($payment_type == 'card'){
            return $payment_type;
        }else{
            return $payment_type;
        }

    }

    public function order_status_check(Request $request){
        $customer = Customer::where('customer_email', $request->email)->first();
        $order    = Orders::where('id', $request->number)->where('customer_id', $customer->id)->first();
        if(isset($order)){
            echo 'Your Order Status are <strong>'.$order->order_status.'</strong>';
        }else{
            echo 'There have No Order';
        }
    }

    public function manage_charge_country(Request $request){
        $countryCharge = Country::where('id', $request->id)->first();
        echo $countryCharge->shipping_charge;
    }

    public function manage_charge_division(Request $request){
        $divisionCharge = Division::where('id', $request->id)->first();
        echo $divisionCharge->shipping_charge;
    }

    public function download_invoice($id){
        $orderInfo = Orders::where('id', $id)->first();
        $customerInfo = Customer::where('id', $orderInfo->customer_id)->first();
        $paymentInfo = Payment::where('order_id', $id)->first();
        $shippingInfo = Shipping::where('id', $orderInfo->shipping_id)->first();
        $orderDetails = OrderDetail::where('order_id', $id)->get();
        $country   = Country::where('id', $shippingInfo->ship_country)->first();
        $division   = Division::where('id', $shippingInfo->ship_division)->first();
        $pdf = PDF::loadView('customTemplate.affiliatePage.customer_invoice', [
            'orderInfo' => $orderInfo,
            'customerInfo' => $customerInfo,
            'paymentInfo' => $paymentInfo,
            'orderDetails' => $orderDetails,
            'country' => $country,
            'division' => $division,
            'shippingInfo' => $shippingInfo,
        ]);

        return $pdf->stream();

    }

//    public function cart_page(){
////        if (Session::get('lang') == null){
////            $this->language();
////        }
//        $cartContents = Cart::getContent();
//        $subTotal = Cart::getSubTotal();
//        Session::put('pubSubTotal', $subTotal);
//        return view('customTemplate.register-customer.ca1rt', [
//            'cartContents' => $cartContents,
//            'subTotal'     => $subTotal
//        ]);
//    }

}







