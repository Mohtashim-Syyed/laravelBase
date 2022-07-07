<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\role;
use App\view\components\AllRole;
use App\Models\role_menu;
use App\Models\menu;
class RoleRightsController extends Controller
{
    public function allRoles(){
      
        $result  =  role::where(
          'status', '=', '1'
          )->get();
          $html_=new AllRole($result);
          return $html_->render(); 

        // return view('components.assign-user-rights',['menus'=>menu::all(), 'f_name'=>$f_name, 'l_name'=>$l_name, 'id'=>$id , 'userRights'=>$userRights]);
     }


     public function showMenus($id,$role_name){
        // $result= menu::where('parent_id', '0')->orderBy('id', 'ASC')->get(); 
        // $result2= menu::where('parent_id', '0')->orderBy('id', 'ASC')->get(); 
        // $result->id;
        // $html_=new AssignUserRights($result);
        // return $html_->render();
          $roleRights  =  role_menu::where([
          ['role_id', '=', $id],
          ['status', '=', '1']
          ])->get();


        return view('components.assign-role-rights',
                     ['menus'=>menu::all(), 
                     'role_name'=>$role_name, 
                     'id'=>$id , 
                     'roleRights'=>$roleRights]);
     }


     public function assignRoleRiights(Request $request)
     {   
           $roleId             = $request->userId;
           $parentMenuId       = $request->ParentMenu;
           $parentMenuChildId  = $request->ParentMenuChild;
           $subMenuId          = $request->SubMenu;
           $subMenuChildId     = $request->SubMenuChild;
          
      
           role_menu::where('role_id', $roleId)->delete();
 
           if(!empty($parentMenuId))
           {
             foreach($parentMenuId as $parentMenuId) 
             {
               $menu=new role_menu;
               $menu->role_id=$roleId;
               $menu->menu_id=$parentMenuId;
               $menu->status="1";
               $menu->save();  
             }
           }
 
           if(!empty($parentMenuChildId))
           {
             foreach($parentMenuChildId as $parentMenuChildId) 
             {
               $menu=new role_menu;
               $menu->role_id=$roleId;
               $menu->menu_id=$parentMenuChildId;
               $menu->status="1";
               $menu->save();  
             }
           }
 
           if(!empty($subMenuId))
           {
               foreach($subMenuId as $subMenuId)
               {
                   $menu=new role_menu;
                   $menu->role_id=$roleId;
                   $menu->menu_id=$subMenuId;
                   $menu->status="1";
                   $menu->save();
               }
           }
 
           if(!empty($subMenuChildId))
           {
               foreach($subMenuChildId as $subMenuChildId)
               {
                   $menu=new role_menu;
                   $menu->role_id=$roleId;
                   $menu->menu_id=$subMenuChildId;
                   $menu->status="1";
                   $menu->save();
               }
           }
 
         return true;
     }

}
