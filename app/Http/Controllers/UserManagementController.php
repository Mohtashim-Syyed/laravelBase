<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\view\components\home;
class UserManagementController extends Controller
{
    public function LoadHome(){
        $result= User::where('status', '1')->get();  
        $html_=new home($result);
        return $html_->render(); 
      }

}
