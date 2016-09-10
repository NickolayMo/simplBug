<?php

Route::group(['prefix'=>'acl', 'namespace'=>'MySimpleAcl\Acl\Http\Controllers'], function(){
    Route::get('/', [
        'as'=>'acl.index',
        'uses'=>'AclController@index'
    ]);
});