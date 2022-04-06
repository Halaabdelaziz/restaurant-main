<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FatooraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\Food_OrderController;

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ForgotPassController;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\ValidationException;



Route::post('/pay',[FatooraController::class,'store']);
Route::get('/pay',[FatooraController::class,'index']);
Route::get('/pay/{user_name}',[FatooraController::class,'show']);
Route::get('call_back',[FatooraController::class,'paymentCallBack']);
Route::get('error',function(){
    return "payment faild";
});

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// public routes
    Route::post('/register',[RegisteredUserController::class, "store"]);
    Route::post('/login',[AuthenticatedSessionController::class, "store"]);
    Route::post('/logout',[AuthenticatedSessionController::class, "destroy"])->middleware('auth:sanctum');
    Route::post('/forgot-password',[ForgotPassController::class, "forgot"]);
    Route::post('/reset-password',[ForgotPassController::class, "reset"]);


// Route::middleware(['auth:sanctum'])->group(function(){



 Route::get('/foods',[FoodController::class, "index"]);
 Route::post('/foods',[FoodController::class, "store"]);
 Route::get('/foods/{id}',[FoodController::class, "show"]);
 Route::post('/foods/{id}',[FoodController::class, "update"]);
 Route::delete('/foods/{id}',[FoodController::class, "destroy"]);


 Route::get('/categories',[CategoryController::class, "index"]);
 Route::post('/categories',[CategoryController::class, "store"]);
 Route::get('/categories/{id}',[CategoryController::class, "show"]);
 Route::post('/categories/{id}',[CategoryController::class, "update"]);
 Route::delete('/categories/{id}',[CategoryController::class, "destroy"]);

 Route::get('/users',[UserController::class, "index"]);
 Route::post('/users',[UserController::class, "store"]);
 Route::get('/users/{id}',[UserController::class, "show"]);
 Route::post('/users/{id}',[UserController::class, "update"]);
 Route::delete('/users/{id}',[UserController::class, "destroy"]);

 Route::get('/orders',[OrderController::class, "index"] );
 Route::post('/orders',[OrderController::class, "store"] );
 Route::get('/orders/{id}',[OrderController::class, "show"] );
 Route::post('/orders/{id}',[OrderController::class, "update"] );
 Route::delete('/orders/{id}',[OrderController::class, "destroy"] );
//  Route::get('/transactions',[FatooraController::class, "index"] );

//  Route::get('/transactions',[FatooraController::class, "store"] );
 Route::post('/transactions',[FatooraController::class, "store"] );

Route::get("/deliveries",[DeliveryController::class,'index']);
Route::post('/deliveries',[DeliveryController::class, "store"] );
Route::get("/deliveries/{id}",[DeliveryController::class,'show']);
Route::post('/deliveries/{id}',[DeliveryController::class, "update"] );
// Route::delete("/deliveries/{id}",[DeliveryController::class,'destroy']);



 Route::get('/food_order',[Food_OrderController::class, "index"] );
 Route::post('/food_order',[Food_OrderController::class, "store"] );
 Route::get('/food_order/{id}',[Food_OrderController::class, "show"] );
 Route::post('/food_order/{id}',[Food_OrderController::class, "update"] );
 Route::delete('/food_order/{id}',[Food_OrderController::class, "destroy"] );

 Route::get('/contacts',[ContactController::class, "index"] );
 Route::post('/contacts',[ContactController::class, "store"] );

 Route::get('/notifications',[NotificationController::class, "index"] );



//   });

