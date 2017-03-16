<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
function upload()
{
document.getElementById("formsubmit").submit();
}
</script>
</head>
<body>
<form action="upload.php" method="post" id="formsubmit" enctype="multipart/form-data">
<center>auto resize <input type="checkbox" name="resize" checked="checked" value="resize" /></center><br />
<input type="file" name="file" onchange="upload()" />

</form>
</body>
</html>