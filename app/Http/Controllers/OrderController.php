<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\order;
use App\Mail\sendorder;
use App\Models\service;
use Illuminate\Http\Request;
use App\Http\Requests\checkorder;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:الطلبات', ['only' => ['index','store']]);
         $this->middleware('permission:اضافة اودر', ['only' => ['create','store']]);
         $this->middleware('permission:تعديل اوردر', ['only' => ['edit','update']]);
         $this->middleware('permission:حذف اوردر', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = order::get();
        $city = city::get();
        $service = service::get();
        return view('admin.order', compact('city','order','service'));
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
    public function store(checkorder $request)
    {
        order::create([
            'order_name' => $request->name,
            'order_email' => $request->email,
            'order_mobile' => $request->mobile,
            'order_note' => $request->notes,
            'cities_id' => $request->city,
            'services_id' => $request->service,
        ]);
        $name = $request->name;
        Session()->flash('success', 'تم ارسال الطلب بنجاح ');
        Mail::to($request->email)->send(new sendorder($name));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idss)
    {
        $ids = $request->id;
        $order = order::where('order_id', $ids);
        $order->update([
            'order_name' => $request->order_name,
            'order_email' => $request->order_email,
            'order_mobile' => $request->order_moblie,
            'cities_id' => $request->order_city,
            'services_id' => $request->order_service,
            'order_note' => $request->note,
        ]);
        Session()->flash('edit', 'تم تعديل الطلب بنجاح ');
        return redirect()->back();
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $qq = order::where('order_id', $request->pro_id)->delete();
        Session()->flash('delete', 'تم حذف الطلب بنجاح ');
        return redirect()->back();
    }

    public function create_order(checkorder $request)
    {
        order::create([
            'order_name' => $request->name,
            'order_email' => $request->email,
            'order_mobile' => $request->mobile,
            'order_note' => $request->notes,
            'cities_id' => $request->city,
            'services_id' => $request->service,
        ]);
        Session()->flash('Add', 'تم اضافة الطلب بنجاح ');
        return redirect()->back();    }
}
