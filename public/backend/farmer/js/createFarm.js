$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    console.log(token);
    var endpoint = "/Farmer/createFarms";
    $(".text-center.AddNewfarm").click(function(e){
        e.preventDefault();
        // alert("DONAT");
        var upi =document.querySelector("input#phone1100").value;
        var location =document.querySelector("input#repeatpassword11000").value;
        var plotSize = document.querySelector("input#repeatpassword11gg00").value;
        let addFarm ={
            UPI:upi,
            location:location,
            plotsize:plotSize
        }
        // console.log(farmer1);

        $.ajax({
            url:endpoint,
            data:{addFarm,
                "_token": "{{ csrf_token() }}"},
            type:"POST",
            dataType:"JSON",
            success:function(data){
            if(data.Message === "Farm Registered"){
                // console.log("byemeye");
                    $("div#loginSucces").html(data.Message).attr("class","alert alert-success").css("display","block");
                setTimeout(()=>{
                  $("div#loginSucces").fadeOut();
                },5000)
                window.setTimeout(function() {
                    window.location.href = 'home.html';
                }, 5000);
            }
            else{
                // console.log("byanze");
                    $("div#loginSucces").html(data.Message).attr("class","alert alert-danger").css("display","block");
                setTimeout(()=>{
                  $("div#loginSucces").fadeOut();
                },5000)

                window.setTimeout(function() {
                    window.location.href = 'home.html';
                }, 5000);
            }
            }
            ,
            complete:function(){
            }
        })
        .fail((x,j,s)=>{
console.log(x,j,s);
        })
    });
});
