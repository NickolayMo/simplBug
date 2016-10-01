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

Route::group(['middleware'=>'auth'], function(){
    Route::get('/', function () {
        return view('welcome');
    });
   
   // Route::group(['middleware'=>'acl.role:aaaaaa'], function(){
        Route::resource('issues', 'Issues\IssueController'); 
    //});

    Route::put('issues/comment/add/{issueId}', [
        'as'=>'issues.comment.create',
        'uses'=>'Issues\IssueController@addComment'
        
    ]);   
    Route::resource('projects', 'ProjectsController');
    Route::resource('groups', 'ProjectsController');   
    Route::resource('comments', 'CommentController');   
    Route::resource('roles', 'Auth\RoleController');
    Route::resource('permissions', 'Auth\PermissionController');
    
    
});

Route::auth();

Route::get('/home', 'HomeController@index');
