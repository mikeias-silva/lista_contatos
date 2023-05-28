<?php

use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

Route::resource('contacts', ContactsController::class, ['names' => 'contacts']);

Route::get('contacts/delete/{contact}', [ContactsController::class, 'delete'])->name('contacts.delete');
