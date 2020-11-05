$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    // console.log(token);
    let farmID = localStorage.getItem("dataId");
    // console.log(token);
    // $("h1.formersid").append('<input type="text" id="farmerId" name="farmID" value='+farmID+'>');
    var endpoint = "http://178.79.188.142:90/api/";
    $("button#AddNewfarm111S").click(function(e){
        // alert("donat");
        e.preventDefault();
        // let farm_id=$(this).val("id");
        // console.log(id);
        var Crops =document.querySelector("select#crop_id").value;
        var Farm = document.querySelector("input#Farm-id").value;
        var Season =document.querySelector("select#season-id").value;
        let Addcrops ={
            cropsID:Crops,
            farmID:Farm,
            seasonID:Season,
        }
        $.ajax({
            url:endpoint+"createCurrentCrop",
            data:Addcrops,
            type:"POST",
            dataType:"JSON",
            beforeSend:function(xhr){
                xhr.setRequestHeader('Authorization','Bearer'+token);
            },
            success:function(data){
                // console.log(data);
                if(data.Message==="This farms currently are used"){
                    $("div#loginSucces").html(data.Message).attr("class","alert alert-danger").css("display","block");
                    setTimeout(()=>{
                      $("div#loginSucces").fadeOut();
                    },2000)
                    window.setTimeout(function() {
                        window.location.href = 'home.html';
                    }, 5000);
                }
                else{
                    $("div#loginSucces").html(data.Message).attr("class","alert alert-success").css("display","block");
                    setTimeout(()=>{
                      $("div#loginSucces").fadeOut();
                    },2000)
                    window.setTimeout(function() {
                        window.location.href = 'home.html';
                    }, 5000);
                }
            },
            error: function(){
                // alert("failure");
            }
        });
    });

})
