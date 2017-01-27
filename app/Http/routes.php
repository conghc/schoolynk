<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
/**
 * Route Admin group
 */
Route::group([  
    // 'domain' => 'admin.schoolynk-server-ptc-mickey.c9users.io',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    // 'middleware' => ['auth.admin']
], function () {
                
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    
    Route::get('/',[
        'as' => 'admin.index', 'uses' => 'AdminController@index'
    ]);
    
    Route::post('/login', [
        'as' => 'admin.login', 'uses' => 'AdminController@login'
    ]);
    
    Route::get('/logout', [
        'as' => 'admin.logout', 'uses' => 'AdminController@logout'
    ]);
    
    Route::group(['middleware' => 'auth.admin'], function()
    {
        Route::resource('university', 'UniversityController');
        Route::resource('scholarship', 'ScholarshipController');
        Route::resource('school', 'SchoolController');
        Route::resource('schoolynk', 'SchoolynkController');
        Route::resource('student', 'StudentController');
        Route::resource('language', 'LanguageController');
        Route::resource('ajax', 'AjaxController');

        Route::post('advance-search', 'ScholarshipController@advanceSearch');

        Route::post('add-sponsor', 'AjaxController@addSponsor');
        Route::post('upload-user-logo', 'AjaxController@uploadUserLogo');
        Route::post('update-sponsor-info', 'AjaxController@updateSponsorInfo');
        Route::post('info-sponsor', 'AjaxController@infoSponsor');
        Route::post('add-scholarship', 'AjaxController@addScholarship');
        Route::post('upload-images', 'AjaxController@uploadImages');
        Route::post('sort-images', 'AjaxController@sortImages');
        Route::post('add-fs-info', 'AjaxController@addFacultySchoolInfo');

        Route::post('school-structure', 'SchoolController@schoolStructure');
        Route::post('school-info-update', 'SchoolController@schoolInfoUpdate');
        Route::post('school-add-major', 'SchoolController@addMajor');
        Route::post('school-major-exist', 'SchoolController@getMajorExist');
        Route::post('other-text-exist', 'SchoolController@getOtherTextExist');
        Route::post('other-text-update', 'SchoolController@addOtherTextExist');
    });
    
});

// Route Home Page
Route::get('/', ['as' => 'index', 'uses' => 'SchoolController@index']);
Route::get('scholarship', ['as' => 'scholarship.index', 'uses' => 'ScholarshipController@index']);
Route::get('scholarship/detail/{id}', ['as' => 'scholarship.detail', 'uses' => 'ScholarshipController@detail']);
Route::post('scholarship/list-ajax', ['as' => 'scholarship.listAjax', 'uses' => 'ScholarshipController@listAjax']);

Route::post('/list-school', ['as' => 'school.listSchool', 'uses' => 'SchoolController@listSchool']);
Route::post('/list-majors', ['as' => 'school.listMajors', 'uses' => 'SchoolController@listMajors']);
Route::get('/school/detail/{id}', ['as' => 'school.detail', 'uses' => 'SchoolController@detail']);
Route::post('/school/faculty-school', ['as' => 'school.facultySchool', 'uses' => 'SchoolController@facultySchool']);
Route::post('/school/major-filter', ['as' => 'school.majorFilter', 'uses' => 'SchoolController@majorFilter']);
Route::post('/school/list-text', ['as' => 'school.listText', 'uses' => 'SchoolController@listText']);
/**
 * Route Student Group
 */
Route::group(['prefix' => 'student'], function () {
    // Active account
    Route::get('/activate/{token}', ['as' => 'student.activate', 'uses' => 'StudentController@activate']);
    // Register
    Route::get('/register', ['as' => 'student.register', 'uses' => 'StudentController@register']);
    // Register step 2
    Route::get('/register-2', ['as' => 'student.register-2', 'uses' => 'StudentController@register2']);
    // Register step 3
    Route::get('/register-3', ['as' => 'student.register-3', 'uses' => 'StudentController@register3']);
    // Update profile
    Route::post('/update-profile', ['as' => 'student.update-profile', 'uses' =>'StudentController@updateProfile']);
    // Update select schoolarship
    Route::get('/updateStatus', ['as' => 'student.update-status-schoolarship', 'uses' => 'UserSchoolarshipController@updateStatus']);
    // Save status select schoolarship
    Route::get('/saveStatus', ['as' => 'student.save-status-schoolarship', 'uses' => 'UserSchoolarshipController@save']);
    // Contact form
    Route::any('/contact', [ 'as' => 'student.contact', 'uses' => 'StudentController@contact']);
    // Recruiting function
    Route::any('/recruiting', [ 'as' => 'student.recruiting', 'uses' => 'StudentController@recruiting']);
    // Search university
    Route::get('/universitySearch', ['as' => 'universitySearch', 'uses' => 'StudentController@universitySearch']);
    // Send message to university
    Route::post('/sendMessage', ['as' => 'student.sendMessage', 'uses' => 'StudentController@sendMessage']);

    // Change email
    Route::get('/changeEmail', ['as' => 'student.changeEmail', 'uses' => 'StudentController@changeEmail']);
    // Change password
    Route::get('/changePassword', ['as' => 'student.changePassword', 'uses' => 'StudentController@changePassword']);
    // Update email
    Route::post('/updateEmail', ['as' => 'student.updateEmail', 'uses' => 'StudentController@updateEmail']);
    // Update password
    Route::post('/updatePassword', ['as' => 'student.updatePassword', 'uses' => 'StudentController@updatePassword']);
});

// Resource rest full student 
Route::resource('student', 'StudentController');

// Get image student
Route::get('getImg/images/students/{file}', 'HomeController@getStudentImage');

// Change language
Route::post('locale', 'LocalizationController@changeLanguage');

/**
 * Route University group
 */
Route::group(['prefix' => 'university'], function () {
    Route::get('/', ['as' => 'university.index', 'uses' => 'UniversityController@index']);
    Route::get('/mail', ['as' => 'university.mail', 'uses' => 'UniversityController@mail']);
    Route::get('/studentSearch', ['as' => 'studentSearch', 'uses' => 'UniversityController@studentSearch']);
    Route::post('/sendMessage', ['as' => 'university.sendMessage', 'uses' => 'UniversityController@sendMessage']);
});

/**
 * Route Login, Logout
 */
Route::get('/logout', 'HomeController@logout');
Route::any('/doLogin', [
    'as' => 'app.login', 'uses' => 'HomeController@login'
]);


/**
 * Route API
 */
Route::group(['namespace' => 'Api', 'prefix' => 'api'], function()
{
    // Ajax student add favorite university
    Route::post('student/addFavorite', ['as' => 'api.student.addFavorite', 'uses' => 'StudentController@addFavorite']);

    // Change schoolarship status
    Route::post('scholarship/changeStatus', ['as' => 'api.scholarship.changeStatus', 'uses' => 'ScholarshipController@changeStatus']);

    // Ajax student remove favorite university
    Route::post('student/removeFavorite', ['as' => 'api.student.removeFavorite', 'uses' => 'StudentController@removeFavorite']);

    // Ajax show student details
    Route::get('student/{id}', ['as' => 'api.student.show', 'uses' => 'StudentController@show']);

    // Ajax get list favorite
    Route::get('student/listFavorite/{id}', ['as' => 'api.student.listFavorite', 'uses' => 'StudentController@listFavorite']);

    // Ajax get list university add favorite student
    Route::get('student/listUniversityFavorite/{id}', ['as' => 'api.student.listUniversityFavorite', 'uses' => 'StudentController@listUniversityFavorite']);

    // Ajax get list university add favorite student
    Route::get('university/addFavorite', ['as' => 'api.university.addFavorite', 'uses' => 'UniversityController@addFavorite']);

    // University detail
    Route::get('university/{id}', ['as' => 'api.university.show', 'uses' => 'UniversityController@show']);
    
    // University detail
    Route::get('university/listFavorite/{id}', ['as' => 'api.university.listFavorite', 'uses' => 'UniversityController@listFavorite']);

    // Mark message readed
    Route::get('message/readMessage', ['as' => 'api.message.readMessage', 'uses' => 'MessageController@readMessage']);

    // Language
    Route::resource('language', 'LanguageController');
});

// APi get list conutry
Route::get('/list-country', function () {
    $countries = CountryState::getCountries();
    return response()->json($countries);
});

Route::auth();
Route::get('/home', 'HomeController@home');

//social link
Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/callback/{provider}', 'SocialAuthController@callback');
