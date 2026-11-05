<?php
include_once 'connecta.php';

$usertable = "patients";

if (isset($_POST['pid']) && is_numeric($_POST['pid'])) {
    $idv = intval($_POST['pid']);
    
    $full_name = mysqli_real_escape_string($dbc, $_POST['full_name']);
    $birth_date = mysqli_real_escape_string($dbc, $_POST['birth_date']);
    $gender = mysqli_real_escape_string($dbc, $_POST['gender'] ?? '');
    $address = mysqli_real_escape_string($dbc, $_POST['address'] ?? '');
    $phone = mysqli_real_escape_string($dbc, $_POST['phone'] ?? '');
    $passport_data = mysqli_real_escape_string($dbc, $_POST['passport_data'] ?? '');
    $privilege_category = mysqli_real_escape_string($dbc, $_POST['privilege_category'] ?? '');
    $contact_person = mysqli_real_escape_string($dbc, $_POST['contact_person'] ?? '');

    $query = "UPDATE $usertable SET 
                full_name = '$full_name', 
                birth_date = '$birth_date', 
                gender = '$gender', 
                address = '$address', 
                phone = '$phone', 
                passport_data = '$passport_data', 
                privilege_category = '$privilege_category', 
                contact_person = '$contact_person' 
              WHERE patient_id = $idv";
              
    if (mysqli_query($dbc, $query)) {
        echo "Дані пацієнта успішно оновлено у БД!<br>";
    } else {
        echo "Помилка оновлення запису!<br>";
    }
} else {
    echo "Некоректний ідентифікатор пацієнта!<br>";
}

echo "<br><a href='index.php'>Назад у меню</a>";
?>