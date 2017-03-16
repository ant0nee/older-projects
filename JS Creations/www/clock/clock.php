<!DOCTYPE html>
<?php 
$zoom = $image = $facecolour = $faceoutlinecolour = $facewidth = $bighandsize = $bighandwidth = $center =
$bighandcolour = $secondhandwidth = $smallhandcolour = $secondhandsize	= $secondhandcolour = $refreshrate = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$int_options = array(
"options"=>array
  (
  "min_range"=>1,
  "max_range"=>10000
  )
);
if (empty($_POST["centre"])){$center= "black";} else
  {
  $center = test_input($_POST["centre"]);
  $center = str_replace("?","#",$center);
  if (!preg_match("/^[a-zA-Z0-9]*$/",$center) && !preg_match('/^#[a-f0-9]{6}$/i', $center))
      {
      $center = "black"; 
      }
  }
  if (empty($_POST["zoom"])){$zoom= "30";} else
  {
  $zoom = test_input($_POST["zoom"]);
  if(!filter_var($zoom, FILTER_VALIDATE_INT, $int_options))
  {
  $zoom = "30";
  }
  }
  if (empty($_POST["image"])){$image= "";} else
  {
  $image = test_input($_POST["image"]);
  if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=?_|!:,.;]*[-a-z0-9+&@#\/%=?_|]/i",$image))
  {
  $image ="";
  }
 }
  if (empty($_POST["facecolour"])){$facecolour= "white";} else
  {
  $facecolour = test_input($_POST["facecolour"]);
    $facecolour = str_replace("?","#",$facecolour);
   if (!preg_match("/^[a-zA-Z0-9]*$/",$facecolour) && !preg_match('/^#[a-f0-9]{6}$/i', $facecolour))
      {
      $facecolour = "white"; 
      }
  }
  if (empty($_POST["faceoutlinecolour"])){$faceoutlinecolour= "black";} else
  {
  $faceoutlinecolour = test_input($_POST["faceoutlinecolour"]);
  $faceoutlinecolour = str_replace("?","#",$faceoutlinecolour);
  if (!preg_match("/^[a-zA-Z0-9]*$/",$faceoutlinecolour) && !preg_match('/^#[a-f0-9]{6}$/i', $faceoutlinecolour))
      {
      $faceoutlinecolour = "black"; 
      }
  }
  if (empty($_POST["facewidth"])){$facewidth= "5";} else
  {
  $facewidth = test_input($_POST["facewidth"]);
if(!filter_var($facewidth, FILTER_VALIDATE_INT, $int_options))
  {
  $facewidth = "5";
  }
  }
  if (empty($_POST["bighandsize"])){$bighandsize= "480";} else
  {
  $bighandsize = test_input($_POST["bighandsize"]);
  if(!filter_var($bighandsize, FILTER_VALIDATE_INT, $int_options))
  {
  $bighandsize = "480";
  }
  }
  if (empty($_POST["bighandwidth"])){$bighandwidth= "15";} else
  {
  $bighandwidth = test_input($_POST["bighandwidth"]);
  if(!filter_var($bighandwidth, FILTER_VALIDATE_INT, $int_options))
  {
  $bighandwidth = "15";
  }
 }
  if (empty($_POST["bighandcolour"])){$bighandcolour= "black";} else
  {
  $bighandcolour = test_input($_POST["bighandcolour"]);
    $bighandcolour = str_replace("?","#",$bighandcolour);
  if (!preg_match("/^[a-zA-Z0-9]*$/",$bighandcolour) && !preg_match('/^#[a-f0-9]{6}$/i', $bighandcolour))
      {
      $bighandcolour = "black"; 
      }
  }
  if (empty($_POST["smallhandsize"])){$smallhandsize= "300";} else
  {
  $smallhandsize = test_input($_POST["smallhandsize"]);
  if(!filter_var($smallhandsize, FILTER_VALIDATE_INT, $int_options))
  {
  $smallhandsize = "300";
  }
  }
  if (empty($_POST["smallhandwidth"])){$smallhandwidth= "25";} else
  {
  $smallhandwidth = test_input($_POST["smallhandwidth"]);
  if(!filter_var($smallhandwidth, FILTER_VALIDATE_INT, $int_options))
  {
  $smallhandwidth = "25";
  }
  }
  if (empty($_POST["smallhandcolour"])){$smallhandcolour= "black";} else
  {
  $smallhandcolour = test_input($_POST["smallhandcolour"]);
    $smallhandcolour = str_replace("?","#",$smallhandcolour);
 if (!preg_match("/^[a-zA-Z0-9]*$/",$smallhandcolour) && !preg_match('/^#[a-f0-9]{6}$/i', $smallhandcolour))
      {
      $smallhandcolour = "black"; 
      }
  }
  if (empty($_POST["secondhandsize"])){$secondhandsize= "480";} else
  {
  $secondhandsize = test_input($_POST["secondhandsize"]);
if(!filter_var($secondhandsize, FILTER_VALIDATE_INT, $int_options))
  {
  $secondhandsize = "480";
  }
  }
  if (empty($_POST["secondhandwidth"])){$secondhandwidth= "8";} else
  {
  $secondhandwidth = test_input($_POST["secondhandwidth"]);
  if(!filter_var($secondhandwidth, FILTER_VALIDATE_INT, $int_options))
  {
  $secondhandwidth = "30";
  }
  }
  if (empty($_POST["secondhandcolour"])){$secondhandcolour= "grey";} else
  {
  $secondhandcolour = test_input($_POST["secondhandcolour"]);
    $secondhandcolour = str_replace("?","#",$secondhandcolour);
if (!preg_match("/^[a-zA-Z0-9]*$/",$secondhandcolour) && !preg_match('/^#[a-f0-9]{6}$/i', $secondhandcolour))
      {
      $secondhandcolour = "grey"; 
      }
  }
  if (empty($_POST["refreshrate"])){$refreshrate= "1";} else
  {$refreshrate = test_input($_POST["refreshrate"]);
  if(!filter_var($refreshrate, FILTER_VALIDATE_INT, $int_options))
  {
  $refreshrate = "1";
  }
  }
}
function test_input($data)
{
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}
?>
<html>
<head>

</head>

<body style="zoom:<?php echo$zoom ?>%; padding:0; margin:0;overflow:hidden">
<img src="<?php echo$image ?>" id="face" style="display:none" />
<canvas id="clock" width="1010" height="1010" style="border:0;">

</canvas>
<script type="text/javascript">
//stationary object
startClock();
function startClock()
{
var c=document.getElementById("clock");
var ctx=c.getContext("2d");
ctx.beginPath();
ctx.arc(505,505,500,0,2*Math.PI);
ctx.fillStyle="<?php echo$facecolour ?>";
ctx.fill();
ctx.strokeStyle = '<?php echo$faceoutlinecolour ?>';
ctx.lineWidth=<?php echo$facewidth ?>;
ctx.stroke();
ctx.drawImage(document.getElementById("face"),5,5);
//Hand Calculations
var d = new Date();
var h	= d.getHours();
var m	= d.getMinutes();
var s	= d.getSeconds();
var ms	= d.getMilliseconds();
var hourMs		=h*3.6e+6;
var minuteMs	=m*60000;
var secondMs	=s*1000;
//BIG hand calculation
sign=1;
size=<?php echo$bighandsize ?>;
angle = 0.0001 * (minuteMs+secondMs+ms)*(Math.PI/180);
y = (((size/Math.sin((Math.PI-angle)/2))*Math.sin(angle))/Math.sin(Math.PI/2))*Math.sin((-(angle))/2);
x = Math.sqrt(Math.pow((size/Math.sin((Math.PI-angle)/2))*Math.sin(angle),2)-Math.pow(y,2));
if (angle>Math.PI) {sign=-1;}
y = Math.abs(y) + 5; 
x = size + sign*x +5; 
//BIG hand
ctx.beginPath();
ctx.moveTo(size+(505-size),size+(505-size));
ctx.lineTo(x+(500-size), y+(500-size));
ctx.lineWidth=<?php echo$bighandwidth ?>;
ctx.strokeStyle = '<?php echo$bighandcolour ?>';
ctx.stroke();
//SMALL hand calculation
sign=1;
size=<?php echo$smallhandsize ?>;
angle = 0.0000083 * (hourMs+minuteMs+secondMs+ms)*(Math.PI/180);
y = (((size/Math.sin((Math.PI-angle)/2))*Math.sin(angle))/Math.sin(Math.PI/2))*Math.sin((-(angle))/2);
x = Math.sqrt(Math.pow((size/Math.sin((Math.PI-angle)/2))*Math.sin(angle),2)-Math.pow(y,2));
if (angle>Math.PI) {sign=-1;}
y = Math.abs(y) + 5; 
x = size + sign*x +5; 
//SMALL hand
ctx.beginPath();
ctx.moveTo(size+(505-size),size+(505-size));
ctx.lineTo(x+(500-size), y+(500-size));
ctx.lineWidth=<?php echo$smallhandwidth ?>;
ctx.strokeStyle = '<?php echo$smallhandcolour ?>';
ctx.stroke();
//SECOND hand calculation
var sign=1;
var size=<?php echo$secondhandsize ?>;
var angle = 0.006 * (secondMs+ms)*(Math.PI/180);
var y = (((size/Math.sin((Math.PI-angle)/2))*Math.sin(angle))/Math.sin(Math.PI/2))*Math.sin((-(angle))/2);
var x = Math.sqrt(Math.pow((size/Math.sin((Math.PI-angle)/2))*Math.sin(angle),2)-Math.pow(y,2));
if (angle>Math.PI) {sign=-1;}
y = Math.abs(y) + 5; 
x = size + sign*x +5; 
//SECOND hand
ctx.beginPath();
ctx.moveTo(size+(505-size),size+(505-size));
ctx.lineTo(x+(500-size), y+(500-size));
ctx.lineWidth=<?php echo$secondhandwidth ?>;
ctx.strokeStyle = '<?php echo$smallhandcolour ?>';
ctx.stroke();
//middle circle
ctx.beginPath();
ctx.arc(505,505,20,0,2*Math.PI);
ctx.fillStyle='<?php echo$center ?>';
ctx.fill();
setTimeout("refresh()",<?php echo$refreshrate ?>);
setTimeout("startClock()",<?php echo$refreshrate+1 ?>);
}
function refresh()
{
document.getElementById("clock").width="1100";
}
</script>
</body>
</html>