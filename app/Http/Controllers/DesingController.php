<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Farme;
use App\MainCategories;
use App\EventImage;
use Session;
use Image;
use App\FarmeBanner;
use DB;

class DesingController extends Controller {

    public function saveFbCover(Request $request) {
        $banner_image = $request->file('banner_image');
        $banner_image_name = rand(11111, 99999) . '.' . $banner_image->getClientOriginalExtension();
        $banner_image_path = 'banner_image/';
        Image::make($banner_image)->resize(600,600)->save($banner_image_path.$banner_image_name);

        $banner_logo = $request->file('banner_logo');
        $banner_logo_name = rand(11111, 99999) . '.' . $banner_logo->getClientOriginalExtension();
        $banner_image_path = 'banner_logo/';
        Image::make($banner_logo)->resize(600,600)->save($banner_image_path.$banner_logo_name);

        $banner = new FarmeBanner();
        $banner->admin_id = Session::get('admin_id');
        $banner->farme_id = $request->farme_id;
        $banner->banner_name = $request->banner_name;
        $banner->banner_price = $request->banner_price;
        $banner->banner_image = $banner_image_path.$banner_image_name;
        $banner->banner_logo = $banner_image_path.$banner_logo_name;
        $banner->save();
        Session::put('farme_id',$banner->banner_logo);
        Session::put('banner_logo',$banner->banner_logo);
        Session::put('banner_image',$banner->banner_image);
        Session::put('banner_name',$banner->banner_name);
        Session::put('banner_price',$banner->banner_price);
    }

    public function updateFeame(Request $request) {
        $image = $request->file('image');
        $this->mainCategoryValidation($request);
        $main_category = MainCategories::where('id', $request->category_id)->first();
        if ($image) {
            unlink($main_category->image);
            $image_name = time() . '_' . $image->getClientOriginalName();
            $category_image = 'category_image/';
            Image::make($image)->resize(1359, 339)->save($category_image . $image_name);
            $main_category->image = $category_image . $image_name;
        }
        $main_category->category_name = $request->category_name;
        $main_category->category_name_ban = $request->category_name_ban;
        $main_category->category_name_hin = $request->category_name_hin;
        $main_category->category_description = $request->category_description;
        $main_category->status = $request->status;
        $main_category->update();
        return redirect('/main-categories')->with('message', 'Category Updated Successfully !!!');
    }

    public function saveFarme(Request $request){
//        return $request;

        $farme_image = $request->file('farme_image');
        $farme_image_name = time() . '_' . $farme_image->getClientOriginalName();
        $farme_image_path = 'farme_image/';
        Image::make($farme_image)->resize(600,600)->save($farme_image_path.$farme_image_name);

        $banner = new Farme();
        $banner->admin_id = Session::get('admin_id');
        $banner->farme_image = $farme_image_path.$farme_image_name;
        $banner->status = $request->status;
        $banner->save();
        return redirect('/manage-frame')->with('message', 'Frame Insert Successfully');
    }
    public function manageFrame() {
        if (Session::get('admin_role') == 1) {
            $farmes = Farme::where('admin_id', Session::get('admin_id'))->orderBy('id', 'DESC')->get();
        } else {
            $farmes = Farme::orderBy('id', 'DESC')->get();
        }
        return view('backEnd.pages.desingBanner.manageFrame', compact('farmes'));
    }

    public function unpublishedFrame($id) {
        $product = Farme::where('id', $id)->first();
        $product->status = 0;
        $product->update();
        return redirect('/manage-frame')->with('message', 'Frame Unpublished Successfully');
    }

    public function publishedFrame($id) {
        $product = Farme::where('id', $id)->first();
        $product->status = 1;
        $product->update();
        return redirect('/manage-frame')->with('message', 'Frame Published Successfully');
    }

    public function fbCover() {
        $farmes = Farme::all();
        return view('backEnd.pages.desingBanner.fbCover', compact('farmes'));
    }

    public function editFarme($id){
        $farmes = Farme::find($id);
        return $farmes;
    }

    public function deleteFarme($id) {
        $image_path = DB::table('farmes')
            ->select('farme_image')
            ->where('id', $id)
            ->first();

        $file_path = $image_path->farme_image;
        if (file_exists($file_path)) {
            unlink($file_path);
        } else {
            dd('File does not exists.');
        }

        DB::table('farmes')
            ->where('id', $id)
            ->delete();
        return redirect('/manage-frame')->with('message', 'Frame Deleted Successfully');
    }

}
