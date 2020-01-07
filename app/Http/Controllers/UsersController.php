<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //getting the whole collection of the users to the variable

        $users = User::all();

        //returning the view with all the users data
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view with the form for adding user
        /**THE WORKOF THIS ROUTE SO FAR HAS ALREADY BEEN DONE BY THE AUTH API */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //creating new instance of a user
        $user = new User;

        //adding the data from the response object to the instance created
        $user->firstname = $request->firstname;
        $user->sirname = $request->sirname;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->place = $request->place;
        $user->phone = $request->phone;

        //save the new instanceto the dabs
        $user->save();

        //redirect to the all users view
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //fetch the data for the user id matching the passed parameter
        $users = User::findOrFail($id);

        //return the view with the fetched data
        return $users;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return the view with the form for updating a certain users information

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
        //getting an instance of the user with the id that matches the passed one
        $user = User::findOrFail($id);

        //adding the updated field from the request object
        $user->firstname = $request->firstname;
        $user->sirname = $request->sirname;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->place = $request->place;
        $user->phone = $request->phone;

        //saving the updates
        $user->save();

        //redirecting to the all users home
        return redirect('/user');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //finding the user whose id matches the passed id parameter above
        $userTodestroy = User::findOrFail($id);

        //updating the destroyed field to be true
        $userTodestroy->destroyed = true;

        //save the changes
        $userTodestroy->save();

        //redirecting to the root directory for users
        return redirect('/user');

    }
}
