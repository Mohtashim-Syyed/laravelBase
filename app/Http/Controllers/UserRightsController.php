<?php

namespace App\Http\Controllers;
use App\Models\menu;
use App\Models\user_menu;
use Illuminate\Http\Request;
use App\Models\User;
use App\view\components\AssignUserRights;

class UserRightsController extends Controller
{
    public function showMenus($id,$f_name,$l_name){
        // $result= menu::where('parent_id', '0')->orderBy('id', 'ASC')->get(); 
        // $result2= menu::where('parent_id', '0')->orderBy('id', 'ASC')->get(); 
        // $result->id;
        // $html_=new AssignUserRights($result);
        // return $html_->render();
        $userRights  =
        user_menu::where([
          ['user_id', '=', $id],
          ['status', '=', '1']
          ])->get();


        return view('components.assign-user-rights',
                      ['menus'=>menu::all(),
                      'f_name'=>$f_name, 
                      'l_name'=>$l_name,
                      'id'=>$id ,
                      'userRights'=>$userRights]);
     }

    public function assignRiights(Request $request)
    {   
          $userId             = $request->userId;
          $parentMenuId       = $request->ParentMenu;
          $parentMenuChildId  = $request->ParentMenuChild;
          $subMenuId          = $request->SubMenu;
          $subMenuChildId     = $request->SubMenuChild;
         
          user_menu::where('user_id', $userId)->delete();

          if(!empty($parentMenuId))
          {
            foreach($parentMenuId as $parentMenuId) 
            {
              $menu=new user_menu;
              $menu->user_id=$userId;
              $menu->menu_id=$parentMenuId;
              $menu->status="1";
              $menu->save();  
            }
          }

          if(!empty($parentMenuChildId))
          {
            foreach($parentMenuChildId as $parentMenuChildId) 
            {
              $menu=new user_menu;
              $menu->user_id=$userId;
              $menu->menu_id=$parentMenuChildId;
              $menu->status="1";
              $menu->save();  
            }
          }

          if(!empty($subMenuId))
          {
              foreach($subMenuId as $subMenuId)
              {
                  $menu=new user_menu;
                  $menu->user_id=$userId;
                  $menu->menu_id=$subMenuId;
                  $menu->status="1";
                  $menu->save();
              }
          }

          if(!empty($subMenuChildId))
          {
              foreach($subMenuChildId as $subMenuChildId)
              {
                  $menu=new user_menu;
                  $menu->user_id=$userId;
                  $menu->menu_id=$subMenuChildId;
                  $menu->status="1";
                  $menu->save();
              }
          }

        return true;
    }
}
