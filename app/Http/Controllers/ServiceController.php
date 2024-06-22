<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;
use App\Http\Requests\checksrev;


class ServiceController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:الخدمات', ['only' => ['index','store']]);
         $this->middleware('permission:اضافة خدمة', ['only' => ['create','store']]);
         $this->middleware('permission:تعديل خدمة', ['only' => ['edit','update']]);
         $this->middleware('permission:حدف خدمة', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = service::get();
        return view('admin.service', compact('service'));
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
    public function store(checksrev $request)
    {
        service::create([
            'srev_name' => $request->serv_name
        ]);
        Session()->flash('Add', 'تم اضافة المدينة بنجاح ');
        return redirect()->back();
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(checksrev $request, string $id)
    {
        $service = service::where('id', $request->pro_id)->first();
        $service->update([
            'srev_name' => $request->serv_name,
        ]);
        Session()->flash('edit', 'تم تعديل المدينة بنجاح ');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        service::where('id', $request->pro_id)->delete();
        Session()->flash('delete', 'تم حذف المدينة بنجاح ');
        return redirect()->back();
    }
}
