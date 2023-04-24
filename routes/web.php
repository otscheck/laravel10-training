<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

    // $user = DB::insert('insert into users (name, email, password) values (?,?,?)', [
    //     'julie',
    //     'julie@email.com',
    //     'password'
    // ]);

    // // $user = DB::update("update users set email='abc@email.com' where id=3");

    // // $user = DB::delete("delete from users where id=2");

    // // $users = DB::select("select * from users");

    // DB::table('users')->insert([
    //     'name'=>'roger',
    //     'email'=>'roger@email.com',
    //     'password'=>'password'
    // ]);

    // $user = User::create([
    //     'name'=>'justin',
    //     'email'=>'juste@email.com',
    //     'password'=>'passwordjuste'
    // ]);

    $user = User::find(14);

    // User::where('id',6)->update(['email'=>'hij@email.com']);

    // User::find(6)->delete();
    // $users = User::all();

    dd($user->name);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
