$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    console.log(token);
// <!- VIEW SINGLE DETAILS OF FARMER----------->

var endpoint = "/Farmer/";
$.ajax({
    url:endpoint+"viewFarms",
    type:"GET",
    dataType:"JSON",
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
