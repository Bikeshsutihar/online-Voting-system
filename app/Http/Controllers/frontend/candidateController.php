<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\candidateInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class candidateController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         $request->validate([
        'fullname'=>'required|max:30',
        'email'=>'required|email|unique:candidate_infos',
        'phone'=>'required|digits:10|unique:candidate_infos,phone',
        'gender'=>'required|in:Male,Female,Other',
        'citizenship_no'=>'required|unique:candidate_infos,citizenship_no',
        'dob'=>'required',
        'position'=>'required',
        'address'=>'required',
        'photo'=>'required|image|mimes:jpg,jpeg,png,svg|max:2048',
        'party_logo'=>'required|image|mimes:jpg,jpeg,png,svg',
        'password'=>'required|min:8',
        'confirm_password'=>'required|same:password',


    ]);

        $candidateStore = new candidateInfo();
        $candidateStore->fullname       =   $request->fullname;
        $candidateStore->email          =   $request->email;
        $candidateStore->citizenship_no =   $request->citizenship_no;
        $candidateStore->dob            =   $request->dob;
        $candidateStore->gender         =   $request->gender;
        $candidateStore->party          =   $request->party;
        $candidateStore->position       =   $request->position;
        $candidateStore->address        =   $request->address;
        $candidateStore->manifesto      =   $request->manifesto;
        // $candidateStore->photo          =   $request->photo;
        // $candidateStore->party_logo     =   $request->party_logo;
        $candidateStore->password       =  Hash::make($request->password) ;
        $candidateStore->phone          =   $request->phone;


        if($request->hasFile('photo')){
            $file= $request->file('photo');
            $fileName= time().".".$file->getClientOriginalExtension();
            $file->move(public_path('images'),$fileName);
            $candidateStore->photo= 'images/'.$fileName;
        }

        if($request->hasFile("party_logo")){
            $fileLogo= $request->file("party_logo");
            $fileLogoName= time().".".$fileLogo->getClientOriginalExtension();
            $fileLogo->move(public_path("partyLogo"),$fileLogoName);
            $candidateStore->party_logo="partyLogo/".$fileLogoName;
        }

    try {
        $candidateStore->save();
        return redirect()->route("candidate");
    } catch (\Exception $e) {
         dd($e->getMessage());
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
        // return $request;



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
