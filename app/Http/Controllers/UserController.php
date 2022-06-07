<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $this->validate($request, [
            'name'      => 'required|',
            'username'      => 'required|unique:users|min:6',
            'email'      => 'required|unique:users|email',
            'password'      => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/',
        ],
        [
            'password.regex'    => 'Password should contain lowercase, upercase letters and digits.'
        ]);

        $user = new User();
        $names = explode(" ", $request->name);
        $user->name = $names[0];
        $user->surname = $names[1];
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->currency = "€";
        $user->email = $request->email;
        $user->save();
        return redirect('/login');
    }

    public function passReset() {
        return view('pass-reset');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('profile');
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
        //
    }

    public function editPassword() {
        return view('change_pass');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete()
    {
        return view('delete-account');
    }
    public function destroy($id)
    {
        
    }
}
