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

Route::group(['middleware'=>['auth']], function(){
   
   Route::get('/', [
       'as'=>'home',
       'uses'=>'HomeController@index'
       ]);
  
   Route::resource('issues', 'IssueController'); 
  

    Route::post('issues/comments/add', [
        'as'=>'issues.comment.create',
        'uses'=>'IssueController@addComment'
        
    ]);
    Route::post('issues/comments/update', [
        'as'=>'issues.comment.update',
        'uses'=>'IssueController@updateComment'
        
    ]); 
    Route::post('issues/comments/destroy', [
        'as'=>'issues.comment.destroy',
        'uses'=>'IssueController@destroyComment'        
    ]); 
});

Route::auth();


