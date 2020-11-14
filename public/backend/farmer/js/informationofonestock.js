$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    // console.log(token);
    $('#spinner1').show();
    // <!- RETRIEVE ALL FARMS YOU HAVE FOR EVERY FARMER------------>

var endpoint = "http://178.79.188.142:90/api/";
$(document).on('click', 'a#showstockinfo', function (e) {
    let Stockid=$(this).data("id");
    console.log(Stockid);

    let SingleStock={
        stocid:Stockid
    }
$.ajax({
    url:endpoint+"SignleStockDetails",
    type:"POST",
    data:SingleStock,
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        var finalData = data.Data;
        console.log(finalData[0]);

           var topViewDiv = '<div class="form-group" hidden><input type="number" class="form-control" name="cropfarmID" value="'+finalData[0].cropfarmID+'" id="cropfarmID"  placeholder="cropfarmID"></div><div class="form-group"><input type="number" class="form-control" name="quantity"  id="quantity" value="'+finalData[0].quantity+'" placeholder="quantity"> </div><div class="form-group"><input type="number" class="form-control" name="price" id="price" value="'+finalData[0].current_price+'" placeholder="price"></div><div class="form-group" hidden><input type="number" class="form-control" name="status" value="'+finalData[0].status+'" id="status" placeholder="status"></div><div class="form-group" hidden><input type="number" class="form-control" name="stocid" value="'+finalData[0].stockid+'" id="stockid" placeholder="stocid"></div><div class="form-group"><div class="alert alert-success" id="loginSucces" style="display: none"></div></div><div class="modal-footer border-top-0 d-flex justify-content-center" id="updatebutton"> <button type="submit" class="btn btn-success" id="update">Update</button></div>';
           $('#showmodal').append(topViewDiv);


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
}),
function ShowModalll(elem){ 

   }

