$(document).ready(function(){
    let token = localStorage.getItem("Token");
    // console.log(token);   
    var endpoint = "http://muhinzi.rtraveler.com/public/api/";
    $(document).on('click', 'button#change', function (e) {
        alert("donat");
        var oldpassword=document.querySelector("input#oldpassword").value;
        var newpassword=document.querySelector("input#new-password ").value;
        var confirmPassword=document.querySelector("input#confirmpassword").value;
        
        let changePassword={
            current_password:oldpassword,
            new_password:newpassword,
            confirmPassword:confirmPassword,
        }
    $.ajax({
        url:endpoint+"changePassword",
        type: "POST",
        dataType:"json",
        data:changePassword,
        beforeSend:function(xhr){
            xhr.setRequestHeader('Authorization','Bearer'+token);
        },
        success: function(data){
            console.log(data);
           $("div#loginSucces").html(data.status).attr("class","alert alert-success").css("display","block");
            setTimeout(()=>{
              $("div#loginSucces").fadeOut();
            },2000)
        },
complete:function(){
}
})
.fail((x,j,s)=>{
console.log(x,j,s);
})


});
});