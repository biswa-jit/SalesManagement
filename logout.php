<?php
include 'conn.php';
$ses_id=$_COOKIE['ses_id'];
session_start($ses_id);
session_destroy();
setcookie('ses_id','',time()-10);
?>

<html>
<body>
<h3 style='position: absolute; height: 100px; width: 500px; margin: -100px 0 0 -200px; top: 50%; left: 55%;'>You have logged out<br>&emsp;&nbsp;
<a href='login.html'>Login again</a></h3>

</body>
</html>
