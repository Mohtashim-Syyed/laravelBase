<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\menu;
use Auth;
use Illuminate\Support\Facades\DB;

class PortalController extends Controller
{
    public function main(Request $req)
        {
                // return view('master',['menus'=>menu::all()]);
                //for userrights
                $array=[];
                $array1=[];

                $data =
                DB::table("menus")
                ->join("user_menus", function($join){
                        $join->on("user_menus.menu_id", "=", "menus.id");
                })
                ->where("user_menus.user_id", "=", Auth::id())
                ->get();

                //getting the id of the parent of sub_menu child.
                foreach($data as $datas)
                {
                        //if the data returned by query doesnt have the id of the parent(sub_menu), then get the parent id of that child using another query
                        if( $datas->parent_id != 0 && $data->contains('menu_id', $datas->parent_id))
                        {              
                                 //    do nothing
                            
                        }
                        else
                        {  
                                if($datas->parent_id !=0)
                                {         
                                        $data1 =
                                        DB::table("menus")
                                        ->where("id", "=", $datas->parent_id)
                                        ->get();
                                        $array[]=$data1;
                                }

                        }
                }
              
                $unique = array_map("unserialize", array_unique(array_map("serialize", $array)));
                
                foreach($unique as $uniques)
                {
                        //if the data returned by query doesnt have the id of the parent(menu) of sub_menu, then get the parent id of that sub_menu using another query
                        if( $uniques[0]->parent_id != 0 && $unique[0]->contains('menu_id', $uniques[0]->parent_id))
                        {              
                                 //    do nothing
                               
                        }
                        else
                        {  
                                if($uniques[0]->parent_id !=0)
                                {         
                                        $data2 =
                                        DB::table("menus")
                                        ->where("id", "=", $uniques[0]->parent_id)
                                        ->get();
                                        $array1[]=$data2;
                                }

                        }
                }
                $unique1 = array_map("unserialize", array_unique(array_map("serialize", $array1)));
                
               //for role rights

                $rArray=[];
                $rArray1=[];

                $getRoleId =
                DB::table("users")
                ->where("id", "=", Auth::id())
                ->get('user_type');
                
                $roleId=$getRoleId[0]->user_type;
                
                $rData =
                DB::table("menus")
                ->join("role_menus", function($join){
                        $join->on("role_menus.menu_id", "=", "menus.id");
                })
                ->where("role_menus.role_id", "=", $roleId)
                ->get();

               //getting the id of the parent of sub_menu child.
                foreach($rData as $rDatas)
                {
                        //if the data returned by query doesnt have the id of the parent(sub_menu), then get the parent id of that child using another query
                        if( $rDatas->parent_id != 0 && $rData->contains('menu_id', $rDatas->parent_id))
                        {              
                                 //    do nothing
                                
                        }
                        else
                        {  
                                if($rDatas->parent_id !=0)
                                {         
                                        $rData1 =
                                        DB::table("menus")
                                        ->where("id", "=", $rDatas->parent_id)
                                        ->get();
                                        $rArray[]=$rData1;
                                }

                        }
                }
              
                $rUnique = array_map("unserialize", array_unique(array_map("serialize", $rArray)));
                
               //getting the id of the parent of sub_menu.
                foreach($rUnique as $rUniques)
                {
                           //if the data returned by query doesnt have the id of the parent(menu) of sub_menu, then get the parent id of that sub_menu using another query
                        if( $rUniques[0]->parent_id != 0 && $rUnique[0]->contains('menu_id', $rUniques[0]->parent_id))
                        {              
                                 //    do nothing
                        }
                        else
                        {  
                                if($rUniques[0]->parent_id !=0)
                                {         
                                        $rData2 =
                                        DB::table("menus")
                                        ->where("id", "=", $rUniques[0]->parent_id)
                                        ->get();
                                        $rArray1[]=$rData2;
                                }

                        }
                }
                $rUnique1 = array_map("unserialize", array_unique(array_map("serialize", $rArray1)));

                        // print_r($rUnique);
                        // print_r($rUnique);
                        // print_r($rUnique1);

                return view('master',['menus'=>$data, 'menus1'=>$unique , 'menus2'=>$unique1 ,'rMenus'=>$rData, 'rMenus1'=>$rUnique , 'rMenus2'=>$rUnique1 ]);
        }
}
