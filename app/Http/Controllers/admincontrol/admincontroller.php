<?php

namespace App\Http\Controllers\admincontrol;

use App\Http\Controllers\Controller;
use App\Models\adminRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.login");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.regester");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
        'fullname' => 'required',
        'phonenumber' => 'required',
        'email' => 'required|email|unique:admin_registers,email',
        'password' => 'required|min:8',
        'conform_password' => 'required|same:password',
    ]);

    $admin = new adminRegister();

    $admin->fullname = $request->fullname;
    $admin->phone_number = $request->phonenumber;
    $admin->email = $request->email;

    $admin->password = $request->password;
    $admin->conform_password = $request->conform_password;

    $admin->save();

    return redirect()
        ->route('adminLogin')
        ->with('success', 'Registration Successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
