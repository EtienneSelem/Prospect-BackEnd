<?php

namespace App\Http\Controllers;

class ApiController extends Controller
{
     public function getLogin(){
        return serviceApi();
     }
}
