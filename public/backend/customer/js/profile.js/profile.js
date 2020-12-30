$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    console.log(token);
    // let FarmerPro = localStorage.getItem("farmer");
    // console.log(FarmerPro);
    var endpoint = "http://178.79.188.142:90/api/";
    $("button#lodinBtn011").click(function(e){
        // alert("donat");
        e.preventDefault();
        $.ajax({
            url:endpoint+"CustomerProfile",
            type: "POST",
            data: new FormData($('form#contactForm11')[0]),
            processData: false,
            contentType: false,
            beforeSend:function(xhr){
                xhr.setRequestHeader('Authorization','Bearer'+token);
            },
            success: function(data){
                console.log(data);
               $("div#loginSucces").html(data.status).attr("class","alert alert-success").css("display","block");
                setTimeout(()=>{
                  $("div#loginSucces").fadeOut();
                },2000)
                window.locaction.replace("home.html");
            },
            error: function(){
                // alert("failure");
            }
        });
    });

})
