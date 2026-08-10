<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ElectionController;
use App\Http\Controllers\Admin\VoterController;
use App\Http\Controllers\CandidateApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Voter\VoterAuthController;
use App\Http\Controllers\Voter\VotingBoothController;
use Illuminate\Support\Facades\Route;

// Public Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Student Candidate Application Portal
Route::get('/candidate/apply', [CandidateApplicationController::class, 'create'])->name('candidate.apply');
Route::post('/candidate/apply', [CandidateApplicationController::class, 'store'])->name('candidate.apply.store');

// Voter Authentication Routes
Route::prefix('voter')->name('voter.')->group(function () {
    Route::get('/login', [VoterAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [VoterAuthController::class, 'login']);
    Route::get('/register', [VoterAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [VoterAuthController::class, 'register']);
    Route::post('/logout', [VoterAuthController::class, 'logout'])->name('logout');

    // Voter Protected Portal
    Route::middleware('voter')->group(function () {
        Route::get('/dashboard', [VotingBoothController::class, 'dashboard'])->name('dashboard');
        Route::post('/vote', [VotingBoothController::class, 'castVote'])->name('vote.cast');
    });
});

// Admin Authentication & Dashboard Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Admin Protected Routes
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Candidate Resource Routes & Actions
        Route::patch('/candidates/{candidate}/approve', [CandidateController::class, 'approve'])->name('candidates.approve');
        Route::patch('/candidates/{candidate}/reject', [CandidateController::class, 'reject'])->name('candidates.reject');
        Route::resource('candidates', CandidateController::class);

        // Voter Resource Routes & Actions
        Route::patch('/voters/{voter}/verify', [VoterController::class, 'toggleVerify'])->name('voters.verify');
        Route::resource('voters', VoterController::class);

        // Election Resource Routes
        Route::resource('elections', ElectionController::class);
    });
});
