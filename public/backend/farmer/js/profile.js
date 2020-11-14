$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    console.log(token);
    // let FarmerPro = localStorage.getItem("farmer");
    // console.log(FarmerPro);

    var endpoint = "http://178.79.188.142:90/api/complete";
    $(document).on('click', 'button#lodinBtn011opoo', function (e) {
        // alert("fggf");
        e.preventDefault();
        $.ajax({
            url:endpoint,
            type: "POST",
            data: new FormData($('form#contactForm1123')[0]),
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
                },3000)
                window.setTimeout(function() {
                    window.location.href = 'home.htmll';
                }, 5000);
                // window.location.replace("home.html");
            },
            complete:function(){
            }
        })
        .fail((x,j,s)=>{
console.log(x,j,s);
        })
        });

})
