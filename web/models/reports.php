<?php		
	echo '<h5 align="center">All time</h5>';
	$query_users_score = mysqli_query($mysqli, "
		SELECT 
		COUNT(DISTINCT(usersTGId)),
		COUNT(usersCommand) 
		FROM 
		users");		
	$result_users_score = mysqli_fetch_array($query_users_score);		
	echo 'Users: ' . $result_users_score[0] . ' <br>';		
	echo 'Message count: ' . $result_users_score[1] . '<br>';

	$query_top_usage_user = mysqli_query($mysqli, "
		SELECT 
			COUNT(usersName) AS score, 
			usersFullName, 
			usersName 
		FROM 
			users 
		GROUP BY 
			usersName, 
			usersFullName 
		HAVING 
			score > 1 
		ORDER BY 
			score 
		DESC LIMIT 1");		
	$result_top_usage_user = mysqli_fetch_array($query_top_usage_user);		
	echo 'Top user: ' . $result_top_usage_user[1] . ' - ' . $result_top_usage_user[0] . ' mes<br>';

	echo '<h5 align="center">To day</h5>';
	$today = date("yy-m-d");

	$query_users_score = mysqli_query($mysqli, "
		SELECT 
			COUNT(DISTINCT(usersTGId)),
			COUNT(usersCommand) 
		FROM 
			users 
		WHERE 
			usersDate>='${today} 00:00:00'");		
	$result_users_score = mysqli_fetch_array($query_users_score);		
	echo 'Users: ' . $result_users_score[0] . ' <br>';		
	echo 'Message count: ' . $result_users_score[1] . ' mes <br>';

	$query_top_usage_user = mysqli_query($mysqli, "
		SELECT 
			COUNT(usersName) AS score,
			usersFullName, 
			usersName 
		FROM 
			users 
		WHERE 
			usersDate>='${today} 00:00:00' 
		GROUP BY 
			usersName, 
			usersFullName 
		HAVING 
			score > 1 
		ORDER BY 
			score 
		DESC LIMIT 1");		
	$result_top_usage_user = mysqli_fetch_array($query_top_usage_user);		
	echo 'Top user: ' . $result_top_usage_user[1] . ' - ' . $result_top_usage_user[0] . ' mes<br>';
?>