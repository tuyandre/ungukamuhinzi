$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    // <!- RETRIEVE ALL FARMS YOU HAVE FOR EVERY FARMER------------>

var endpoint = "/Farmer/";
$.ajax({
    url:endpoint+"viewCrops",
    type:"get",
    dataType:"JSON",
    success:function(data){
        // console.log(data.Data);
        let finalData=data.Data;
        for(let dt in finalData){
            console.log(finalData[dt].id);
        //     console.log(finalData.id);
            $("#crop_id").append(" <option type='number' value="+finalData[dt].id+"> "
            +finalData[dt].crops+"</option>"

            );
            // var topViewDiv = '<button type="button" class="btn btn-success btn-rounded-circle btn-block z-depth-0 my-4" onClick="ShowModall(this)" data-id='+finalData[dt].id+' data-toggle="modal" data-target="#myModal" id="lodinBtn1" type="submit">Add Expenses</button>';
            // $('#crops-idOfeachfarm').append(topViewDiv);
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
function ShowModall(elem){
    var dataId= $(elem).data('id');
    $("input#repeatpassword1100011222:text").val(dataId);
         }
