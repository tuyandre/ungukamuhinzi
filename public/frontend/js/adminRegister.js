$(document).ready(function(){

    var endpoint = "/Ungukamuhinzi/register/post/register";
    $("button#signup-id10222").click(function(e){
        e.preventDefault();
        var fullName =document.querySelector("input#name1").value;
        var email = document.querySelector("input#email111").value;
        var Phone = document.querySelector("input#phone111").value;
        var token = document.querySelector("input#token").value;
        var Password =document.querySelector("input#password").value;
        var repeatpassword = document.querySelector("input#password11").value;

        if(fullName === "" ||email==""|| Phone=== "" || Password === "" || repeatpassword=== ""){

            $("div#loginSucces").attr("class"," alert alert-danger")
            $("div#loginSucces").html("Please You must Fill the form").css("display","block");
            setTimeout(()=>{
                $("div#loginSucces").fadeOut();
            },1500)

        }
        else{
            let admin ={
                fullname:fullName,
                phone:Phone,
                email:email,
                _token:token,
                password:Password,
                confirmPassword:repeatpassword ,
            }
            $.ajax({
                url:endpoint,
                data:admin,
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

