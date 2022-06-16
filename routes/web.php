<?php

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
    return view('welcome');
});

Auth::routes();

Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);
Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::get('/students', [App\Http\Controllers\StudentController::class, 'index']);
Route::get('/students/create', [App\Http\Controllers\StudentController::class, 'create']);
Route::post('/create', [App\Http\Controllers\StudentController::class, 'store']);
Route::get('/students/{student}/edit', [App\Http\Controllers\StudentController::class, 'edit']);
Route::patch('/update/{student}', [App\Http\Controllers\StudentController::class, 'update']);
Route::delete('/delete/{student}', [App\Http\Controllers\StudentController::class, 'destroy']);
Route::get('/search', [App\Http\Controllers\StudentController::class, 'search']);


Route::get('/course', [App\Http\Controllers\CourseController::class, 'index']);
Route::get('/course/create', [App\Http\Controllers\CourseController::class, 'create']);
Route::post('/course/create/store', [App\Http\Controllers\CourseController::class, 'store']);
Route::get('/course/{course_id}/edit', [App\Http\Controllers\CourseController::class, 'edit']);
Route::patch('/course/{course_id}/update', [App\Http\Controllers\CourseController::class, 'update']);
Route::delete('/course/{course_id}/delete', [App\Http\Controllers\CourseController::class, 'destroy']);

Route::get('/sections/{course_id}', [App\Http\Controllers\SectionController::class, 'index']);
Route::get('/sections/{course_id}/create', [App\Http\Controllers\SectionController::class, 'create']);
Route::post('/sections/create/store', [App\Http\Controllers\SectionController::class, 'store']);
Route::get('/sections/{section_id}/edit', [App\Http\Controllers\SectionController::class, 'edit']);
Route::patch('/sections/{section_id}/update', [App\Http\Controllers\SectionController::class, 'update']);
Route::delete('/sections/{section_id}/delete', [App\Http\Controllers\SectionController::class, 'destroy']);

Route::get('/student/{section_id}', [App\Http\Controllers\StudentsController::class, 'index']);
Route::get('/student/{course_id}/{section_id}/create', [App\Http\Controllers\StudentsController::class, 'create']);
Route::post('/student/create/store', [App\Http\Controllers\StudentsController::class, 'store']);

#Hotel Billing System
Route::get('/hotel', [App\Http\Controllers\HotelController::class, 'index']);

Route::get('/hotel/newguest', [App\Http\Controllers\HotelController::class, 'create_guest']);
Route::post('/hotel/newguest/store', [App\Http\Controllers\HotelController::class, 'store_guest']);
Route::get('/hotel/guestlist', [App\Http\Controllers\HotelController::class, 'guest_list']);

Route::get('/hotel/discount', [App\Http\Controllers\HotelController::class, 'create_discount']);
Route::post('/hotel/discount/store', [App\Http\Controllers\HotelController::class, 'store_discount']);

Route::get('/hotel/room', [App\Http\Controllers\HotelController::class, 'create_room']);
Route::post('/hotel/room/store', [App\Http\Controllers\HotelController::class, 'store_room']);

Route::get('/hotel/newcheckin', [App\Http\Controllers\HotelController::class, 'create_newcheckin']);
Route::post('/hotel/newcheckin/selected', [App\Http\Controllers\HotelController::class, 'checkin_check']);
Route::get('/hotel/newcheckin/{guest_id}', [App\Http\Controllers\HotelController::class, 'selected_checkin']);
Route::get('/hotel/newcheckin_room/{guest_id}', [App\Http\Controllers\HotelController::class, 'selected_checkin_room']);
Route::get('/hotel/newcheckin_discountType/{guest_id}', [App\Http\Controllers\HotelController::class, 'selected_checkin_discountType']);

//Recipe Ingredients Check List
Route::get('/Recipe', [App\Http\Controllers\RecipeController::class, 'index']);
Route::post('/Recipe/create_recipe', [App\Http\Controllers\RecipeController::class, 'create_recipe']);
Route::get('/Recipe/{recipe_id}/{recipe_name}/delete', [App\Http\Controllers\RecipeController::class, 'delete_recipe']);
Route::get('/Recipe/cook_now/{id}', [App\Http\Controllers\RecipeController::class, 'cook_recipe']);
Route::get('/Recipe/recipe/{ingredient_idss}', [App\Http\Controllers\RecipeController::class, 'check_ingredient']);

//Hotel Booking Management System
Route::get('/HotelBooking', [App\Http\Controllers\HotelBooking::class, 'index']);

Route::get('/HotelBooking/room_categories', [App\Http\Controllers\HotelBooking::class, 'room_categories']);
Route::post('/store_room_categories', [App\Http\Controllers\HotelBooking::class, 'store_room_categories']);
Route::get('/edit_room/{id}', [App\Http\Controllers\HotelBooking::class, 'edit_room_category']);
Route::post('/update_room_category', [App\Http\Controllers\HotelBooking::class, 'update_room_category']);
Route::get('/delete_room_category/{id}', [App\Http\Controllers\HotelBooking::class, 'delete_room_category']);

Route::get('/HotelBooking/rooms', [App\Http\Controllers\HotelBooking::class, 'rooms']);
Route::post('/store_room', [App\Http\Controllers\HotelBooking::class, 'store_room']);
Route::get('/edit_room_availability/{id}', [App\Http\Controllers\HotelBooking::class, 'edit_room_availability']);
Route::post('/update_room', [App\Http\Controllers\HotelBooking::class, 'update_room']);
Route::get('/delete_room/{id}', [App\Http\Controllers\HotelBooking::class, 'delete_room']);

Route::get('/HotelBooking/checkin', [App\Http\Controllers\HotelBooking::class, 'checkin']);
Route::post('/store_checkIn', [App\Http\Controllers\HotelBooking::class, 'store_checkIn']);
Route::get('/view_details/{id}', [App\Http\Controllers\HotelBooking::class, 'view_details']);
Route::get('/checkout/{id}', [App\Http\Controllers\HotelBooking::class, 'checkout']);
Route::post('/checkout/guest', [App\Http\Controllers\HotelBooking::class, 'checkout_guest']);

Route::get('/HotelBooking/home', [App\Http\Controllers\HotelBooking::class, 'home']);

Route::get('/HotelBooking/book', [App\Http\Controllers\HotelBooking::class, 'book']);
Route::get('/HotelBooking/book/room_category/{category}', [App\Http\Controllers\HotelBooking::class, 'book_category']);
Route::post('/store_book_request', [App\Http\Controllers\HotelBooking::class, 'store_book_request']);

Route::get('/HotelBooking/booked', [App\Http\Controllers\HotelBooking::class, 'booked']);
Route::get('/checkin_request/{id}', [App\Http\Controllers\HotelBooking::class, 'checkin_request']);
Route::post('/store_book', [App\Http\Controllers\HotelBooking::class, 'store_book']);

Route::get('/Jquery-Practice/AddList', [App\Http\Controllers\HotelBooking::class, 'jquery_add_list']);
Route::post('/Jquery-Practice/AddList/post', [App\Http\Controllers\HotelBooking::class, 'jquery_add_list_post']);

Route::get('/Bootstrap-Practice/ResposiveLayout', [App\Http\Controllers\HotelBooking::class, 'boostrap_practice']);

Route::get('/Admin_Dashboard', [App\Http\Controllers\HotelBooking::class, 'dashboard']);




