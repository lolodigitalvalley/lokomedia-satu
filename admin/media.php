<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    echo '<link href="../config/adminstyle.css" rel="stylesheet" type="text/css">
          <center>Untuk mengakses modul, Anda harus login <br>';
    echo '<a href="index.php"><b>LOGIN</b></a></center>';
}
else{
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>::: Lokomedia Community Yogyakarta :::</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="../config/adminstyle.css" rel="stylesheet" type="text/css" />
    </head>
<body>

<div id="header">
  <div id="content">
		<?php include 'content.php'; ?>
  </div>

	<div id="menu">
      <ul>
        <li><a href="?module=home">&#187; Home</a></li>
        <?php include 'menu.php'; ?>
        <li><a href="logout.php">&#187; Logout</a></li>
      </ul>
	    <p>&nbsp;</p>
 	</div>

		<div id="footer">
			Copyright &copy; 2008 by Lokomedia Community Yogyakarta
		</div>
</div>
</body>
</html>
<?php
}
?>
