$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    console.log(token);   
    var endpoint = "http://178.79.188.142:90/api/";
    // $("").click(function(e){
        $(document).on('click', 'button#makeorderforclient', function (e) {
        e.preventDefault();
        // alert("DONAT");

        var stockidd=document.querySelector("input#clientstockid").value;
        var quantity =document.querySelector("input#quantityclientid").value;
        var statust = document.querySelector("input#statusclientid").value;
        let Makeorder={
            stockID:stockidd,
            quantity:quantity,
            status:statust,
        }
        // console.log(farmer1);
        $.ajax({
            url:endpoint+"makeOrder",
            data:Makeorder,
            type:"POST",
            dataType:"JSON",
            beforeSend:function(xhr){
                xhr.setRequestHeader('Authorization','Bearer'+token);
            },
            success:function(data){
                console.log(data);
                console.log(data.Message);
                $("div#loginSucces").html(data.Message).attr("class","alert alert-success").css("display","block");
                setTimeout(()=>{
                  $("div#loginSucces").fadeOut();
                },2000)
            //    $("#villaModal").hide();
            window.location.replace("order.html");
            }
            ,
            complete:function(){
            }
        })
        .fail((x,j,s)=>{
console.log(x,j,s);
console.log(x.responseJSON.Isues);
$("div#loginSucces").html(x.responseJSON.Isues).attr("class","alert alert-warning").css("display","block");
setTimeout(()=>{
   $("div#loginSucces").fadeOut();
},2000) 
        })
    });
});