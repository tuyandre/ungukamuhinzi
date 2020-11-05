$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    console.log(token);
    $('#spinner1').show();
    // <!- RETRIEVE ALL FARMS YOU HAVE FOR EVERY FARMER------------>


var endpoint = "http://178.79.188.142:90/api/";
$.ajax({
    url:endpoint+"stock",
    type:"POST",
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        console.log(data.Returned_data);
        let hidef1=data.Returned_data;
if(hidef1===0){
    $('#spinner1').hide();
    let DisplayedMessage1="0 items in stock";
    $("p#loginSucces12").html(DisplayedMessage1).css("display","block");
    setTimeout(()=>{
      $("div#loginSucces").fadeOut();
    },3000)
    // $('#spinner1').html("please add your farm");
}
        var finalData = data.Data;
        // console.log(finalData);
        var finalData1=finalData.stock;
        console.log();
        var topViewDiv ='<span class="text-info">'+finalData1.length+'</span> ITEMS IN STOCK';
        $('#ItemInstock').append(topViewDiv);


        var finalData1=finalData.stock;
        var topViewDiv ='<p class="text-center">'+finalData.published+' Items Published</p><p class="text-center">'+finalData.unpublished+' Items unpublished</p>';
        $('#publisheditem').append(topViewDiv);

        var finalData1=finalData.stock;
        var topViewDiv =' <p class="text-center  centerpp">Worth '+finalData.worth+'Rwf</p>';
        $('#worth').append(topViewDiv);
        var staruss ;

        for(let dt in finalData1){
           console.log(finalData1[dt].status);
           var publishstaus;
        //    let unpublis="Unpublished";
           if(finalData1[dt].status==1){
            publishstaus ="Published";
           }
           else if(finalData1[dt].status==0){
            publishstaus ="Unpublished";
           }
        //    console.log(finalData1[dt].cropfarmID);

           var imageUrl = (finalData1[dt].photo == null || finalData1[dt].photo == "") ? 'https://mdbootstrap.com/img/Photos/Others/img (36).jpg':finalData1[dt].photo;
            var checkedo = (finalData1[dt].status == 0) ? "":"checked";
           var topViewDiv = '<div class="col-sm-6 col-md-4 col-lg-3 mt-4"><div class="card"><img id="stock-image" src="'+imageUrl+'" ><div><span class="col-md-offset-8 text-success" id="published">'+publishstaus+'</span><label class="el-switch el-switch-green col-md-offset-9" id="switchbutton" style="padding: 3px;"><input type="checkbox" name="switch" id="swser" '+checkedo+' onchange="publish('+finalData1[dt].status+','+finalData1[dt].stockid+')"><span data-id='+finalData1[dt].stockid+'  class="el-switch-style"></span></label></div><div class="card-block"><h4 class="card-title">'+finalData1[dt].crops+'</h4><div class="card-text"><p class="">Quantity: <span class="font-weight-bold">'+finalData1[dt].quantity+'</span> </p></div><div class="card-text"><p class="">Price/kg: <span class="font-weight-bold">'+finalData1[dt].price+'</span> </p> <a href="#" onClick="ShowModalll(this)"  data-id='+finalData1[dt].stockid+' class="col-md-offset-8" id="showstockinfo" data-toggle="modal" data-target="#form" style="background: none;border:none; color:#0000ff;"><img src="img/edit1.png" alt=""style="width: 16px; height:19px;" >Update</a> </div></div></div></div>';
           $('#stoks').append(topViewDiv);
           $('#spinner1').hide();
           $('#footer').css('display','block');
        }
        // <label class="el-switch el-switch-green col-md-offset-9" style="padding: 3px;"><input type="checkbox" name="switch" checked><span class="el-switch-style"></span></label>
        

    }
    ,
    complete:function(){
    }
})
.fail((x,j,s)=>{
console.log(x,j,s);
})
})
// var publish=document.getElementById("published");
console.log(publish);
function ShowModalll(elem){ 
    var dataId = $(elem).data("id");
     $("input#Farm-id:text").val(dataId);
     $("input#Farm-id1:text").val(dataId);

    $("input#cropfarmID:text").val(dataId);
    $("input#stockid:text").val(dataId);
   }
   let token = localStorage.getItem("Token");

   var endpoint = "http://muhinzi.rtraveler.com/public/api/";
   
   function publish(inputCheck,  stockid){
// alert("fire");
    var stat;
    if(inputCheck == "0"){
     stat=1;
    }
    else if(inputCheck == "1" ){
     stat=0;
    }
    //    alert(stat+":"+stockid);
       $.ajax({
        url:endpoint+"publish",
        type:"POST",
        cache:false,
        data:{status:stat,stocid:stockid},
        dataType:"JSON",
        beforeSend:function(xhr){
            xhr.setRequestHeader('Authorization','Bearer'+token);
        },
        success:function(data){
    console.log(data.Message);
    //        if(data.Message==="Unpublished"){
    //       let unpubl="Unpublished";
    //     $("span#published").html(unpubl).css("display","block");
    //     setTimeout(()=>{
    //        $("span#published").fadeOut();
    //     },3000)
    //   }
    //   else{
    //     let unpubl1="published";
    //     $("span#published").html(unpubl1).css("display","block");
    //     setTimeout(()=>{
    //        $("span#published").fadeOut();
    //     },3000)
    //   }
    
    window.location.replace("stock.html");
        }
        ,
        complete:function(){
        }
    })
    .fail((x,j,s)=>{
    console.log(x,j,s);
    })
   }
