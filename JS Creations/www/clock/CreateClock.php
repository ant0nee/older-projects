<!DOCTYPE html>
<html>
<head>
<?php
require "../layout/head.php";
?>
<style type="text/css">
#help{
display:none;
}
</style>
<script type="text/javascript">
function HandlePopupResult(result) {
document.getElementById("image").value=result;
}
function openpopup(obj)
{
window.open(obj,'Popup_Window','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=300,height=20,left = 350,top = 230');
}
function share()
{
var loc="http://"+location.host+"/clock/asc.php?zoom="+document.getElementById('zoom').value
+"&image="+document.getElementById('image').value
+"&facecolour="+document.getElementById('facecolour').value
+"&faceoutlinecolour="+document.getElementById('faceoutlinecolour').value
+"&facewidth="+document.getElementById('facewidth').value+"&bighandsize="
+document.getElementById('bighandsize').value+"&bighandwidth="
+document.getElementById('bighandwidth').value+"&bighandcolour="
+document.getElementById('bighandcolour').value+"&smallhandsize="
+document.getElementById('smallhandsize').value+"&smallhandwidth="
+document.getElementById('smallhandwidth').value+"&smallhandcolour="
+document.getElementById('smallhandcolour').value+"&secondhandsize="
+document.getElementById('secondhandsize').value+"&secondhandwidth="
+document.getElementById('secondhandwidth').value+"&secondhandcolour="
+document.getElementById('secondhandcolour').value+"&refreshrate="
+document.getElementById('refreshrate').value+"&centre="
+document.getElementById('centre').value;
loc=loc.replace(/#/g,"?");
var embed=prompt('Clock URL: ',loc);

}
function embedThis()
{
var loc="http://"+location.host+"/clock/asc.php?zoom="+document.getElementById('zoom').value
+"&image="+document.getElementById('image').value
+"&facecolour="+document.getElementById('facecolour').value
+"&faceoutlinecolour="+document.getElementById('faceoutlinecolour').value
+"&facewidth="+document.getElementById('facewidth').value+"&bighandsize="
+document.getElementById('bighandsize').value+"&bighandwidth="
+document.getElementById('bighandwidth').value+"&bighandcolour="
+document.getElementById('bighandcolour').value+"&smallhandsize="
+document.getElementById('smallhandsize').value+"&smallhandwidth="
+document.getElementById('smallhandwidth').value+"&smallhandcolour="
+document.getElementById('smallhandcolour').value+"&secondhandsize="
+document.getElementById('secondhandsize').value+"&secondhandwidth="
+document.getElementById('secondhandwidth').value+"&secondhandcolour="
+document.getElementById('secondhandcolour').value+"&refreshrate="
+document.getElementById('refreshrate').value+"&centre="
+document.getElementById('centre').value;
loc=loc.replace(/#/g,"?");
var add="";
var embed=prompt('Copy and paste the following code into your websites HTML: ',
'<iframe src="'+loc+'" style="border:0;'+add+'" width="'+(document.getElementById("zoom").value*10-(-5))+'" height="'+(document.getElementById("zoom").value*10-(-5))+'"></iframe>');
}
function init()
{
var myForm = document.getElementById('pop');
myForm.onsubmit = function() {
var size=document.getElementById("zoom").value*12;
var w = window.open('about:blank','Popup_Window','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width='+size+',height='+size+',left = 350,top = 230');
this.target = 'Popup_Window';
};
document.getElementById("help").style.display="none";
}
function showhelp()
{
var status=document.getElementById("help").style.display;
if (status=="none") {document.getElementById("help").style.display="inline";}
else if (status=="inline") {document.getElementById("help").style.display="none";}
}
function showsize(obj)
{
var calculation=10*obj.value;
document.getElementById("size").innerHTML=calculation+" X "+calculation+" (px)";
}
</script>
</head>
<body onload="init()">
<?php
require "../layout/layout.php";
?>
<center><h1>Create Clock</h1></center>
<form action="clock.php" method="post" id="pop">
<table style="table-layout:fixed; width: 450px">
<tr><td><b>size:</b></td></tr>
<tr><td>zoom: </td><td><input name="zoom" value="30" onkeyup="showsize(this)" id="zoom" style="width: 25px" /> (%) <span id="size">300 X 300 (px)</span></td></tr>
<tr><td><br /></td></tr>
<tr><td><b>clock face design:</b></td></tr>
<tr><td>image: </td><td><input name="image" id="image" value=""> 
<a href="javascript:;" onclick="showhelp('show')">[more]</a>
</td></tr>
<tr><td colspan="2"><i> <span id='help'>paste URL or <input type="button" value="upload" onclick="openpopup('uploadFace.php')" />
<a href="template.png">[click here to download the template]</a></span></i></td></tr>
<tr><td>background colour: </td><td><input value="white" id="facecolour" name="facecolour"></td></tr>
<tr><td>outline colour: </td><td><input value="black" id="faceoutlinecolour" name="faceoutlinecolour"></td></tr>
<tr><td>outline thickness: </td><td><input value="5" id="facewidth" name="facewidth"></td></tr>
<tr><td>centre colour: </td><td><input value="black" id="centre" name="centre"></td></tr>
<tr><td><br /></td></tr>
<tr><td><b>Big Hand:</b></td></tr>
<tr><td>Big hand length:</td><td><input name="bighandsize" id="bighandsize" value="490"></td></tr>
<tr><td>Big hand thickness:</td><td><input name="bighandwidth" id="bighandwidth" value="15"></td></tr>
<tr><td>Big hand colour:</td><td><input name="bighandcolour" id="bighandcolour" value="black"></td></tr>
<tr><td><br /></td></tr>
<tr><td><b>Small Hand:</b></td></tr>
<tr><td>Small hand length:</td><td><input name="smallhandsize" id="smallhandsize" value="300"></td></tr>
<tr><td>Small hand thickness:</td><td><input name="smallhandwidth" id="smallhandwidth" value="25"></td></tr>
<tr><td>Small hand colour:</td><td><input name="smallhandcolour" id="smallhandcolour" value="black"></td></tr>
<tr><td><br /></td></tr>
<tr><td><b>second Hand:</b></td></tr>
<tr><td>Second hand length:</td><td><input name="secondhandsize" id="secondhandsize" value="480"></td></tr>
<tr><td>Second hand thickness:</td><td><input name="secondhandwidth" id="secondhandwidth" value="8"></td></tr>
<tr><td>Second hand colour:</td><td><input name="secondhandcolour" id="secondhandcolour" value="grey"></td></tr>
<tr><td><b>more:</b></td></tr>
<tr><td>Clock refresh time: </td><td><input name="refreshrate" id="refreshrate" value="1"></td></tr>
<tr><td><br /></td></tr>
<tr><td colspan="2"><center>
<input type="submit" value="Preview" /> 
<input type="button" onclick="embedThis()" value="Embed" /> 
<input type="button" onclick="share()" value="Share" /> 
<input type="reset">

<br />Any invalid data will be auto-filled.</center>
</td></tr>
</table>
</form>
<?php
require "../layout/sidebar.php";
?>
</body>
</html>