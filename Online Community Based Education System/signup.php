<?php
	include_once("lib/Session.php");
	Session::sessionStart();
?>
<?php
    include_once("lib/Database.php");
	$db = new Database();
?>
<?php include_once("inc/header.php"); ?>
	<br>
	<div class="container signup-form">
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6 col-xs-12">
				<?php
					if(isset($_POST['signup'])){
						$insert = $db -> user_registration($_POST);
						if($insert){
							echo "<div class='col-lg-12 singup-success'>";
							echo "<h6>আপনি সফলভাবে রেজিস্টেশন সম্পন্ন করেছেন....</h6>";
							echo "</div>";
						}
					}
				?>
				<h3>সাইন আপ</h3>
				<div class="divider"></div>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group form-style">
						<div class="col-lg-3 col-xs-12">
							<label class="control-label">পূর্ণ নাম <span class="text-danger">*</span></label>
						</div>
						<div class="col-lg-9 col-xs-12">
							<input type="text" name="full_name" id="user_name" required placeholder="আপনার পূর্ণ নাম লিখুন" class="form-control col-lg-4"/>
						</div>
					</div>
					<div class="form-group form-style">
						<div class="col-lg-3">
							<label class="control-label ">ইমেইল <span class="text-danger">*</span></label>
						</div>
						<div class="col-lg-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input type="email" name="email" id="email" required placeholder="আপনার ইমেল আইডি লিখুন" class="form-control col-lg-4"/>
							</div>
							<h6 id="email_error_msg" style="color:red;font-size: 14px;"></h6>
						</div>
					</div>
					<div class="form-group form-style">
						<div class="col-lg-3">
							<label class="control-label ">পাসওয়ার্ড <span class="text-danger">*</span></label>
						</div>
						<div class="col-lg-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" name="password" id="password" required placeholder="পাসওয়ার্ড নির্বাচন করুন" class="form-control col-lg-4"/>
							</div>
							<h6 id="password_error_msg" style="color:red;font-size: 14px;"></h6>
						</div>
					</div>
					<div class="form-group form-style">
						<div class="col-lg-3">
							<label class="control-label ">কনফার্ম পাসওয়ার্ড <span class="text-danger">*</span></label>
						</div>
						<div class="col-lg-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" name="con-password" id="confirm_password" required placeholder="আপনার পাসওয়ার্ড নিশ্চিত করুন" class="form-control col-lg-4"/>
							</div>
							<h6 id="confirm_password_msg" style="color:red;font-size: 14px;"></h6>
						</div>
					</div>
					<div class="form-group form-style">
						<div class="col-lg-3">
							<label class="control-label ">ফোন নাম্বার <span class="text-danger">*</span></label>
						</div>
						<div class="col-lg-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone"></i></span>
								<input type="text" name="phone" required placeholder="যেমনঃ ০১৭৫৪৭৫২৮৭৩" class="form-control col-lg-4"/>
							</div>
						</div>
					</div>
					<div class="form-group form-style">
						<div class="col-lg-3">
							<label class="control-label ">ট্যাগ <span class="text-danger">*</span></label>
						</div>
						<div class="col-lg-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-book"></i></span>
								<input type="text" name="tags" required placeholder="যেমনঃ জাভা পিএইচপি " class="form-control col-lg-4"/>
							</div>
						</div>
					</div>
					<div class="form-group form-style">
						<div class="col-lg-3">
							<label class="control-label ">জন্ম তারিখ <span class="text-danger">*</span></label>
						</div>
						<div class="col-lg-9">
							<div class="form-inline">
								<select name="db_day" class="form-control">
									<option value="">Day</option>
									<option value="1" >1 </option><option value="2" >2 </option><option value="3" >3 </option><option value="4" >4 </option><option value="5" >5 </option><option value="6" >6 </option><option value="7" >7 </option><option value="8" >8 </option><option value="9" >9 </option><option value="10" >10 </option><option value="11" >11 </option><option value="12" >12 </option><option value="13" >13 </option><option value="14" >14 </option><option value="15" >15 </option><option value="16" >16 </option><option value="17" >17 </option><option value="18" >18 </option><option value="19" >19 </option><option value="20" >20 </option><option value="21" >21 </option><option value="22" >22 </option><option value="23" >23 </option><option value="24" >24 </option><option value="25" >25 </option><option value="26" >26 </option><option value="27" >27 </option><option value="28" >28 </option><option value="29" >29 </option><option value="30" >30 </option><option value="31" >31 </option>
								 </select>
								 <select name="db_month" class="form-control">
									  <option value="">Month</option>
									  <option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
								</select>
								<select name="db_year" class="form-control">
									  <option value="0">Year</option>
									  <option value="1955" >1955 </option><option value="1956" >1956 </option><option value="1957" >1957 </option><option value="1958" >1958 </option><option value="1959" >1959 </option><option value="1960" >1960 </option><option value="1961" >1961 </option><option value="1962" >1962 </option><option value="1963" >1963 </option><option value="1964" >1964 </option><option value="1965" >1965 </option><option value="1966" >1966 </option><option value="1967" >1967 </option><option value="1968" >1968 </option><option value="1969" >1969 </option><option value="1970" >1970 </option><option value="1971" >1971 </option><option value="1972" >1972 </option><option value="1973" >1973 </option><option value="1974" >1974 </option><option value="1975" >1975 </option><option value="1976" >1976 </option><option value="1977" >1977 </option><option value="1978" >1978 </option><option value="1979" >1979 </option><option value="1980" >1980 </option><option value="1981" >1981 </option><option value="1982" >1982 </option><option value="1983" >1983 </option><option value="1984" >1984 </option><option value="1985" >1985 </option><option value="1986" >1986 </option><option value="1987" >1987 </option><option value="1988" >1988 </option><option value="1989" >1989 </option><option value="1990" >1990 </option><option value="1991" >1991 </option><option value="1992" >1992 </option><option value="1993" >1993 </option><option value="1994" >1994 </option><option value="1995" >1995 </option><option value="1996" >1996 </option><option value="1997" >1997 </option><option value="1998" >1998 </option><option value="1999" >1999 </option><option value="2000" >2000 </option><option value="2001" >2001 </option><option value="2002" >2002 </option><option value="2003" >2003 </option><option value="2004" >2004 </option><option value="2005" >2005 </option><option value="2006" >2006 </option>  s</select>
							</div>
						</div>
					</div>
					
					<div class="form-group form-style">
						<div class="col-lg-3">
							<label class="control-label ">সেক্স <span class="text-danger">*</span></label>
						</div>
						<div class="col-lg-9">
							<div class="col-lg-3 gender">
								<div class="col-lg-1">
									<input type="radio" name="sex" value="male"/>
								</div>
								<div class="col-lg-2">
									Male
								</div>
							</div> 
								<div class="col-lg-3 gender">
									<div class="col-lg-1">
										<input type="radio" name="sex" value="female"/>
									</div>
									<div class="col-lg-2">
										Female
									</div>
								</div> 
							
						</div>
					</div>
					
					<div class="form-group form-style">
						<div class="col-lg-3">
							<label class="control-label ">এড্রেস <span class="text-danger">*</span></label>
						</div>
						<div class="col-lg-9">
							<div class="input-group address">
								<span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
								<textarea name="address" class="form-control">
								</textarea>
							</div>
						</div>
					</div>
					<div class="form-group form-style">
						<div class="col-lg-3">
							<label class="control-label ">প্রোফাইল পিকচার <span class="text-danger">*</span></label>
						</div>
						<div class="col-lg-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-upload"></i></span>
								<input type="file" name="picture" class="form-control upload col-lg-4"/>
							</div>
						</div>
					</div>
					<div class="form-group form-style">
						<div class="col-lg-offset-3 col-lg-9 signup">
								<input type="submit" name="signup" value="সাইন আপ" class="form-control col-lg-9 btn btn-success"/>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>

<?php include_once("inc/footer.php"); ?>