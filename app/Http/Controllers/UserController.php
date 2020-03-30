<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(5);
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'      => 'required|min:3',
            'email'     => 'required|email|unique:users',
            'role'      => 'required',
            'password'  => 'required|min:8'
        ]);

        User::create ([
            'name'      => $request->name,
            'email'     => $request->email,
            'role'      => $request->role,
            'password'  => bcrypt($request->password)
        ]);

        return redirect('/user')->with('status','User Telah Ditambahkan');
        

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
        return view('user.edit', compact('user'));
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
        $validateData = $request->validate([
            'name'      => 'required|min:3',
            'role'      => 'required'           
        ]);

        if($request->input('password')) {
            $user_data = [
                'name'      => $request->name,
                'role'      => $request->role,
                'password'  => $request->password
            ];
        } else {
            $user_data = [
                'name'  => $request->name,
                'role'  => $request->role,
            ];
        }
        
        $user = User::find($id);    
        $user->update($user_data);

        return redirect('/user')->with('status','Profil Telah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =  User::destroy($id);
        return redirect('/user')->with('status','User Telah Dihapus');
    }
}
