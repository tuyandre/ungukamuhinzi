$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    // console.log(token);
    $('#spinner3').show();


var endpoint = "http://178.79.188.142:90/api/";
$.ajax({
    url:endpoint+"process",
    type:"POST",
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        console.log(data.Returned_data);
        // console.log(data.Data);
        // var finalData = data.Returned_data;
        // console.log(finalData);
        var countcancel10=data.Returned_data;
        if(countcancel10===0){
            let DisplayedMessage40="No orders under processes";
            $("p#loginSucces123").html(DisplayedMessage40).css("display","block");
            setTimeout(()=>{
              $("div#loginSucces").fadeOut();
            },3000)
        }
        var finalData = data.Processin_Orders;
        // console.log(finalData);

        for(let dt in finalData){
            // console.log(finalData[dt].orderid);
           var topViewDiv = '<div class="col-md-4" id="best-pending-card"><div class="card-content1"><div class="card-desc1"><div class="card-body"><div class="row"><p class="col-md-6 font-weight-bold">'+finalData[dt].crops+'</p><p class="col-md-6">'+finalData[dt].updated_at+'</p></div><div class="row"><p class="col-md-12">Client: '+finalData[dt].fname+'</p><p class="col-md-12">Quantity: '+finalData[dt].quantity+'kg</p><p class="col-md-4">Contact:'+finalData[dt].phone+'</p><p class="col-md-6 col-md-offset-2">Amount(Rwf): '+finalData[dt].Money_you_have_to_get+'</p></div><div class="button11"><button type="button" class="btn btn-outline-info btn-md btn-rounded waves-effect" id="order-success-button11" onClick="ShowModalllAccept(this)" data-id='+finalData[dt].orderid+' onclick=\"return confirm("Are you sure you want to accept this order?")\">Mark as Derivered</button><button type="button" class="btn btn-outline-info btn-md btn-rounded waves-effect pull-right" id="order-decline-button" data-id='+finalData[dt].orderid+'$'+finalData[dt].stockID+'>Cancel</button></div></div></div></div></div>';
           $('#order-pending1').append(topViewDiv);
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
function ShowModalll(elem){ 
    var dataId = $(elem).data("id");
     $("input#Farm-id:text").val(dataId);
     $("input#Farm-id1:text").val(dataId);  
   }

