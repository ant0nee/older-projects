<?php
function test_input($data, $validate, $preg)
{
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  if ($validate==1){
    if (!preg_match($preg, $data)){
      return "%error%";
    }
    else {
       return $data;
     }
  }
}
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
?>
<center>
<div id="container">
<img src="img/JS Creations Banner.png" align="left" style="height:90px; margin:20px;margin-bottom:10px; float:left" />
<div style="float:left;background: #0df; margin-top:7px; padding:5px; border-radius:5px; border:1px solid black; width:218px;">
<div>Welcome <?php
//login
if (isset($_COOKIE["username"]))
{
echo $_COOKIE["username"]."! <a href='/logout.php' style='font-size:10px; vertical-align:text-top;position:relative; top:2px'>[logout]</a>";
}
else
{
echo 'guest! <a href="javascript:;" onclick="login()" style="font-size:10px; vertical-align:text-top;position:relative; top:2px">[login]</a>';
}
?></div>

</div>
<div style="float:left;background: #af0; margin-top:5px; padding:5px; border-radius:5px; border:1px solid black; width:218px;">
<div>Search: <input type="text" id="search" /></div>
</div>
<div style="float:left;background: #fa0; margin-top:5px; padding:5px; border-radius:5px; border:1px solid black; width:218px;">
<div>share - print - report - submit</div>
</div>
<table id="navigation">
<tr>
<td><a class="navigation" href="/">Home</a></td>
<td><a class="navigation" href="about.php">About us</a></td>
<td><a class="navigation">Embed</a></td>
<td><a class="navigation">JavaScript</a></td>
<td><a class="navigation">Submit New</a></td>
<td><a class="navigation">Help</a></td>
</tr>
</table>
<table style="width:100%; border-collapse:collapse;">
<tr>
<td id="maincontainer" valign="top">