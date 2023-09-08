<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\InsertionsController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;




Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('categories/{category}', [PageController::class, 'categoryShow'])->name('categoryShow');


Route::middleware('auth')->group(function (){
    Route::get('insertions/create', [InsertionsController::class, 'create'])->name('insertions.create');
    Route::get('insertions/{insertion}/edit', [InsertionsController::class, 'edit'])->name('insertions.edit');
    Route::delete('insertions/{insertion}', [InsertionsController::class , 'destroy'])->name('insertions.destroy');
    Route::get('request/revisor',[RevisorController::class, 'becomeRevisor'])->name('become.revisor');
    Route::get('rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
    Route::get('insertions/{insertion}', [InsertionsController::class, 'show'])->name('insertions.show');

});
Route::get('insertions', [InsertionsController::class, 'index'])->name('insertions.index');
Route::get('/search/insertion', [InsertionsController::class, 'searchInsertions'])->name('insertions.search');

Route::get('/search/categories/insertions', [InsertionsController::class, 'update'])
->name('searchByCategories');



Route::middleware('isRevisor')->group(function(){
    Route::get('revisor/home', [RevisorController::class, 'index'])->name('revisor.index');
    Route::patch('accept/insertion/{insertion}', [RevisorController::class, 'acceptInsertion'])->name('revisor.accept_insertion');
    Route::patch('reject/insertion/{insertion}',[RevisorController::class, 'rejectInsertion'])->name('revisor.reject_insertion');
});

Route::post('language/{lang}', [PageController::class, 'setLanguage'])->name('set_language_locale');


Route::get('/auth/redirect', function () {
    return Laravel\Socialite\Facades\Socialite::driver('facebook')
    ->scopes(['read:user', 'public_repo'])
    ->redirect();
});
 

Route::get('/auth/callback', function () {
    $facebookUser = Laravel\Socialite\Facades\Socialite::driver('facebook')->user();
 
    $user = User::updateOrCreate([
        'facebook_id' => $facebookUser->id,
    ], [
        'name' => $facebookUser->name,
        'email' => $facebookUser->email,
        'facebook_token' => $facebookUser->token,
        'facebook_refresh_token' => $facebookUser->refreshToken,
    ]);
 
    Auth::login($user);
 
    return redirect('/');
});