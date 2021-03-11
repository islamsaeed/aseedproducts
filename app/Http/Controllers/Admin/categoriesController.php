<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class categoriesController extends Controller
{


    public function index()
    {
        $categories = Category::all();

        return view('admin.pages.category.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.

     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Category::where('name->ar', $request->name_ar)->orWhere('name->en', $request->name_en)->exists()) {

            return redirect()->back()->withErrors('اسم الحقل موجود بالفعل ');
        }

        $request->validate([
            'name_ar' => 'required|unique:categories,name->ar',
            'name_en' => 'required|unique:categories,name->en',
        ]);
        try {
            $category = Category::create([
                'name' => ["en" => $request->name_en, "ar" => $request->name_ar],

                'created_at' => Carbon::now(),
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('Categories.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Category::where('name->ar', $request->name_ar)->orWhere('name->en', $request->name_en)->exists()) {

            return redirect()->back()->withErrors('اسم الحقل موجود بالفعل ');
        }

        $request->validate([
            'name_ar' => 'required|unique:categories,name->ar',
            'name_en' => 'required|unique:categories,name->en',
        ]);
        try {
            $category = Category::findOrFail($request->id)->update([
                'name' => ["en" => $request->name_en, "ar" => $request->name_ar],

                'created_at' => Carbon::now(),
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('Categories.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $patients = Category::findOrFail($request->id)->delete();
            session()->flash('Delete_Succesfully');
            toastr()->error(trans('messages.Delete'));

            return redirect()->route('Categories.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function softDelete()
    {
        // $categories = Category::onlyTrashed()->get();
        return view('admin.pages.category.softDelete',compact('categories'));
    }

}
