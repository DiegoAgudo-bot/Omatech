<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->isMethod('POST')) {
            $users = User::query();

            $request->session()->put('user_name', $request->name);
            $request->session()->put('user_email', $request->email);
            
            if($request->name) {
                $users = $users->where('name', 'like', '%' . $request->name . '%');
            }

            if($request->email) {
                $users = $users->where('email', 'like', '%' . $request->email . '%');
            }

            $users = $users->orderBy('id')->paginate(10);
        } else {
            $users = User::paginate(10);
        }

        return view('back.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.users.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if(!$request->password) {
            return redirect()->back()->with('error', 'Password field not set');
        }

        $user = User::create(array_merge($request->all(), ['password' => bcrypt($request->password)]));

        return redirect()->route('users::list')->with('message', 'created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(!$user->id) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return view('back.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        if(!$user) {
            abort(Response::HTTP_NOT_FOUND);
        }

        if(isset($request->password)) {
            $request['password'] = bcrypt($request->password);
        } else {
            unset($request['password']);
        }

        $user->update($request->all());

        return redirect()->route('users::list')->with('message', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users::list')->with('message', 'deleted');
    }
}
