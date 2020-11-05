$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    // console.log(token);
    $('#spinner3').show();


var endpoint = "http://178.79.188.142:90/api/";
$.ajax({
    url:endpoint+"delivered2",
    type:"POST",
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        console.log(data);
        // console.log(data.delivered_Orders);
        var finalData = data.delivered_Orders;
        console.log(finalData.length);
        var countcancel6=finalData.length;
        if(countcancel6===0){
            let DisplayedMessage2="No delivered order";
            $("p#loginSucces124").html(DisplayedMessage2).css("display","block");
            setTimeout(()=>{
              $("div#loginSucces").fadeOut();
            },3000)
        }

        for(let dt1 in finalData){
            // console.log(finalData[dt1].orderid);
           var topViewDiv = '<div class="col-md-4" id="delivered-order"><div class="card-content1"><div class="card-desc1"><div class="card-body"><div class="row"><p class="col-md-6">'+finalData[dt1].crops+'</p><p class="col-md-6">'+finalData[dt1].updated_at+'</p></div><div class="row"><p class="col-md-12">Client:'+finalData[dt1].client_name+'</p><p class="col-md-4">Contact:'+finalData[dt1].contact_for_client+'</p><p class="col-md-6 col-md-offset-1">Amount(Rwf):'+finalData[dt1].Money_you_have_to_get+'</p></div></div></div></div></div>';
           $('#order-pending3').append(topViewDiv);
           $('#spinner3').hide();
           $('#footer').css('display','block');
        }
        
        
    }
    ,
    complete:function(){
    }
})
.fail((x,j,s)=>{
console.log(x,j,s);
})
})
function ShowModalllAccept(elem){ 
    // var dataId = $(elem).data("id");
    //  $("input#Farm-id:text").val(dataId);
    //  $("input#Farm-id1:text").val(dataId);  
   }

