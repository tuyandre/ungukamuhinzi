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
        url:endpoint+"AllFarms",
        data:farmIdOffermer,
        type:"POST",
        dataType:"JSON",
        beforeSend:function(xhr){
            xhr.setRequestHeader('Authorization','Bearer'+token);
        },
        success:function(data){
            // console.log(data);
            let finalData=data.Data[0];
            console.log(finalData);    
            var topViewDiv = '  <h1 class="text-center font-weight-bold col-md-offset-3">'+finalData.total_expenses+'frw</h1> ';
            $('#totalExpenses').append(topViewDiv);
        }
        ,
        complete:function(){
        }
    })
    .fail((x,j,s)=>{
    console.log(x,j,s);
    })
})
// <!- END---SHOW EXPENSES OF ONE FARM------------>
})