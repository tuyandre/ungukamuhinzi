$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    // console.log(token);
    $('#spinner1').show();
var endpoint = "http://178.79.188.142:90/api/";

$.ajax({
    url:endpoint+"cancelled",
    type:"POST",
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        // console.log(data);
        var finalData = data.Data;
        console.log(finalData.length);
        var datalen = finalData.length;
        if(datalen===0){
            $('#spinner2').hide();
            let DisplayedMessage0="No cancelled order";
            $("p#loginSuccesclc").html(DisplayedMessage0).css("display","block");
            setTimeout(()=>{
              $("div#loginSucces").fadeOut();
            },3000)
        }
        console.log(finalData);
        for(let dt in finalData){
           console.log(finalData[dt].crops);
           var topViewDiv = '<div class="col-md-4" id="pendingclient"><div class="card-content1"><div class="card-desc1"><div class="card-body"><div class="row"><p class="col-md-3 font-weight-bold">'+finalData[dt].crops+'</p><p class="col-md-6 col-md-offset-3 font-weight-normal">'+finalData[dt].updated_at+'</p></div><div class="row"><p class="col-md-12">From:'+finalData[dt].fname+' '+finalData[dt].lname+'</p><p class="col-md-4">Quantity(kg):'+finalData[dt].quantity+'</p><p class="col-md-6 col-md-offset-2">Amount(Rwf/Kg):'+finalData[dt].frw_per_kg+'</p><p class="col-md-4 font-weight-bold">TOTAL:'+finalData[dt].Money_you_supposed_to_be_paid+'Rwf</p></div><div class="button11 float-center"><button class="btn btn-success1 btn-lg col-md-offset-3 Delivered-btn123 text-black" id="reoder" data-id='+finalData[dt].stockID+'$'+finalData[dt].orderID+'>Reorder</button></div></div></div></div></div>';
           $('#order-pendingcanceled').append(topViewDiv);
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

