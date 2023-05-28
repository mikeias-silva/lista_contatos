<?php

use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

    Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::middleware(['auth'])->group(function () {
    Route::resource('contacts', ContactsController::class, ['names' => 'contacts'])->except('index');
    Route::get('contacts/delete/{contact}', [ContactsController::class, 'delete'])->name('contacts.delete');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect()->route('home');
});
