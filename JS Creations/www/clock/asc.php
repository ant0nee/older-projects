<html>
<head>
<script type="text/javascript">
function submitthis()
{
document.getElementById("create").submit();
}
</script>
</head>
<body onload="submitthis()">
<form action="clock.php" method="post" id="create">
<input type="hidden" name="zoom" value="<?php echo$_GET['zoom'] ?>">
<input type="hidden" name="image" value="<?php echo$_GET['image'] ?>">
<input type="hidden" name="facecolour" value="<?php echo$_GET['facecolour'] ?>">
<input type="hidden" name="faceoutlinecolour" value="<?php echo$_GET['faceoutlinecolour'] ?>">
<input type="hidden" name="facewidth" value="<?php echo$_GET['facewidth'] ?>">
<input type="hidden" name="bighandsize" value="<?php echo$_GET['bighandsize'] ?>">
<input type="hidden" name="bighandwidth" value="<?php echo$_GET['bighandwidth'] ?>">
<input type="hidden" name="bighandcolour" value="<?php echo$_GET['bighandcolour'] ?>">
<input type="hidden" name="smallhandsize" value="<?php echo$_GET['smallhandsize'] ?>">
<input type="hidden" name="smallhandwidth" value="<?php echo$_GET['smallhandwidth'] ?>">
<input type="hidden" name="smallhandcolour" value="<?php echo$_GET['smallhandcolour'] ?>">
<input type="hidden" name="secondhandsize" value="<?php echo$_GET['secondhandsize'] ?>">
<input type="hidden" name="secondhandwidth" value="<?php echo$_GET['secondhandwidth'] ?>">
<input type="hidden" name="secondhandcolour" value="<?php echo$_GET['secondhandcolour'] ?>">
<input type="hidden" name="refreshrate" value="<?php echo$_GET['refreshrate'] ?>">
<input type="hidden" name="centre" value="<?php echo$_GET['centre'] ?>">
</form>
</body>
</html>