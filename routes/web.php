<?php
use App\Http\Controllers\additional;
use App\Http\Controllers\adminController;
use App\Http\Controllers\archiveController;
use App\Http\Controllers\facultyController;
use App\Http\Controllers\superAdmin;
use App\Http\Controllers\subAdmin;
use App\Http\Controllers\studentCC;
use App\Http\Controllers\extraCtrl;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
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

Route::get('/testmail', [extraCtrl::class,'mail'])->name('testMail');

Route::view('/genpdf','pdf/printing_accounts')->name('pdftest');
Route::redirect('/', '/usercc')->name('root');
Route::view('Aboutus', 'aboutUs')->name('AU')->middleware('forQuery');
Route::get('/get-suggestions',[extraCtrl::class,'getSuggestions'] )->name('get-suggestions');



Route::resource('/usercc', userCCcontroller::class)->names([
    'index' => 'userCC.index',
    'create' => 'userCC.create',
    'store' => 'userCC.store',
])->middleware('forQuery');


Route::get('/generate-pdf/{id}', [extraCtrl::class,'generatePDF'])->name('genPDF');



Route::group(['prefix' => 'student', 'as' => 'studentt.', 'middleware' => 'forStudent'], function () {
    Route::get('/', [studentController::class, 'index'])->name('index');

    Route::get('/my-archive', [studentController::class, 'myArchive'])->name('myArchive');
    Route::get('/addArch', [studentController::class, 'addArch'])->name('addArch');
    Route::post('/storeArch', [studentController::class, 'storeArch'])->name('storeArch');
    Route::put('/{ARCH_ID}', [studentController::class, 'archUpdate'])->name('updateArch'); //user edit store
    Route::get('/{ARCH_ID}/editArch', [studentController::class, 'archEdit'])->name('editArch');
    Route::delete('/{id}', [studentController::class, 'delArch'])->name('delArch');

    Route::get('/checker', [studentController::class, 'Checker'])->name('Checker');
    Route::post('/find-similar-words', [studentController::class, 'findSimilarWords'])->name('words');
});




Route::group(['prefix' => 'faculty', 'as' => 'faculty.', 'middleware' => 'forFaculty'], function () {
    Route::get('/', [facultyController::class, 'index'])->name('index');
    Route::get('/facArchive', [facultyController::class, 'myArchive'])->name('myArchive');
    Route::get('/facChecker', [facultyController::class, 'Checker'])->name('Checker');
    Route::get('/facStudTB', [facultyController::class, 'student'])->name('student');
    Route::post('/facArch', [facultyController::class, 'storeArch'])->name('storeArch');
    Route::post('/imprt-excel', [extraCtrl::class,'importExcelSTUDENTFac'])->name('import.excel');
    Route::put('/{ARCH_ID}', [facultyController::class, 'archUpdate'])->name('updateArch'); //user edit store
    Route::post('/find-similar', [facultyController::class, 'findSimilarWords'])->name('words');
    Route::post('/{user}/storeEmps', [facultyController::class, 'storeEmp'])->name('storeEmp'); //user add function
    Route::put('/{S_ID}/updateUser', [facultyController::class, 'userUpdate'])->name('update');
});



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'forAdmin'], function () {
//Excel imports
Route::post('/import-excel', [extraCtrl::class,'importExcelSTUDENT'])->name('import.excel');
//excel import end

    // Admin Tables
    Route::get('/', [adminController::class, 'index'])->name('index');
    Route::get('/checkeryarn', [adminController::class, 'checker'])->name('checker');
    Route::get('/archivesTable', [adminController::class, 'archives'])->name('archives');
    Route::get('/studentTable', [adminController::class, 'student'])->name('student');
    Route::get('/facultyTable', [adminController::class, 'faculty'])->name('faculty');
    Route::get('/adminTable', [adminController::class, 'admin'])->name('admin');
    // Admin Tables

    // Admin User Crud
    Route::put('/{S_ID}/updateUser', [adminController::class, 'userUpdate'])->name('update'); //user update
    Route::get('/{USER_ID_EMP}/edit', [adminController::class, 'userEdit'])->name('edit'); //user edit view
    Route::get('/{user}/addUser', [adminController::class, 'addUser'])->name('addUser'); //user add view
    Route::post('/{user}/storeEmp', [adminController::class, 'storeEmp'])->name('storeEmp'); //user add function
    // Admin User Crud

    // Admin Archive Crud
    Route::get('/addArch', [adminController::class, 'addArch'])->name('addArch');
    Route::post('/storeArch', [adminController::class, 'storeArch'])->name('storeArch');
    Route::put('/{ARCH_ID}', [adminController::class, 'archUpdate'])->name('updateArch'); //user edit store
    Route::get('/{ARCH_ID}/editArch', [adminController::class, 'archEdit'])->name('editArch'); //user edit view
    Route::post('/find-similar-words', [adminController::class, 'findSimilarWords'])->name('words');
    Route::delete('/{id}', [adminController::class, 'delArch'])->name('delArch'); //archive delete

 Route::put('/{AUTH_ID}', [adminController::class, 'addAuth'])->name('addAuth');
    // Admin Archive Crud





    Route::get('/audit', [adminController::class, 'audit'])->name('audit');

    //views

Route::get('/show/{id}', [adminController::class, 'view'])->name('view');
Route::post('/srch', [adminController::class, 'srch'])->name('srch');
    //views end
    Route::post('/test', [adminController::class, 'test'])->name('test');

});



Route::group(['prefix' => 'superAdmin', 'as' => 'superAdmin.', 'middleware' => 'forSuperAdmin'], function () {
    Route::get('/', [superAdmin::class, 'index'])->name('index');

    Route::get('/my-archive', [superAdmin::class, 'myArchive'])->name('myArchive');
    Route::get('/addArch', [superAdmin::class, 'addArch'])->name('addArch');
    Route::post('/storeArch', [superAdmin::class, 'storeArch'])->name('storeArch');
    Route::put('/{ARCH_ID}', [superAdmin::class, 'archUpdate'])->name('updateArch'); //user edit store
    Route::get('/{ARCH_ID}/editArch', [superAdmin::class, 'archEdit'])->name('editArch');
    Route::delete('/{id}', [superAdmin::class, 'delArch'])->name('delArch');

    Route::get('/checker', [superAdmin::class, 'Checker'])->name('Checker');
    Route::post('/find-similar-words', [superAdmin::class, 'findSimilarWords'])->name('words');
});




Route::group(['prefix' => 'subAdmin', 'as' => 'subAdmin.', 'middleware' => 'forSubAdmin'], function () {
    Route::get('/dashSubAdmin', [subAdmin::class, 'index'])->name('index');

    Route::get('/my-archive', [subAdmin::class, 'myArchive'])->name('myArchive');
    Route::get('/addArch', [subAdmin::class, 'addArch'])->name('addArch');
    Route::post('/storeArch', [subAdmin::class, 'storeArch'])->name('storeArch');
    Route::put('/{ARCH_ID}', [subAdmin::class, 'archUpdate'])->name('updateArch'); //user edit store
    Route::get('/{ARCH_ID}/editArch', [subAdmin::class, 'archEdit'])->name('editArch');
    Route::delete('/{id}', [subAdmin::class, 'delArch'])->name('delArch');

    Route::get('/checker', [subAdmin::class, 'Checker'])->name('Checker');
    Route::post('/find-similar-words', [subAdmin::class, 'findSimilarWords'])->name('words');
});








Route::get('/logout', function () {
    Session::forget('fullNs');
    Session::forget('accT');
    return redirect()->route('userCC.index');
})->name('logout');
