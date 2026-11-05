<?php
include_once 'connecta.php';

$usertable = "patients";

if (isset($_REQUEST['pid']) && is_numeric($_REQUEST['pid'])) {
    $idv = intval($_REQUEST['pid']);
    $query = "DELETE FROM $usertable WHERE patient_id = $idv LIMIT 1";
    
    if (mysqli_query($dbc, $query)) {
        echo "Запис пацієнта успішно вилучено з бази даних!<br>";
    } else {
        echo "Помилка вилучення запису!<br>";
    }
} else {
    echo "Не вказано пацієнта для видалення!<br>";
}

echo "<br><a href='index.php'>Назад у меню</a>";
?>