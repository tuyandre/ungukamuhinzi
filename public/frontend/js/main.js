$(document).ready(function(){

    // for sign in when you click
    // $("a#sign-in-button").on('click',function(){
    //   $("div#sign-up-panel").hide();
    //   $("div#login-panel").show();
    // });

    // PREVIOUS BUTTON
    $("a.prev").click(function(){
        // alert("yes am donat");
      $(".combine").show();
      $(".Expenses-info").hide();
    });
    $("a.prev1").click(function(){
      // alert("yes am donat");
    $(".Expenses-info").show();
    $("#click-info").hide();
  });



  // logo click
//   $(document).on('click', 'img.image-res1', function (e) {
//     alert("yes am donat");
//     window.location.replace("farmer/farmer/login.html");
// });


// $(document).on('click', 'a#profile', function (e) {
//   // alert("yes am donat");
//   window.location.replace("home.html");
// });





    // for sign up button when you ckick
    // $("button#signup-id1").click(function(){
    //   alert("donat");
    //     $("#signup").hide();
    //     $("#signupPanel").hide();

    //     $("#sign-up-for-verify").show();
    //     $("#loginPanel1").show();
    //   });

    //   for forgot link
    $("#forgot").click(function(){
        $("#loginPanel").hide();
        $("#loginhiden").hide();

        $("#Verfiyforgot").show();
        $("#loginPanel1").show();
      });

          //   for forgot paswword toward reset password
    $("#btnVerify2").click(function(){
        $("#Verfiyforgot").hide();

        $("#passwordReset").show();
      });

                //  reset password for confirming password
    $("#btnVerify").click(function(){
        $("#loginPanel1").hide();
        $("#passwordReset").hide();

        $("#passwordResetConfirm").show();
        $("#loginPanel").show();
      });



                //  FINAL STAGE FOR RETURNING TO HOME
    $("#btnVerify3").click(function(){
        $("#passwordResetConfirm").hide();
        $("#loginPanel").hide();

        $("#loginhiden").show();
        $("#loginPanel").show();
      });



      // WHEN YOU CLICK ON EACH HOME CARD information
      $("#info-of-farmer").click(function(){
          // alert("yes am donat");
        $(".Expenses-info").hide();
        $("#click-info11").hide();
        $("#click-info").show();
      });
      //info for harvest

      $("a#info-of-farmer").click(function(){
        // alert("yes am donat");
      $(".Expenses-info").hide();
      $("#click-info11").hide();
      $("#click-info").show();
    });
            // WHEN YOU CLICK ON EACH HOME CARD expense
            $("a#expenses").click(function(){
              // alert("yes am donat");
            $(".Expenses-info").hide();
            $("#click-info11").hide();
            $("#click-info").hide();
            $(".container.Expenses-info").show();
          });
                // WHEN YOU CLICK ON EACH HOME CARD harvest
      $("a#varvesr").click(function(){
        // alert("yes am donat");
      $(".Expenses-info").hide();
      $("#click-info11").show();
      $("#click-info").hide();
    });




// for form of haverst






            // WHEN YOU CLICK ON EACH HOME CARD
            $(document).on('click', '#lodinBtn111111', function (e) {
            $("#click-info").hide();
            $("#click-info1").show();
          });


            // for order page when you click pending
            // $(document).on('click', 'button#order-success-button', function (e) {
            // $("button#order-success-button").click(function(){
              // alert("yes am donat");
            // $(".combine-order").hide();
            // $("#open-Delivered").hide();
            // $("#open-conceled").hide();
            // $("#open-processing").hide();
            // $(".combine").hide();
            // $("#click-info-order213").show();
          // });


          $("li.pending").click(function(){
            // alert("yes am donat");
            $("#best-card-pending").show();
            // $(".combine").hide();
            $("#open-Delivered").hide();
            $("#open-conceled").hide();
            $("#open-processing").hide();
        });


                      // for order page when you click processing
                      $("li.Processing").click(function(){
                        // alert("yes am donat");
                      $("#best-card-pending").hide();
                      // $(".combine").hide();
                      $("#open-Delivered").hide();
                      $("#open-conceled").hide();
                      $("#open-processing").show();
                    });


                                          // for order page when you click delivered
                                          $("li.Delivered").click(function(){
                                            // alert("yes am donat");
                                          $("#best-card-pending").hide();
                                          $(".combine").hide();
                                          $("#open-processing").hide();
                                          $("#open-conceled").hide();
                                          $("#open-Delivered").show();
                                        });

                                          // for order page when you click conceled
                                          $("li#cancelled").click(function(){
                                            // alert("yes am donat");
                                          $("#best-card-pending").hide();
                                          $("#open-processing").hide();
                                          $("#open-Delivered").hide();
                                          // $(".combine").hide();
                                          $("#open-conceled").show();
                                        });



                                          // PAGE OF PROFILE
                                          $("a#stats").click(function(){
                                            // alert("yes am donat");
                                          $("#pic-mustbe-hidden").hide();
                                          $("#image-mustbe-hidden").hide();
                                          $("#search-mustbe-sisplayed").show();
                                          $("#horizontal-bar").show();
                                          $("#horinzintal-bar-show").show();
                                          $("#image-displayed").show();
                                        });

                                        $("a#delivery").click(function(){
                                        $("#pic-mustbe-hidden").hide();
                                        $("#image-mustbe-hidden").hide();
                                        $(".My-Jesus1").show();
                                        // $("#horinzintal-bar-show").show();
                                        // $("#image-displayed").show();

                                      });
                                      $("#setting").click(function(){
                                        // alert("yes am donat");
                                      $("#pic-mustbe-hidden").hide();
                                      $("#horizontal-bar").hide();
                                      $("#image-mustbe-hidden").hide();
                                      $(".My-Jesus111").show();
                                      // $("#horinzintal-bar-show").show();
                                      // $("#image-displayed").show();

                                    });




                                    // ATHOR PAGE MUST SHOW INFORMATION

                                          // PAGE OF PROFILE1 2ND STEPS
                                          $("#God").click(function(){

                                          $("#pic-mustbe-hidden").hide();
                                          $("#image-mustbe-hidden").hide();
                                          $("#click-info-order111111").show();
                                          $("#horinzintal-bar-show").hide();
                                          $("#image-displayed").hide();
                                          $("#search-mustbe-sisplayed").hide();
                                        });

                                          //  FOR PRIVIOUS BUTTON
                                          $(document).on('click', 'a#prev-for-graph', function (e) {
                                          //  $("a#prev-for-graph").click(function(){
                                            //  alert("doant")
                                            $("div#search-mustbe-sisplayed").show();
                                            $("div#horinzintal-bar-show").show();
                                            // $("#image-mustbe-hidden").show();
                                           $("#image-displayed").show();
                                           $("div#pic-mustbe-hidden").hide();
                                           $("section#image-mustbe-hidden").hide();
                                           $("section#click-info-order111111111").hide();
                                          });

                                          $(document).on('click', 'img.previous-button', function (e) {
                                            e.preventDefault();
                                          // $("").click(function(){
                                            // alert("firing");
                                            $("#pic-mustbe-hidden").show();
                                            $("#click-info-order111111").show();
                                            $("#image-mustbe-hidden").show();
                                           $("#image-displayed").hide();
                                           $("#click-info-order111111").hide();
                                           $("section#click-info-order111111").hide();
                                           $("section#click-info-order111111111").hide();
                                          });

                                          $(document).on('click', 'a#sign-in', function (e) {
                                            // alert("donat");
                                            window.location.replace("login.html");
                                            $("div#sign-up-panel").hide();
                                            $("div#login-panel").show();
                                          })


                                        $("a#God1").click(function(){

                                          $("#pic-mustbe-hidden").hide();
                                          $("#image-mustbe-hidden").hide();
                                          $("#click-info-order111111").show();
                                          $("#horinzintal-bar-show").hide();
                                          $("#image-displayed").hide();
                                          $("#search-mustbe-sisplayed").hide();
                                        });

                                        $(document).on('click', 'a#God', function (e) {
                                        // $("a#God").click(function(){

                                          $("div#horizontal-bar").hide();
                                          $("#pic-mustbe-hidden").hide();
                                          $("#image-mustbe-hidden").hide();
                                          $("#click-info-order111111").show();
                                          $("#horinzintal-bar-show").hide();
                                          $("#image-displayed").hide();
                                          $("#search-mustbe-sisplayed").hide();
                                        });




                                        $("a#God2").click(function(){

                                          $("#pic-mustbe-hidden").hide();
                                          $("#image-mustbe-hidden").hide();
                                          $("#click-info-order111111").show();
                                          $("#horinzintal-bar-show").hide();
                                          $("#image-displayed").hide();
                                          $("#search-mustbe-sisplayed").hide();
                                        });
                                        $("a#God3").click(function(){

                                          $("#pic-mustbe-hidden").hide();
                                          $("#image-mustbe-hidden").hide();
                                          $("#click-info-order111111").show();
                                          $("#horinzintal-bar-show").hide();
                                          $("#image-displayed").hide();
                                          $("#search-mustbe-sisplayed").hide();
                                        });




                                        // $("a#home").click(function(){
                                        //   window.location.replace("home.html");
                                        // });
                                        // $("a#stock").click(function(){
                                        //   window.location.replace("stock.html");
                                        // });
                                        // $("a#order").click(function(){
                                        //   window.location.replace("order.html");
                                        // });
                                        // $("a#feeds").click(function(){
                                        //   window.location.replace("feeds.html");
                                        // });
                                        // $("a#profile").click(function(){
                                        //   window.location.replace("profile.html");
                                        // });




                                        $("#feeds").click(function(){

                                          $(".feeds-pictures").hide();
                                          $(".feeds-pictures1").show();
                                        });



                                          $('.lists li a').click(function(e) {
                                              e.preventDefault();
                                              $('.lists li a').removeClass('active');
                                              $(this).addClass('active');
                                          });

                                      function Animate2id(id) {
                                          // your function stuff
                                      }



                                      // $("#dataTableAdd").DataTable({
                                      //   "bProcessing"  : true,
                                      //   "sProcessing"  : true,
                                      //    "bJQueryUI":true,
                                      //   "bSort":true,
                                      //   "bPaginate":true,
                                      //   "sPaginationType":"full_numbers",
                                      //    "iDisplayLength": 1
                                      // });


















                          $('button#index-button').click(function (e) {
                         if ($('#rdo1').is(':checked')) {
                          localStorage.setItem("farmer-Id",1);
                             window.location.replace("/Ungukamuhinzi/register");
                         }
                         else if ($('#rdo2').is(':checked')) {
                          localStorage.setItem("farmer-Id",2);
                          window.location.replace("/Ungukamuhinzi/register");
                         }
                         $('#mask').hide();
                         $('.window').hide();
                     });

                     $(document).on('click', 'a#sign-in-button', function (e) {
                      window.location.replace("/");
                          });

                          $(document).on('click', 'a#sign-in-button111o', function (e) {
                            window.location.replace("/Ungukamuhinzi/login");
                                });





});
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating;

$(".next").click(function(){
	if(animating) return false;
	animating = true;

	current_fs = $(this).parent();
	next_fs = $(this).parent().next();

	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

	next_fs.show();
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			scale = 1 - (1 - now) * 0.2;
			left = (now * 50)+"%";
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		},
		duration: 800,
		complete: function(){
			current_fs.hide();
			animating = false;
		},
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;

	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();

	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

	previous_fs.show();
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			scale = 0.8 + (1 - now) * 0.2;
			left = ((1-now) * 50)+"%";
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		},
		duration: 800,
		complete: function(){
			current_fs.hide();
			animating = false;
		},
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})

