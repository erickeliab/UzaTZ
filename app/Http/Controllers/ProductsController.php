<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return the view with all the products
        $allproducts = Product::all();

        return $allproducts;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return the view with the form for creting the new product

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //valiate the inputs
        $this->validate($request,[
            //here goes some validations

        ]);

        //create new object of the product class to be added to the dbs
        $newProduct = new Product;

        //assigning the properties to the values of the input object
        $newProduct->productName = $request->input('name');
        $newProduct->p_description = $request->input('description');
        $newProduct->p_price = $request->input('price');
        $newProduct->p_imageprice = $request->input('image');
        $newProduct->id = auth()->user();
        $newProduct->promoprice = $request->input('promoprice');

        //saving the created object to the model class
        $newProduct->save();

        //redirecting to the index route of the products
        return redirect('/order');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get the product with the id passed as an argument
        $Oneproduct = Product::findOrFail($id);

        //return the view to with the product wth the product_id resembling the passed id argument
        return $Oneproduct;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return the view with form to edit the product with that specifies id

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
        //get the specified product
        $productToUpdate = Product::findOrFail($id);

        //update the fields
        $productToUpdate->productName = $request->input('name');
        $productToUpdate->p_description = $request->input('description');
        $productToUpdate->p_price = $request->input('price');
        $productToUpdate->p_imageprice = $request->input('image');
        $productToUpdate->id = auth()->user();
        $productToUpdate->promoprice = $request->input('promoprice');

        //save the updates
        $productToUpdate->save();

        //redirect to the show route
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get the product to be destroyed from the dbs
        $productToDestroy = Product::findOrFail($id);

        //set the value of destroyed to true
        $productToDestroy->destroyed = true;
        //save
        $productToDestroy->save();
        //redirect
        return redirect('/product');
    }
}
