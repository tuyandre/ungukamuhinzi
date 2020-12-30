$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    $('#spinner1').show();
var endpoint = "http://178.79.188.142:90/api/";

$.ajax({
    url:endpoint+"allOrdered",
    type:"POST",
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        console.log(data.Returned_Data);
        var countcancelpro=data.Returned_Data;
        if(countcancelpro===0){
            let DisplayedMessage2="No item purchased";
            $("p#loginSucces12pro").html(DisplayedMessage2).css("display","block");
            setTimeout(()=>{
              $("div#loginSucces").fadeOut();
            },3000)
        }



        var final=data[0].original;
        // console.log(final.Data[0]);
        var final1=final.Data[0];
        // console.log(final1.Amount_Spent);
        var imageUrlt = (final1.Amount_Spent == null || final1.Amount_Spent == "") ? '0':final1.Amount_Spent;
        var topViewDiv = '<h2 class="text-center font-weight-bold">SPENT:'+imageUrlt+'Rwf</h2>';
        $('#totalAmaunt').append(topViewDiv);

        var imageUrlq = (final1.all_quantity == null || final1.all_quantity == "") ? '0':final1.all_quantity;
        var topViewDiv = '<p class="text-center text-white">Purchased '+imageUrlq+' Kgs</p>';
        $('#totalkg').append(topViewDiv);

    var imageUrlc = (final1.crops == null || final1.crops == "") ? 'No crop':final1.crops;
        var topViewDiv = '<p class="text-center  centerp text-white">Purchased  '+imageUrlc+'  Different Items</p>';
        $('#totalcrops').append(topViewDiv);

        var finalData = data.Data;
        // console.log(finalData);
        for(let dt in finalData){
        //    console.log(finalData[dt].crops);
           var topViewDiv = '<a href="#" id="allordersmade" data-id='+finalData[dt].cropid+'$'+finalData[dt].crops+'><div class="col-md-6 graph-image1" id="allorderedorder"><img class="col-md-4 " src="'+finalData[dt].photo+'" alt=""><div class="col-md-8 farmer-profile11"><div class="row"><p class="col-md-7 font-weight-bold">'+finalData[dt].crops+'</p></div><div class="description"><p class=" under11">'+finalData[dt].quantity+'Kg</p><p class="under111">Amount spent: '+finalData[dt].Amount_Spent+'Rwf</p></div></div></div></a>';
           $('#order-pendingabdonat').append(topViewDiv);
        // //    $('#spinner1').hide();
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

