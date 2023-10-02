<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\classController;
use App\Http\Controllers\ClassController as ControllersClassController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
 
 
Route::get('/', [AuthController::class, 'Login'])->name('login');
Route::post('/login', [AuthController::class, 'AuthLogin']);
Route::get('/logout', [AuthController::class, 'AuthLogOut']);
Route::get('/forgetPassword', [AuthController::class, 'AuthForgetPassword']);
Route::post('/forgetPassword', [AuthController::class, 'PostForgetPassword']);




Route::get('admin/admin/list', function () {
    return view('admin.admin.list');
});


//Middleware 

Route::group(['middleware'=>'admin'],function(){
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
    Route::get('admin/add',[AdminController::class,'adminAdd']);
    Route::get('admin/admin/list',[AdminController::class,'List']);
    Route::post('admin/add',[AdminController::class,'adminInsert']);
    Route::get('admin/edit/{id}',[AdminController::class,'adminEdit']);
    Route::post('admin/edit/{id}',[AdminController::class,'updateAdmin']);
    Route::get('admin/delete/{id}',[AdminController::class,'deleteAdmin']);
    
    //class 
    Route::get('Class/list',[ClassController::class,'List']);
    Route::get('admin/Class/add',[ClassController::class,'addClass']);
    Route::post('admin/Class/add',[ClassController::class,'classInsert']);
    Route::get('admin/class/edit/{id}',[ClassController::class,'editClass']);
    Route::post('admin/class/edit/{id}',[ClassController::class,'updateClass']);
    Route::get('admin/class/delete/{id}',[ClassController::class,'deleteClass']);


    //Subjects 
    Route::get('subject/list',[SubjectController::class,'List']);
    Route::get('admin/subject/add',[SubjectController::class,'addSubject']);
    Route::post('admin/subject/add',[SubjectController::class,'insertSubject']);
    Route::get('admin/subject/edit/{id}',[SubjectController::class,'editSubject']);
    Route::post('admin/subject/edit/{id}',[SubjectController::class,'updateSubject']);
    Route::get('admin/subject/delete/{id}',[SubjectController::class,'deleteSubject']);

    //Assign Subject

    Route::get('assign/list',[ClassSubjectController::class,'List']);
    Route::get('admin/assign_subject/add',[ClassSubjectController::class,'add']);
    Route::post('admin/assign_subject/add',[ClassSubjectController::class,'insert']);
    Route::get('admin/assign_subject/edit/{id}',[ClassSubjectController::class,'edit']);
    Route::post('admin/assign_subject/edit/{id}',[ClassSubjectController::class,'update']);
    Route::get('admin/assign_subject/delete/{id}',[ClassSubjectController::class,'deleteSubClass']);

});
 
Route::group(['middleware'=>'teacher'],function(){
    Route::get('teacher/dashboard',[DashboardController::class,'dashboard']);

}); 


Route::group(['middleware'=>'student'],function(){
    Route::get('student/dashboard',[DashboardController::class,'dashboard']);

});

Route::group(['middleware'=>'parent'],function(){
    
    Route::get('parent/dashboard',[DashboardController::class,'dashboard']);

 
});
