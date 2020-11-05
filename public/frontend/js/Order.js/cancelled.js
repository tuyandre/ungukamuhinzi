$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    // console.log(token);
    $('#spinner3').show();


var endpoint = "http://178.79.188.142:90/api/";
$.ajax({
    url:endpoint+"cancelled2",
    type:"POST",
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        console.log(data.Returned_data);
        var countcancel111=data.Returned_data;
        // console.log(countcancel111.length)
        var countcancel=data.Returned_data;
        if(countcancel===0){
            let DisplayedMessage1="No order was cancelled";
            $("p#loginSucces125").html(DisplayedMessage1).css("display","block");
            setTimeout(()=>{
              $("div#loginSucces").fadeOut();
            },3000)
        }
        console.log(data.cancelled_Orders);
        // else if{

        var finalData = data.Data;
        console.log(finalData);
        console.log(data.cancelled_Orders);
        var finalData = data.cancelled_Orders;
        console.log(finalData);
        for(let dt in finalData){
            console.log(finalData[dt].orderid);
           var topViewDiv = '<div class="col-md-4" id="conceled-order"><div class="card-content1"><div class="card-desc1"><div class="card-body"><div class="row"><p class="col-md-6">'+finalData[dt].crops+'</p><p class="col-md-6">'+finalData[dt].updated_at+'</p></div><div class="row"><p class="col-md-12">Client:'+finalData[dt].client_name+'</p><p class="col-md-4">HviewTech:344 </p><p class="col-md-6 col-md-offset-1">Amount(Rwf):'+finalData[dt].Money_you_have_to_get+'</p></div><div class="button11"><button type="button" class="btn btn-outline-default btn-md btn-rounded waves-effect" id="order-success-button11ds" data-id='+finalData[dt].orderid+'$'+finalData[dt].stockID+'>Restore</button></div></div></div></div></div>';
           $('#order-pending5').append(topViewDiv);
           $('#spinner3').hide();
           $('#footer').css('display','block');
        }
        
    // }  
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

