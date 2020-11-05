$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    let farmid = localStorage.getItem("Farm-id");
    // <!- SHOW EXPENSES OF ONE FARM---------->

var endpoint = "http://178.79.188.142:90/api/";
$(document).on('click', 'button#update', function (e) {
e.preventDefault();
// alert("firing");

var cropid =document.querySelector("input#cropfarmID").value;
var Quantity = document.querySelector("input#quantity").value;
var Price=document.querySelector("input#price").value;
var Status= document.querySelector("input#status").value;
var Stockid =document.querySelector("input#stockid").value;

let UpdateStock ={
    cropfarmID:cropid,
    quantity:Quantity,
    price:Price,
    status:Status,
    stocid:Stockid
}
    $.ajax({
        url:endpoint+"updateStock",
        data:UpdateStock,
        type:"POST",
        dataType:"JSON",
        beforeSend:function(xhr){
            xhr.setRequestHeader('Authorization','Bearer'+token);
        },
        success:function(data){
            console.log(data);
            $("div#loginSucces").html(data.Message).attr("class","alert alert-success").css("display","block");
            setTimeout(()=>{
               $("div#loginSucces").fadeOut();
            },3000)
            window.setTimeout(function() {
                window.location.replace("stock.html");
            }, 5000);            
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