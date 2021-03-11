<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorsController extends Controller
{
    public function index()
    {
        // return LaravelLocalization::getCurrentLocale();

        $color = Color::all();
        return view('admin.pages.color.index',compact('color'));
    }

    public function store(Request $request)
    {
        try
        {
                $create = Color::create(
                    [
                        'name'  => ["en" => $request->name_en, "ar"  => $request->name_ar],
                    ]);

                return redirect()->route('color.index')->with(['success' => 'تم الاضافة بنجاح']);
        } catch (\Throwable $th)
        {
            DB::rollback();
            return $th;
            return redirect()->route('color.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function update(Request $request,$id)
    {
        $data = Color::find($id);

        try
        {
            if (!$data)
            {
                return redirect()->route('color.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {

                    $update = $data->update(
                        [
                            'name'  => ["en" => $request->name_en, "ar"  => $request->name_ar],
                        ]);


                return redirect()->route('color.index')->with(['success' => 'تم التعديل بنجاح']);
            }

        } catch (\Throwable $th)
        {

            return redirect()->route('color.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function destroy($id)
    {
        $data = Color::find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('color.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {
                $data->delete();
                return redirect()->route('color.index')->with(['success' => 'تم مسح البيانات بنجاح']);
            }

        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('color.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function softDelete()
    {
        $color = Color::onlyTrashed()->get();
        return view('admin.pages.color.softDelete',compact('color'));
    }

    public function restore($id)
    {
        $data = Color::withTrashed()->find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('color.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {
                $data->restore();
                return redirect()->route('color.index')->with(['success' => 'تم استرجاع بنجاح']);
            }

        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('color.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function forceDelete($id)
    {
        $data = Color::withTrashed()->find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('color.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {

                $data->forceDelete();
                return redirect()->route('color.index')->with(['success' => 'تم استرجاع بنجاح']);
            }

        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('color.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }
}
