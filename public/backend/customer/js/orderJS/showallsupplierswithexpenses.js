$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    // console.log(token);
    $('#spinner1').show();
var endpoint = "http://178.79.188.142:90/api/";
$(document).on('click', 'a#allordersmade', function (e) {
    e.preventDefault();

    let Cropid1=$(this).data("id");
    console.log(Cropid1);
    var res = Cropid1.split("$");
    console.log(res[0]);
    console.log(res[1]);

    var topViewDiv = '<p class="col-md-3  farm-text"><a href="#" class="prev1" id="prev-for-graph"><img class="previous-button" src="img/Chevron.png" alt=""><a href="#">'+res[1]+'</a></p>';
    $('#abaveinfo').append(topViewDiv);

var Cropid=$(this).data("id");
let ShowAll={
    cropid:Cropid
}

$.ajax({
    url:endpoint+"supplier",
    type:"POST",
    data:ShowAll,
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        console.log(data);
        var finalData =data.Data;
        console.log(finalData);
        for(let dt in finalData){
           console.log(finalData[dt].fname);
           var topViewDiv = '<div class="col-md-6" id="showependf"><div class="card-content1"><div class="card-desc1"><div class="card-body"><div class="row"><p class="col-md-6 font-weight-bold">'+finalData[dt].fname+'</p><p class="col-md-6 font-weight-bold">'+finalData[dt].updated_at+'</p></div><div class="row"><p class="col-md-12">Purchased:'+finalData[dt].quantity+'</p><p class="col-md-12">Amount spent:'+finalData[dt].Amount_Spent+'Rwf</p></div></div></div></div></div>';
           $('#info').append(topViewDiv);
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
})
function ShowModalll(elem){ 
   }

