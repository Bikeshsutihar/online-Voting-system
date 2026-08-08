<?php

namespace App\Http\Controllers\frontend;
use SweetAlert2\Laravel\Swal;
use App\Http\Controllers\Controller;
use App\Models\fregistration;
use Illuminate\Http\Request;

class regesterControl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('frontendCode.frontend_regester');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'fullname' => 'required|string|max:255',
        'email' => 'required|email|unique:fregistrations,email',
        'phone_number' => 'required|digits:10|unique:fregistrations,phone_number',
        'gender' => 'required',
        'voter_id' => 'required|unique:fregistrations,voter_id',
        'citizenship_no' => 'required|unique:fregistrations,citizenship_no',
        'password' => 'required|min:8',
        'confirm_password' => 'required|same:password',
        ], [
            // 'email' => 'This email aready registered',
            'fullname'=> 'this field is required',
            'phone_number' => 'This phone number is already registered',
            'confirm_password' => 'Confirm password do not match'
]);


        $frontendRegister = new fregistration();

        $frontendRegister -> fullname           =             $request -> fullname;
        $frontendRegister -> email              =             $request -> email;
        $frontendRegister -> phone_number       =             $request -> phone_number;
        $frontendRegister -> gender             =             $request -> gender;
        $frontendRegister -> voter_id           =             $request -> voter_id;
        $frontendRegister -> citizenship_no     =             $request -> citizenship_no;
        $frontendRegister->password             =             $request -> password;
        $frontendRegister->confirm_password     =             $request -> confirm_password;
        $frontendRegister -> save();
       Swal::toastSuccess([
            'title' => 'success',
        ]);
       return redirect()->route('flogin');

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
