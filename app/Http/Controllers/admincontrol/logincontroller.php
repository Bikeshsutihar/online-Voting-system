<?php

namespace App\Http\Controllers\admincontrol;

use App\Http\Controllers\Controller;
use App\Models\adminRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Hash;

class logincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    // $email = $request->email;
    // $password =  $request->password;

    // if(Auth::attempt(['email'=>$email,'password'=>$password])){
    //     $user = Auth::($email);
    //     if($user){
    //         return redirect()->route('/cPannel');
    //     }else{
    //         return redirect()->route('/admin');
    //     }
    // }


    $admin = adminRegister::where('email', $request->email)->first();
    // $admin = adminRegister::where('password', $request->password)->first();




    if (!$admin) {
        return back()->with('error', 'Email not found');
    }

    if ($request->password != $admin->password) {
        return back()->with('error', 'Invalid password');
    }else{



    session([
        'admin_id' => $admin->id,
        'admin_name' => $admin->fullname,
        'admin_email' => $admin->email,
    ]);

    return redirect()->route('dashboard');
    }
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
