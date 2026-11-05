<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include 'connecta.php';

$usertable = "patients";

if (isset($_POST['full_name']) && trim($_POST['full_name']) != '' && isset($_POST['birth_date'])) {
    $full_name = trim($_POST['full_name']);
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'] ?? '';
    $address = $_POST['address'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $passport_data = $_POST['passport_data'] ?? '';
    $privilege_category = $_POST['privilege_category'] ?? '';
    $contact_person = $_POST['contact_person'] ?? '';

    $query = "INSERT INTO $usertable (full_name, birth_date, gender, address, phone, passport_data, privilege_category, contact_person) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
              
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'ssssssss', $full_name, $birth_date, $gender, $address, $phone, $passport_data, $privilege_category, $contact_person);

    if (mysqli_stmt_execute($stmt)) {
        echo "Пацієнт успішно доданий до бази даних hospital_db! <br>";
    } else {
        echo "Помилка додавання запису! <br>";
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Запис не додано: заповніть обов'язкові поля! <br>";
}

echo "<br><a href='index.php'>Назад у меню</a>";
?>