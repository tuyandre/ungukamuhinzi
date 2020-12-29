$(document).ready(function(){
let Levels = localStorage.getItem("level");
let token = localStorage.getItem("Token");
console.log(token);   
var endpoint = "http://178.79.188.142:90/api/";
$(document).on('click', 'a#logout', function (e) {  
    let Toka={
        token:token
    }

    // alert('donat weeeeeeeeeeee');
    $.ajax({
        url:endpoint+"logout",
        data:Toka,
        type:"POST",
        dataType:"JSON",
        beforeSend:function(xhr){
            xhr.setRequestHeader('Authorization','Bearer'+token);
        },
        success:function(data){
            console.log(data);
            window.location.replace("../../index.html");
                                
        }
        ,
        complete:function(){
        }
        
    })
    .fail((x,j,s)=>{
    console.log(x,j,s);
    })
})

// <!- END---SHOW EXPENSES OF ONE FARM------------>
})