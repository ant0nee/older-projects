<?php
function cryptPass($input, $rounds = 9) {
	$salt = "";
	$saltChars = array_merge(range('A','Z'), range('a','z'), range(0,9));
	for ($i=0; $i<22; $i++) {
		$salt .=$saltChars[array_rand($saltChars)];
	}
	return crypt($input, sprintf('$2y$%02d$', $rounds). $salt);
}
$username = $password = $email = $website = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$password=$_POST["password"];
	$pass="Password1";
	$hashed=cryptPass($pass);
	if (crypt($password,$hashed) == $hashed)
	{
	echo "<script>alert('match!')</script>";
	};
}
?>
<center>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
** - required for login or register<br />
*  - required for register<br /><br />

**Username:
<input type="text" name="username" value="<?php echo $username ?>"><br />
**Password:
<input type="password" name="password" value="<?php echo $password ?>"><br />
*Email:
<input type="text" name="email" value="<?php echo $email ?>"><br />
Website:
<input type="text" name="website" value="<?php echo $website ?>"><br />
<input type="submit" value="login/register">
</form>
</center>