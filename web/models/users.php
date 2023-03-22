<table class="table table-striped">
    <thead class="thead-dark bg-warning text-dark text-center">
        <tr>
        <th>User</th>
        <th>Nick name</th>
        <th>Score</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = mysqli_query($mysqli, "SELECT COUNT(usersName) AS score, usersFullName, usersName FROM users GROUP BY usersName, usersFullName HAVING score >= 1 ORDER BY score DESC");
            if ($sql >= true) {
                while ($result = mysqli_fetch_array($sql)) 
                {
                    echo '
                    <tr>
                    <td scope="row">' . $result["usersFullName"] .  '</td>
                    <td scope="row">' . $result["usersName"] .  '</td>
                    <td scope="row">' . $result["score"] .  '</td>
                    </tr>
                    ';       
                }
            } 
            else 
            {
                echo '<td scope="row"> Error </td>';
            }
        ?>
    </tbody>
</table>