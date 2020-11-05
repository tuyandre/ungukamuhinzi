$(document).ready(function(){
    let jwt = localStorage.getItem("farmer-Id");
      console.log(jwt);
      let jwt1 = localStorage.getItem("customer-Id");
      console.log(jwt1);
      $("h1.formersid").append('<input type="text" id="farmerid" name="level" value='+jwt+' hidden>');
      
    var endpoint = "http://178.79.188.142:90/api/registration";
    $("button#signup-id10222").click(function(e){
        e.preventDefault();
        var fullName =document.querySelector("input#name1").value;
        var Phone = document.querySelector("input#emailg111").value;
        var Password =document.querySelector("input#password").value;
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

         if(level ==='1')
         {
             localStorage.setItem("Token",data.Token);
             window.location.replace("Farmer/profile.html");
         }
         else if(level ==='2'){
             localStorage.setItem("Token",data.Token);
             window.location.replace("client/profile.html");             
         }
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

