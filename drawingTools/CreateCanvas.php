<!DOCTYPE html>
<html>
<head>
<style>
button, input{
width:65px;
padding:0;
margin:3px;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
function loaded()
{
var c=document.getElementById("draw");
var ctx=c.getContext("2d");
<?php
if (!isset($_COOKIE["user"]))
{
$expire=time()+60*60*24*30*12*1000;
setcookie("user", rand(1,10000000000000), $expire);
}
$file=fopen("img".$_COOKIE["user"].".txt","r");
$file2=fopen("imgcol".$_COOKIE["user"].".txt","r");
$fi2="";
$img="";
while(!feof($file))
  {
$img=fgets($file);
  }
  $amount=0;
while(!feof($file2))
  {
  $fi2=$fi2.fgets($file2);
  }
$amount=count(explode("_",fgets($file2)))-1;
for ($i=0; $i<=$amount; $i++)
{
$img=str_replace("¬".$i,"~8%".$i."~6~2",$img);
}
$img=str_replace("!CLEAR!","",$img);
$img=str_replace("~6","~5~1",$img);
$img=str_replace("~7","~1~2",$img);
$img=str_replace("~8","~3~4",$img);
$img=str_replace("~1","ctx.beginPath();",$img);
$img=str_replace("~2","ctx.arc(",$img);
$img=str_replace("~3",",0,2*Math.PI);",$img);
$img=str_replace("~4","ctx.fillStyle=",$img);
$img=str_replace("~5",";ctx.fill();",$img);

$col=explode("_",$fi2);
array_pop($col);
$x=0;
while($col!=null)
{
$y=array_shift($col);
$img=str_replace(explode("=",$y)[0],explode("=",$y)[1],$img);
}
echo $img;
fclose($file2);
fclose($file);
?>
}
function saveimg()
{
var c=document.getElementById("draw");
var dataURL = c.toDataURL();
window.open(dataURL,"_blank");
}
function HandlePopupResult(result) {
alert("Changes saved! \r\r "+result+" bytes");
}
function clearimg()
{
document.getElementById('draw').width=document.getElementById('draw').width;
document.getElementById("saveinp").value="!CLEAR!";
}
var brush="16";
var temp="";
var temp2="rgb(0,0,0)";
var colour="rgb(0,0,0)";
function pbrush(size)
{
brush=size;
document.getElementById("colour").style.zoom=size*3.125+"%";
}
$(document).ready(function(){
  $("td").click(function(){
temp=$(this).css("background-color");
temp=temp.replace("rgb(","");
temp=temp.replace(")","");
temp=temp.replace(/ /g,"");
temp=temp.split(",");
temp2=colour.replace("rgb(","");
temp2=temp2.replace(")","");
temp2=temp2.replace(" ","");
temp2=temp2.split(",");
if (temp[0]!="0" && temp!="0,0,0")
{
temp2[0]=temp[0];
}
if (temp[1]!="0" && temp!="0,0,0")
{
temp2[1]=temp[1];
}
if (temp[2]!="0" && temp!="0,0,0")
{
temp2[2]=temp[2];
}

if (temp=="0,0,0")
{
temp2=temp;
}
colour="rgb("+temp2[0]+","+temp2[1]+","+temp2[2]+")";
document.getElementById("colour").style.background=colour;
});
  });
function draw(event,obj)
{
var x=event.clientX;
var y=event.clientY;
var c=document.getElementById("draw");
var ctx=c.getContext("2d");
ctx.beginPath();
ctx.arc(x,y,brush,0,2*Math.PI);
ctx.fillStyle=colour;
ctx.fill();
document.getElementById("saveinp").value=document.getElementById("saveinp").value+'ctx.beginPath();ctx.arc('+x+','+y+','+brush+',0,2*Math.PI);ctx.fillStyle="'+colour+'";ctx.fill();'
document.getElementById('colourrecord').value=document.getElementById('colourrecord').value+colour+"_";

}
function save()
{
var myForm = document.getElementById('save');
myForm.onsubmit = function() {
var w = window.open('about:blank','Popup_Window','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=1,height=1,left = 350,top = 230');
this.target = 'Popup_Window';
}
}
</script>
</head>
<body onload="loaded()" onmousedown="document.getElementById('barr').style.display='none'" onmouseup="save();document.getElementById('barr').style.display='block';" style="padding:0; margin:0;width:640px">
<canvas id="draw" onmousemove="draw(event,this)" width="500" height="500" style="border:1px solid black;float:left"></canvas>

<table style="width:60px;height:410px;float:right; border-collapse:collapse; border:1px solid black">
<?php
  for ($x=0; $x<=255; $x++)
  {
  echo"<td style='background:rgb(".$x.",0,0)'></td>";
  echo"<td style='background:rgb(0,".$x.",0)'></td>";
  echo"<td style='background:rgb(0,0,".$x.")'></td>";
  echo"<td style='background:rgb(".$x.",".$x.",".$x.")'></td>";
  echo"</tr><tr>";
  }
  echo"</tr>";
?>
</table>
<font size="1" style="float:left;display:block"><b>Colour Mixer &rarr;</b><br /><br /><br /></font>
<div style="float:left;width:70px;height:410px">
<center>
<font size=1><b>Clear all:</b></font><br />
<button onclick="clearimg()">clear</button>
<font size=1><b>Brush size:</b></font><br />
<button onclick="pbrush('1')"> 1px</button>
<button onclick="pbrush('2')"> 2px</button>
<button onclick="pbrush('4')"> 4px</button>
<button onclick="pbrush('8')"> 8px</button>
<button onclick="pbrush('16')">16px</button>
<button onclick="pbrush('32')">32px</button>

<form action="remembercanvas.php" id="save" method="post">
<input type="hidden" name="img" id="saveinp" value='<?php
$file=fopen("img".$_COOKIE["user"].".txt","r");
while(!feof($file))
  {
  echo fgets($file);
  }
fclose($file);
?>' /><input type="hidden" id="colourrecord" name="colours" />
<font size=1><b>Save:</b></font><br />
<input onclick="save()" type="submit" value="Save">
</form>
<input onclick="saveimg()" type="button" value="download">
<br /><br /><br /><div id="colour" style="width:64px;height:64px; zoom:50%; background:black; border-radius:32px;"></div>
</center>
</div>

<div id="barr" style="position:absolute;top:0;left:0;width:503px;height:503px;"></div>

</body>
</html>