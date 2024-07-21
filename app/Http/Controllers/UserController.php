<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //index
    public function index()
    {
        $users = User::paginate(5);
        return view('pages.users.index', compact('users'));
    }

    //create
    public function create()
    {
        return view('pages.users.create');
    }

    //store
    public function store(Request $request)
    {
        //validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //store the data
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //redirect
        return redirect()->route('pages.users.index');
    }

    //edit
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.users.edit', compact('user'));
    }

    //update
    public function update(Request $request, $id)
    {
        //validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //store the data
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //redirect
        return redirect()->route('pages.users.index');
    }

    //destroy
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('pages.users.index');
    }

    //search
    public function search(Request $request)
    {
        $search = $request->search;
        $users = User::where('name', 'like', "%$search%")->get();
        return view('pages.users.index', compact('users'));
    }
}
