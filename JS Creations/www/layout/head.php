<link rel="shortcut icon" href="img/favicon.ico">
<style type="text/css">
#container{
width:700px; 
border:2px solid black;
background:RGBA(255,255,255,0.9);
}
#navigation{
table-layout: fixed;
width:100%;
margin:0; 
padding:0;
border-collapse:collapse;
}
.navigation:hover{
background: #777;
}
.navigation{
background: #aaa;
padding:0;
margin:0;
display:block;
height:25px;
width:100%;
font-size:20px;
font-weight:bold;
color: black;
border:2px solid black;
border-left:1px solid black;
border-right: 1px solid black;
text-align:center;
text-decoration:none;
font-family:Sans-serif, Arial, Verdana;
vertical-algn:middle;
}
h1, h2, h3{
font-family:Sans-serif, Arial, Verdana;
margin:0;
}
hr{
border:1px solid black;
}
#maincontainer{
padding-left:10px;
text-align:left;
width:70%;
}
#sidebar{
border-left:2px solid black;
width:30%;
}
body{
width:100%;
margin:0px;
margin-top:2px;
overflow-y:scroll;
background: url(img/background.jpg);
}
body p{
font-size: 15px;
}
</style>
<script type="text/javascript">
function login()
{
var w = window.open('/login.php','Popup_Window','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=350,height=220,left = 350,top = 230');
}
function HandlePopupResult(result)
{
window.location=document.URL;
}

</script>