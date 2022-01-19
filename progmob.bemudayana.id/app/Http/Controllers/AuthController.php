<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function register(Request $request){
    	$user = new User;
    	$user->username = $request->username;
    	$user->name = $request->name;
    	$user->password = Hash::make($request->password);
    	$user->phone = $request->phone;
    	$user->nim = $request->nim;
    	$user->gender = $request->gender;
    	$user->save();
    	return response()->json(['success' => true]);
    }

    public function login(Request $request){
    	$user = User::where('username', $request->username)->first();
        if($user == null){
            return response()->json(['success' => false]);
        }
    	if(Hash::check($request->password, $user->password)){
    		return response()->json(['success' => true, 'data' => $user]);
    	}else{
    		return response()->json(['success' => false]);
    	}
    }

    public function updateProfile(Request $request, $id){
        $user = User::find($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->nim = $request->nim;
        $user->gender = $request->gender;
        $user->save();

        return response()->json(['success' => true, 'data' => $user]);

    }
}
