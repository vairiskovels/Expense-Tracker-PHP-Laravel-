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
        $profile = User::select([
            'users.name',
            'users.surname',
            'users.username',
            'users.email'
        ])
        ->where('id', auth()->user()->id)
        ->get();
        return view('profile', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request)
    {
        $userId = auth()->user()->id;
        
        $this->validate($request, [
            'name'      => 'required|min:3|max:25',
            'surname'   => 'required|min:3|max:25',
            'username'  => 'required|min:3|max:30|unique:users,username,' . $userId,
            'email'     => 'required|min:6|max:50|unique:users,email,' . $userId
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->save();
        return redirect('/profile')->with('message', "Your profile information has been successfully saved");
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
    public function updatePassword(Request $request) {

        $user = User::where('id', auth()->user()->id)->first();
        Hash::check(request('old_password'), $user->password);

        $this->validate($request, [
            'new_password'      => 'required|min:8|max:191|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/',
            'repeat_password'      => 'required|same:new_password'
        ],
        [
            'new_password.regex'    => 'Password should contain lowercase, upercase letters and digits.'
        ]);

        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect('/profile/change-password')->with('message', "Your password has successfully been changed.");
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
    public function destroy(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        Hash::check(request('old_password'), $user->password);
        User::where('id', auth()->user()->id)->delete();
        return redirect('/');
    }
}
