<?php

namespace App\Http\Controllers;

use App\Models\city;
use Illuminate\Http\Request;
use App\Http\Requests\checkcity;


class CityController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:المدن', ['only' => ['index','store']]);
         $this->middleware('permission:اضافة مدينة', ['only' => ['create','store']]);
         $this->middleware('permission:تعديل مدينة', ['only' => ['edit','update']]);
         $this->middleware('permission:حدف مدينة', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = city::get();
        return view('admin.city', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(checkcity $request)
    {
        city::create([
            'city_name' => $request->city
        ]);
        Session()->flash('Add', 'تم اضافة المدينة بنجاح ');
        return redirect()->back();
    }
    
    /**
     * Display the specified resource.
     */
    public function show(city $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(city $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(checkcity $request, string $id)
    {
        $city = city::where('id', $request->id)->first();
        $city->update([
            'city_name' => $request->city,
        ]);
        Session()->flash('edit', 'تم تعديل المدينة بنجاح ');
        return redirect()->back();
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        city::where('id', $request->id)->delete();
        Session()->flash('delete', 'تم حذف المدينة بنجاح ');
        return redirect()->back();
    }
}
