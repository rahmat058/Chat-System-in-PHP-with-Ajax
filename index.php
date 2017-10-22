<?php
  include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chat System in PHP</title>
	<link rel="stylesheet" href="style.css" media="all"/>

	<script>
		function ajax(){
			var req = new XMLHttpRequest();
			req.onreadystatechange = function (){
				if (req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			req.open('GET','chat.php',true);
			req.send();
		}

		setInterval(function(){ajax()},1000);
	</script>
</head>

<body onload="ajax();">

	<div id="container">
		<div id="chat_box">
		     <div id="chat"> </div>	
		</div>

		<form action="index.php" method="post">
			<input type="text" name="name" placeholder="Enter name" />
			<textarea name="msg" placeholder="Enter message"></textarea>
			<input type="submit" name="submit" value="Send it"/>
		</form>

        <?php
           
           if(isset($_POST['submit'])){
              $name = $_POST['name'];
              $msg  = $_POST['msg'];

              $insert = "INSERT INTO chat(name,msg) VALUES('$name','$msg')";
              $run = $db->query($insert);

              if($run){
                 echo "<embed src='chat.wav' loop='false' hidden='true' autoplay='true'>";
              }
           }
        ?>
	</div>

</body>

</html>