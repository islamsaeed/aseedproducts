<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AboutUsController extends Controller
{
    public function index()
    {
        // return LaravelLocalization::getCurrentLocale();
        $aboutUs = AboutUs::all();
        return view('admin.pages.aboutUs.index',compact('aboutUs'));
    }

    public function store(AboutUsRequest $request)
    {

        try
        {
            DB::beginTransaction();

                $create = AboutUs::create(
                    [
                        'descreption'           => ["en" => $request->descreption_en, "ar"  => $request->descreption_ar],
                    ]);

                // CHECK LOGO
                if ($request->hasFile('logo'))
                {
                    $photo =  $request->logo->store('aboutUs','public');
                    $create->logo = $photo;
                    $create->save();
                }
            DB::commit();

                return redirect()->route('aboutUs.index')->with(['success' => 'تم الاضافة بنجاح']);
        } catch (\Throwable $th)
        {
            DB::rollback();
            return $th;
            return redirect()->route('aboutUs.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function update(Request $request,$id)
    {
        $data = AboutUs::find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('aboutUs.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {
                DB::beginTransaction();
                    $update = $data->update(
                        [
                            'descreption'           => ["en" => $request->descreption_en, "ar"  => $request->descreption_ar],
                        ]);

                    // CHECK LOGO
                    if ($request->hasFile('logo'))
                    {
                        Storage::disk('public')->delete('/assets/images/',$data->logo);
                        $photo =  $request->logo->store('aboutUs','public');
                        $data->update(['logo' => $photo]);
                    }
                DB::commit();
                return redirect()->route('aboutUs.index')->with(['success' => 'تم التعديل بنجاح']);
            }

        } catch (\Throwable $th)
        {
            DB::rollback();
            return $th;
            return redirect()->route('aboutUs.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function destroy($id)
    {
        $data = AboutUs::find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('aboutUs.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {
                $data->delete();
                return redirect()->route('aboutUs.index')->with(['success' => 'تم مسح البيانات بنجاح']);
            }

        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('aboutUs.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function softDelete()
    {
        $aboutUs = AboutUs::onlyTrashed()->get();
        return view('admin.pages.aboutUs.softDelete',compact('aboutUs'));
    }

    public function restore($id)
    {
        $data = AboutUs::withTrashed()->find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('aboutUs.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {
                $data->restore();
                return redirect()->route('aboutUs.index')->with(['success' => 'تم استرجاع بنجاح']);
            }

        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('aboutUs.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function forceDelete($id)
    {
        $data = AboutUs::withTrashed()->find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('aboutUs.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {
                Storage::disk('public')->delete('/assets/images/',$data->logo);
                $data->forceDelete();
                return redirect()->route('aboutUs.index')->with(['success' => 'تم استرجاع بنجاح']);
            }

        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('aboutUs.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }
}
