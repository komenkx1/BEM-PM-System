<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Events;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::get();
        $posts = Post::get();
        $users = User::get();
        return view('admin/dashboard', compact('events','posts','users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $events = $request->all();
        Events::create($events);
        return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Events $event)
    {

        if ($request->has('delete')) {
            $event->delete();
        } else {
            $events = $request->all();
            $event->update($events);
        }
        return redirect()->back();
    }

    public function profile(Request $request, User $user)
    {

        // $users = $request->all();
        $user->username = $request->username;

        if ($request->password) {
            if (Hash::check($request->password, $user->password)) {
                $user->password = Hash::make($request->new_password);
            } else {
                return redirect()->back()->with('danger', 'Password Lama Salah');
            }
        }
        // dd($request->new_password);
        $user->update();
        return redirect()->back()->with('success', 'profile telah diupdate');
    }


    public function updateEventDate(Request $request)
    {
        $event  = $request->Event[0];
        Events::where('id', $event)
            ->update([
                'start' => $request->Event[1],
                'end' => $request->Event[2],
            ]);
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
