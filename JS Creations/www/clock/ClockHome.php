<html>
<head>
<script type="text/javascript">
function cl(cl) 
{
var e=prompt('Copy and paste the following code into your websites HTML: ',document.getElementById(cl).innerHTML);
} 
</script>
<?php
require "../layout/head.php";
?>
</head>
<body>
<?php
require "../layout/layout.php";
?>
<center><h1>Customisable Clock</h1></center>
<div style="float:left; border:2px solid black; margin:10px; padding:4px; width:200px; text-align:center;">
By <a href="javascript:;" onclick="alert('The user selected is the owner of this website.')">Anthony Smith</a><br />
rating: <?php  
$file=fopen("rating.txt","r");
$f="";
while(!feof($file))
  {
  $f=$f."".fgets($file);
  }
fclose($file);
if ($f!="")
{
$exp=explode(",",$f);
$avg= round(array_sum($exp) / count($exp),0);
$avgacc= round(array_sum($exp) / count($exp),1);
for ($i=1; $i<=$avg; $i++)
{
echo "<img src='../img/star.png' width='12' height='12' title='rated ".$avgacc."/5' />";
}
for ($i=$avg; $i<5; $i++)
{
echo "<img src='../img/star2.png' width='12' height='12' title='rated ".$avgacc."/5' />";
}
echo " (".count($exp).")";
}
else
{
echo"N/A";
}
?><br /><br />
[reviews] [rate] [share]
</div>
<p>Help your visitors with the time by adding a clock on your home page! Its easy and simple to embed and
can be modified with zero coding knowledge! Simply change the fields however you wish and the clock will be 
created for you. Upload your own background or use our template to create a unique clock that is right for your web page.
You can also change the refresh speed so that your web page doesn't run too slowly (1000 = 1 second). Is the clock too
big or small for your web page? Don't worry. We also have a resize option!</p>
<p><h4>Examples: </h4></p>
<div style="float:left; text-align:center">
<span id="cl1">
<iframe src="http://localhost/clock/asc.php?zoom=17&image=http://localhost/clock/upload/AnthonySmith/1.PNG&facecolour=none&faceoutlinecolour=none&facewidth=5&bighandsize=220&bighandwidth=15&bighandcolour=black&smallhandsize=150&smallhandwidth=22&smallhandcolour=black&secondhandsize=200&secondhandwidth=8&secondhandcolour=grey&refreshrate=1&centre=black" style="border:0;" width="175" height="175"></iframe></span>
<br />
<a href="javascript:;" onclick="cl('cl1')">[embed]</a>
</div>
<div style="float:left; text-align:center">
<span id="cl2">
<iframe src="http://localhost/clock/asc.php?zoom=17&image=http://localhost/clock/upload/AnthonySmith/2.png&facecolour=white&faceoutlinecolour=black&facewidth=5&bighandsize=490&bighandwidth=15&bighandcolour=white&smallhandsize=300&smallhandwidth=25&smallhandcolour=white&secondhandsize=480&secondhandwidth=8&secondhandcolour=grey&refreshrate=1&centre=?aaaaaa" style="border:0;" width="175" height="175"></iframe></span>
<br />
<a href="javascript:;" onclick="cl('cl2')">[embed]</a>
</div>
<div style="float:left; text-align:center">
<span id="cl3">
<iframe src="http://localhost/clock/asc.php?zoom=8&image=&facecolour=cyan&faceoutlinecolour=blue&facewidth=10&bighandsize=490&bighandwidth=15&bighandcolour=black&smallhandsize=300&smallhandwidth=25&smallhandcolour=black&secondhandsize=480&secondhandwidth=8&secondhandcolour=grey&refreshrate=1&centre=black" style="border:0;" width="85" height="85"></iframe>
</span>
<br />
</div>
<div style="float:left; text-align:center">
<span id="cl4">
<iframe src="http://localhost/clock/asc.php?zoom=8&image=&facecolour=pink&faceoutlinecolour=red&facewidth=10&bighandsize=490&bighandwidth=15&bighandcolour=black&smallhandsize=300&smallhandwidth=25&smallhandcolour=black&secondhandsize=480&secondhandwidth=8&secondhandcolour=grey&refreshrate=1&centre=black" style="border:0;" width="85" height="85"></iframe>
</span>
<br />
</div>
<div style="float:left; width:100%;text-align:center;">
<br /><br /><button onclick="window.location='CreateClock.php'" style="font-size:20px">TRY IT!</button><br /><br />
</div>
<?php
require "../layout/sidebar.php";
?>
</body>
</html>