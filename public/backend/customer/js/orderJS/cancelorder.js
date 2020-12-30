$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    let farmid = localStorage.getItem("Farm-id");

var endpoint = "http://178.79.188.142:90/api/";
$(document).on('click', 'button.btn.btn-success1.btn-lg.col-md-offset-3.Delivered-btn121.text-black', function (e) {  
e.preventDefault();
// alert("fire");
    // let farmidd1r=$(this).data("id");
    let orderidw=$(this).data("id");
    var res = orderidw.split("$");


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
            // window.location.hash = "#open-conceled3";
                                
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