<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherClassController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\classController;
use App\Http\Controllers\ClassController as ControllersClassController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\ClassTimeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
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

    Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/add', [AdminController::class, 'adminAdd']);
    Route::get('admin/admin/list', [AdminController::class, 'List']);
    Route::post('admin/add', [AdminController::class, 'adminInsert']);
    Route::get('admin/edit/{id}', [AdminController::class, 'adminEdit']);
    Route::post('admin/edit/{id}', [AdminController::class, 'updateAdmin']);
    Route::get('admin/delete/{id}', [AdminController::class, 'deleteAdmin']);

    //student

    Route::get('student/add', [StudentController::class, 'Add']);
    Route::get('admin/student/list', [StudentController::class, 'List']);
    Route::post('student/add', [StudentController::class, 'Insert']);
    Route::get('student/edit/{id}', [StudentController::class, 'Edit']);
    Route::post('student/edit/{id}', [StudentController::class, 'Update']);
    Route::get('student/delete/{id}', [StudentController::class, 'Delete']);
   
   //parent
   Route::get('admin/parent/add', [ParentController::class, 'Add']);
   Route::get('admin/parent/list', [ParentController::class, 'List']);
   Route::post('admin/parent/add', [ParentController::class, 'Insert']);
   Route::get('admin/parent/edit/{id}', [ParentController::class, 'Edit']);
   Route::post('admin/parent/edit/{id}', [ParentController::class, 'Update']);
   Route::get('admin/parent/delete/{id}', [ParentController::class, 'Delete']);
   Route::get('admin/parent/mystudent/{id}', [ParentController::class, 'MyStudent']);
   Route::get('admin/parent/assign_student/{student_id}/{parent_id}', [ParentController::class, 'AssignStudentParent']);
   Route::get('admin/parent/assign_student_delete/{student_id}', [ParentController::class, 'assignMyStudentDelete']);
  

   //Teacher
   Route::get('admin/teacher/add', [TeacherController::class, 'Add']);
   Route::get('admin/teacher/list', [TeacherController::class, 'List']);
   Route::post('admin/teacher/add', [TeacherController::class, 'Insert']);
   Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'Edit']);
   Route::post('admin/teacher/edit/{id}', [TeacherController::class, 'Update']);
   Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'Delete']);
   

   //account
   Route::get('admin/admin/account', [UserController::class, 'Account']);
   Route::post('admin/admin/account', [UserController::class, 'EditAdminAccount']);

    //class
    Route::get('Class/list', [ClassController::class, 'List']);
    Route::get('admin/Class/add', [ClassController::class, 'addClass']);
    Route::post('admin/Class/add', [ClassController::class, 'classInsert']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'editClass']);
    Route::post('admin/class/edit/{id}', [ClassController::class, 'updateClass']);
    Route::get('admin/class/delete/{id}', [ClassController::class, 'deleteClass']);

    //Subjects
    Route::get('subject/list', [SubjectController::class, 'List']);
    Route::get('admin/subject/add', [SubjectController::class, 'addSubject']);
    Route::post('admin/subject/add', [SubjectController::class, 'insertSubject']);
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'editSubject']);
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'updateSubject']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'deleteSubject']);

    //Assign Subject

    Route::get('assign/list', [ClassSubjectController::class, 'List']);
    Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'add']);
    Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'insert']);
    Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit']);
    Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'update']);
    Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'deleteSubClass']);
    Route::get('admin/assign_subject/single-edit/{id}', [ClassSubjectController::class, 'singleEdit']);
    Route::post('admin/assign_subject/single-edit/{id}', [ClassSubjectController::class, 'singleUpdate']);
   
    //Assign Teacher Class

    Route::get('admin/assign_teacher_class/list', [TeacherClassController::class, 'list']);
    Route::get('admin/assign_teacher_class/add', [TeacherClassController::class, 'add']);
    Route::post('admin/assign_teacher_class/add', [TeacherClassController::class, 'insert']);
    Route::get('admin/assign_teacher_class/edit/{id}', [TeacherClassController::class, 'edit']);
    Route::post('admin/assign_teacher_class/edit/{id}', [TeacherClassController::class, 'update']);
    Route::get('admin/assign_teacher_class/delete/{id}', [TeacherClassController::class, 'delete']);
 
//ClassTime
Route::get('admin/ClassTime/list', [ClassTimeController::class, 'list']);



    //change password
    Route::get('profile/change-password', [UserController::class, 'ChangePassword']);
    Route::post('profile/change-password', [UserController::class, 'UpdatePassword']);
});

Route::group(['middleware' => 'teacher'], function () {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);
   //change password
   Route::get('profile/change-password', [UserController::class, 'ChangePassword']);
   Route::post('profile/change-password', [UserController::class, 'UpdatePassword']);
  //account
   Route::get('teacher/account', [UserController::class, 'Account']);
   Route::post('teacher/account', [UserController::class, 'editAccount']);

 
});

Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

    //change password
    Route::get('profile/change-password', [UserController::class, 'ChangePassword']);
    Route::post('profile/change-password', [UserController::class, 'UpdatePassword']);
   //account
    Route::get('student/account', [UserController::class, 'Account']);
    Route::post('student/account', [UserController::class, 'EditStudentAccount']);
    Route::get('student/mySubject', [StudentController::class, 'mySubject']);
    
});

Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);

    //change password
    Route::get('profile/change-password', [UserController::class, 'ChangePassword']);
    Route::post('profile/change-password', [UserController::class, 'UpdatePassword']);
   //account
    Route::get('parent/account', [UserController::class, 'Account']);
    Route::post('parent/account', [UserController::class, 'EditParentAccount']);
    Route::get('parent/mystudent', [ParentController::class, 'getMyStudent']);
    Route::get('parent/mystudentSubject/{student_id}', [SubjectController::class, 'mystudentSubject']);
    
   
});
