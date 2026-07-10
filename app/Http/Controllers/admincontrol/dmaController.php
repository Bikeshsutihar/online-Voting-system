<?php

namespace App\Http\Controllers\admincontrol;

use App\Http\Controllers\Controller;
use App\Models\dmaContent;
use Illuminate\Http\Request;

class dmaController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $request->validate([
        'photo'=>'image|mimes:png,jpg,svg,jpeg|max:2048'
    ]);

        $dmaPage = new dmaContent();
        $dmaPage->title = $request->title;
        $dmaPage->slug = $request->slug;
        $dmaPage->short_description = $request->short_description;
        $dmaPage->description = $request->description;
        $dmaPage->meta_title= $request->meta_title;
        $dmaPage->meta_description= $request -> meta_description;
        if($request->hasFile('photo')){
            $file= $request->file("photo");
            $fileName= time().".".$file->getClientOriginalExtension();
            $file->move(public_path("images"), $fileName);
            $dmaPage->photo="images/".$fileName;
        }
        $dmaPage->save();
        return redirect()->back();


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
         $getIt= dmaContent::find($id);
        return view('admin.adminEdit', compact("getIt"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {



    $request->validate([
        'photo'=>'image|mimes:png,jpg,svg,jpeg|max:2048'
    ]);

        $updateContent                          = dmaContent::find($id);
        $updateContent->title                   = $request->title;
        $updateContent->slug                    = $request->slug;
        $updateContent->short_description       = $request->short_description;
        $updateContent->description             = $request->description;
        $updateContent->meta_title              = $request->meta_title;
        $updateContent->meta_description        = $request -> meta_description;

        if($request->hasFile('photo')){
            $file= $request->file("photo");
            $fileName= time().".".$file->getClientOriginalExtension();
            $file->move(public_path("images"), $fileName);
            $updateContent->photo="images/".$fileName;
        }

        $updateContent->save();
        return redirect()->route("dashboard");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
