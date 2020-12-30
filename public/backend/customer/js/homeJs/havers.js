$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    console.log(token);
    $('#spinner1').show();
var endpoint = "http://178.79.188.142:90/api/";

$.ajax({
    url:endpoint+"ViewHarvest",
    type:"POST",
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        // console.log(data);
        var finalData = data.Data;
        // console.log(finalData);
        for(let dt in finalData){
           console.log(finalData[dt].quantity_of_harvest);
        //    var imageUrl = (farmcropoId.cropimage == null || farmcropoId.cropimage == "") ? 'http://res.cloudinary.com/hviewtech/image/upload/c_fit,h_253,w_383/o3t44gsj5umncbtoizr0.png':farmcropoId.cropimage;
        //    var imageUrl1 = (farmcropoId.cropname == null || farmcropoId.cropname == "") ? 'No crop available':farmcropoId.cropname;


        //    var topViewDiv = '<div class="col-md-4" id="haverstmore11"><a href="#" class="haverst" onClick="ShowModalll(this)" data-id='+finalData[dt].stockID+'><div class="card-content1"><div class="card-desc1"><div class="card-body"><div class="container-fluid"><div class="row"><div class="col-md-3" id="haverst-image"><img src="'+finalData[dt].photo+'" alt=""></div><div class="col-md-8 col-md-offset-1"><p class="row col-md-2 font-weight-bold">'+finalData[dt].crops+'</p><p class="row col-md-9 col-md-offset-1 font-weight-bold pull-right">'+finalData[dt].quantity_of_harvest+'Kg in stock</p><p class=" ">'+finalData[dt].fname+'</p><p class="">'+finalData[dt].location+'</p><img src="img/jone.png" alt=""><img src="img/jone.png" alt=""><img src="img/jone.png" alt=""><img src="img/jone.png" alt=""><img src="img/Star.png" alt=""><img src="img/Number.png" alt=""><p class="font-weight-bold">'+finalData[dt].price_per_kg+'Rwf</p></div></div></div></div></div></a></div></div>';
        //    $('#haverstmore1').append(topViewDiv);


           
           var topViewDiv = '<div class="col-md-4"><a href="#" a href="#" id="clicktomakeorder" class="haverst" onClick="ShowModalll(this)" data-id='+finalData[dt].stockID+'$'+finalData[dt].quantity_of_harvest+'><div class="card float-right"><div class="row"><div class="col-sm-4" id="card-image"><img class="d-block w-100" src="'+finalData[dt].photo+'" alt=""></div><div class="col-sm-7"><div class="card-block"><div class="row"><p class="col-md-3 font-weight-bold">'+finalData[dt].crops+'</p><p class="col-md-4 col-md-offset-3 font-weight-bold">'+finalData[dt].quantity_of_harvest+'Kg</p><p class="col-md-12">'+finalData[dt].fname+'</p><p class="col-md-12">'+finalData[dt].location+'</p></div><p class="font-weight-bold">'+finalData[dt].price_per_kg+'Rwf/Kg</p></div></div></div></div></a></div>';
           $('#besthavestclient').append(topViewDiv);
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
    $("input#clientstockid:text").val(dataId);
    $("span#quantityofhaverst:text").val(dataId);
   }

