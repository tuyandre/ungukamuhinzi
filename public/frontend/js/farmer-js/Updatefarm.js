$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    console.log(token);   
    var endpoint = "http://178.79.188.142:90/api/";
    // $("").click(function(e){
        $(document).on('click', 'button#lodwinBtn11111111', function (e) {
        e.preventDefault();
        // alert("DONAT");
        var farmId1 =document.querySelector("input#upiupdate").value;
        var description =document.querySelector("input#locationupdate").value;
        var MoneySpent = document.querySelector("input#plotsizeupdate").value;
        var id = document.querySelector("input#farmid").value;
        
        let addExpenses ={
            UPI:farmId1,
            location:description,
            plotsize:MoneySpent,
            farmid:id
        }
        console.log(addExpenses);
        $.ajax({
            url:endpoint+"UpdateFarms",
            data:addExpenses,
            type:"POST",
            dataType:"JSON",
            beforeSend:function(xhr){
                xhr.setRequestHeader('Authorization','Bearer'+token);
            },
            success:function(data){
                console.log(data);
                $("div#loginSucces").html(data.Message).attr("class","alert alert-success").css("display","block");
                setTimeout(()=>{
                  $("div#loginSucces").fadeOut();
                },2000)
            //    $("#villaModal").hide();
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