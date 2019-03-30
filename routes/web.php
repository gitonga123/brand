<?php

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

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Route::get(
    '/test',
    function () {
        return view('carousel');
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/auth/{provider}/callback', 'SocialController@callback');

Route::resource('questions', 'QuestionController');
Route::resource('answers', 'AnswerController');
Route::resource('hints', 'HintController');
Route::resource('question/answer', 'QuestionAnswerController');
Route::post(
    'results/submit',
    'ResultsController@checkQuestionAnswer'
)->name('result.submit');

Route::post(
    'results/get',
    'ResultsController@getResult'
)->name('result.get');

Route::resource('levels', 'LevelController');

Route::get('composer/{level}', 'QuizController@entry');

Route::post('user/setting/{id}', 'UserSettingController@store')
    ->name('user.settings');

Route::get('user/setting/{level}/level/{user}', 'UserSettingController@updateLevel')
    ->name('user.settings.level');

Route::get(
    'user/setting/{country}/country/{user}',
    'UserSettingController@updateCountry'
)->name('user.settings.country');

Route::get(
    'user/setting/{countinent}/continent/{user}',
    'UserSettingController@updateContinent'
)->name('user.settings.continent');

Route::get('user/continents/list', 'ContinentController@index');
