

<?php
include("configuration.php");
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
$msg=$_POST['msg'];
$email=$_SESSION['email'];
$sql=mysqli_query($al,"SELECT * FROM users WHERE email='$email'");
$b=mysqli_fetch_array($sql);
$name=$b['nick'];
$date=date('d-M-Y');





            require_once ('translate/vendor/autoload.php');
            use \Statickidz\GoogleTranslate;

            $source = 'en';
            $target = 'hi';

            $text = $msg;

            $trans = new GoogleTranslate();
            $result = $trans->translate($source, $target, $text);

            
        

if($msg==NULL)
{
	
}
else
{
	mysqli_query($al,"INSERT INTO box(sender,msg,date) VALUES('$name','$result','$date')");
}
$fetch=mysqli_query($al,"SELECT * FROM box ORDER BY id DESC");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chat Room</title>
<link href="scripts/styleSheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<span class="heading">Chat Room</span><span style="float:right"><a href="logout.php">
<img src="images/logout.png" height="50" width="100"  /></a></span>
<hr style="border:6px dotted #63C;"/><br />
<br />
<div align="center">
<form method="post" action="">
<table class="table" cellpadding="4" cellspacing="4">
<tr><td align="center" class="tableHead" colspan="2">Chatter Box</td></tr>
<tr><td colspan="2"><div class="fields" style="overflow:scroll;height:150px;word-wrap:normal;width:300px;">
<?php while($f=mysqli_fetch_array($fetch))
{
	?>
<span class="nick"><?php echo $f['sender'];?></span> : <span class="msg"><?php echo $f['msg'];?></span><br /><?php } ?>
</div></td></tr>
<tr><td><textarea name="msg" class="fields" rows="2" cols="28" placeholder="Enter Your Message" required="required" >
</textarea></td>
<td><input type="submit" value="SEND" class="commandButton" /><br />
<br />
<a href="box.php">Refresh</a></td></tr>

</table>
</form><br />
<br />
<a href="home.php">BACK</a>
</div>
</body>

</html>