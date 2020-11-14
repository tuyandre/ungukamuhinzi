$(document).ready(function(){
    let token = localStorage.getItem("Token");
    // console.log(token);

var endpoint = "http://178.79.188.142:90/api/";
$.ajax({
    url:endpoint+"StockWithExpense",
    type:"POST",
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        console.log(data.Returned_data);
                 var countcancelreturn=data.Returned_data;
         if(countcancelreturn===0){
             let DisplayedMessage1="Nothing purchased";
             $("p#loginSucces12p").html(DisplayedMessage1).css("display","block");
             setTimeout(()=>{
               $("div#loginSucces").fadeOut();
             },3000)
         }
        var finalData = data.Data;
        //  console.log(finalData); 
         var finalData1 = finalData.crops;
         console.log(finalData1);
         var imageUrlp = (finalData.profit == null || finalData.profit == "") ? 'No profit':finalData.profit;
         var imageUrle = (finalData.expenses == null || finalData.expenses == "") ? 'No expenses':finalData.expenses;
         var imageUrls = (finalData.sales == null || finalData.sales == "") ? 'No sales':finalData.sales;
         var topViewDiv = '<div class="col-md-12 "><ul class="row holizontal-bar-list"><li><p class="text-center ">Profit: '+imageUrlp+' Rwf</p></li><li><img src="img/line.png" alt=""></li><li><p class="text-center">Expenses:'+imageUrle+' rwff</p></li><li><img src="img/line.png" alt=""></li><li> <p class="">Sales:'+imageUrls+' Rwf</p></li></ul></div>';
         $('#holizontal-bar-list1').append(topViewDiv);
 
        for(let f in finalData1){
            // var finalData1 = finalData.crops;
           console.log(finalData1[f].cropid);
        var topViewDiv = '<a href="#" id="God" data-id='+finalData1[f].cropid+'$'+finalData1[f].cropname+'><div class="col-md-6 graph-image1"><div class="col-md-4 farmer-profile10"><img class="" src="'+finalData1[f].photo+'" alt=""></div><div class="col-md-8 farmer-profile11"><div class="row"><p class="col-md-7">'+finalData1[f].cropname+'</p><p class="col-md-4 col-md-offset-1"><span>Last Cycle</span></p></div><div class="description"><div class="row"><p class="col-md-7">Expenses: '+finalData1[f].total_expenses+'</p><p class="col-md-4 col-md-offset-1 text-success ">Profit</p><p class="col-md-8 ">Sales: '+finalData1[f].Total_amount_of_harvest+'</p><p class="col-md-4  text-success">'+finalData1[f].profit+'</p></div></div></div></div></a>';
        $('#image-displayedGod').append(topViewDiv);


        // var topViewDiv = '<div class="col-md-6"><a href="#" id="clicktomakeorder"><div class=" float-right"><div class="container"><div class="row"><div class="col-sm-4" id="card-image"><img class="d-block w-100" src="'+finalData1[f].photo+'" alt=""></div><div class="col-sm-7"><div class="card-block"><div class="container-fluid"><div class="row" id="infopadding"><div class="col-md-4"><p class="font-weight-bold">'+finalData1[f].cropname+'</p></div><div class="col-md-5 col-md-offset-3"><p class="font-weight-bold">Last Cycle</p></div><div class="col-md-8"><p class="font-weight-bold">Expenses: <span class="text-muted"> '+finalData1[f].total_expenses+'</span></p></div><div class="col-md-3 col-md-offset-1"><p class="font-weight-bold">Profits</p></div><div class="col-md-6"><p class="font-weight-bold">Sales: <span class="text-muted">'+finalData1[f].Total_amount_of_harvest+'</span></p></div><div class="col-md-3 col-md-offset-3"><p class="font-weight-bold">'+finalData1[f].profit+'</p></div></div></div></div></div></div></div></div></a></div>';
        // $('#image-displayedGod').append(topViewDiv);

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