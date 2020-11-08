$(document).ready(function(){
    let jwt = localStorage.getItem("farmer-Id");
      console.log(jwt);
      let jwt1 = localStorage.getItem("customer-Id");
      console.log(jwt1);
      $("h1.formersid").append('<input type="text" id="farmerid" name="level" value='+jwt+' hidden>');

    var endpoint = "/Ungukamuhinzi/register/user";
    $("button#signup-id10222").click(function(e){
        e.preventDefault();
        var fullName =document.querySelector("input#name1").value;
        var Phone = document.querySelector("input#emailg111").value;
        var Password =document.querySelector("input#password").value;
        var token = document.querySelector("input#token").value;
        var repeatpassword = document.querySelector("input#password11").value;
        var level =document.querySelector("input#farmerid").value;
        if(fullName === "" || Phone=== "" || Password === "" || repeatpassword=== ""){

            $("div#loginSucces").attr("class"," alert alert-danger")
            $("div#loginSucces").html("Please You must Fill the form").css("display","block");
           setTimeout(()=>{
        $("div#loginSucces").fadeOut();
        },1500)

    }
    else{
        let farmer1 ={
            fullname:fullName,
            phone:Phone,
            _token:token,
            password:Password,
            confirmPassword:repeatpassword ,
            level:level
        }
        $.ajax({
            url:endpoint,
            data:farmer1,
            type:"POST",
            dataType:"JSON",
            success:function(data){
        //  console.log(data);
         let datamessage=data.Data;
         console.log(datamessage.level);
         let level=datamessage.level;
         $("div#loginSucces").html(data.Message).attr("class","alert alert-success").css("display","block");
         setTimeout(()=>{
            $("div#loginSucces").fadeOut();
         },2000)

                window.location.replace("/Ungukamuhinzi/login");
            }
            ,
            complete:function(){
            }
        })
        .fail((x,j,s)=>{
console.log(x,j,s);
        })
    }
    });
});

