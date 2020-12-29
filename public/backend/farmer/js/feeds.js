$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    // console.log(token);
    $('#spinner3').show();


var endpoint = "http://178.79.188.142:90/api/";
$.ajax({
    url:endpoint+"feeds",
    type:"POST",
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        console.log(data.Data);
        var finalData = data.Data;
        console.log(finalData.length);
        var countcancelp=finalData.length;
        if(countcancelp===0){
            $('#spinner1').hide();
            let DisplayedMessage1="No feeds available";
            $("p#loginSucces12a").html(DisplayedMessage1).css("display","block");
            setTimeout(()=>{
              $("div#loginSucces").fadeOut();
            },3000)
        }

        for(let dt in finalData){
            console.log(finalData[dt].cropname);
           var topViewDiv = '<div class="col-sm-12 col-md-4 col-lg-3 mt-4"><a href="#" id="feeds1"><div class="card"  id="feeds110"><img class="card-img-top picture-top" src="'+finalData[dt].photo+'"><div class="card-block"><figure class="profile best-pro"><img src="https://picsum.photos/200/150/?random" class="profile-avatar" alt=""></figure> <h4 class="card-title card-words mt-3">'+finalData[dt].cropname+'</h4><div class="card-text best-text-card">Lorem ipsum dorol si amet di suo tungulusumu rafale.</div></div></div></a></div>';
           $('#feeds11').append(topViewDiv);
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

