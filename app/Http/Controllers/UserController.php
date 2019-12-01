<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $users = User::orderBy('id', 'asc')->paginate(10);
        return view('manage.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *g
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if ($request->has('password') && !empty ($request->password)){


            $password = trim($request->password);

        }else {
            #set manual password
            $length = 10;
            $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i = 0; $i < $length; ++$i) {
                $str .= $keyspace[random_int(0, $max)];
            }
            $password = $str;
        }

        $user = new User();
        $user->name =$request->name;
        $user->username =$request->username;
        $user->status =$request->status;
        $user->email =$request->email;
        $user->address =$request->address;
        $user->phone =$request->phone;
        $user->note =$request->note;
        $user->path =$request->path;
        $user->password = Hash::make($password);







        if ($user->save()){
            return redirect()->route('users.show', $user->id);
        }else {
            return redirect()->route('users.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = Role::all();
        $user = User::where('id', $id)->with('roles')->first();
        return view("manage.users.show")->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::where('id', $id)->with('roles')->first();
        return view("manage.users.edit")->withUser($user)->withRoles($roles);
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

        $input = $request->all();


        if ($request->has('password') && !empty ($request->password)){


            $password = trim($request->password);

        }else {
            #set manual password
            $length = 10;
            $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i = 0; $i < $length; ++$i) {
                $str .= $keyspace[random_int(0, $max)];
            }
            $password = $str;
        }

        $user = User::findOrFail($id);
        $user->name =$request->name;
        $user->username =$request->username;
        $user->status =$request->status;
        $user->email =$request->email;
        $user->address =$request->address;
        $user->phone =$request->phone;
        $user->note =$request->note;
        $user->path =$request->path;

        $user->update();
        $user->syncRoles(explode(',', $request->roles));
        return redirect()->route('users.show', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword($id)
    {

        $user = User::all();
        return view("manage.users.changePassword")->withUser($user);
    }

    public function destroy($id)
    {
        //
    }
}
