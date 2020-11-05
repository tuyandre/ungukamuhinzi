$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    let jwt = localStorage.getItem("farmer-Id");
      let jwt1 = localStorage.getItem("customer-Id");
      ///let cropfarmId = localStorage.getItem("CropFarmId");
      let farmid = localStorage.getItem("farm-id-1");
      var cropfarmId = $('#hiddenCropId').val();
      $("h3.formersid1").append('<input type="text" id="farmerid" name="cropfarmID" value='+cropfarmId+'>');
    var endpoint = "http://178.79.188.142:90/api/";
    $("button#addinstock").click(function(e){
        e.preventDefault();
        // alert("DONAT");
        var Farmidid =document.querySelector("input#email1").value;
        var Quantity =document.querySelector("input#quantity").value;
        var Price = document.querySelector("input#price").value;
        var Status =document.querySelector("input#Status").value;
        var cropfarmID =document.querySelector("input#hiddenCropId").value;
        let AddItemToStock ={
            farmID:Farmidid,
            quantity:Quantity,
            price:Price,
            status:Status,
            cropfarmID:cropfarmID,
        }
        $.ajax({
            url:endpoint+"addStock",
            data:AddItemToStock ,
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
        })
    });
});

