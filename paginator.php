<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>paginator</title>
	<style type="text/css">
	form{
		    line-height: 2;
		    width: 233px;
		    height: 150px;
		    margin: auto;
	}
	.hienthi {
	    text-align: center;
	    line-height: 3;
	    font-size: 22px;
	}

	.hienthi a {
	    text-transform: capitalize;
	    text-decoration: none;
	}
	</style>
</head>
<body>
	<?php 
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
	if(isset($_POST['submit']))
	{
		if($_POST['soA']<=0||$_POST['soB']<0||$_POST['soC']<=0)
		{
			$erro="ko duoc nhap so am";
		}
		else{
		$soA=input_post('soA');
		$soB=input_post('soB');
		$soC=input_post('soC');
		$p=1;
		}
	}else{
		$soA=input_get('soA');
		$soB=input_get('soB');
		$soC=input_get('soC');
		}
	
		$dem=0;
	 	$array= array();
	 	for($i=1;$i<=$soA;$i++)
	 	{
	 		
	 		if($i%$soB==0&&$soB>0)
	 		{
	 			$dem++;
	 			$array[]=$i;
	 		}
	  		
	 	}	
	 
	 echo "<br>";

	//ham phan trang
	
	if(isset($_GET['p']))
	{
		$p=$_GET['p'];
	}else{
		$p=1;
	}
	if($soC>0)
	{
		$total_page = ceil($dem / $soC);
	}
	$per_row=$p*$soC-$soC;
	$end=$p*$soC+1;
	$html='';
	if($p>1)
	{
		$html .= '<a href="paginator.php?p=1&soA='.$soA.'&soB='.$soB.'&soC='.$soC.'">Trang đầu</a>   ';
		$pPrev=$p-1;
		$html .='<a href="paginator.php?p='.$pPrev.'&soA='.$soA.'&soB='.$soB.'&soC='.$soC.'">Prev</a>   ';
	}
	for($i=1;$i<=$total_page;$i++)
	{
		if($p==$i)
		{
		  	$html .="<span>".$i."</span>  ";
		}else{
		  	$html .='<a href="paginator.php?p='.$i.'&soA='.$soA.'&soB='.$soB.'&soC='.$soC.'">  '.$i.'</a> ';
		  			
		}
	}
	if($p<$total_page)
	{
		$pNext=$p+1;
		$html .='<a href="paginator.php?p='.$pNext.'&soA='.$soA.'&soB='.$soB.'&soC='.$soC.'">next</a>   ';
		  	 
		$html .='<a href="paginator.php?p='.$total_page.'&soA='.$soA.'&soB='.$soB.'&soC='.$soC.'">Trang cuoi</a>   ';
	}

	function input_post($key){
    	return isset($_POST[$key]) ? trim($_POST[$key]) : false;
	}
	function input_get($key){
    	return isset($_GET[$key]) ? trim($_GET[$key]) : false;
	}
	 ?>
	
	<form action="" method="post">
		<?php if(isset($erro)){echo $erro."<br>";} ?>
		So A:
		<input type="number" name="soA" required ><br>
		So B:
		<input type="number "name="soB" required><br>
		So C:
		<input type="number" name="soC" required><br>
		<input type="submit" name="submit" value="submit">


	</form>
	<div class="hienthi">
		<?php 
			for($i=$per_row;$i<$end-1;$i++){
		  	echo $array[$i]." ";
		  }
		  echo "<br>";
		  echo $html;
		   ?>
	</div>

</body>
</html>