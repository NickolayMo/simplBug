<?php
namespace MySimpleAcl\Acl\Http\Controllers;

use App\Http\Controllers\Controller;

class AclController extends Controller{
    public function index(){
        return response('This is Package');
    }
}