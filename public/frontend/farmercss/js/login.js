$(document).ready(function(){
    let jwt = localStorage.getItem("farmer-Id");
      console.log(jwt);
      let jwt1 = localStorage.getItem("customer-Id");
      console.log(jwt1);    
    var endpoint = "http://muhinzi.rtraveler.com/public/api/";
    $("button#lodinBtn0").click(function(e){
        e.preventDefault();
        // alert("DONAT");
        var level =document.querySelector("input#farmerid").value;
        var phone1 =document.querySelector("input#phone11").value;
        var Password = document.querySelector("input#repeatpassword110").value;
        if(phone1 === "" || Password=== ""){
            
            $("div#loginSucces").attr("class"," alert alert-danger")
            $("div#loginSucces").html("Please You must Fill the form").css("display","block");
           setTimeout(()=>{
        $("div#loginSucces").fadeOut();
        },1500)
       
    }
    else{
        let farmer2 ={
            phone:phone1,
            password:Password
        }
        // console.log(farmer1);
        $.ajax({
            url:endpoint+"login",
            data:farmer2,
            type:"POST",
            dataType:"JSON",
            success:function(data){
                console.log(data);
                let dataToken=data[0].token;
                $("div#loginSucces").html(data[0].message).attr("class","alert alert-success").css("display","block");
                setTimeout(()=>{
                   $("div#loginSucces").fadeOut();
                },2000)
                if(level ==='1')
                {
                    localStorage.setItem("Token",dataToken);

                    

                    window.location.replace("farmer/home.html");
                }
                else if(level ==='2'){
                    localStorage.setItem("Token",dataToken);
                    window.location.replace("client/index.html");
                    
                }
                
            }
            ,
            complete:function(){
            }
        })
        .fail((x,j,s)=>{
       console.log(x,j,s);
       console.log(x.responseJSON.Message);
       $("div#loginSucces").html(x.responseJSON.Message).attr("class","alert alert-warning").css("display","block");
       setTimeout(()=>{
          $("div#loginSucces").fadeOut();
       },2000) 
        })
    }
    });
    
});


