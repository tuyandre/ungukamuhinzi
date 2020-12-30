$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    console.log(token);   
    var endpoint = "http://178.79.188.142:90/api/";
    // $("").click(function(e){
        $(document).on('click', 'button#lodinBtn011klj', function (e) {
        e.preventDefault();
        // alert("donat");
        $.ajax({
            url:endpoint+"UpdateCustomer",
            type: "POST",
            data: new FormData($('form.form-horizontal')[0]),
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
                window.location.replace("profile.html");
            },
 complete:function(){
    }
})
.fail((x,j,s)=>{
console.log(x,j,s);
})


    });
});