<?php

namespace App\Http\Controllers;

use App\ProductSlidern;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProslidController extends Controller
{
    public function index()
    {
        $productsliders = ProductSlidern::all();

        return view('admin.pages.product_slider.index', compact('productsliders'));
    }

    public function store(Request $request)
    {

        $slider_img = $request->file('slider_img');

        if ($slider_img) {

            $slider_img_name = $slider_img->getClientOriginalName();
            $slider_img->move(public_path('admin/img/productslider/'), $slider_img_name);

        }

        try
        {

            $ProductImg = ProductSlidern::create(
                [

                    'description' => ["ar" => $request->description_ar, "en" => $request->description_en],
                    "image" => $slider_img_name,
                    'created_at' => Carbon::now(),

                ]);

            toastr()->success(trans('messages.success'));

            return redirect()->route('pro_slider');

        } catch (\Exception $e) {

        }
    }

    public function update(Request $request, $slider_id)
    {

        $slider_img = $request->file('slider_img');
        $oldimg = ProductSlidern::find($request->slider_id);

        $image_path = public_path('/admin/img/productslider/' . $oldimg->image);

        if (file_exists($image_path)) {
            Storage::delete($image_path);
        }

        if ($slider_img) {

            $slider_img_name = $slider_img->getClientOriginalName();
            $slider_img->move(public_path('admin/img/productslider/'), $slider_img_name);

        }

        try
        {

            $ProductImg = ProductSlidern::find($request->slider_id)->update(
                [

                    'description' => ["ar" => $request->description_ar, "en" => $request->description_en],
                    "image" => $slider_img_name,
                    'created_at' => Carbon::now(),

                ]);

            toastr()->success(trans('messages.success'));

            return redirect()->route('pro_slider');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function delete(Request $request, $id)
    {
        try {
            $slider = ProductSlidern::find($request->slider_id);
            $image_path = public_path('/admin/img/productslider/' . $slider->image);

            if (file_exists($image_path)) {
                Storage::delete($image_path);
            }

            $slider->delete();
            toastr()->error(trans('messages.Delete'));

            return redirect()->route('pro_slider');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
