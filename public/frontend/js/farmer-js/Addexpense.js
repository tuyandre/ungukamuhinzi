$(document).ready(function(){
    let token = localStorage.getItem("Token");
    // console.log(token);
    let Levels = localStorage.getItem("level");
    // console.log(token);  

    var endpoint = "http://178.79.188.142:90/api/";
    // $("").click(function(e){
        $(document).on('click', 'button#lodinBtn1lldf', function (e) {
        e.preventDefault();
        // alert("DONAT");
        var cropform =document.querySelector("input#hiddenCropId1").value;
        var farmId1 =document.querySelector("input#Farm-id1").value;
        var description =document.querySelector("textarea#notes").value;
        var MoneySpent = document.querySelector("input#amount").value;
        var firmTitle =document.querySelector("input#firmTitle").value;
        let addExpenses ={
            cropfarmID:cropform,
            farmID:farmId1,
            description:description,
            moneySpent:MoneySpent,
            titles:firmTitle
        }
        // console.log(farmer1);
        $.ajax({
            url:endpoint+"AddExpense",
            data:addExpenses,
            type:"POST",
            dataType:"JSON",
            beforeSend:function(xhr){
                xhr.setRequestHeader('Authorization','Bearer'+token);
            },
            success:function(data){
                if(data.Message==="You are not allowed to add expenses"){
                    // console.log(data);
                    let message="Please add crop on your farm";
                    $("div#loginSucces").html(message).attr("class","alert alert-danger").css("display","block");
                    setTimeout(()=>{
                      $("div#loginSucces").fadeOut();
                    },3000)
                    window.setTimeout(function() {
                        window.location.href = 'home.html';
                    }, 5000);
                }
                else{
                    // console.log(data);
                    $("div#loginSucces").html(data.Message).attr("class","alert alert-success").css("display","block");
                    setTimeout(()=>{
                      $("div#loginSucces").fadeOut();
                    },3000)
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