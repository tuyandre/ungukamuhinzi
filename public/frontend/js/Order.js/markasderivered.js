$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    let farmid = localStorage.getItem("Farm-id");
    // <!- SHOW EXPENSES OF ONE FARM---------->

var endpoint = "http://178.79.188.142:90/api/";
$(document).on('click', 'button#order-success-button11', function (e) {
e.preventDefault();
// return confirm("Are you sure you want to accept this order?");

    let Marksdeliver=$(this).data("id");
    // console.log(farmidd1r);
    let DeriveredOrderId={
        orderid:Marksdeliver     
    }
    if (confirm('Are you sure you want to deriver this order??')) {
    $.ajax({
        url:endpoint+"markAsDelivered",
        data:DeriveredOrderId,
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