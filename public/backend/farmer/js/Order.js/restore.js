$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    let farmid = localStorage.getItem("Farm-id");
    // <!- SHOW EXPENSES OF ONE FARM---------->

var endpoint = "http://178.79.188.142:90/api/";
$(document).on('click', 'button#order-success-button11ds', function (e) {
e.preventDefault();

    let orderidw=$(this).data("id");
    console.log(orderidw);
    var res = orderidw.split("$");
    console.log(res[0]);
    console.log(res[1]);

    let Cancel={
        orderid:res[0],
        stocid:res[1],     
    }
    if (confirm('Are you sure you want to restore this order??')) {
    $.ajax({
        url:endpoint+"restore",
        data:Cancel,
        type:"POST",
        dataType:"JSON",
        beforeSend:function(xhr){
            xhr.setRequestHeader('Authorization','Bearer'+token);
        },
        success:function(data){
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