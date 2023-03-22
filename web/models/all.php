<?php
if (isset($_GET['page'])) {
    $pageno = $_GET['page'];
} else {
    $pageno = 1;
}
$score_item_on_page = 25;
$offset = ($pageno - 1) * $score_item_on_page;
$result = mysqli_query($mysqli, "SELECT COUNT(*) FROM users");
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $score_item_on_page);
?>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item"> <a class="page-link text-dark bg-warning" href="?page=1">First</a> </li>
        <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>"> <a class="page-link text-dark bg-warning" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?page=".($pageno - 1); } ?>">Prev</a> </li>
        <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>"> <a class="page-link text-dark bg-warning" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?page=".($pageno + 1); } ?>">Next</a> </li>
        <li class="page-item"> <a class="page-link text-dark bg-warning" href="?page=<?php echo $total_pages; ?>">Last</a> </li>
    </ul>
    <?php 
    if (isset($_GET['page']))
    {
        echo '<p align="right">Pages: '. $_GET['page'] .' of ' . $total_pages . '</p>';
    }
    ?>
</nav>
<!-- <select class="form-select" style="width: 20%;" aria-label="Default select example">
<option selected>Filter</option>
	<?php 
	$sql = mysqli_query($mysqli, "SELECT DISTINCT(usersName) FROM users ");
	while ($result = mysqli_fetch_array($sql)) 
	{
		echo '
		<option value="1">' . $result[0] . '</option>
		';}
	?>
</select> -->
<table class="table table-striped">
    <thead class="thead-dark bg-warning text-dark text-center">
        <tr>
        <th>User</th>
        <th>Nick name</th>
        <th>ID user</th>
        <th>Message</th>
        <th>Date/Time</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = mysqli_query($mysqli, "SELECT * FROM users ORDER BY usersId DESC LIMIT $offset, $score_item_on_page");
        while ($result = mysqli_fetch_array($sql)) 
        {
            echo '<tr>
            <td scope="row">' . $result["usersFullName"].  '</td>
            <td scope="row">' . $result["usersName"].  '</td>
            <td scope="row">' . $result["usersTGId"].  '</td>
            <td scope="row">' . $result["usersCommand"].  '</td>
            <td scope="row">' . $result["usersDate"].  '</td>
            </tr>';
        }
        ?>
    </tbody>
</table>