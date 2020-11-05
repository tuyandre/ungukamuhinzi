$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    let farmid = localStorage.getItem("Farm-id");
    // <!- SHOW EXPENSES OF ONE FARM---------->

var endpoint = "http://178.79.188.142:90/api/";
$(document).on('click', 'a#farms11', function (e) {
    let farmidd1=$(this).data("id");
    console.log(farmidd1);
    let farmIdOffermer={
        farmid:farmidd1     
    }
    $.ajax({
        url:endpoint+"ShowFarm",
        data:farmIdOffermer,
        type:"POST",
        dataType:"JSON",
        beforeSend:function(xhr){
            xhr.setRequestHeader('Authorization','Bearer'+token);
        },
        success:function(data){
            console.log(data);
           
            let finalData=data.Data;
            let finalData1=finalData[0].farmcrop;
            console.log(finalData1.cropfarmID);

            
            var topViewDiv = ' <input type="text" name="cropfarmID" id="hiddenCropId1" value="'+finalData1.cropfarmID+'" />';
            $('#hiddencrop').append(topViewDiv); 


             $('#hiddenCropId').val(finalData1.cropfarmID);
            //    var imageUrl2 = (finalData1.cropname == null || finalData1.cropname == "") ? 'No crop available':cropfarmID.cropname;
            var imageUrl1 = (finalData1.cropname == null || finalData1.cropname == "") ? 'No crop available':finalData1.cropname;
                 var topViewDiv = 'Farm UPI  '+finalData[0].UPI+' |  '+imageUrl1+'';
                $('.stock-upiforhome').append(topViewDiv);
                localStorage.setItem("CropFarmId",finalData1.cropfarmID);

                var topViewDiv = '<div class="col-md-3"><p class="card-text">crop type:'+finalData1.cropname+'</p><p class="card-text">Location: '+finalData[0].location+'</p><p class="card-text">UPI: '+finalData[0].UPI+'</p></div><div class="col-md-6 col-md-offset-3" id="donat-left"><p class="card-text">plot size: '+finalData[0].plotsize+'</p><p class="card-text">cycle length:'+finalData1.seasons+'</p><p class="card-text">Status:'+finalData[0].Status+'</p></div><div class="col-md-2 col-sm-offset-5 add-farm"><div class="text-center "><button type="button" class="btn btn-outline-info btn-rounded waves-effect btn-block z-depth-0 my-4" id="lodinBtn111111" type="submit" style="border: 1px solid black"><img src="img/edit1.png" alt="">edit</button></div></div>';
                $('#informationOffarm').append(topViewDiv); 
                
                // localStorage.setItem("farm-id-1",farmidd1);

                // update farm

                var topViewDiv = '<form class="formValidate" id="contactForm" action="#" method="post" name="login"    e.preventDefault(); style="padding: 10px;"><div class="col-md-4"><div class="form-group"><input type="text" id="upiupdate" min="10" name="UPI" value="'+finalData[0].UPI+'" class="form-control my-input" placeholder="crop type"></div><div class="form-group"><input type="text" id="locationupdate" min="10" value="'+finalData[0].location+'" name="location" class="form-control my-input" placeholder="Location"></div></div><div class="col-md-4 col-md-offset-2"><div class="form-group"><input type="text"  id="plotsizeupdate" name="plotsize" value="'+finalData[0].plotsize+'" class="form-control my-input" placeholder="Plot Size "></div><div class="form-group"><input type="text"  id="farmid" name="farmid"  class="form-control my-input" value="'+finalData[0].farmID+'" placeholder="Plot Size "></div></div><div class="col-md-4 col-sm-offset-1 add-farm"><div class="text-center "><button type="button" class="btn btn-success btn-rounded-circle btn-block z-depth-0 my-4" id="lodwinBtn11111111" type="submit">Save change</button></div></div> </form>';
                $('#updatefarm').append(topViewDiv); 
            
        }
        ,
        complete:function(){
        }
        
    })
    .fail((x,j,s)=>{
    console.log(x,j,s);
    })
        $(".combine").hide();
        $(".Expenses-info").show();
})

// <!- END---SHOW EXPENSES OF ONE FARM------------>
})