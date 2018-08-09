// scroll to top
		$(document).ready(function(){
			
			// go to top from bottom
			$(window).scroll(function(){
			if($(this).scrollTop()>100){
				$('#scrollToUp').fadeIn();
			}
			else{
				$('#scrollToUp').fadeOut();
			}
			});
			$('#scrollToUp').click(function(){
				$("html,body").animate({scrollTop:0},1500);
			});
			
			// class six toggle button
			$("#class-six-toggle").click(function(){
				$(".class-six-course-list").slideToggle(800);
			});
			
			// class seven toggle button
			$("#class-seven-toggle").click(function(){
				$(".class-seven-course-list").slideToggle(800);
			});
			
			// class eight toggle button
			$("#class-eight-toggle").click(function(){
				$(".class-eight-course-list").slideToggle(800);
			});
			
			// ss-course-list toggle
			$("#nt-cl-toggle").click(function(){
				$("#ss-cl-hideShow").toggle(800);
			});
			
			// science-course-title toggle
			$("#ss-cl-stoggle").click(function(){
				$(".science-course-list").slideToggle();
			});
			
			// business-course-title toggle
			$("#ss-cl-btoggle").click(function(){
				$(".business-course-list").slideToggle();
			});
			
			// arts-course-title toggle
			$("#ss-cl-atoggle").click(function(){
				$(".arts-course-list").slideToggle();
			});
			
			// higher secondary science course list
			$("#hs-scl-toggle").click(function(){
				$(".hs-science-course-list").slideToggle();
			});
			
			// higher secondary business course list
			$("#hs-bcl-toggle").click(function(){
				$(".hs-business-course-list").slideToggle();
			});
			
			// higher secondary arts course list
			$("#hs-acl-toggle").click(function(){
				$(".hs-arts-course-list").slideToggle();
			});
			
			// university engineering faculty department list
			$("#eng-faculty-toggle").click(function(){
				$(".eng-faculty-clist").slideToggle();
			});
			
			// university cse department course list
			$("#univ-csecl-toggle").click(function(){
				$(".eng-faculty-cse-clist").slideToggle();
			});
			
			// university business faculty department list
			$("#business-faculty-toggle").click(function(){
				$(".business-faculty-dept-list").slideToggle();
			});
			
			// university marketing  department course list
			$("#univ-mktcl-toggle").click(function(){
				$(".business-faculty-mkt-clist").slideToggle();
			});
			
			// university arts faculty department list
			$("#arts-faculty-toggle").click(function(){
				$(".arts-faculty-dept-list").slideToggle();
			});
			
			// university marketing  department course list
			$("#univ-bngcl-toggle").click(function(){
				$(".arts-faculty-bng-clist").slideToggle();
			});
			
			
			// close slogan toggle
			$("#close-slogan").click(function(){
				$(".slogan").slideToggle(800);
				$(".slogan").css({"visibility":"hidden"});
			});
			
			// right sidebar image close
			$("#right-sidebar-img-close-icon").click(function(){
				$(".subject-page-right-sidebar").slideToggle(800);
				$(".subject-page-right-sidebar").css({"visibility":"hidden"});
			});
			
			// hot-questions show
			$("#hot").click(function(){
				$(this).css({"background":"lightblue"});
				$(".hot-questions").show();
				$(".main-section-recent-question").hide();
				$(".pagination").hide();
			});
			
			// large search box
			$("#large-search-box").click(function(){
				$(".subject-search-section").hide();
				$(".search-box").show();
			});
			$(".main-body").click(function(){
				$(".search-box").hide();
				$(".subject-search-section").show();
			});
			
			// mobile search box
			$("#mobile-search-box").click(function(){
				$(".search-box").show();
			});
			
			// notification 
			$("#notification").click(function(){
				$(".notification").slideToggle(400);
			});
			
			// live user search 
			$("#live_search").keyup(function(){
						var txt = $(this).val();
						$(".user-details").css({"display":"none"});
						if(txt != ""){
							$.ajax({
								url:"liveSearch.php",
								method:"post",
								data:{'search':txt},
								dataType:"text",
								success:function(data){
									$(".result").html(data);
								}
							});
						}
					});
					
			// form validation strat here
			$("#password").focusout(function(){
				check_password();
			});
			$("#confirm_password").focusout(function(){
				match_confirm_password();
			});
			$("#email").focusout(function(){
				check_email();
			});
			
			// password validation
			function check_password(){
				var password_length = $("#password").val().length;
				if(password_length<8){
					$("#password_error_msg").html("Password should be min 8 characters");
					$("#password_error_msg").show();
				}
				else{
					$("#password_error_msg").hide();
				}
			}
			
			// match confirm password
			function match_confirm_password(){
				var password = $("#password").val();
				var confirm_password = $("#confirm_password").val();
				if(password!=confirm_password){
					$("#confirm_password_msg").html("Password did not match");
					$("#confirm_password_msg").show();
				}
				else{
					$("#confirm_password_msg").hide();
				}
			}
			
			// email validation
			function check_email(){
				var pattern = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
				if(!pattern.test($("#email").val())){
					$("#email_error_msg").html("Invalid Email");
					$("#email_error_msg").show();
				}
				else{
					$("#email_error_msg").hide();
				}
			}
			
		});