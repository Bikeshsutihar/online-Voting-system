<?php

use App\Http\Controllers\admincontrol\admincontroller;
use App\Http\Controllers\admincontrol\dmaController;
use App\Http\Controllers\admincontrol\logincontroller;
use App\Http\Controllers\frontend\candidateController;
use App\Http\Controllers\frontend\frontend_login;
use App\Http\Controllers\frontend\regesterControl;
use App\Http\Controllers\vote_count;
use App\Models\candidateInfo;
use App\Models\dmaContent;
// use App\Http\Controllers\admincontrol\logincontroller;
use Illuminate\Support\Facades\Route;


// for users
Route::get('/', function () {
    $content = dmaContent::all();
    return view('frontendCode.home', compact("content"));

})->name("homePage");

route::get('/candidate', function(){
    $show = candidateInfo::all();
    // return $show;
    return view('frontendCode.candidate', compact('show'));
})->name('candidate');

route::get('/vote', function(){
    return view('frontendCode.vote');
})->name('vote');

route::get('/result', function(){
    return view('frontendCode.result');
} )->name('result');

route::get('/about', function(){
    return view('frontendCode.about');
})->name('about');



route::get('/flogin', function(){
    return view('frontendCode.flogin');
})->name('flogin');

route::get('/frontend-register', function(){
    return view('frontendCode.frontend_regester');
})->name('register');


route::get('/learn-more', function(){
    return view('frontendCode.learnMore');
})->name('learnMore');

route::get('/new-candidate', function(){
    return view('frontendCode.loginCandidate');
})->name('newCandidate');

route::get('/vote-now', function(){
    $votenow= candidateInfo::all();
    return view("frontendCode.voteNow", compact("votenow"));
})->name("voteNow");



// resource regester frontend


route::post('/frontend-register', [regesterControl::class,'store'])->name('fregister');
route::post('/f-login-store', [frontend_login::class,'store'])->name('frontLogin');
route::post("/candidate-store",[candidateController::class,"store"])->name("candidateStore");


Route::post('/vote/{candidateInfo}', [vote_count::class, 'store'])->name('vote.store');

// Route::post('/vote/{candidateInfo}', [vote_count::class, 'store'])->name('vote.store');
// Route::get('/logout', [frontend_login::class, 'logout'])->name('logout');





// for admin

route::prefix("/admin")->group(function(){
    Route::get('/admin', [logincontroller::class, 'index'])
    ->name('adminLogin');

Route::post('/admin/login', [logincontroller::class, 'store'])
    ->name('loginStore');

Route::get('/register', [admincontroller::class, 'create'])
    ->name('registerPage');

Route::post('/register/store', [admincontroller::class, 'store'])
    ->name('adminstore');

route::get("/candidate", function(){
    $candidateinfo = candidateInfo::all();
    // return $candidateinfo;
    return view("admin.candidateManage", compact("candidateinfo"));
})->name("candidateManage");



Route::get('/dashboard', function () {
    $updatec= dmaContent::all();
    return view('admin.dashboard', compact("updatec"));


})->name('dashboard');

route::get("/votersList", function(){
    return view("admin.Admin_voters");
})->name("voterslist");


route::post("/dmacontent",[dmaController::class,"store"])->name("dmastore");
route::get("/content-edit/{id}", [dmaController::class,"edit"])->name("dmaContentEdit");
route::patch("/content-update/{id}", [dmaController::class, "update"])->name("contentUpdate");

route::get("/candidate-table",function(){
return view("admin.admin_candidateTable");
})->name("cTable");

});

route::delete("/delete/{id}", [admincontroller::class, 'destroy'])->name('d');






// admin end
