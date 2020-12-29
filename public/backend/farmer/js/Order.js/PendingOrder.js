$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    // console.log(token);
    $('#spinner1').show();


var endpoint = "http://178.79.188.142:90/api/";
$.ajax({
    url:endpoint+"pending2",
    type:"POST",
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        console.log(data);
        var finalData = data.Data;
        var datalen = finalData.length;
        if(datalen===0){
            $('#spinner1').hide();
            let DisplayedMessage0="No order have made";
            $("p#loginSucces120").html(DisplayedMessage0).css("display","block");
            setTimeout(()=>{
              $("div#loginSucces").fadeOut();
            },3000)
        }
        // console.log(finalData.length);
        // console.log(finalData);

        for(let dt in finalData){
            // console.log(finalData[dt].id);
           var topViewDiv = '<div class="col-md-4" id="best-pending-card"><div class="card-content1"><div class="card-desc1"><div class="card-body"><div class="row"><p class="col-md-6 font-weight-bold">'+finalData[dt].crops+'</p><p class="col-md-6">'+finalData[dt].updated_at+'</p></div><div class="row"><p class="col-md-12">Client: '+finalData[dt].client_name+'</p><p class="col-md-12">Quantity: '+finalData[dt].quantity+'Kg</p><p class="col-md-4">Contact:'+finalData[dt].contact_for_client+'</p><p class="col-md-6 col-md-offset-2">Amount(Rwf): '+finalData[dt].Money_you_have_to_get+'</p></div><div class="button11"><button type="button" class="btn btn-outline-info btn-md btn-rounded waves-effect" id="order-success-button"  onClick="ShowModalllAccept(this)" data-id='+finalData[dt].id+' onclick=\"return confirm("Are you sure you want to accept this order?")\">Accept</button><button type="button" class="btn btn-outline-info btn-md btn-rounded waves-effect pull-right" id="order-decline-button" data-id='+finalData[dt].id+'$'+finalData[dt].stockID+'>Decline</button></div></div></div></div></div>';
           $('#order-pending').append(topViewDiv);
           $('#spinner1').hide();
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

