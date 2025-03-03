<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::get('dashboard', function(){
    return view('dashboard',[
        "users" => App\Models\User::where('id', '!=', auth()->id())->get()
    ]);
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
->name('profile');

Route::get('/home', function(){
return App\Models\User::all();
});

Route::get('/chat/{user}', App\Livewire\Chat::class)->name('chat');
require __DIR__.'/auth.php';
