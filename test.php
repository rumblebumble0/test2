<?php 
	include('../functions.php');
	checkuser();

	if(isset($_POST['option']))
	{
		switch($_POST['option'])
		{
			case 'save':
				if((isset($_POST['text'])) && (isset($_POST['id'])))
				{
					$link=db_connect();
					$query="UPDATE speisen
							SET value='".$_POST['text']."'  
							WHERE ID=".$_POST['id'].";";
					mysqli_query($link, $query);
					
					echo("1");
					mysqli_close($link);
				}
				break;
			case 'show':
				if(isset($_POST['id']))
				{
					$link=db_connect();
					$query="SELECT value
							FROM speisen
							WHERE id=".$_POST['id'].";";
					$result=mysqli_query($link, $query);
					
					if(mysqli_num_rows($result)>0)
					{
						while($row=mysqli_fetch_assoc($result))
						{
							echo($row['value']);
						}
					}
					mysqli_close($link);
				}
				break;
			
			default:
				echo("0");
				break;
		}
	}
	else
	{
		echo("0");
	}
	
	?>
