<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    public function index()
    {
        // return LaravelLocalization::getCurrentLocale();

        $slider = Slider::all();
        return view('admin.pages.slider.index',compact('slider'));
    }

    public function store(Request $request)
    {

        try
        {
            DB::beginTransaction();

                $create = Slider::create(
                    [
                        'descreption' => ["en" => $request->descreption_en, "ar"  => $request->descreption_ar],
                    ]);

                // CHECK LOGO
                if ($request->hasFile('logo'))
                {
                    $photo =  $request->logo->store('slider','public');
                    $create->logo = $photo;
                    $create->save();
                }
            DB::commit();

                return redirect()->route('slider.index')->with(['success' => 'تم الاضافة بنجاح']);
        } catch (\Throwable $th)
        {
            DB::rollback();
            return $th;
            return redirect()->route('slider.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function update(Request $request,$id)
    {
        $data = Slider::find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('slider.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {
                DB::beginTransaction();
                    $update = $data->update(
                        [
                            'descreption' => ["en" => $request->descreption_en, "ar"  => $request->descreption_ar],
                        ]);

                    // CHECK LOGO
                    if ($request->hasFile('logo'))
                    {
                        Storage::disk('public')->delete('/assets/images/',$data->logo);
                        $photo =  $request->logo->store('slider','public');
                        $data->update(['logo' => $photo]);
                    }
                DB::commit();
                return redirect()->route('slider.index')->with(['success' => 'تم التعديل بنجاح']);
            }

        } catch (\Throwable $th)
        {
            DB::rollback();
            return $th;
            return redirect()->route('slider.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function destroy($id)
    {
        $data = Slider::find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('slider.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {
                $data->delete();
                return redirect()->route('slider.index')->with(['success' => 'تم مسح البيانات بنجاح']);
            }

        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('slider.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function softDelete()
    {
        $slider = Slider::onlyTrashed()->get();
        return view('admin.pages.slider.softDelete',compact('slider'));
    }

    public function restore($id)
    {
        $data = Slider::withTrashed()->find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('slider.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {
                $data->restore();
                return redirect()->route('slider.index')->with(['success' => 'تم استرجاع بنجاح']);
            }

        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('slider.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function forceDelete($id)
    {
        $data = Slider::withTrashed()->find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('slider.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {
                Storage::disk('public')->delete('/assets/images/',$data->logo);
                $data->forceDelete();
                return redirect()->route('slider.index')->with(['success' => 'تم استرجاع بنجاح']);
            }

        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('slider.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

}
