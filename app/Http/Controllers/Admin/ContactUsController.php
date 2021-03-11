<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function index()
    {
        // return LaravelLocalization::getCurrentLocale();

        $contactUs = ContactUs::all();
        return view('admin.pages.contactUs.index',compact('contactUs'));
    }

    public function store(Request $request)
    {
        // return $request;
        try
        {


            $create = ContactUs::create(
                [
                    'Country'           => ["en" => $request->Country_en, "ar"  => $request->Country_ar],
                    'city'              => ["en" => $request->city_en, "ar"     => $request->city_ar],
                    'adress'            => ["en" => $request->adress_en, "ar"   => $request->adress_ar],
                    'phone_number'      => $request->phone_number,
                    'mobile_number1'    => $request->mobile_number1,
                    'mobile_number2'    => $request->mobile_number2,
                    'whatsApp_number'   => $request->whatsApp_number,
                ]);

            return redirect()->route('contactUs.index')->with(['success' => 'تم الاضافة بنجاح']);
        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('contactUs.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function update(Request $request,$id)
    {
        $data = ContactUs::find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('contactUs.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {

                $update = $data->update(
                    [
                        'Country'           => ["en" => $request->Country_en, "ar"  => $request->Country_ar],
                        'city'              => ["en" => $request->city_en, "ar"     => $request->city_ar],
                        'adress'            => ["en" => $request->adress_en, "ar"   => $request->adress_ar],
                        'phone_number'      => $request->phone_number,
                        'mobile_number1'    => $request->mobile_number1,
                        'mobile_number2'    => $request->mobile_number2,
                        'whatsApp_number'   => $request->whatsApp_number,
                    ]);


            return redirect()->route('contactUs.index')->with(['success' => 'تم التعديل بنجاح']);
            }

        } catch (\Throwable $th)
        {

            return $th;
            return redirect()->route('contactUs.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function destroy($id)
    {
        $data = ContactUs::find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('contactUs.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {
                $data->delete();
                return redirect()->route('contactUs.index')->with(['success' => 'تم مسح البيانات بنجاح']);
            }

        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('contactUs.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function softDelete()
    {
        $contactUs = ContactUs::onlyTrashed()->get();
        return view('admin.pages.contactUs.softDelete',compact('contactUs'));
    }

    public function restore($id)
    {
        $data = ContactUs::withTrashed()->find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('contactUs.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {
                $data->restore();
                return redirect()->route('contactUs.index')->with(['success' => 'تم استرجاع بنجاح']);
            }

        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('contactUs.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function forceDelete($id)
    {
        $data = ContactUs::withTrashed()->find($id);
        // return $data;
        try
        {
            if (!$data)
            {
                return redirect()->route('contactUs.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {
               
                $data->forceDelete();
                return redirect()->route('contactUs.index')->with(['success' => 'تم استرجاع بنجاح']);
            }

        } catch (\Throwable $th)
        {
            return $th;
            return redirect()->route('contactUs.index')->with(['error' => 'هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

}
