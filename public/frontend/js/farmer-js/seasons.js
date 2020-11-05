$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    console.log("Season:"+token);
    // <!- SELECT ALL SEASONS------------>

var endpoint = "http://178.79.188.142:90/api/";
$.ajax({
    url:endpoint+"Season",
    type:"POST",
    dataType:"JSON",
    beforeSend:function(xhr){
        
        xhr.setRequestHeader('Authorization','Bearer'+token);
    },
    success:function(data){
        var finalData = data.Data;
        for(let dt in finalData){
        //    console.log(finalData[dt].id);
           $("#season-id").append(" <option value="+finalData[dt].id+"> "
           +finalData[dt].seasonLenght+"</option>"
   
           );
        }

    }
    ,
    complete:function(){
    }
})
.fail((x,j,s)=>{
console.log(x,j,s);
})


// <!- END--- SELECT ALL SEASONS------------>
})