<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('staff/list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('staff/add',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->update($request, 0);

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
        $user = User::find($id);
        return view('staff/add',compact('user'));

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
        //

        if(!$id){
            $users = new User;
        }else{
            $users = User::find($id);
            $users->name = $request->get('name');
            $users->email = $request->get('email');
            $users->password = $request->get('password');
            $users->staff_name = $request->get('staff_birth');
            $users->staff_age = $request->get('staff_height');
            $users->staff_weight = $request->get('staff_weight');
            $users->staff_role_reception = $request->get('staff_role_reception');
            $users->staff_role_housekeeping = $request->get('staff_role_housekeeping');
            $users->staff_role_food_and_beverage = $request->get('staff_role_food_and_beverage');
            $users->staff_pos = $request->get('staff_pos');
            $users->staff_address = $request->get('staff_address');
            $users->staff_address2 = $request->get('staff_address2');
            $users->staff_address3 = $request->get('staff_address3');
            $users->staff_province = $request->get('staff_province');
            $users->staff_phone = $request->get('staff_phone');
            $users->staff_status = $request->get('staff_status');
            $users->staff_previous_job = $request->get('staff_previous_job');
            $users->staff_pic = $request->get('staff_pic');
            $users->staff_file = $request->get('staff_file');
            $users->staff_file = $request->get('staff_file');
            $users->staff_note = $request->get('staff_note');
        }
        $users->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
