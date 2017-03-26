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

Route::get("/", 'ProjectController@index');

Route::post('/projects', 'ProjectController@store');

Route::get('/projects', 'ProjectController@index');

    // $projects = [["name" => "Project Name", "url" => "www.someurl.com", "description" => "Chat App", "language" => "NodeJS"], ["name" => "Project Name2", "url" => "www.someurl.com", "description" => "Online Ordering", "language" => "Angular"]];
