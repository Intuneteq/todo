<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // DB::insert('insert into users (name,email,password) values(?,?,?)', [
        //     'tobi', 'tobiolanitori@gmail.com', 'password'
        // ]);
        // DB::update('update users set name = ? where id = 1', ['Tobi Olanitori']);
        // $users = DB::select('select * from users');

        //create a user
        // $user = new User();
        // $user->name = 'Tobi Olanitori';
        // $user->email = "tobiolanitori@gmail.com";
        // $user->password = bcrypt("tobi");
        // $user -> save();

        //update user
        // User::where('id', 6)->update(['name' => 'Tobi Olanitori updated']);

        // $users = User::all(); //fetch all users
        // return $users;

        //Get user
        // User::where('id', 1)->delete();
        // return $user;


        // dd($user); //pretty display
        // return view('home');

        // using eloquent --------------------------------------------------------------
        //Define data
        // $newUser = [
        //     'name'=> 'Tosin Olanitori',
        //     'email'=> 'tosinolanitori@gmail.com',
        //     'password'=> bcrypt('password') 
        // ];

        // //creating document using eloquent
        // User::create($newUser);

        $users = User::all();
        return $users;

    }

    public function uploadAvatar(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            auth()->user()->update(['avatar' => $filename]);
        }
        return redirect()->back(); 
    }
}
