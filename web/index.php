<?php
require_once 'configs/database.php';
$mysqli = new mysqli($host, $username, $password, $dbName);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf8">
    <title>UtkaBot Statistic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body class="container-md">
    <?php include ("views/header.php"); ?><br>
    <main>
        <div class="container">
            <?php include ("views/content.php"); ?>
            <aside class="col-md-4 blog-sidebar">
            <?php include ("views/sidebar.php"); ?>
            </aside>
        </div>
    </main>
    <?php include ("views/footer.php"); ?>
</body>
</html>
