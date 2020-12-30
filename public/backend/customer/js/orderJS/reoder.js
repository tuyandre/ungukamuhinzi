$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    let farmid = localStorage.getItem("Farm-id");
    // <!- SHOW EXPENSES OF ONE FARM---------->

var endpoint = "http://178.79.188.142:90/api/";
$(document).on('click', 'button#reoder', function (e) {  
e.preventDefault();
    let farmidd1r=$(this).data("id");
    // console.log(farmidd1r);
    let orderidw=$(this).data("id");
    // console.log(orderidw);
    var res = orderidw.split("$");
    console.log(res[0]);
    console.log(res[1]);

    let reoder={
        stocid:res[0],
        orderid:res[1],     
    }
    if (confirm('Are you sure you want to reoder this order?')) {
    $.ajax({
        url:endpoint+"reorder",
        data:reoder,
        type:"POST",
        dataType:"JSON",
        beforeSend:function(xhr){
            xhr.setRequestHeader('Authorization','Bearer'+token);
        },
        success:function(data){
            console.log(data);
            window.location.replace("order.html");
                                
        }
        ,
        complete:function(){
        }
        
    })
    .fail((x,j,s)=>{
    console.log(x,j,s);
    })
}
})

// <!- END---SHOW EXPENSES OF ONE FARM------------>
})