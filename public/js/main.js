

function DisbaleButton(form){
    let btn= $(form).last();
    btn.disabled=true;
    
    }
    
    function EnableButton(form) {
        let btn= $(form).last();
        btn.disabled=false;
        
    }
function showSuccessToast(title,msg){
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 100,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
    toastr.success(msg, title);
}
    


function showErrorToast(title,msg){
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 100,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
    toastr.error(msg, title)
}
 function  LoadPage(courl) {
    localStorage.setItem("pageURL",courl);
    if(window.event.ctrlKey){
        window.open(window.location.href, '_blank').focus();
        $.ajax({
            url: courl,
            success: function(result) {
                $("#js-page-content").html(result);
            }
        });
    }else{
        $.ajax({
            url: courl,
            success: function(result) {
                $("#js-page-content").html(result);
            }
        });
    }
  
}
function postData(pUrl,pData,gUrl,sTitle,sDesc){
    $.ajax({
        type:'post',
        data:pData,
        url: pUrl,  
        success: function(result) {

        console.log(result);
         //LoadPage(gUrl);
         showSuccessToast(sTitle,sDesc);
        },
        error:function(err){
            showErrorToast(err,'Error');
        }
        
    });
}


window.onload=()=>{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    LoadPage((localStorage.getItem('pageURL')));

}






