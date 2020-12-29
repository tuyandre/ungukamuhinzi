@extends('backend.farmer.shared.master')

@section('title','Home')
@section('css')

@endsection
@section('content')

    <div class="container combine">
        <!-- SEQRCH BOX  -->
        <div class="container">

            <div class="row main-search">

                <div class="form-group col-xs-6 col-md-8 search">
                    <div class="inner-addon right-addon">
                        <i class="glyphicon glyphicon-search"></i>
                        <input type="text" class="form-control" placeholder="Search" />
                    </div>
                </div>
                <div class="form-group col-xs-6 col-md-2 select">
                    <select class="form-control" placeholder="Country">
                        <option value="">All</option>
                        <option value="">Country 1</option>
                        <option value="">Country 2</option>
                    </select>
                </div>
                <div class="form-group col-xs-6 col-md-2 select">
                    <select type="select" class="form-control" placeholder="Country">
                        <option  value="">All</option>
                        <option  value="">Country 1</option>
                        <option  value="">Country 2</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- ADDING BUTTON OF CROPS AND FARM -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <button data-toggle="modal" data-target="#villaModal" style="background: none;border:none;padding:10px;">
                        <img src="{{asset('/backend/img/add.png')}}" alt=""style="width: 30px; height:30px;" >add farm</button>
                </div>
                <div class="col-md-2 col-md-offset-4">

                </div>
            </div>
        </div>

        <!-- ADDING BUTTON OF CROPS AND FARM -->



        <!-- FARMS OF THE FARMER -->

        <section class="details-card">
            <div class="container">
                <div class="row"  id="farms">
                    <div class="col-md-offset-2" id="spinner1">
                        <img src="{{asset('/backend/img/snip.gif')}}"/></div>
                    <p class="col-md-12 font-weight-bold text-center" id="loginSucces1" style="display: none">

                    </p>



                </div>

            </div>
        </section>




    </div>

    <div class=" container Expenses-info" style="display: none;">
        <div class="col-md-12 bs-example" >
            <div class="row farm-upi">
                <p class="col-md-6  farm-text" id="upi-text"><a href="#" class="prev1">
                        <img class="previous-button"  src="{{asset('/backend/img/Chevron.png' )}}" alt=""></a><a class="stock-upiforhome" href=""> </a></p>
                <p class="col-md-offset-1  farm-text1"><a href="#" id="expenses" class="active">Expenses</a></p>
                <p class="col-md-offset-1  farm-text1"><a href="#" id="info-of-farmer">Information</a></p>
                <p class="col-md-offset-1  farm-text1"><a href="#"  id="varvesr">Harvest</a></p>
                <!-- </div> -->

            </div>
            <p class="text-center text-muted">Total Expenses</p>
            <div class="container">
                <div class="row">
                    <div class="col-md-2" id="add-cropsforfarm">
                        <button data-toggle="modal" data-target="#villaModal1" style="background: none;border:none;padding:10px;">
                            <img src="{{asset('/backend/img/add.png')}}" alt=""style="width: 30px; height:30px;" >add crops</button>
                    </div>
                    <div class="col-md-5 col-sm-offset-1" id="totalExpenses" >

                    </div>
                    <div class="col-md-4">
                        <button data-toggle="modal" data-target="#form" class="pull-right" style="background: none;border:none;padding:10px;">
                            <img src="{{asset('/backend/img/add.png')}}" alt=""style="width: 30px; height:30px;" >Addstock</button>

                    </div>
                </div>
            </div>
            <div class="row best-of-best" id="farms111">


            </div>
            <div class="row best-of-best">
                <div class="col-md-6 col-sm-offset-3">
                    <div class="text-center" id="crops-idOfeachfarm">
                        <button type="button" class="btn btn-success btn-rounded-circle btn-block z-depth-0 my-4" data-toggle="modal" data-target="#myModal" id="lodinBtn1" type="submit">Add Expenses</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class=" container" id="click-info" style="display: none;">
        <div class="col-md-12 bs-example" >
            <div class="row farm-upi">
                <p class="col-md-6  farm-text" id="upi-text"><a href="#" class="prev1"><img class="previous-button"  src="{{asset('/backend/img/Chevron.png')}}" alt=""></a>
                    <a class="stock-upiforhome" href=""> </a></p>
                <p class="col-md-offset-1  farm-text1"><a href="#" id="expenses" class="active">Expenses</a></p>
                <p class="col-md-offset-1  farm-text1"><a href="#" id="info-of-farmer">Information</a></p>
                <p class="col-md-offset-1  farm-text1"><a href="#"  id="varvesr">Harvest</a></p>
                <!-- </div> -->

            </div>
            <div class="card-body" id="info-body1">
                <p class="text-center" style="color: black">138 days remaining</p>
                <img class="col-md-12" src="{{asset('/backend/img/progress  bar.png')}}" alt="" style="height: 5px;">
                <h5 class="card-title"></h5>
                <div class="container" id="informationOffarm" >



                </div>
            </div>
        </div>

    </div>


    <!-- EDITING OF FORM HERE -->


    <div class=" container" id="click-info11" style="display: none;">
        <div class="col-md-12 bs-example" >
            <div class="row farm-upi">
                <p class="col-md-6  farm-text"><a href="#" class="prev1">
                        <img class="previous-button"  src="{{asset('/backend/img/Chevron.png')}}" alt=""></a><a class="stock-upiforhome" href=""> </a></p>
                <p class="col-md-offset-1  farm-text1"><a href="#" id="expenses" class="active">Expenses</a></p>
                <p class="col-md-offset-1  farm-text1"><a href="#" id="info-of-farmer">Information</a></p>
                <p class="col-md-offset-1  farm-text1"><a href="#"  id="varvesr">Harvest</a></p>
                <!-- </div> -->

            </div>
            <form id="msform">
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active"></li>
                    <li></li>
                    <li></li>
                </ul>
                <!-- fieldsets -->
                <fieldset>
                    <h3 class="fs-subtitle">how much have you made?</h3>
                    <input type="text" name="phone" placeholder="Phone" />
                    <div class="input-group">
                        <div class="checkbox">
                            <label>
                                <input id="login-remember" type="checkbox" name="remember" value="1"> Reset the cycle
                            </label>
                        </div>
                    </div>
                    <input type="button" name="next" class="next action-button" value="Next" />
                </fieldset>
                <fieldset>
                    <h3 class="fs-subtitle">Add Picture</h3>
                    <input type="text" name="twitter" placeholder="Twitter" />
                    <input type="button" name="previous" class="previous action-button" value="back" />
                    <input type="button" name="next" class="next action-button" value="skip" />
                </fieldset>
                <fieldset>
                    <div class="card mwami">
                        <div class="row" >
                            <div class="card-body">
                                <div class="col-md-8">
                                    <p class="text-muted pull-left">Season Length (days)</p>
                                </div>
                                <div class="col-md-3">
                                    <p class="font-weight-bold pull-right">154</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="text-muted pull-left" >Total expenses(Rwf)</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="font-weight-bold pull-right">10,000</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="text-muted pull-left">harvest(Kg)</p>
                                </div>
                                <div class="col-md-3">
                                    <p class="font-weight-bold pull-right">520</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="phone" class="wizard-in" id="" placeholder="What is your Expected Profit?(Rwf)"/>
                    <input type="button" name="previous" class="previous action-button" value="back" />
                    <input type="submit" name="submit" class="submit action-button" value="skip" />
                </fieldset>
            </form>
        </div>

    </div>








    <!-- EDITING TO SEE HOW IT WORKS WELL -->

    <div class=" container" id="click-info1"  style="display: none;">
        <div class="col-md-12 bs-example" >
            <div class="row farm-upi">
                <p class="col-md-6  farm-text"><a href="#" class="prev1"><img class="previous-button"  src="img/Chevron.png" alt=""></a><a href=""> Farm UPI  214 | Maize</a></p>
                <p class="col-md-offset-1  farm-text1"><a href="#" id="expenses" class="active">Expenses</a></p>
                <p class="col-md-offset-1  farm-text1"><a href="#" id="info-of-farmer">Information</a></p>
                <p class="col-md-offset-1  farm-text1"><a href="#"  id="varvesr">Harvest</a></p>
                <!-- </div> -->

            </div>
            <div class="card-body" id="info-body11">
                <p class="text-center" style="color: black">138 days remaining</p>
                <img class="col-md-12" src="{{asset('/backend/img/progress  bar.png')}}" alt="" style="height: 5px;">
                <h5 class="card-title"></h5>
                <div class="container" id="updatefarm">
                    <!-- <form class="formValidate" id="contactForm" action="#" method="post" name="login"    e.preventDefault(); style="padding: 10px;">
                            <div class="col-md-4">
                                    <div class="form-group">
                                            <input type="text" id="upiupdate" min="10" name="UPI" class="form-control my-input" placeholder="crop type">
                                         </div>
                                         <div class="form-group">
                                                <input type="text" id="locationupdate" min="10" name="location" class="form-control my-input" placeholder="Location">
                                             </div>
                              </div>
                              <div class="col-md-4 col-md-offset-2">
                                    <div class="form-group">
                                            <input type="text"  id="plotsizeupdate" name="plotsize"  class="form-control my-input" placeholder="Plot Size ">
                                    </div>
                                    <div class="form-group">
                                       <input type="text"  id="farmid" name="farmid"  class="form-control my-input" placeholder="Plot Size ">
                                    </div>
                              </div>
                              <div class="col-md-4 col-sm-offset-4 add-farm">
                               <div class="text-center ">
                                       <button type="button" class="btn btn-success btn-rounded-circle btn-block z-depth-0 my-4" id="lodwinBtn11111111" type="submit">Save change</button>
                                </div>
                           </div>
                         </form>               -->
                </div>
            </div>
        </div>

    </div>


    <div class=" container" id="click-info1JKDSLKJKLDS" style="display: none;">
        <!-- <div class="row"> -->
        <div class="col-md-12 cards-info" >
            <div class="card info-info col-md-12">
                <div class="row farm-upi1">
                    <p class="col-md-5 col-md-offset-1  farm-text"><a href="#">Farm UPI  214 | Maize</a></p>
                    <p class="col-md-offset-1  farm-text1"><a href="#" id="expenses" class="active">Expenses</a></p>
                    <p class="col-md-offset-1  farm-text1"><a href="#" id="info-of-farmer">Information</a></p>
                    <p class="col-md-offset-1  farm-text1"><a href="#" id="varvesr">Harvest</a></p>
                    <!-- </div> -->

                </div>
                <div class="card-body" id="info-body11">
                    <p class="text-center" style="color: black">138 days remaining</p>
                    <img class="col-md-12" src="{{asset('/backend/img/progress  bar.png')}}" alt="" style="height: 5px;">
                    <h5 class="card-title"></h5>
                    <div class="container " >
                        <form class="formValidate" id="contactForm" action="#" method="post" name="login"    e.preventDefault();>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" placeholder="Country">
                                        <option value="">Crop type</option>
                                        <option value="">Country 1</option>
                                        <option value="">Country 2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="" min="10" name="phone" id="phone111"  class="form-control my-input" placeholder="Location">
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <input type="number"  id="repeatpassword111" name="repeatpassword"  class="form-control my-input" id="email111" placeholder="Plot Size ">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="locationfarm" min="10" name="phone" id="phone"  class="form-control my-input" placeholder="Season Lenght (months)">
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-4 col-sm-offset-4 add-farm">
                        <div class="text-center ">
                            <button type="button" class="btn btn-success btn-rounded-circle btn-block z-depth-0 my-4" id="lodinBtn111" type="submit">Save change</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->

    </div>

    <!-- ADDING NEW FARM -->
    <div class="modal bestmodel" id="villaModal" >
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-center">CREATE NEW FARM</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="background: white;">
                    <div class="col-md-9 AddNewfarm col-md-offset-1">
                        <div class="myform form ">
                            <form class="formValidate AddNewfarm" id="contactForm" action="#" method="post" name="login"    e.preventDefault();>
                                <div class="form-group">
                                    <input type="text"  name="UPI" id="phone1100"  class="form-control AddNewfarm" placeholder="UPI">
                                </div>
                                <div class="form-group">
                                    <input type="text"  id="repeatpassword11000" name="location"  class="form-control AddNewfarm" placeholder="location">
                                </div>
                                <div class="form-group">
                                    <input type="number"  id="repeatpassword11gg00" name="plotsize"  class="form-control AddNewfarm" placeholder="plotsize">
                                </div>
                                <div class="form-group">

                                    <div class="alert alert-success" id="loginSucces" style="display: none">

                                    </div>
                                </div>
                                <div class="col-md-10 col-sm-offset-1">
                                    <div class="text-center AddNewfarm ">
                                        <button type="button" class="btn btn-success btn-block z-depth-0 my-4 btn-register" id="AddNewfarm" type="submit">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                </div>

            </div>
        </div>
    </div>
    <!-- END ADDING NEW FARM -->


    <!-- MODAL OF ADDING CROPS -->

    <div class="modal " id="form">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Add Item In Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group" hidden>
                            <input type="number" class="form-control" id="email1" name="farmID" aria-describedby="emailHelp" placeholder="farmID">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="price" id="price" placeholder="Price/Kg">
                        </div>
                        <div class="form-group" hidden>
                            <input type="number" class="form-control" name="status" id="Status" value="0" placeholder="Status">
                        </div>
                        <div class="form-group" hidden>
                            <input type="text" id="hiddenCropId"/>
                        </div>
                        <div class="form-group">
                            <div class="alert alert-success" id="loginSucces" style="display: none">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                        <button type="button" class="btn btn-success col-md-6" id="addinstock">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!-- END MODAL OF ADDING CROPS -->


    <div class=" container" id="click-info1" style="display: none;">
        <!-- <div class="row"> -->
        <div class="col-md-12 cards-info" >
            <div class="card info-info col-md-12">
                <div class="row farm-upi1">
                    <p class="col-md-5 col-md-offset-1  farm-text"><a href="#">Farm UPI  214 | Maize</a></p>
                    <p class="col-md-offset-1  farm-text1"><a href="#" id="expenses" class="active">Expenses</a></p>
                    <p class="col-md-offset-1  farm-text1"><a href="#" id="info-of-farmer">Information</a></p>
                    <p class="col-md-offset-1  farm-text1"><a href="#" id="varvesr">Harvest</a></p>
                    <!-- </div> -->

                </div>
                <div class="card-body" id="info-body11">
                    <p class="text-center" style="color: black">138 days remaining</p>
                    <img class="col-md-12" src="{{asset('/backend/img/progress  bar.png')}}" alt="" style="height: 5px;">
                    <h5 class="card-title"></h5>
                    <div class="container " >
                        <form class="formValidate" id="contactForm" action="#" method="post" name="login"    e.preventDefault();>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" placeholder="Country">
                                        <option value="">Crop type</option>
                                        <option value="">Country 1</option>
                                        <option value="">Country 2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="" min="10" name="phone" id="phone111"  class="form-control my-input" placeholder="Location">
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <input type="number"  id="repeatpassword111" name="repeatpassword"  class="form-control my-input" id="email111" placeholder="Plot Size ">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="locationfarm" min="10" name="phone" id="phone"  class="form-control my-input" placeholder="Season Lenght (months)">
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-4 col-sm-offset-4 add-farm">
                        <div class="text-center ">
                            <button type="button" class="btn btn-success btn-rounded-circle btn-block z-depth-0 my-4" id="lodinBtn111" type="submit">Save change</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->

    </div>


    <div class="modal" id="myModal" >
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-center" >Add Expenses</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="background: white;">
                    <div class="col-md-12 ">
                        <div class="myform form ">
                            <form action="#" id="form-contro" method="post">
                                @csrf
                                <div class="form-group" hidden>
                                    <input type="text" name="farmID" id="Farm-id1"  class="form-control my-input" placeholder="farmerId">
                                </div>
                                <div class="form-group" id="hiddencrop" hidden>
                                    <!-- <input type="text" id="hiddenCropId1"/> -->
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" name="titles" id="firmTitle"  class="form-control my-input" placeholder="Title of expenses"  required>
                                </div>
                                <div class = "form-group col-md-12 required" id="murenzi">
                                    <textarea class = "form-control " id="notes" name="description" rows = "3" placeholder = "Description" required></textarea>
                                </div>
                                <div class="form-group col-md-12" id="murenzi">
                                    <input type="number" class="form-control" id="amount" name="moneySpent" placeholder="Total amount(Rwf)" required>
                                </div>
                                <div class="form-group col-md-12 required" id="murenzi">
                                    <div class="alert alert-success" id="loginSucces" style="display: none">

                                    </div>
                                </div>

                                <div class="col-md-10 col-md-offset-1">
                                    <div class="" id="crops-idOfeachfarm11">
                                        <button type="button" class="btn btn-success btn-rounded-circle btn-block z-depth-0 my-4"  id="lodinBtn1lldf">Add Expenses</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@endsection
