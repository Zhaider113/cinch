<?php

use Illuminate\Support\Facades\Route;
use App\Events\AssignTask;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('event', function(){
    event(new AssignTask());
});

Auth::routes();
Route::get('admin-logout', function(){
	\Auth::logout();

	return redirect()->route('login');
})->name('admin-logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('register-user', App\Http\Controllers\UserRegistrationController::class);
Route::group([ 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'CheckUserRole']], function() {
    Route::get('/', [App\Http\Controllers\Admin\AdminNavigationController::class, 'dashboard'])->name('dashboard');	
});

Route::prefix('dev')->group(function(){
	Route::get('controller', function(){
		try{
			\Artisan::call('make:controller Admin/MessagesController -r');
			echo "Controller Created Successfully !";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});
