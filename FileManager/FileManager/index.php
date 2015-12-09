<!DOCTYPE html>
<html>
<head>
	<title>Laba4</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<?php
$tmp = $_GET['path'];
$tmp = str_replace("\\", "/", $tmp);
//echo $tmp;
//$fullPart.$tmp);
echo"<table class='table table-bordered'>";
if($tmp=="/"){
	echo "<p>Error folder or access to folder</p>";
	include 'form.php';
}
elseif(!empty($tmp))
{
	if(file_exists($tmp)){
	$fullPart=$tmp."/";
	//echo $fullPart."<br>";
	$temp = rtrim($fullPart, "/");
	$pos = strrpos($temp, "/");
	$temp = substr($temp, 0, $pos);
	$temp = $temp."/";
	//echo $temp;
	if($temp=="/")
	 {$temp="";}
	echo "<tr><td><a href='http://localhost/PHP/FileManager/FileManager/index.php?path=$temp'><img src='img/dir-up.png'>..</a></td><td></td></tr>";
		$pos = strpos($fullPart, "/");
		$root = substr($fullPart, 0, $pos)."/";
		echo "<tr><td><a href='http://localhost/PHP/FileManager/FileManager/index.php?path=$root'><img src='img/dir-up.png'>.</a></td><td></td></tr>";
	$files = scandir($fullPart);
foreach ($files as $value) 
{

	if($value=='.'||$value=='..'){
		continue;
	}
	if(is_file($fullPart.$value))
	{
		$filesize = (filesize($fullPart.$value)/1024);
		echo "<tr><td><img src='img/file.png'>$value</td><td>$filesize KB</td></tr>";
	}
	else if(is_dir($fullPart.$value))
	{
		//$value = str_replace("/", "", $value);
		//$temp = str_replace("/", "", $tmp);
		echo "<tr><td><a href='http://localhost/PHP/FileManager/FileManager/index.php?path=$fullPart$value/'><img src='img/dir.png'> $value</a> </td><td></td></tr>";
	}


}

}


else{
	echo "<p><b>Error folder or access to folder</b></p><style>.form-control{border: 1px solid red;}</style>";
	include 'form.php';
}
}
else
{
	include 'form.php';
}

echo "</table>";
?>

</body>
</html>
