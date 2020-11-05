$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    let farmid = localStorage.getItem("Farm-id");
    // console.log(farmid);
    // <!- SHOW EXPENSES OF ONE FARM---------->

var endpoint = "http://178.79.188.142:90/api/";
$(document).on('click', 'a#farms11', function (e) {
    // alert("donat");
    let farmidd1=$(this).data("id");
    console.log(farmidd1)
    let farmIdOffermer={
        farmid:farmidd1
    }
    $.ajax({
        url:endpoint+"ViewExpenses",
        data:farmIdOffermer,
        type:"POST",
        dataType:"JSON",
        beforeSend:function(xhr){
            xhr.setRequestHeader('Authorization','Bearer'+token);
        },
        success:function(data){
            console.log(data);
            let finalData=data.Data;
            for(let dt in finalData){
                // console.log(finalData[dt].id);
                // $('nput#displaghryon').html(finalData[dt].id);
             // $("#display1").append(" <option value="+finalData[dt].id+"> "
             // +finalData[dt].UPI+"</option>"
     
             // );
             //    localStorage.setItem("Farm-id",finalData[dt].id);
                // var imageUrl = (finalData[dt].photo == null || finalData[dt].photo == "") ? 'https://mdbootstrap.com/img/Photos/Others/img (36).jpg':finalData[dt].photo;
     
                var topViewDiv = '<div class="col-md-6 best-of-best1"><div class="card-content1"><div class="card-desc1"><div class="card-body"><div class="row"><p class="col-md-6 text-black font-weight-bold">'+finalData[dt].titles+'</p><p class="col-md-4 col-md-offset-2 text-black  font-weight-bold">'+finalData[dt].moneySpent+'frw</p></div><br /><div class="row"><p class="col-md-12 text-muted">'+finalData[dt].description+'</p></div></div></div></div></div>';
                $('#farms111').append(topViewDiv);
             }
    
        }
        ,
        complete:function(){
        }
    })
    .fail((x,j,s)=>{
    console.log(x,j,s);
    })
        $(".combine").hide();
        $(".Expenses-info").show();
})
// <!- END---SHOW EXPENSES OF ONE FARM------------>
})