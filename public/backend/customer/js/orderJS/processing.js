$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    // console.log(token);
    $('#spinner1').show();
var endpoint = "http://178.79.188.142:90/api/";

$.ajax({
    url:endpoint+"processed",
    type:"POST",
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        console.log(data);
        console.log(data.Returned_data);
        // var finalData = data.Returned_data;
        // console.log(finalData.length);
        var datalen =data.Returned_data;
        if(datalen===0){
            $('#spinner2').hide();
            let DisplayedMessage0="No order under process";
            $("p#loginSuccescl1").html(DisplayedMessage0).css("display","block");
            setTimeout(()=>{
              $("div#loginSucces").fadeOut();
            },3000)
        }
        var finalData = data.Processin_Orders;
        console.log(finalData);
        for(let dt in finalData){
           console.log(finalData[dt].id);
           var topViewDiv = '<div class="col-md-4" id="pendingclient"><div class="card-content1"><div class="card-desc1"><div class="card-body"><div class="row"><p class="col-md-3 font-weight-bold">'+finalData[dt].crops+'</p><p class="col-md-6 col-md-offset-3 font-weight-normal">'+finalData[dt].updated_at+'</p></div><div class="row"><p class="col-md-12">From:'+finalData[dt].fname+' '+finalData[dt].lname+'</p><p class="col-md-4">Quantity(kg):'+finalData[dt].quantity+'</p><p class="col-md-6 col-md-offset-2">Amount(Rwf/Kg):'+finalData[dt].frw_per_kg+'</p><p class="col-md-4 font-weight-bold">TOTAL:'+finalData[dt].Money_you_have_to_pay+'Rwf</p></div><div class="button11 float-center"><button class="btn btn-success1 btn-lg col-md-offset-3 Delivered-btn121 text-black" data-id='+finalData[dt].StocksID+'$'+finalData[dt].id+'>Cancel</button></div></div></div></div></div>';
           $('#order-processing').append(topViewDiv);
        //    $('#spinner1').hide();
        //    $('#footer').css('display','block');
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
   }

