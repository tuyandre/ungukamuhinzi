$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    console.log(token);   
    var endpoint = "http://178.79.188.142:90/api/";
    // $("").click(function(e){
        $(document).on('click', 'button#lodinBtn011klnj', function (e) {
            var fullname=$("input#fnames").val();
            var phones=$("input#phones1").val();
            
            let ChangePhone={
                fullname:fullname,
                phone:phones
            }
        e.preventDefault();
        alert("donat");
        e.preventDefault();
        $.ajax({
            url:endpoint+"changePhone",
            type: "POST",
            dataType:"json",
            data:ChangePhone,
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
            },
 complete:function(){
    }
})
.fail((x,j,s)=>{
console.log(x,j,s);
})
});
});