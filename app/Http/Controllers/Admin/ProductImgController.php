<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImg;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductImgController extends Controller
{

    public function store(Request $request)
    {

        $product = Product::latest()->first()->id;
        $multi_tiny_img = $request->file('tiny_img');
        $mulit_max_umg = $request->file('max_img');

        if ($multi_tiny_img) {
            foreach ($multi_tiny_img as $tiny_img) {

                $image_min = $tiny_img->getClientOriginalName();
                $tiny_img->move(public_path('admin/img/min/'), $image_min);
            }
        }
        if ($mulit_max_umg) {
            foreach ($mulit_max_umg as $max_img) {

                $image_max = $max_img->getClientOriginalName();
                $max_img->move(public_path('admin/img/max/'), $image_max);

            }

        }

        try
        {

        $ProductImg = ProductImg::create(
            [
                'code_img' => $request->code_img,

                'color_name' => ["ar" => $request->color_name_ar, "en" => $request->color_name_en],
                "tiny_img" => $image_min,
                "max_img" => $image_max,
                'product_id' => $product,
                'created_at' => Carbon::now(),

            ]);

        toastr()->success(trans('messages.success'));
        // return redirect()->route('products.index');
        return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function product_main_imgs()
    {
        return view('admin.pages.products.img_product');
    }

    public function editproduct_main_imgs($id)
    {

        $productImgs = ProductImg::where('product_id', $id)->get();

        return view('admin.pages.products.edit_img_product', compact('productImgs'));

    }

    public function updateproduct_main_imgs(Request $request, $id)
    {
        $oldimg = ProductImg::find($request->id);

        $old_tiny_path = public_path() . '/admin/img/min/' . $oldimg->tiny_img;

        if ($old_tiny_path) {
            unlink(public_path() . '/admin/img/min/' . $oldimg->tiny_img);

        } else {
            unink(public_path() . '/admin/img/max/' . $oldimg->max_img);

        }

        try {
            $tiny_img = $request->file('tiny_img');

            $image_min = $tiny_img->getClientOriginalName();
            $tiny_img->move(public_path('admin/img/min/'), $image_min);

            $max_img = $request->file('max_img');
            $image_max = $max_img->getClientOriginalName();
            $max_img->move(public_path('admin/img/max/'), $image_max);

            $ProductImgs = ProductImg::find($request->id);
            $ProductImgs->update(
                [
                    'code_img' => $request->code_img,

                    'color_name' => ["ar" => $request->color_name_ar, "en" => $request->color_name_en],
                    "tiny_img" => $image_min,
                    "max_img" => $image_max,
                    'product_id' => $request->product_id,
                    'created_at' => Carbon::now(),

                ]);

            toastr()->success(trans('messages.success'));
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function destroy(ProductImg $productImg)
    {
        //
    }

    public function allProductImg($id)
    {
        $productcontent = Product::find($id);

        $productImgs = ProductImg::where('product_id', $id)->get();

        return view('admin.pages.gallery_admin.index', compact('productImgs'));
    }

    //productslider

    public function productslider()
    {
        return view();
    }
}
