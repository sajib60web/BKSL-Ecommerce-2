<?php

namespace App\Http\Controllers;

use App\Country;
use App\District;
use App\Division;
use App\MainCategories;
use App\Brand;
use App\Product_size;
use App\EventImage;
use App\SubCategories;
use App\Product;
use App\ProductImage;
use App\SubDistrict;
use App\UserAdmin;
use Illuminate\Http\Request;
use Session;
use Image;
use App\ProductColor;
use App\PriceWithRange;
use DB;

class ShopperController extends Controller {

    public function shopperRegister() {
        $countries = Country::all();
        $divisions = Division::all();
        $districts = District::all();
        $subdistricts = SubDistrict::all();
        return view('customTemplate.shopper-page.shopper_register', [
            'countries' => $countries,
            'divisions' => $divisions,
            'districts' => $districts,
            'subdistricts' => $subdistricts
        ]);
    }

    protected function saveShopperValidation($request) {
        $request->validate([
            'user_name' => 'required',
            'email' => 'required | email',
            'phone' => 'required | numeric',
            'password' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'division_id' => 'required',
            'sub_district_id' => 'required',
        ]);
    }

    public function saveShopper(Request $request) {
        $this->saveShopperValidation($request);
        $user_admin = new UserAdmin();
        $user_admin->user_name = $request->user_name;
        $user_admin->email = $request->email;
        $user_admin->phone = $request->phone;
        $user_admin->password = bcrypt($request->password);
        $user_admin->address = $request->address;
        $user_admin->country_id = $request->country_id;
        $user_admin->division_id = $request->division_id;
        $user_admin->district_id = $request->district_id;
        $user_admin->sub_district_id = $request->sub_district_id;

        $user_admin->admin_role = 1;
        $user_admin->status = 0;
        $user_admin->save();
        return redirect('/shopper-register')->with('message', 'You are Successfully Apply To Be a Shopper!!');
    }

    public function shopperLogin() {
        return view('customTemplate.shopper-page.shopper_login');
    }

    protected function adminLoginValidation($request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    public function shopperLoginDashboard(Request $request) {
        $this->adminLoginValidation($request);
        $user = UserAdmin::where('email', $request->email)->where('status', 1)->first();
        if ($user) {
            if (password_verify($request->password, $user->password)) {
                Session::put('admin_id', $user->id);
                Session::put('admin_name', $user->user_name);
                Session::put('admin_role', $user->admin_role);
                Session::put('country_id', $user->country_id);
                Session::put('division_id', $user->division_id);
                Session::put('district_id', $user->district_id);
                Session::put('sub_district_id', $user->sub_district_id);
                return redirect('/shopper-dash');
            } else {

                return redirect('/shopper-login')->with('message', 'Enter Your Valid Password');
            }
        } else {
            Session::put('message', 'Enter Your valid Email ');
            return redirect('/shopper-login')->with('message', 'Enter Your Valid Email');
        }
    }

    public function shopperDash() {

        $products = DB::table('products')
                ->join('main_categories', 'products.main_category_id', '=', 'main_categories.id')
                ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
                ->select('products.*', 'main_categories.category_name', 'sub_categories.sub_category_name')
                ->where('admin_id', Session::get('admin_id'))
                ->paginate(5);

        if(Session::get('admin_role') == 1){
            $products = DB::table('products')
                ->join('main_categories', 'products.main_category_id', '=', 'main_categories.id')
                ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
                ->select('products.*', 'main_categories.category_name', 'sub_categories.sub_category_name')
                ->where('admin_id', Session::get('admin_id'))
                ->orderBy('id', 'DESC')
                ->paginate(5);
        }else{
            $products = DB::table('products')
                ->join('main_categories', 'products.main_category_id', '=', 'main_categories.id')
                ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
                ->select('products.*', 'main_categories.category_name', 'sub_categories.sub_category_name')
                ->orderBy('id', 'DESC')
                ->paginate(5);
        }

        $product_id = [];
        foreach ($products as $key => $product) {
            $product_id[$key] = $product->id;
        }

        $images = ProductImage::whereIn('product_id', $product_id)->get();
        return view('customTemplate.shopper-page.shopper_dash', [
            'products' => $products,
            'images' => $images
        ]);
    }

    public function shopperCreateProduct() {
        $categories = MainCategories::where('status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();
        $sub_cats = SubCategories::all();
        return view('customTemplate.shopper-page.shopperCreateProduct', [
            'categories' => $categories,
            'brands' => $brands,
            'sub_cats' => $sub_cats
        ]);
    }

    protected function productValidation($request) {
        $request->validate([
            'main_category_id' => 'required',
            'sub_category_id' => 'required',
            'product_brand' => 'required',
            'product_qty' => 'required',
            'product_name_eng' => 'required',
            'product_price_eng' => 'required',
            'product_short_description_eng' => 'required',
            'prodcut_long_description_eng' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    protected function productBasicInfo($request, $admin_info) {
        $product = new Product();
        $product->main_category_id = $request->main_category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->product_brand = $request->product_brand;
        $product->offer_id = $request->offer_id;
        $product->top_sellers = $request->top_sellers;
        $product->special = $request->special;
        $product->hot_product = $request->hot_product;
        $product->top_rated = $request->top_rated;
        $product->product_qty = $request->product_qty;
        $product->ex_date = $request->ex_date;
        $product->product_name_eng = $request->product_name_eng;
        $product->product_name_ban = $request->product_name_ban;
        $product->product_name_hin = $request->product_name_hin;
        $product->product_price_eng = $request->product_price_eng;
        $product->product_price_ban = $request->product_price_ban;
        $product->product_price_hin = $request->product_price_hin;

        $product->note_eng = $request->note_eng;
        $product->note_ban = $request->note_ban;
        $product->note_hin = $request->note_hin;

        $product->product_short_description_eng = $request->product_short_description_eng;
        $product->prodcut_short_description_ban = $request->prodcut_short_description_ban;
        $product->product_short_description_hin = $request->product_short_description_hin;
        $product->prodcut_long_description_eng = $request->prodcut_long_description_eng;
        $product->prodcut_long_description_ban = $request->prodcut_long_description_ban;
        $product->product_long_description_hin = $request->product_long_description_hin;

        $product->product_color_eng = $request->product_color_eng;
        $product->product_color_ban = $request->product_color_ban;
        $product->product_color_hin = $request->product_color_hin;

        //================================================//
        $product->download_link = $request->download_link;
        $product->product_color = $request->product_color;
        $product->old_Price = $request->old_Price;
        $product->sale_Price = $request->sale_Price;
        $product->discount = $request->discount;
        $product->offer = $request->offer;
        $product->stock_status = $request->stock_status;
        $product->main_qty = $request->main_qty;
        $product->size = $request->size;
        $product->others = $request->others;
        //================================================//

        $product->admin_id = $admin_info->id;
        $product->country_id = $admin_info->country_id;
        $product->division_id = $admin_info->division_id;
        $product->district_id = $admin_info->district_id;
        $product->sub_district_id = $admin_info->sub_district_id;
        $product->status = '0';
        $product->save();
        $product_id = $product->id;
        return $product_id;
    }

    protected function saveProductImages($image_arry, $product_id) {
        $image_arry_len = count($image_arry);
        for ($i = 0; $i < $image_arry_len; $i++) {
            $product_image = new ProductImage();
            $imageName = time() . '_' . $image_arry[$i]->getClientOriginalName();
            $image = $image_arry[$i];
            $image_large = 'product_image/large/';
            $image_medium = 'product_image/medium/';
            $image_small = 'product_image/small/';

            Image::make($image)->resize(441, 463)->save($image_large . $imageName);
            Image::make($image)->resize(132, 132)->save($image_medium . $imageName);
            Image::make($image)->resize(115, 115)->save($image_small . $imageName);
            $product_image->product_id = $product_id;
            $product_image->large_image = $image_large . $imageName;
            $product_image->medium_image = $image_medium . $imageName;
            $product_image->small_image = $image_small . $imageName;
            $product_image->save();
        }
    }

    protected function saveProductSize($product_size_arry, $product_id) {

        $product_size_arry_len = count($product_size_arry);
        for ($i = 0; $i < $product_size_arry_len; $i++) {
            $product_size = new Product_size();
            $product_size->product_id = $product_id;
            $product_size->product_size_name = $product_size_arry[$i];
            $product_size->save();
        }
    }

    protected function productColor($product_color_arry, $product_id) {
        $product_color_arry_len = count($product_color_arry);
        for ($i = 0; $i < $product_color_arry_len; $i++) {
            $product_color = new ProductColor();
            $product_color->product_id = $product_id;
            $product_color->color_name = $product_color_arry[$i];
            $product_color->save();
        }
    }

    protected function productPriceRangeValidation($request) {
        $request->validate([
            'price_first_number' => 'required',
            'price_last_number' => 'required',
            'first_to_last_number_price' => 'required',
        ]);
    }

    protected function saveProductPriceRange($product_id, $price_first_number_arry, $price_last_number_arry, $first_to_last_number_price_arry) {
        $price_arry_len = count($price_first_number_arry);
        for ($i = 0; $i < $price_arry_len; $i++) {
            $price_range = new PriceWithRange();
            $price_range->product_id = $product_id;
            $price_range->price_first_number = $price_first_number_arry[$i];
            $price_range->price_last_number = $price_last_number_arry[$i];
            $price_range->first_to_last_number_price = $first_to_last_number_price_arry[$i];
            $price_range->save();
        }
    }

    public function shopperSaveProduct(Request $request) {
        $admin_id = Session::get('admin_id');
        $admin_info = UserAdmin::where('id', $admin_id)->first();
        $image_arry = $request->file('product_image');
        $product_size_arry = $request->product_size;
        $product_color_arry = $request->color_name;
        $price_first_number_arry = $request->price_first_number;
        $price_last_number_arry = $request->price_last_number;
        $first_to_last_number_price_arry = $request->first_to_last_number_price;
//        $this->productValidation($request);
        $product_id = $this->productBasicInfo($request, $admin_info);
        $this->saveProductImages($image_arry, $product_id);
        if ($price_first_number_arry != '') {
            $this->productPriceRangeValidation($request);
            $this->saveProductPriceRange($product_id, $price_first_number_arry, $price_last_number_arry, $first_to_last_number_price_arry);
        }
        if ($product_size_arry != '') {
            $this->saveProductSize($product_size_arry, $product_id);
        }
        if ($product_color_arry != '') {
            $this->productColor($product_color_arry, $product_id);
        }
        return redirect('/shopper-dash')->with('message', 'Product Info Save Successfully');
    }

    public function shopperEditProduct($id) {
        $images = ProductImage::where('product_id', $id)->get();
        $size = Product_size::where('product_id', $id)->get();
        $main_categories = MainCategories::all();
        $sub_categories = SubCategories::all();
        $brands = Brand::all();
        $product = DB::table('products')
                ->select('*')
                ->where('id', $id)
                ->first();

        return view('customTemplate.shopper-page.shopperEditProduct', [
            'images' => $images,
            'size' => $size,
            'main_categories' => $main_categories,
            'sub_categories' => $sub_categories,
            'brands' => $brands,
            'product' => $product,
        ]);
    }

    public function shopperUpdateProduct(Request $request) {
        $product = Product::where('id', $request->product_id)->first();
        $product->main_category_id = $request->main_category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->product_brand = $request->product_brand;
        $product->offer_id = $request->offer_id;
        $product->top_sellers = $request->top_sellers;
        $product->special = $request->special;
        $product->hot_product = $request->hot_product;
        $product->top_rated = $request->top_rated;
        $product->product_qty = $request->product_qty;
        $product->ex_date = $request->ex_date;
        $product->product_name_eng = $request->product_name_eng;
        $product->product_name_ban = $request->product_name_ban;
        $product->product_name_hin = $request->product_name_hin;
        $product->product_price_eng = $request->product_price_eng;
        $product->product_price_ban = $request->product_price_ban;
        $product->product_price_hin = $request->product_price_hin;

        $product->note_eng = $request->note_eng;
        $product->note_ban = $request->note_ban;
        $product->note_hin = $request->note_hin;

        $product->product_short_description_eng = $request->product_short_description_eng;
        $product->prodcut_short_description_ban = $request->prodcut_short_description_ban;
        $product->product_short_description_hin = $request->product_short_description_hin;
        $product->prodcut_long_description_eng = $request->prodcut_long_description_eng;
        $product->prodcut_long_description_ban = $request->prodcut_long_description_ban;
        $product->product_long_description_hin = $request->product_long_description_hin;
        $product->product_color_eng = $request->product_color_eng;
        $product->product_color_ban = $request->product_color_ban;
        $product->product_color_hin = $request->product_color_hin;

        //================================================//
        $product->download_link = $request->download_link;
        $product->product_color = $request->product_color;
        $product->old_Price = $request->old_Price;
        $product->sale_Price = $request->sale_Price;
        $product->discount = $request->discount;
        $product->offer = $request->offer;
        $product->stock_status = $request->stock_status;
        $product->main_qty = $request->main_qty;
        $product->size = $request->size;
        $product->others = $request->others;
        //================================================//

        $product->save();
        return redirect('/shopper-dash')->with('message', 'Product Updated Successfully');
    }


    public function shopperImageUpdateProduct($id) {
        $product = Product::where('id',$id)->first();
        $images = ProductImage::where('product_id', $id)->get();
        $size = Product_size::where('product_id', $id)->get();
        $main_categories = MainCategories::all();
        $sub_categories  = SubCategories::all();
        $brand           = Brand::all();
        $adminfo        = DB::table('user_admins')

                          ->join('countries', 'countries.id', '=', 'user_admins.country_id')
                          ->join('divisions', 'user_admins.division_id', '=', 'divisions.id')
                          ->join('districts', 'user_admins.district_id', '=', 'districts.id')
                          ->join('sub_districts', 'user_admins.sub_district_id', '=', 'sub_districts.id')
                          ->select('user_admins.*', 'countries.country_name', 'divisions.division_name', 'districts.district_name', 'sub_districts.sub_district_name')
                          ->where('user_admins.id', $product->admin_id)
                          ->first();

        return view('customTemplate.shopper-page.shopperImageUpdateProduct', [
            'product' => $product,
            'images' => $images,
            'size' => $size,
            'main_categories' => $main_categories,
            'sub_categories' => $sub_categories,
            'brands' => $brand,
            'adminInfo' => $adminfo,
        ]);
    }

    public function shopperUpdateImage(Request $request){
        $image_arry = $request->file('product_image');
        $product_id = $request->productId;
        $this->saveProductImages($image_arry, $product_id);
        return redirect()->back()->with('message', 'Image Upload Successfully !!!');
    }
    public function shopperDeleteImage(Request $request){
       $image = ProductImage::where('id', $request->id)->first();

       if ($image){
           unlink($image->large_image);
           unlink($image->medium_image);
           unlink($image->small_image);
       }
       $image->delete();
       echo 'Success';
    }

    public function shopperDeleteProduct($id) {
        $product = Product::where('id', $id)->first();
        $images = ProductImage::where('product_id', $id)->get();
        $image_arry_len = count($images);
        for ($i = 0; $i < $image_arry_len; $i++) {
            if ($images) {
                unlink($images[$i]->large_image);
                unlink($images[$i]->medium_image);
                unlink($images[$i]->small_image);
            }
            $images[$i]->delete();
        }
        $product_size = Product_size::where('product_id', $id)->get();
        $product_size_arry = count($product_size);
        for ($i = 0; $i < $product_size_arry; $i++) {
            if ($product_size) {
                $product_size[$i]->delete();
            }
        }
        $product->delete();
        return redirect('/shopper-dash')->with('message', 'Product Deleted Successfully');
    }

    //===============================//
    public function shoppeUnpublishedProduct($id) {
        $product = Product::where('id', $id)->first();
        $product->status = 0;
        $product->update();
        return redirect('/shopper-dash')->with('message', 'Product Unpublished Successfully');
    }

    public function shoppePublishedProduct($id) {
        $product = Product::where('id', $id)->first();
        $product->status = 1;
        $product->update();
        return redirect('/shopper-dash')->with('message', 'Product Published Successfully');
    }

    public function shopperDashboard() {
        return view('customTemplate.shopper-page.shopper_dashboard');
    }

    public function shopperProduct($id) {
        $products = Product::where('status', 1)->where('admin_id', $id)->get();
        $products_id = array();
        foreach ($products as $key => $product) {
            $products_id[$key] = $product->id;
        }
        $images = ProductImage::whereIn('product_id', $products_id)->get();
        $eventImage = EventImage::where('status', 1)->orderBy('id', 'desc')->first();

        $user = UserAdmin::where('id', $id)->first();
        return view('customTemplate.offerPage.offerPage', [
            'products' => $products,
            'images' => $images,
            'user' => $user,
           'eventImage' => $eventImage
        ]);
    }

    public function shopperUrl($name, $id) {
        $products = Product::where('status', 1)->where('admin_id', $id)->get();
        $images = ProductImage::all();
        $user = UserAdmin::where('id', $id)->first();
        $division = Division::where('id', $user->division_id)->select('division_name')->first();
        $country = Country::where('id', $user->country_id)->select('country_name')->first();
        return view('customTemplate.shopperPage.shopperPage', [
            'products' => $products,
            'images' => $images,
            'user' => $user,
            'division' => $division,
            'country' => $country
        ]);
        ;
    }


    public function shopperSubCategorie(Request $request){
        $sub_cat = SubCategories::where('main_category_id', $request->id)->get();
        return response()->json($sub_cat);
    }

    public function shopperLogout(Request $request){
        $request->session()->invalidate();
        return redirect('/');
    }

}
