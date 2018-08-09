<?php
function getBanglaDate($date){
 $engArray = array(
 1,2,3,4,5,6,7,8,9,0,
 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December',
 'am', 'pm'
 );
 $bangArray = array(
 '১','২','৩','৪','৫','৬','৭','৮','৯','০',
 'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর',
 'সকাল', 'দুপুর'
 );
 
 $converted = str_replace($engArray, $bangArray, $date);
 return $converted;
}
 
 
 function getBanglaDigit($data){
	 $engArray  = array(0,1,2,3,4,5,6,7,8,9);
	 $bangArray = array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
	 $converted = str_replace($engArray,$bangArray,$data);
	 return $converted;
 }
?>