<?php
use App\Http\Controllers\additional;
use App\Http\Controllers\adminController;
use App\Http\Controllers\archiveController;
use App\Http\Controllers\facultyController;
use App\Http\Controllers\studentCC;
use App\Http\Controllers\extraCtrl;


use App\Http\Controllers\studentController;
use App\Http\Controllers\userCCcontroller;
use Illuminate\Support\Facades\Route;



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

Route::redirect('/', '/usercc')->name('root');
Route::view('Aboutus', 'aboutUs')->name('AU')->middleware('forQuery');

Route::resource('/usercc', userCCcontroller::class)->names([
    'index' => 'userCC.index',
    'create' => 'userCC.create',
    'store' => 'userCC.store',
])->middleware('forQuery');


Route::get('/generate-pdf/{id}', [extraCtrl::class,'generatePDF'])->name('genPDF');



Route::group(['prefix' => 'student', 'as' => 'studentt.', 'middleware' => 'forStudent'], function () {
    Route::get('/', [studentController::class, 'index'])->name('index');
    Route::get('/my-archive', [studentController::class, 'myArchive'])->name('myArchive');
    Route::get('/checker', [studentController::class, 'Checker'])->name('Checker');
});




Route::group(['prefix' => 'faculty', 'as' => 'faculty.', 'middleware' => 'forFaculty'], function () {
    Route::get('/', [facultyController::class, 'index'])->name('index');
    Route::get('/facArchive', [facultyController::class, 'myArchive'])->name('myArchive');
    Route::get('/facChecker', [facultyController::class, 'Checker'])->name('Checker');
    Route::get('/facStudTB', [facultyController::class, 'student'])->name('student');
});



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'forAdmin'], function () {

    // Admin Tables
    Route::get('/', [adminController::class, 'index'])->name('index');
    Route::get('/checkeryarn', [adminController::class, 'checker'])->name('checker');
    Route::get('/archivesTable', [adminController::class, 'archives'])->name('archives');
    Route::get('/studentTable', [adminController::class, 'student'])->name('student');
    Route::get('/facultyTable', [adminController::class, 'faculty'])->name('faculty');
    Route::get('/adminTable', [adminController::class, 'admin'])->name('admin');
    // Admin Tables

    // Admin User Crud
    Route::put('/{id}/updateUser', [adminController::class, 'userUpdate'])->name('update'); //user update
    Route::get('/{id}/edit', [adminController::class, 'userEdit'])->name('edit'); //user edit view
    Route::get('/{user}/addUser', [adminController::class, 'addUser'])->name('addUser'); //user add view
    Route::post('/{userac}/storeUser', [adminController::class, 'storeUser'])->name('storeUser'); //user add function
    // Admin User Crud

    // Admin Archive Crud
    Route::get('/addArch', [adminController::class, 'addArch'])->name('addArch');
    Route::post('/storeArch', [adminController::class, 'storeArch'])->name('storeArch');
    Route::put('/{id}', [adminController::class, 'archUpdate'])->name('updateArch'); //user edit store
    Route::get('/{id}/editArch', [adminController::class, 'archEdit'])->name('editArch'); //user edit view
    Route::post('/find-similar-words', [adminController::class, 'findSimilarWords'])->name('words');
    Route::delete('/{id}', [adminController::class, 'delArch'])->name('delArch'); //archive delete

    // Admin Archive Crud

    //views

Route::get('/show/{id}', [adminController::class, 'view'])->name('view');

    //views end

});

Route::get('/logout', function () {
    Session::forget('fullNs');
    Session::forget('accT');
    return redirect()->route('userCC.index');
})->name('logout');
