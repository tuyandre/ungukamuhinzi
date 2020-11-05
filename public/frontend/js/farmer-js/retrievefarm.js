$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    console.log(token);
    $('#spinner1').show();
    // <!- RETRIEVE ALL FARMS YOU HAVE FOR EVERY FARMER------------>

var endpoint = "http://178.79.188.142:90/api/viewFarms";

$.ajax({
    url:endpoint,
    type:"POST",
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        // console.log(data);
let hidef=data.Returned_data;
if(hidef===0){
    $('#spinner1').hide();
    let DisplayedMessage="Please add your farm";
    $("p#loginSucces1").html(DisplayedMessage).css("display","block");
    setTimeout(()=>{
      $("div#loginSucces").fadeOut();
    },3000)
    // $('#spinner1').html("please add your farm");
}

        var finalData = data.Data;
        console.log(finalData.Returned_data);
        for(let dt in finalData){
           console.log(finalData[dt]);
           let farmcropoId= finalData[dt].farmcrop;
        //    for(let dt1 in farmcropoId){
            //    console.log(farmcropoId.cropimage);
        //    }
        // $("#Farm-id").append(" <option value="+finalData[dt].farmID+"> "
        // +finalData[dt].location+"</option>"

        // );
           var imageUrl = (farmcropoId.cropimage == null || farmcropoId.cropimage == "") ? 'http://res.cloudinary.com/hviewtech/image/upload/c_fit,h_253,w_383/o3t44gsj5umncbtoizr0.png':farmcropoId.cropimage;
           var imageUrl1 = (farmcropoId.cropname == null || farmcropoId.cropname == "") ? 'No crop available':farmcropoId.cropname;
         

           var topViewDiv = '<div class="col-md-3" id="card-as-link" ><a href="#" id="farms11" onClick="ShowModalll(this)" data-id='+finalData[dt].farmID+'><div class="card-content "id="farm-info" ><div class="card-img"><img class="farmdhr" src="'+imageUrl+'" alt=""><div class="col-md-12 Farm"><img src="Farmer/img/progress  bar.png" alt=""></div></div><div class="card-desc"><h4 class="card-title">'+imageUrl1+'</h4><ul><li><p class="text-left">location:   <span class="farm-location">'+finalData[dt].location+'</span></p></li><li><p class="text-left">plot size:   <span class="farm-location1">'+finalData[dt].plotsize+'</span></p></li> <li><p class="text-left">Farm UPI:   <span class="farm-location2">'+finalData[dt].UPI+'</span></p></li></ul></div></div></a></div>';
           $('#farms').append(topViewDiv);
           $('#spinner1').hide();
           $('#footer').css('display','block');



           $("#dataTableAdd").DataTable().row.add('<div class="col-md-3" id="card-as-link" ><a href="#" id="farms11" onClick="ShowModalll(this)" data-id='+finalData[dt].farmID+'><div class="card-content "id="farm-info" ><div class="card-img"><img class="farmdhr" src="'+imageUrl+'" alt=""><div class="col-md-12 Farm"><img src="Farmer/img/progress  bar.png" alt=""></div></div><div class="card-desc"><h4 class="card-title">'+imageUrl1+'</h4><ul><li><p class="text-left">location:   <span class="farm-location">'+finalData[dt].location+'</span></p></li><li><p class="text-left">plot size:   <span class="farm-location1">'+finalData[dt].plotsize+'</span></p></li> <li><p class="text-left">Farm UPI:   <span class="farm-location2">'+finalData[dt].UPI+'</span></p></li></ul></div></div></a></div>').draw(); 
        }

    }
    ,
    complete:function(){
    }
})
.fail((x,j,s)=>{
console.log(x,j,s);
})

// <!- END---RETRIEVE ALL FARMS YOU HAVE FOR EVERY FARMER------------>
})
function ShowModalll(elem){ 
    var dataId = $(elem).data("id");
     $("input#Farm-id:text").val(dataId);
     $("input#Farm-id1:text").val(dataId);
     console.log('yuiuyuy');
     console.log(dataId);
     console.log('yuiuyuy');
     $('input#email1').val(dataId);
   }

