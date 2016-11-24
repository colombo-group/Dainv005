<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>String</title>
</head>
<style type="text/css">
form {
     width: 1000px;
    height: 300px;
    line-height: 2;
}
 body{
 	    margin: auto;
	    line-height: 2;
	    font-size: 20px
 }
 textarea{
 	    height: 200px;
    	width: 400px;
 }
 p{
 	float: left;
 	margin: 0;
 }
 p.a{
 	padding-right: 37px;
 }
 input[type="text"] {
    width: 400px;
}
</style>
<body>
	
	<form action="" method="post">
		<p>Đoạn Văn B:</p><textarea name="stringB" required></textarea><br>
		<p class="a">Kí tự A:</p><input type="text" name="ktuA" required><br>
		 <input type="submit" name="submit" value="Phân tích" >
	</form>
<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
if(isset($_POST['submit']))
	{
		$stringB=input_post('stringB');
		$characters=input_post('ktuA');	
		$stringB=strtolower($stringB);
		$characters=strtolower($characters);
		findstring($stringB,$characters);
		findword($stringB,$characters);
	}
function findword($stringB,$characters)
{	
	$arrayB=explode(' ',$stringB);
	$b=null;
	$a=[];
	$j=0;
	for ($i=0;$i<count($arrayB);$i++)
	{
		$arrayC=str_split($arrayB[$i]);
		foreach ($arrayC as $key => $value) {
			if($characters==$value)
			{
				$b=$value;
				$a[$j++]=$i;
			}
		
		   }
		}
	for($i=0;$i<count($a);$i++)
	{
		$arrayTamp=str_split($arrayB[$a[$i]]);
		for($j=0;$j<count($arrayTamp);$j++)
		{
			if($arrayTamp[$j]==$characters)
			{
			 $arrayTamp[$j]="<b>".$arrayTamp[$j]."</b>";
			}
		}
		$arrayB[$a[$i]]= implode("", $arrayTamp);
	}	
	echo "Đoạn văn bản b với các ký tự ".$b." được bôi đậm là:   ".implode(" ", $arrayB);
    echo "<br>";

    for ($i=0; $i < count($a); $i++) {
        $arrayB[$a[$i]] ="<b>" .$arrayB[$a[$i]] ."</b>";
    }
    echo "Đoạn văn bản b với các từ có ký tự ".$b." được bôi đậm là:    ".implode(" ", $arrayB);       
}
function findstring($stringB,$characters){
	$arrayB=explode(' ',$stringB);
	$dem=0;
	$b=null;
	$a=[];
	$j=0;
	for($i=0;$i<count($arrayB);$i++)
	{
		$arrayC=str_split($arrayB[$i]);		

		foreach ($arrayC as &$value) {
			if($characters==$value)
			{	
				$b=$value;
				$a[$j++]=$i;
				$dem++;	
			}

		}
	}
	echo "So ki tu ".$b."trong day la:".$dem.'<br>';
	echo "Các từ chứa kí tự ".$b." la:   ";
	for ($i=0; $i <=count($a); $i++) {
            
        echo ($arrayB[$a[$i]])." ";
    }
    echo "<br>";           		
}
function input_post($key) {
      return isset($_POST[$key]) ? trim($_POST[$key]) : false;
}
	 ?>
</body>
</html>