<?php
class Encryption
{
    const CYPHER = MCRYPT_RIJNDAEL_256;
    const MODE   = MCRYPT_MODE_CBC;
    const KEY    = '4Bj%rVgi%?sU*5t#$TcD?L+=r!oBFb+I';

    public function encrypt($plaintext)
    {
        $td = mcrypt_module_open(self::CYPHER, '', self::MODE, '');
        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        mcrypt_generic_init($td, self::KEY, $iv);
        $crypttext = mcrypt_generic($td, $plaintext);
        mcrypt_generic_deinit($td);
        return base64_encode($iv.$crypttext);
    }
    public function decrypt($crypttext)
    {
        $crypttext = base64_decode($crypttext);
        $plaintext = '';
        $td        = mcrypt_module_open(self::CYPHER, '', self::MODE, '');
        $ivsize    = mcrypt_enc_get_iv_size($td);
        $iv        = substr($crypttext, 0, $ivsize);
        $crypttext = substr($crypttext, $ivsize);
        if ($iv)
        {
            mcrypt_generic_init($td, self::KEY, $iv);
            $plaintext = mdecrypt_generic($td, $crypttext);
        }
        return trim($plaintext);
    }
}
$file=fopen("../login.CSV", "r");
 $username="";
	while(!feof($file))
  {
  $information=explode(",",fgets($file));
  error_reporting(0);
  $user = $information[0]; //preserved incase formatting needed
  $pass = Encryption::decrypt($information[1]);
  error_reporting(1);
  if ($user==$_COOKIE["username"] && $pass==$_COOKIE["password"])  
  {
  $username=$user;
  }
  }
  fclose($file);
$allowedExts = array("gif", "jpeg", "jpg", "png","PNG","JPG","JPEG");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else if ($username=="")
  {
  echo"error- must be logged in to upload.";
  }
  else
    {
	$x=1;
	 if (!file_exists("upload/".$username))
	  {
      mkdir("upload/".$username);
	  }
	while (file_exists("upload/".$username."/".$x.".".$extension))
	{
	$x++;
	}
	  move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/".$username."/".$x.".".$extension);
	  if ($_POST["resize"]=="resize")
	  {
	  include('SimpleImage.php'); 
	  $image = new SimpleImage(); 
	  $image->load("upload/".$username."/".$x.".".$extension); 
	  $image->resize(1000,1000); 
	  $image->save("upload/".$username."/".$x.".".$extension); //Resizing code from http://www.white-hat-web-design.co.uk/
	  }
	  echo '
	  <body onload="CloseMySelf()">
	  <script>
	  function CloseMySelf() {
    try {
        window.opener.HandlePopupResult("http://"+location.host+"/clock/upload/'.$x.'.'.$extension.'");
    }
    catch (err) {}
    window.close();
    return false;
}
	  </script>
	  ';
    }
  }
else
  {
  echo "Error- file must be .png .jpg or .jpeg
  <script type='text/javascript'>
  var goto='uploadface.php';
  setTimeout('window.location=goto',2000);
  </script>
  ";
  }
?>