$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    console.log(token);
// <!- VIEW SINGLE DETAILS OF FARMER----------->

var endpoint = "http://178.79.188.142:90/api/";
$.ajax({
    url:endpoint+"ShowFarm",
    type:"POST",
    dataType:"JSON",
    beforeSend:function(xhr){
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        console.log(data); 

    }
    ,
    complete:function(){
    }
})
.fail((x,j,s)=>{
console.log(x,j,s);
})

// <!- END OF VIEW SINGLE DETAILS OF FARMER----------->





})
