$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    let farmid = localStorage.getItem("Farm-id");
    // <!- SHOW EXPENSES OF ONE FARM---------->

var endpoint = "http://178.79.188.142:90/api/";
$(document).on('click', 'button#order-success-button', function (e) {  
e.preventDefault();
    let farmidd1r=$(this).data("id");
    console.log(farmidd1r);
    let OrderId={
        orderid:farmidd1r     
    }
    if (confirm('Are you sure you want to accept this order??')) {
    $.ajax({
        url:endpoint+"accept",
        data:OrderId,
        type:"POST",
        dataType:"JSON",
        beforeSend:function(xhr){
            xhr.setRequestHeader('Authorization','Bearer'+token);
        },
        success:function(data){
            // console.log(data); 
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