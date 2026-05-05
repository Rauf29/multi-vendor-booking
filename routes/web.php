<?php

use App\Http\Controllers\Vendor\ProfileController as VendorProfileController;
use Illuminate\Support\Facades\Route;

Route::get( '/', function () {
    return view( 'welcome' );
} );

Route::middleware( ['auth', 'active.user', 'role:admin'] )->prefix( 'admin' )->name( 'admin.' )->group( function () {
    Route::get( '/dashboard', function () {
        return view( 'dashboards.admin' );
    } )->name( 'dashboard' );
} );

Route::middleware( ['auth', 'active.user', 'role:vendor'] )->prefix( 'vendor' )->name( 'vendor.' )->group( function () {
    Route::get( '/dashboard', function () {
        return view( 'dashboards.vendor' );
    } )->name( 'dashboard' );

    Route::get( '/profile', [VendorProfileController::class, 'edit'] )->name( 'profile.edit' );
    Route::patch( '/profile', [VendorProfileController::class, 'update'] )->name( 'profile.update' );
} );

Route::middleware( ['auth', 'active.user', 'role:customer'] )->prefix( 'customer' )->name( 'customer.' )->group( function () {
    Route::get( '/dashboard', function () {
        return view( 'dashboards.customer' );
    } )->name( 'dashboard' );
} );

require __DIR__ . '/auth.php';
