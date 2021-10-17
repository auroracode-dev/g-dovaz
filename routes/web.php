<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ViewController;
use App\Models\User;
use Illuminate\Http\Request;
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

/*Route::get('/', [ViewController::class, 'index']);
Route::get('/', [ViewController::class, 'shop']);
Route::get('/', [ViewController::class, 'post']);*/

Route::get('/', [ViewController::class, 'index'])->name('index');
Route::get('shop', [ViewController::class, 'shop'])->name('shop');
Route::get('post', [ViewController::class, 'post'])->name('post');
Route::get('content', [ViewController::class, 'content'])->name('content');
Route::get('gallery', [ViewController::class, 'gallery']) ->name('gallery');
Route::get('gallery/download/{gallery}',[GalleryController::class, 'download'])->name('gallery.download');
Route::get('see_more/{post}', [ViewController::class, 'see_more'])->name('see_more');
Route::get('gallery_see_more/{product}', [ViewController::class, 'gallery_see'])-> name('gallery_see');
Route::get('shop_see_more/{product}', [ViewController::class, 'shop_see'])->name('shop_see');
/*
Route::post('/register', function(Request $request) {
  $user = new User();
  $user->name = $request->name;
  $user->lastname = $request->lastname;
  $user->email = $request->email;
  $user->password = bcrypt($request->password);
  $user->rol = $request->rol;
  $user->save();
  return json_encode(["msg" => "usuario agregado"]);
}); */

// Token
Route::get('/token', function () {
    return csrf_token();
});
