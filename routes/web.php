<?php

// Route::get('posts','PostController@index')->name('post.index');
// Route::get('/search','SearchController@search')->name('search');
Route::get('/', 'HomeController@index')->name('home');

Route::get('job/{id}', 'PostController@details')->name('post.details');

Route::get('/jobs/category/{slug}','PostController@postByCategory')->name('category.posts');
Route::get('/jobs/tag/{slug}','PostController@postByTag')->name('tag.posts');
Route::get('/jobs/employment/{slug}','PostController@postByEmployment')->name('employment.posts');

Route::get('/jobs/company/profile/{id}','AuthorController@profile')->name('employer.company');



Route::get('/job-search', 'HomeController@jobsearch')->name('jobsearch');

Route::get('/company-search', 'HomeController@companysearch')->name('companysearch');

Route::post('subscriber','SubscriberController@store')->name('subscriber.store');

Route::get('/verification/{token}', 'Auth\RegisterController@verification');


Auth::routes();

// Route::group(['middleware'=>['auth']], function (){
//    Route::post('favorite/{post}/add','FavoriteController@add')->name('post.favorite');
//    Route::post('comment/{post}','CommentController@store')->name('comment.store');
// });


Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('settings','SettingsController@index')->name('settings');
    Route::get('company-profile','SettingsController@profile')->name('profile');
    Route::post('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');

    Route::resource('tag','TagController');
    Route::resource('category','CategoryController');
    Route::resource('post','PostController');

    Route::resource('employment','EmploymentController');

    Route::get('/pending/post','PostController@pending')->name('post.pending');
    Route::put('/post/{id}/approve','PostController@approval')->name('post.approve');

    Route::get('/favorite','FavoriteController@index')->name('favorite.index');

    Route::get('employers','EmployerController@index')->name('employer.index');
    Route::delete('employers/{id}','EmployerController@destroy')->name('employer.destroy');

    Route::get('/subscriber','SubscriberController@index')->name('subscriber.index');
    Route::delete('/subscriber/{subscriber}','SubscriberController@destroy')->name('subscriber.destroy');


});

Route::group(['as'=>'employer.','prefix'=>'employer','namespace'=>'Employer','middleware'=>['auth','author']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('company-profile','SettingsController@profile')->name('profile');
    Route::get('settings','SettingsController@index')->name('settings');
    Route::post('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');

    Route::resource('post','PostController');
});

// View::composer('layouts.frontend.partial.footer',function ($view) {
//     $categories = App\Category::all();
//     $view->with('categories',$categories);
// });
