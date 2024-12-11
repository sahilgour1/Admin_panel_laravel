<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\companydetail;
use App\Http\Controllers\MyprofileController;
use App\Http\Controllers\UiController;
use App\Http\Controllers\MailController;





Route::get('send-mail', [MailController::class,'sendmail']);

Route::get('/', function () {
    return view('registerform');
});
Route::get('loginform', function () {
    return view('loginform');
})->name('loginform');

Route::post('/register_user', [UserController::class,'register_user']);
Route::post('/login', [UserController::class,'login']);
Route::get('/dashboard', [UserController::class,'dashboard']);

Route::get('registerform', function () {
    return view('registerform');
})->name('registerform');


// user blogs 
Route::post('insertblog', [BlogController::class,'insertblog']);
Route::get('bloglist', [UserController::class, 'bloglist'])->name('bloglist');



Route::get('educationlist', function () {
    return view('blogeducationlist');
})->name('educationlist');

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::match(['get', 'post'], '/blogeducationdatatabel', [BlogController::class, 'blogeducationlist'])->name('blogeducationlist');
Route::match(['get', 'post'], '/healthdatatable', [BlogController::class, 'healthlist'])->name('healthlist');
Route::get('healthlist', function () {
    return view('bloghealthlist');
})->name('healthlist');
Route::post('/userdatatable', [BlogController::class,'userdatatable']);
// end 

Route::get('/editblog/{id}', [UserController::class, 'editblog'])->name('editblog');
Route::post('/updateblog', [BlogController::class,'updateblog'])->name('updateblog');
Route::get('/deleteblog/{id}', [UserController::class, 'deleteblog'])->name('deleteblog');

Route::get('bloglist', function () {
    return view('bloglist');
})->name('bloglist');


// menu list start 
Route::get('menubar', function () {
    return view('menubar');
})->name('menubar');

Route::match(['get', 'post'], 'insertmenu', [MenuController::class, 'insertmenu'])->name('insertmenu');

Route::get('menulist', function () {
    return view('menulist');
})->name('menulist');

Route::post('/menudatatable', [MenuController::class,'menudatatable']);
Route::match(['get', 'post'], '/editmenu/{id}', [MenuController::class, 'editmenu'])->name('editmenu');

Route::get('/deletemenu/{id}', [MenuController::class, 'deletemenu'])->name('deletemenu');
Route::get('/addmenubar/{id}', [MenuController::class, 'addmenubar'])->name('addmenubar');
Route::match(['get', 'post'], 'updatemenu', [MenuController::class, 'updatemenu'])->name('updatemenu');
Route::post('updatejsondata', [MenuController::class,'updatejsondata'])->name("updatejsondata");

// menu list end 

// news section 
Route::get('newspost', function () {
    return view('newspost');
})->name('newspost');
Route::post('insertnews', [NewsController::class,'insertnews']);

Route::post('/newsdatatable', [NewsController::class,'newsdatatable']);
Route::get('/editnews/{id}', [NewsController::class, 'editnews'])->name('editnews');
Route::get('/deletenews/{id}', [NewsController::class, 'deletenews'])->name('deletenews');
Route::post('/updatenews', [NewsController::class,'updatenews'])->name('updatenews');
Route::get('newshealthlist', function () {
    return view('newshealthlist');
})->name('newshealthlist');
Route::get('newseducationlist', function () {
    return view('newseducationlist');
})->name('newseducationlist');

Route::get('newslist', function () {
    return view('newslist');
})->name('newslist');

Route::post('/healthnewsdatatable', [NewsController::class,'healthnewsdatatable']);
Route::post('/educationnewsdatatable', [NewsController::class,'educationnewsdatatable']);




// user section 
Route::get('userlist', function () {
    return view('userlist');
})->name('userlist');
Route::post('/companyuserdatatable', [UserController::class,'companyuserdatatable']);
Route::get('/editcompanyuser/{id}', [UserController::class, 'editcompanyuser'])->name('editcompanyuser');
Route::post('/update_user', [UserController::class,'update_user']);
Route::get('adduser', function () {
    return view('adduser');
})->name('adduser');
Route::post('/add_user', [UserController::class,'add_user']);



// page section 
Route::get('pagesection', function () {
    return view('pagesection');
})->name('pagesection');
Route::post('insertpages', [PageController::class,'insertpages']);
Route::get('pagelist', function () {
    return view('pagelist');
})->name('pagelist');

Route::post('/pagesdatatable', [PageController::class,'pagesdatatable']);
Route::match(['get', 'post'], '/editpages/{id}', [PageController::class, 'editpages'])->name('editpages');
Route::match(['get', 'post'], '/updatepages', [PageController::class, 'updatepages'])->name('updatepages');



// company profile 
Route::get('companyprofile', function () {
    return view('companyprofile');
})->name('companyprofile');
Route::match(['get', 'post'], 'insertcompanydetail', [companydetail::class, 'insertcompanydetail'])->name('insertcompanydetail');
Route::match(['get', 'post'], 'compayprofilelist', function () {
    return view('compayprofilelist');
})->name('compayprofilelist');
Route::post('/companydetaildatatable', [companydetail::class,'companydetaildatatable']);
Route::match(['get', 'post'], '/editcompanyaddress/{id}', [companydetail::class, 'editcompanyaddress'])->name('editcompanyaddress');
Route::get('/deletecompanyaddress/{id}', [companydetail::class, 'deletecompanyaddress'])->name('deletecompanyaddress');
Route::match(['get', 'post'], 'updatecompanydetail', [companydetail::class, 'updatecompanydetail'])->name('updatecompanydetail');
Route::post('useraddressdata', [companydetail::class,'useraddressdata']);
Route::post('/saveanothercompanyaddress', [companydetail::class,'saveanothercompanyaddress']);
Route::post('/deleteaddressdata', [companydetail::class,'deleteaddressdata']);
// end 

// my profile 
Route::match(['get', 'post'], 'myprofile', function () {
    return view('myprofile');
})->name('myprofile');

Route::match(['get', 'post'], 'myprofile', [MyprofileController::class, 'myprofile'])->name('myprofile');
Route::match(['get', 'post'], '/update_user', [MyprofileController::class, 'update_user'])->name('update_user');
Route::match(['get', 'post'], 'logout', [MyprofileController::class, 'logout'])->name('logout');


// ui 
Route::match(['get', 'post'], 'ui', [UiController::class, 'ui'])->name('ui');
Route::match(['get', 'post'], '/contactus', [UiController::class, 'contactus'])->name('contactus');




