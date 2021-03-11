<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutHome;
use Illuminate\Http\Request;
use App\Http\Requests\AboutUSHome;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutUsHomeController extends Controller
{
    public function index()
    {
        // return LaravelLocalization::getCurrentLocale();
        $aboutUs = AboutHome::all();
        return view('admin.pages.aboutUsHome.index',compact('aboutUs'));
    }

    public function store(AboutUSHome $request)
    {


        try
        {
            $data = AboutHome::all()->count();
            // return $data;
            if ($data < 2)
            {
                DB::beginTransaction();

                    $create = AboutHome::create(
                        [
                            'title'           => ["en" => $request->title_en, "ar"  => $request->title_ar],
                            'descreption'     => ["en" => $request->descreption_en, "ar"  => $request->descreption_ar],
                        ]);

                    // CHECK LOGO
                    if ($request->hasFile('logo'))
                    {
                        $photo =  $request->logo->store('aboutUsHome','public');
                        $create->logo = $photo;
                        $create->save();
                    }
                DB::commit();
                toastr()->success(trans('messages.success'));
                return redirect()->route('aboutUsHome.index');
            }else
            {
                return redirect()->route('aboutUsHome.index')->with(['success' => 'لا يمكن اضافة اكثر من 2 تفاصيل']);
            }

        } catch (\Throwable $th)
        {
            DB::rollback();
            return $th;
            return redirect()->route('aboutUsHome.index')->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(AboutUSHome $request,$id)
    {
        $data = AboutHome::find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('aboutUs.index')->withErrors(['error' => $e->getMessage()]);

            }else
            {
                DB::beginTransaction();
                    $update = $data->update(
                        [
                            'title'           => ["en" => $request->title_en, "ar"  => $request->title_ar],
                            'descreption'           => ["en" => $request->descreption_en, "ar"  => $request->descreption_ar],
                        ]);

                    // CHECK LOGO
                    if ($request->hasFile('logo'))
                    {
                        Storage::disk('public')->delete('/assets/images/',$data->logo);
                        $photo =  $request->logo->store('aboutUsHome','public');
                        $data->update(['logo' => $photo]);
                    }
                DB::commit();
                toastr()->success(trans('messages.success'));
                return redirect()->route('aboutUsHome.index');
            }

        } catch (\Throwable $th)
        {
            DB::rollback();
            return $th;
            return redirect()->route('aboutUsHome.index')->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $data = AboutHome::find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('aboutUsHome.index')->withErrors(['error' => $e->getMessage()]);

            }else
            {
                $data->delete();
                session()->flash('Delete_Succesfully');
                toastr()->error(trans('messages.Delete'));
                return redirect()->route('aboutUsHome.index');
            }

        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('aboutUsHome.index')->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function softDelete()
    {
        $aboutUs = AboutHome::onlyTrashed()->get();
        return view('admin.pages.aboutUsHome.softDelete',compact('aboutUs'));
    }

    public function restore($id)
    {
        $data = AboutHome::withTrashed()->find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('aboutUsHome.index')->withErrors(['error' => $e->getMessage()]);

            }else
            {
                $data->restore();
                toastr()->success(trans('messages.success'));
                return redirect()->route('aboutUsHome.index');
            }

        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('aboutUsHome.index')->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function forceDelete($id)
    {
        $data = AboutHome::withTrashed()->find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('aboutUsHome.index')->withErrors(['error' => $e->getMessage()]);

            }else
            {
                Storage::disk('public')->delete('/assets/images/',$data->logo);
                $data->forceDelete();
                session()->flash('Delete_Succesfully');
                toastr()->error(trans('messages.Delete'));
                return redirect()->route('aboutUsHome.index');
            }

        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('aboutUsHome.index')->withErrors(['error' => $e->getMessage()]);
        }
    }
}
