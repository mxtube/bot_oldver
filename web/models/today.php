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
        $today = date("yyyy-mm-dd");
        $sql = mysqli_query($mysqli, "SELECT * FROM users WHERE usersDate >= '${today} 00:00:00' ORDER BY usersId DESC LIMIT 25");
        if ($sql >= 1) {
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
        } 
        else 
        {
            echo '<td scope="row"> No use today </td>';
        }
        ?>
    </tbody>
</table>
