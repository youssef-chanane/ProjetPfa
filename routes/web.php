<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('guest.home');
});

Route::prefix('guest')->name('guest.')->group(function () {
    Route::get('/home',function(){
        return view('guest.home');
    })->name('home');
    Route::get('/about',function(){
        return view('guest.about');
    })->name('about');
    Route::get('/contact',function(){
        return view('guest.contact');
    })->name('contact');
    Route::get('/faqs',function(){
        return view('guest.faqs');
    })->name('faqs');
    Route::get('/products',function(){
        return view('guest.products');
    })->name('products');

});

Route::prefix('influencers')->name('influencers.')->group(function(){
    Route::put('/updateProfile',[App\Http\Controllers\InfluencerController::class, 'updateProfile'])->name('updateProfile');
    // Route::put('/updatePassword',[App\Http\Controllers\InfluencerController::class, 'updatePassword'])->name('updatePassword');

    Route::get('dashbord',function(){
        return view('influencers.dashbord');
    })->name('dashbord');
    Route::get('products',function(){
        return view('influencers.product');
    }
    )->name('products');

    Route::prefix('profile')->name('profile.')->group(function(){
            Route::get('account',function(){
                return view('influencers.profile.account');
            })->name('account');
            Route::get('security',function(){
                return view('influencers.profile.security');
            })->name('security');
            Route::get('plans',function(){
                return view('influencers.profile.plans');
            })->name('plans');

        }
    );
});
/**
 *  entreprise route
 */
Route::prefix('entreprises')->name('entreprises.')->group(function(){
    Route::put('/updateProfile',[App\Http\Controllers\EntrepriseController::class, 'updateProfile'])->name('updateProfile');
    Route::get('dashbord',function(){
        return view('entreprises.dashboard');
    })->name('dashbord');
    Route::prefix('profile')->name('profile.')->group(function(){
        Route::get('account',function(){
            return view('entreprises.profile.account');
        })->name('account');
        Route::get('security',function(){
            return view('entreprises.profile.security');
        })->name('security');
        Route::resource('/products', App\Http\Controllers\ProductController::class);

        Route::get('applied_products',function(){
            return view('entreprises.profile.applied_products');
        })->name('applied_products');



        }
    );
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pricing',function(){
    return view('influencers.pack');
})->name('influencers.pack');
Route::put('/updatePassword',[App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');
Route::post('storePlan',[App\Http\Controllers\HomeController::class, 'storePlan'])->name('storePlan');
Route::put('updatePlan',[App\Http\Controllers\HomeController::class, 'updatePlan'])->name('updatePlan');
Route::post('storeCard',[App\Http\Controllers\HomeController::class, 'storeCard'])->name('storeCard');
// Route::put('updateCard',[App\Http\Controllers\HomeController::class, 'updateCard'])->name('updateCard');
Route::delete('deleteCard/{id}',[App\Http\Controllers\HomeController::class, 'deleteCard'])->name('deleteCard');
