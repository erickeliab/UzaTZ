<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //the root route for all the order
        $order = Order::all();
        return $order;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return the view wit the form to add the order/creating new order
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //creating the new order from the values from the form
        $order = new Order;
        $order->Product_id = $request->input('product');
        $order->id = Auth()->user();
        $order->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return the view with the specified order
        $order = Order::findOrFail($id);
        return $order;
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id)
    {
        //return the view with the form to update the specified order
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
        $order = Order::find($id);
        $order->Product_id = $request->input('product');
        $order->id = Auth()->user();
        $order->save();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get the order with the specified id
        $order = Order::find($id);

        //set the destroyed column of that order to true
        $order->destroyed = true;

        //save the changes on that order
        $order->save();

        //redirect to the root route
        return redirect('/order');

    }
}
