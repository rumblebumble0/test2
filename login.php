<?php

	  session_start();
	  include('functions.php');
	  
	  $link=db_connect();
	  
	  $query="SELECT id, name 
			  FROM users 
			  WHERE name LIKE '".$_REQUEST['name']."' AND passwort = '".md5 ($_REQUEST['passwort'])."';";
	  $result=mysqli_query($link, $query);
	  
	  if(mysqli_num_rows($result)>0) 
	  {
			$data=mysqli_fetch_array($result);
			$_SESSION['user_id']=$data['id'];
			$_SESSION['name']=$data['name'];
			mysqli_close($link);
			
			//header("Location: index.php");
			header("Location: index.php");
	  } 
	  else
	  { 
	  		mysqli_close($link);
			header("Location: login_formular.php");
	  }
			
?>
