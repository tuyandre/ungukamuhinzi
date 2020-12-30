$(document).ready(function(){
    let Levels = localStorage.getItem("level");
    let token = localStorage.getItem("Token");
    $("a#bestvision").show();
    var endpoint = "http://178.79.188.142:90/api/";
        $.ajax({
            url:endpoint+"DetailCustomer",
            type: "POST",
            processData: false,
            contentType: false,
            beforeSend:function(xhr){
                xhr.setRequestHeader('Authorization','Bearer'+token);
            },
            success: function(data){
                console.log(data.Data[0]);
                let ClientDetails=data.Data[0]
                console.log(ClientDetails.photo);
                // var imageUrl4 = (ClientDetails.photo == null || ClientDetails.photo == "") ? 'http://res.cloudinary.com/hviewtech/image/upload/c_fit,h_253,w_383/o3t44gsj5umncbtoizr0.png':ClientDetails.photo;
                var topViewDiv = '<a href="profile.html"><img class="image-res" src="'+ClientDetails.photo+'" alt="" style="width: 24px;height: 24px;border-radius: 10px;"> Profile</a>';
                $('.menu-has-children1').append(topViewDiv);
                $("a#bestvision").hide();
               
                var topViewDiv = '<div class="form-group col-xs-6 col-md-1 profile-image"><div class="inner-addon right-addon"><img class="img-rounded top-profile-img" src="'+ClientDetails.photo+'" alt=""></div></div><div class="col-md-3 "><h1 class="col-md-offset-3">'+ClientDetails.fname+'</h1><p class="col-md-offset-3">'+ClientDetails.phone+'</p></div>';
                $('#pic-mustbe-hidden').append(topViewDiv);

                // var topViewDiv = '<div class="form-group col-md-6"><input type="text" name="fname"  class="form-control my-input" id="fnames" value="'+ClientDetails.fname+'" placeholder="Fname"></div><div class="form-group col-md-6"><input type="text" name="lname"  class="form-control my-input" id="lnames" value="'+ClientDetails.lname+'" placeholder="Lname"></div><div class="form-group col-md-6"><input type="number" name="identity" class="form-control my-input" id="Identity" value="'+ClientDetails.identity+'" placeholder="Identity"></div><div class="form-group col-md-6"><input type="number" name="phone" id="phones1"  class="form-control my-input1" value="'+ClientDetails.phone+'" placeholder="Phone"></div><div class="form-group col-md-6"><input type="file" name="photo" id="picture" class="form-control"/></div><div class="form-group col-md-6"><input type="number" name="customerid" id="customerid"  class="form-control my-input1" value="'+ClientDetails.id+'" placeholder="customerid"></div><div class="form-group"><button type="button" class="btn btn-success btn-rounded-circle btn-block z-depth-0 my-4 btn-register" id="lodinBtn011klj" type="submit">Save</button></div>  ';
                // $('#customerid1').append(topViewDiv);

                // remove abave
                var topViewDiv = '<div class="modal-header border-bottom-0"><h5 class="modal-title" id="exampleModalLabel"> <span class="font-weight-bold"></span></h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="panel panel-info"><div class="panel-heading"><div class="panel-title text-center">Update your information</div></div>  <div class="panel-body" ><form  class="form-horizontal" method="post" enctype="multipart/form-data"><div class="preview col-md-offset"><img src="'+ClientDetails.photo+'" id="img" width="100" height="100"></div><div class="form-group col-md-offset" ><input type="file" id="file" name="file" /><input type="button" class="button" value="Upload" id="but_upload"></div><div id="div_id_username" class="form-group required col-md-6"> <div class="controls "><input type="text" name="fname"  class="form-control my-input" value="'+ClientDetails.fname+'" id="fnames" placeholder="Fname"></div></div><div id="div_id_email" class="form-group required col-md-6"><div class="controls"><input type="text" name="lname"  class="form-control my-input" value="'+ClientDetails.lname+'" id="lnames" placeholder="Lname"></div></div><div id="div_id_password1" class="form-group required col-md-6"><div class="controls"> <input type="number" name="identity" class="form-control my-input" value="'+ClientDetails.identity+'" id="Identity" placeholder="Identity"></div></div><div id="div_id_password2" class="form-group required col-md-6"><div class="controls"><input type="number" name="phone" id="phones1" value="'+ClientDetails.phone+'" class="form-control my-input1" placeholder="Phone"></div></div><div id="div_id_password2" class="form-group required col-md-6" hidden><div class="controls"><input type="number" name="customerid" id="customerid" value="'+ClientDetails.id+'" class="form-control my-input1" placeholder="customerid"></div></div><div class="form-group col-md-8 "> <div class="controls col-md-offset-5"><button type="button" class="btn btn-success btn-rounded-circle btn-block z-depth-0 my-4 btn-register" id="lodinBtn011klj" type="submit">Save</button></div></div></form></div></div></div> </div></div>';
                $('#customerid1').append(topViewDiv);


                
                var topViewDiv = '<div class="form-group col-md-6"><input type="text" name="fullname"  class="form-control my-input" id="fnames" value="'+ClientDetails.fname+'" placeholder="Fname"></div><div class="form-group col-md-6"><input type="number" name="phone"  class="form-control my-input" id="phones1" value="'+ClientDetails.phone+'" placeholder="Lname"></div><div class="form-group"><button type="button" class="btn btn-success btn-rounded-circle btn-block z-depth-0 my-4 btn-register" id="lodinBtn011klnj" type="submit">Save</button></div>  ';
                $('#customerid12').append(topViewDiv);
            },
            error: function(){
                // alert("failure");
            }
        });

})
