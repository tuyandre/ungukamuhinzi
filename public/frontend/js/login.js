$(document).ready(function(){

    var endpoint = "/Ungukamuhinzi/login/user";
    $("button#lodinBtn0").click(function(e){
        e.preventDefault();
        // alert("DONAT");
        var phone1 =document.querySelector("input#phone11").value;

        var token = document.querySelector("input#token").value;
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
            email:phone1,
            _token:token,
            password:Password
        }
        // console.log(farmer1);
        $.ajax({
            url:endpoint,
            data:farmer2,
            type:"POST",
            dataType:"JSON",
            success:function(data){
                console.log(data);
                let level=data.level;

                $("div#loginSucces").html(data.message).attr("class","alert alert-success").css("display","block");
                setTimeout(()=>{
                   $("div#loginSucces").fadeOut();
                },2000)

                if(level =='1')
                {
                    // console.log(localStorage.getItem.Token);
                    window.location.replace("/Farmer");
                }
                else if(level =='2'){
                    window.location.replace("/Client");

                }else if (level =='3'){
                    window.location.replace("/Administration");
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


