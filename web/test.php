<?php
require_once 'configs/database.php';
$mysqli = new mysqli($host, $username, $password, $dbName);
// Поверка, есть ли GET запрос
if (isset($_GET['page'])) {
    // Если да то переменной $pageno присваиваем его
    $pageno = $_GET['page'];
} else { // Иначе
    // Присваиваем $pageno один
    $pageno = 1;
}
// Назначаем количество данных на одной странице
$size_page = 25;
// Вычисляем с какого объекта начать выводить
$offset = ($pageno-1) * $size_page;
// SQL запрос для получения количества элементов
$count_sql = "SELECT COUNT(*) FROM users";
// Отправляем запрос для получения количества элементов
$result = mysqli_query($db, $count_sql);
// Получаем результат
$total_rows = mysqli_fetch_array($result)[0];
// Вычисляем количество страниц
$total_pages = ceil($total_rows / $size_page);
// Создаём SQL запрос для получения данных
$sql = "SELECT * FROM users LIMIT $offset, $size_page";
// Отправляем SQL запрос
$res_data = mysqli_query($mysqli, $sql);
// Цикл для вывода строк
while($row = mysqli_fetch_array($res_data)){
    // Выводим логин пользователя
    echo $row[0] . '</br>';
}
// Закрываем соединение с БД
mysqli_close($mysqli);
?>
<ul class="pagination">
    <li><a href="?pageno=1">First</a></li>
    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
    </li>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
    </li>
    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>
