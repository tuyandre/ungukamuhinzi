$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    $('#spinner1').show();
var endpoint = "http://178.79.188.142:90/api/";
$(document).on('click', 'a#clicktomakeorder', function (e) {
    $("div#besthavestclient").hide();
    $("#click-info-order111111111").show();
    e.preventDefault();
    let id=$(this).data("id");
    console.log(id);

    let display={
        stockID:id
    }

$.ajax({
    url:endpoint+"display",
    data:display,
    type:"POST",
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        var final=data.Data;
        console.log(final[0]);

        var topViewDiv = '<div class="row farm-upi11"><p class="col-md-3  farm-text"><a href="#" class="prev1" id="prev-for-graph"><img class="previous-button" src="img/Chevron.png" alt=""><a href="#">'+final[0].crops+'</a></p></div><div class="container-fluid"><div class="row" id="displayhavestinfo"><div class="row col-sm-6" id="card-image1"><img class="row d-block w-100" src="'+final[0].photo+'" alt=""></div><div class="col-sm-6"><p class="col-md-12"><span class="text-muted">Supplier: </span>'+final[0].fname+' '+final[0].lname+'</p><p class="col-md-12"><span class="text-muted">From: </span>'+final[0].location+'</p><p class="col-md-12"><span class="text-muted">Quantity: </span>'+final[0].quantity+' kg</p><div class="col-md-12"><form action="post"><div class="form-group" id="stockidvery" hidden><input type="text" type="number" id="clientstockid" name="stockID"  value="'+final[0].id+'" placeholder="stockid"></div><div class="form-group"><p>Price:'+final[0].price+' Rwf/kg</p></div><div class="row form-group"><input type="number" type="number" id="quantityclientid" name="quantity" placeholder="quantity(kg)"></div><div class="form-group" hidden><input type="number" type="number" id="statusclientid" name="status" value="1" placeholder="status"></div><br /><div class="form-group"><div class="alert alert-success" id="loginSucces" style="display: none"></div></div><div class="form-group"><button class="btn btn-success" id="makeorderforclient" >PLACE ORDER</button></div></form></div></div></div></div>';
        $('.info-info12').append(topViewDiv);

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
});
