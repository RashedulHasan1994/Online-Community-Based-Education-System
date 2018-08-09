<script language="JavaScript1.2">

//IFRAME TICKER- By Dynamic Drive (http://www.dynamicdrive.com)

//configure delay between changing messages (3000=3 seconds)
var delay=3000

var ie4=document.all

var curindex=0
var totalcontent=0

function get_total(){
if (ie4){
while (eval("document.all.content"+totalcontent))
totalcontent++
}
else{
while (document.getElementById("content"+totalcontent))
totalcontent++
}
}

function contract_all(){
for (y=0;y<totalcontent;y++){
if (ie4)
eval("document.all.content"+y).style.display="none"
else
document.getElementById("content"+y).style.display="none"
}
}

function expand_one(which){
contract_all()
if (ie4)
eval("document.all.content"+which).style.display=""
else
document.getElementById("content"+which).style.display=""
}

function rotate_content(){
get_total()
contract_all()
expand_one(curindex)
curindex=(curindex<totalcontent-1)? curindex+1: 0
setTimeout("rotate_content()",delay)
}

window.onload=rotate_content

</script>

<BODY bgColor=lightgreen>

<!--ADD YOUR TICKER CONTENT BELOW, by wrapping each one inside a <DIV> as shown below.-->
<!--For each DIV, increment its ID attribute for each additional content (ie: "content1", "content2" etc)-->


<div id="content0" style="display:'';margin-top:-10px;">

<!-- ADD TICKER's CONTENT #1 HERE--------------------->

<h3 align="center"><strong><font face="Verdana"><a href="" target="_top" style="text-decoration:none;">ওয়ার্ডপ্রেস শিখতে এখানে ক্লিক করুন...</a></font></strong></h3>

<!-- END CONTENT #1----------------->

</div>

<div id="content1" style="display:none;margin-top:-10px;">

<!-- ADD TICKER's CONTENT #2 HERE--------------------->

<h3 align="center"><strong><font face="Verdana"><a href="" target="_top" style="text-decoration:none;color:#006699;">এন্ড্রয়েডের যাবতীয় কিছু এখানেই...</a></font></strong></h3>

<!-- END CONTENT #2----------------->

</div>

<div id="content2" style="display:none;margin-top:-10px;">

<!-- ADD TICKER's CONTENT #3 HERE--------------------->

<h3 align="center"><strong><font face="Verdana"><a href="" target="_top" style="text-decoration:none;">পিএইচপি শিখতে এখানে ক্লিক করুন...</a>&nbsp;</font></strong></h3>

<!-- END CONTENT #3----------------->

</div>

<div id="content3" style="display:none;margin-top:-10px;">

<!-- ADD TICKER's CONTENT #4 HERE--------------------->

<h3 align="center"><font face="Verdana"><strong><a href="#" target="_top" style="text-decoration:none;color:tomato;">ফটোশপ শিখতে  এখানে ক্লিক করুন...</a></strong></font></h3>

<!-- END CONTENT #4----------------->

</div>

