<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

/*############# For LogIn with    multi auth###################*/
Route::get('/', 'HomeController@index')->name('selection');

Route::group(['namespace' => 'Auth'], function () {

    Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')->name('login.show');

    Route::post('/login','LoginController@login')->name('login');

    Route::get('/logout/{type}', 'LoginController@logout')->name('logout');


});

/*############# For LogIn User  without multi auth###################*/
// Auth::routes(['register'=>false]);

//Route::group(['middleware'=>['guest']], function(){
//
//    Route::get('/', function () {
//        return view('auth.selection');
//    });
//});


//============================== Translate all pages ============================
Route::group([
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
], function(){

    //================================= dashboard ======================================
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');


    //================================= Grades =========================================
	Route::group(['namespace'=>'Grades'],function(){
        Route::resource('Grade','GradeController');
    });

    //================================= Classrooms ===================================
    Route::group(['namespace' => 'Classrooms'], function () {
        Route::resource('Classrooms', 'ClassroomController');

        //To Multi Delete
        Route::post('Multi_Delete', 'ClassroomController@Multi_Delete')->name('Multi_Delete');

        //To filter classes
        Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');

    });

    //================================= Section =======================================
    Route::group(['namespace'=>'Sections'],function(){
        Route::resource('Sections','SectionController');
        Route::get('/classes/{id}', 'SectionController@getclasses');
    });


    //================================ Teachers ========================================
    Route::group(['namespace'=>'Teachers'],function(){
        Route::resource('Teachers','TeacherController');

    });


    //================================ Students ========================================
    Route::group(['namespace' => 'Students'], function () {
        Route::resource('Students', 'StudentController');
        Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
        Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
        Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
        Route::get('Download_attachment/{studentsEmail}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
        Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
        Route::post('Graduate_Student','StudentController@Graduate_Student')->name('Graduate_Student');
        //###################  Promotion Students ##########################
        Route::resource('Promotion', 'PromotionController');
        //###################  Graduated Students ##########################
        Route::resource('Graduated', 'GraduatedController');
        //###################  Fees Students ##########################
        Route::resource('Fees', 'FeesController');
        Route::resource('Fees_Invoices', 'FeesInvoicesController');
        //###################  Receipt Students ##########################
        Route::resource('receipt_students', 'ReceiptStudentsController');
        //###################  Processing Fees Students ##########################
        Route::resource('ProcessingFees', 'ProcessingFeesController');
        //###################  Payment Students ##########################
        Route::resource('Payment_students', 'PaymentController');
    });


    //============================== Parents =========================================
    Route::view('add_parent','livewire.AddParents_Form');


    //============================== Attendance =========================================
    Route::group(['namespace' => 'Attendances'],function (){
        Route::resource('Attendance', 'AttendanceController');

//        //To filter By date
//        Route::post('Filter_date', 'AttendanceController@Filter_date')->name('Filter_date');
//
    });


    //============================== Subject =========================================
    Route::group(['namespace' => 'Subjects'], function(){
       Route::resource('subjects','SubjectController');
    });


    //============================== Exam && Quizzes && Questions=========================================
    Route::group(['namespace' => 'Exam'], function(){
        Route::resource('Exams','ExamController');

        //###################  Quizzes ##########################
        Route::resource('Quizzes','QuizController');

        //###################  Questions ##########################
        Route::resource('questions','QuestionController');
    });


    //============================== Online Class =========================================
    Route::group(['namespace'=>'OnlineClass'], function (){
       Route::resource('online_classes','OnlineClassController');
    });

    //============================== Settings =========================================
    Route::group(['namespace'=>'Setting'], function (){
        Route::resource('settings','SettingController');
    });

});

