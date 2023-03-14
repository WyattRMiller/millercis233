<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->cannot('viewAny', User::class)) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission.');
        };
        $users = User::with('reviews')->paginate(10);
        return view('users.index', ['users' => $users]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('viewAny', User::class)) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission.');
        };
        $user = new User;
        return view('users.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($this->validatedData($request));

        return redirect()->route('users.index')->with('success', 'User was added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->user()->cannot('viewAny', User::class)) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission.');
        };
        $user = User::with('reviews')->findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->user()->cannot('viewAny', User::class)) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission.');
        };
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
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
        User::find($id)->update($this->validatedData($request));

        return redirect()->route('users.index')->with('success', 'User was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User was deleted successfully');
    }

    private function validatedData($request) {
        return $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
    }
}
