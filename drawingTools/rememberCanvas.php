<?php
if (!isset($_COOKIE["user"]))
{
$expire=time()+60*60*24*30*12*1000;
setcookie("user", rand(1,10000000000000), $expire);
}
$file0=fopen("img".$_COOKIE["user"].".txt","w");
$sa=fwrite($file0,$_POST["img"]);
fclose($file0);
$file=fopen("img".$_COOKIE["user"].".txt","w");
$img=$_POST["img"];
$orig="test";
$checker2=0;
if (substr_count($img, "!CLEAR!")!=0)
{
$file2=fopen("imgcol".$_COOKIE["user"].".txt","w+");
}
else
{
$file2=fopen("imgcol".$_COOKIE["user"].".txt","a+");
$checker=explode("_",fgets($file2));
$checker2=count($checker);
}
$col=explode("_",fgets($file2).$_POST["colours"]);
$col=array_unique($col);
array_pop($col);
$x=0;
while($col!=null)
{
$cols[$x]=array_shift($col);
$x=$x+1;
}
$y="";
for ($i=1; $i<=$x; $i++)
{
$y=$y."%".($i+$checker2)."=".$cols[$i-1]."_";
$img=str_replace($cols[$i-1],"%".($i+$checker2),$img);
}
$s=fwrite($file2,$y);
$img=str_replace("!CLEAR!","",$img);
$img=str_replace("ctx.beginPath();","~1",$img);
$img=str_replace("ctx.arc(","~2",$img);
$img=str_replace(",0,2*Math.PI);","~3",$img);
$img=str_replace("ctx.fillStyle=","~4",$img);
$img=str_replace(";ctx.fill();","~5",$img);
$img=str_replace("~5~1","~6",$img);
$img=str_replace("~1~2","~7",$img);
$img=str_replace("~3~4","~8",$img);
for ($e=0; $e<=$x; $e++)
{
$img=str_replace("~8%".$e."~6~2","¬".$e,$img);
}
echo '
	  <body onload="CloseMySelf()">
	  <script>
	  function CloseMySelf() {
    try {
        window.opener.HandlePopupResult("size: '.$sa.' bytes \rcompressed:'.(fwrite($file,$img)+$s).'");
    }
    catch (err) {}
   
    return false;
}
	  </script>
	  ';
fclose($file2);
fclose($file);
?>