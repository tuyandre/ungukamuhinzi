$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    $('#bestvision').show();

var endpoint = "/Farmer/";
$.ajax({
    url:endpoint+"ShowFarmer",
    type:"GET",
    dataType:"JSON",
    success:function(data){
        var finalData = data.Data[0];
         console.log(finalData);
        // for(let f in finalData){
        //    console.log(finalData[f].fname);
        var topViewDiv = '<div class="form-group col-xs-6 col-md-1 profile-image"><div class="inner-addon right-addon"><img class="img-rounded top-profile-img" src="'+finalData.photo+'" alt=""></div></div><div class="col-md-3 "><h1 class="col-md-offset-3">'+finalData.fname+'</h1><p class="col-md-offset-3">'+finalData.phone+'</p></div>';
        $('#pic-mustbe-hidden').append(topViewDiv);



        // var imageUrl4 = (finalData.photo == null || finalData.photo == "") ? 'http://res.cloudinary.com/hviewtech/image/upload/c_fit,h_3264,w_4928/jjnrhktxi9qvkr1iofok.png':finalData.photo;
        var topViewDiv = '<a href="profile.html"><img class="image-res" src="'+finalData.photo+'" alt="" style="width:24px; height:24px; border-radius:10px;"> Profile</a>';
        $('.menu-has-children').append(topViewDiv);
        $('#bestvision').hide();


        var topViewDiv = '<div class="modal-header border-bottom-0"><h5 class="modal-title" id="exampleModalLabel"> <span class="font-weight-bold"> Change your personel Information</span></h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form enctype="multipart/form-data" id="form7"><div class="modal-body"><div class="preview1"><img src="'+finalData.photo+'" id="img" width="100" height="100"></div><div class="form-group col-md-offset-5" ><input type="file" id="file" name="file" /><input type="button" class="button" value="Upload" id="but_upload"></div><div class="form-group col-md-6"><input type="text" name="fname" class="form-control my-input" value="'+finalData.fname+'" id="fnames" placeholder="Fname"></div><div class="form-group col-md-6"><input type="text" name="lname"  class="form-control my-input" value="'+finalData.lname+'" id="lnames" placeholder="Lname"></div><div class="form-group col-md-6"><input type="number" name="identity" class="form-control my-input" value="'+finalData.identity+'" id="Identity" placeholder="Identity"></div><div class="form-group col-md-6"><input type="number" name="phone" id="phones1" value="'+finalData.phone+'"  class="form-control my-input1" placeholder="Phone"></div></div><div class="form-group col-md-6" hidden><input type="number" name="farmerid" id="farmerid" value="'+finalData.id+'"  class="form-control my-input1" placeholder="customerid"></div><div class="form-group"><button type="button" class="btn btn-success col-md-offset-5" id="changefarmer">Confirm</button></div></div></form> ';
        $('#customerid1').append(topViewDiv);




    }
// }
    ,
    complete:function(){
    }
})
.fail((x,j,s)=>{
console.log(x,j,s);
})

    // <!END-SHOW SINGLE DETAILS OF FARMER------------>
})
