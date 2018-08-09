// scroll to top
		$(document).ready(function(){
			
			// option-toggle1 Option_List_1
			$("#option-toggle1").click(function(){
				$(".option-list1").slideToggle(800);
			});
			
			// option-toggle2 Option_List_2
			$("#option-toggle2").click(function(){
				$(".option-list2").slideToggle(800);
			});
			
			// option-toggle3 Option_List_3
			$("#option-toggle3").click(function(){
				$(".option-list3").slideToggle(800);
			});
			
			// option-toggle4 Option_List_4
			$("#option-toggle4").click(function(){
				$(".option-list4").slideToggle(800);
			});
			
			// auto load scnd subject depend on class
			$("#class").change(function(){
				var class_name = $(this).val();
				$.ajax({
					url:"load_scnd_subject.php",
					method:"POST",
					data:{className:class_name},
					dataType:"text",
					success:function(data)
					{
						$("#subject").html(data);
					}
				});
			});
			
		});