@php 
$menuChild = [];
$subMenuParent = [];
$roleRightsMenuId=[];


foreach ($roleRights as $roleRight)
{
$roleRightsMenuId[]=$roleRight->menu_id;

}

@endphp
<form method="POST" id="userRightsForm"  enctype="multipart/form-data">
<!-- @method('put') -->
		@csrf
        <input type="hidden"  name="userId" value="{{$id}}" />
<h2 style="font-weight:bold;">Role Name: <span style="font-weight:normal;"> {{$role_name}}</span></h2>
   <table id="dt-button" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <th>Menu Name</th>                   
                                    <th>Action</th>
                                </tr>
                            </thead>
    @foreach ($menus as $item)
 
        @if ($item->is_parent == 1 && $item->parent_id == 0 && $item->route == '0')
        
                <tr>
                    <td style="font-weight:bold; font-size:22px;">{{$item->title}}</td>
                    <td><input type="checkbox" class="{{$item->id}}" name="ParentMenu[]" id="ParentMenu" value="{{$item->id}}" onClick='toggle(this)' /></td>
                </tr> 

            @foreach ($menus as $sub_item)
                    @if ($sub_item->is_parent == 1 && $sub_item->parent_id == $item->id && $sub_item->route == '0')
                    @php
                        $subMenuParent[]=$sub_item->id;
                        @endphp 
                         <tr>   
                            <td style="font-weight:bold; font-size: 16px;">{{$sub_item->title}}</td>
                            <td><input type="checkbox" class="{{$item->id}}" name="SubMenu[]" id="{{$sub_item->id}}" value="{{$sub_item->id}}" onClick='toggle2(this)'  /></td>
                        </tr>
                    @foreach ($menus as $page)
                            @if($page->parent_id == $sub_item->id && $page->is_parent == 0  )                       
                                    <tbody>
                                        <tr>
                                            <td>{{$page->title}}</td>
                                            <!-- <input type="hidden" name="SubMenuChild[]"  value="{{$page->id}}" /> -->
                                            <td><input type="checkbox" class="{{$item->id}}" id="SubChild{{$sub_item->id}}" name="SubMenuChild[]" value="{{$page->id}}"  /></td>
                                        </tr>
                                    </tbody>
                            @endif
                    @endforeach
                    @endif
                
            @endforeach
            @foreach ($menus as $page2)
                    @if ($page2->parent_id == $item->id && $page2->route != '0' )               
                                    <tbody>
                                        <tr>
                                            <td>{{$page2->title}}</td>
                                            <td><input type="checkbox" id="{{$page2->id}}" class="{{$item->id}}" name="ParentMenuChild[]" value="{{$page2->id}}" /></td>
                                        </tr>
                                    </tbody>          
                    @endif
            @endforeach   
        @endif
    @endforeach
    </table>
<!-- <a onclick="LoadPage('/assignuserrights/{{$page->id}}')" class="btn btn-primary" style="color:white !important;">Sub-Menu Rights</a> -->


            <div class="form-group">
                <div class="col-md-12 col-sm-6 col-xs-12 col-md-offset-3 " style="text-align:">
                    <button type="submit" name="button1" id="submit" class="btn btn-primary" style="font-size:16px; margin-left:-12px;"
                        value="Assign Permission">Assign Rights</button>
                </div>
            </div>
            <!-- <input type="checkbox" class="abc" name="{{$item->title}}" /> -->
</form>



<script>
        function LoadPage(courl) {
            $.ajax({
                type: "GET",
                headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                url: courl,
                success: function(result) {
                    $("#js-page-content").html(result);
                }
            });
        }


//checking parents and their childs
function toggle(source) 
    {
        var aInputs = document.getElementsByTagName('input');
        for (var i=0;i<aInputs.length;i++) {
            if (aInputs[i] != source && aInputs[i].className == source.className) {
                console.log("Menu's Child Id:"+aInputs[i].value);
                aInputs[i].checked = source.checked;
            }
        }
    }

  //checking/unchecking sub-parents and sub-menus
    function toggle2(source) 
    {
        var app = @json($subMenuParent);
        for (let i = 0; i < app.length; i++) 
        {
                const elements1 = document.querySelectorAll(`[id^="SubChild${app[i]}"]`);
                var appendInSubMenuName= "#SubChild"+source.id;
                elements1.forEach(element => {
           
                var appendIdTagToSubChidId= "#"+element.id;
                console.log(appendIdTagToSubChidId);
                console.log(appendInSubMenuName);

                if(appendInSubMenuName==appendIdTagToSubChidId)
                {   
                    console.log("SubMenu's Child Id:"+element.value);
                    element.checked=source.checked;    
                    // if( element.checked)
                    // {
                    //     console.log(element.value);
                    //     element.checked=false;
                    //     source.checked=false;
                    // }
                    // else
                    // {
                    //     element.checked=true;
                    //     source.checked=true;
                    // }
                }
            });
        
        }
        
    }

//mark checked all the checkboxes whose rights are already assigned to the user
    $(document).ready( function () {
        var app = @json($roleRightsMenuId);
        var aInputs = document.getElementsByTagName('input');
        for (var i=0;i<aInputs.length;i++)
         {
 
            for (let j = 0; j < app.length; j++) 
            {
                if (aInputs[i].value == app[j])
                 {
                    console.log("User Right Id:"+aInputs[i].value);
                    aInputs[i].checked=true;
                 }

            }
         }
});
    </script>


<script>
//form data submission   
    $(document).ready(function(){
        $("#submit").click(function(){

            // AJAX Code To Submit Form.
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                url: "/assignRoleRightsSubmit",
                data: $('#userRightsForm').serialize(),
                cache: false,
                success: function(result){
                    if(result == true)
                    {
                     console.log("fine");
                     LoadPage('allroles');
                    }
                }
            });
            return false;
        });
    });
    
 

//  $(document).ready(function() {
//   $(".ParentMenu").change(function() {
//     var val = $(this).val();
//     var app = @json($menuChild);
//    console.log(val);
//     for (let i = 0; i < app.length; i++) {
        
//         if (this.checked && app[i]==val) {
        
//         $('.'+app[i]).each(function() {
//            console.log(app[i]);
//             this.checked=true;
//         });
//     } else {
//         $('.'+app[i]).each(function() {
//             this.checked=false;
//         });
//     }

// }

    
//   });
// });


// $(document).ready( function () {
    //     var app = @json($roleRightsMenuId);
    //     for (let i = 0; i < app.length; i++)
    //      {
    
    //         $('#'+app[i]).each(function() {
    //         console.log(app[i]);
    //             this.checked=true;
    //         });
    //     }
    // });

</script>

<script>
//     $(document).ready(function()
//    {
//        $('#dt-button').dataTable(
//        {
//            responsive: true,
//            dom:
//                "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
//                "<'row'<'col-sm-12'tr>>" +
//                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
//            buttons: [
              
//            ]
//        });
//    });
</script>