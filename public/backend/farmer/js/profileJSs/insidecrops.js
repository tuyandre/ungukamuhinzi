$(document).ready(function(){
    let token = localStorage.getItem("Token");
    // console.log(token);
    let Levels = localStorage.getItem("level");
    // console.log(token);  

    var endpoint = "http://178.79.188.142:90/api/";
    // $("").click(function(e){
        $(document).on('click', 'a#God', function (e) {
        e.preventDefault();
       var Cropid=$(this).data("id");
       console.log(Cropid)
       var res =Cropid.split("$");
       console.log(res[0]);
       console.log(res[1]);

       var topViewDiv = ' <p class="col-md-3  farm-text"><a href="#" class="prev1" id="prev-for-graph"><img class="previous-button" src="img/Chevron.png" alt=""><a href="#">'+res[1]+'</a></p> ';               
       $('#carame').append(topViewDiv);

        let addExpenses1 ={
            cropid:Cropid,
        }
        // console.log(farmer1);
        $.ajax({
            url:endpoint+"insideCrop",
            data:addExpenses1,
            type:"POST",
            dataType:"JSON",
            beforeSend:function(xhr){
                xhr.setRequestHeader('Authorization','Bearer'+token);
            },
            success:function(data){
                console.log(data.Data);
                let insert=data.Data;
                console.log(insert.farms)
                let insert1=insert.farms;
                console.log(insert1);
                var topViewDiv = '<div class="row rightp"><p class="col-md-5 col-md-offset-1  farm-text"><a href="#">PROFIT : '+insert.profit+' Rwf</a></p><p class="col-md-offset-1  farm-text1"><a href="#" class="active">Expenses; '+insert.Total_expenses+' rwf <br />harvest: '+insert.haverst_quantity_kg+'kg </a></p><p class="col-md-offset-1  farm-text1"><a href="#" id="info-of-farmer">units sold: '+insert.Sold_unity_kg+' kg <br />Sales:'+insert.Soles_money+' Rwf</a></p></div>';                
                $('#horinzintal-bar-show1').append(topViewDiv);
                for(let f in insert1){
                    // var finalData1 = finalData.crops;
                   console.log(insert1[f].UPI);
                var topViewDiv = '<div class="col-md-6 "><div class="farm-upi-coffe"><div class="col-md-6"><h5>Plot UPI '+insert1[f].UPI+' <br /><br /></h5><p>Expenses: '+insert1[f].expenses+'Rwf</p><p>Harvest: '+insert1[f].quantity+' Kg</p></div></div></div>'; 
                $('#insidecrops').append(topViewDiv);
        
            }

                $("div#loginSucces").html(data.Message).attr("class","alert alert-success").css("display","block");
                setTimeout(()=>{
                  $("div#loginSucces").fadeOut();
                },2000)
                // window.location.replace("home.html");                                                                           
            }
            ,
            complete:function(){
            }
        })
        .fail((x,j,s)=>{
console.log(x,j,s);
        })
    });
});