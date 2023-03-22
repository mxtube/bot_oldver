<?php
	$query = mysqli_query($mysqli, "SELECT COUNT(usersCommand) AS score, usersCommand FROM users GROUP BY usersCommand HAVING score > 1 ORDER BY score DESC");
	while ($result1 =mysqli_fetch_array($query)) 
	{
		echo "{$result1[0]} - {$result1[1]} <br>";
	}
?>