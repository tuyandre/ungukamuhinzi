$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    let farmid = localStorage.getItem("Farm-id");

var endpoint = "http://178.79.188.142:90/api/";
$(document).on('click', 'button.btn.btn-success1.btn-lg.col-md-offset-3.Delivered-btn12.text-black', function (e) {  
e.preventDefault();
    // let farmidd1r=$(this).data("id");
    let orderidw=$(this).data("id");
    var res = orderidw.split("$");
    console.log(res[0]);
    console.log(res[1]);


    let Cancel={
        stocid:res[0],
        orderid:res[1],     
    }
    if (confirm('Are you sure you want to cancel this order?')) {
    $.ajax({
        url:endpoint+"cancel",
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

})