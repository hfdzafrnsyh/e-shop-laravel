<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class UserController extends Controller
{
    //

    public function index(){
        $users = User::paginate(8);
        return view('user.index' , ['users' => $users]);
    }

    public function detail($user){
        $users = User::find($user);
        return view('user.detail' , ['users' => $users]);
    }

    // public function profile($user){
    //     $users = User::where('name', $user)->first();
    //     return view('user.profile' , ['users' => $users]);
    // }

    public function edit($user){
        $users = User::find($user);
        return view('user.edit' , ['users' => $users]);
    }
 
    public function updateUser(Request $request , $user){
        $request->validate([
            'name' => 'required',
            'username' => 'required'
        ]);


        $users = User::find($user);
        $users->update($request->all());

        if($request->hasFile('image')){
            $request->file('image')->move('wp-kashop/user/image/' , $request->file('image')->getClientOriginalName());
            $users->photo=$request->file('image')->getClientOriginalName();
            $users->save();
        }

        return redirect('/users')->with('success' , 'Update User Successfully');
    }


    public function userExport(){
        return Excel::download(new userExport , 'users.xlsx');
    }
}
