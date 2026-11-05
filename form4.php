<?php
include_once 'connecta.php';

$usertable = "patients";

if (isset($_REQUEST['pid']) && is_numeric($_REQUEST['pid'])) {
    $idv = intval($_REQUEST['pid']);
    $query = "SELECT * FROM $usertable WHERE patient_id = $idv";
    
    if ($result = mysqli_query($dbc, $query)) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $g_male = ($row['gender'] == 'Чоловіча') ? 'selected' : '';
            $g_female = ($row['gender'] == 'Жіноча') ? 'selected' : '';

            print "<form method='post' action='form7.php'>";
            print "<h3>Редагування картки пацієнта</h3>";
            print "<b>П.І.Б.:</b><br><input name='full_name' value='" . htmlspecialchars($row['full_name']) . "' size='40' required><br><br>";
            print "<b>Дата народження:</b><br><input type='date' name='birth_date' value='" . htmlspecialchars($row['birth_date']) . "' required><br><br>";
            print "<b>Стать:</b><br><select name='gender'><option value='Чоловіча' $g_male>Чоловіча</option><option value='Жіноча' $g_female>Жіноча</option></select><br><br>";
            print "<b>Адреса:</b><br><input name='address' value='" . htmlspecialchars($row['address']) . "' size='40'><br><br>";
            print "<b>Телефон:</b><br><input name='phone' value='" . htmlspecialchars($row['phone']) . "' size='20'><br><br>";
            print "<b>Паспортні дані:</b><br><input name='passport_data' value='" . htmlspecialchars($row['passport_data']) . "' size='30'><br><br>";
            print "<b>Пільгова категорія:</b><br><input name='privilege_category' value='" . htmlspecialchars($row['privilege_category']) . "' size='30'><br><br>";
            print "<b>Контактна особа:</b><br><input name='contact_person' value='" . htmlspecialchars($row['contact_person']) . "' size='40'><br><br>";
            print "<input type='hidden' name='pid' value='$idv'>";
            print "<input type='submit' value='Зберегти зміни'>";
            print "</form>";
        }
        mysqli_free_result($result);
    }
} 
else if (isset($_REQUEST['user_name']) && trim($_REQUEST['user_name']) != '') {
    $user_name = mysqli_real_escape_string($dbc, trim($_REQUEST['user_name']));
    $query = "SELECT * FROM $usertable WHERE full_name LIKE '%$user_name%'";
    
    if ($result = mysqli_query($dbc, $query)) {
        $number = mysqli_num_rows($result);
        echo "Знайдено записів: <b>$number</b><br><br>";
        
        if ($number == 0) {
            print "Немає такого запису!<br>";
        } else {
            print "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
            print "<tr><th>П.І.Б.</th><th>Дата народження</th><th>Телефон</th><th>Дія</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                print "<tr>
                    <td>" . htmlspecialchars($row['full_name']) . "</td>
                    <td>" . htmlspecialchars($row['birth_date']) . "</td>
                    <td>" . htmlspecialchars($row['phone']) . "</td>
                    <td><a href='form4.php?pid=" . $row['patient_id'] . "'>Редагувати</a></td>
                </tr>";
            }
            print "</table>";
            mysqli_free_result($result);
        }
    }
} else {
    echo "Введіть П.І.Б. для пошуку!<br>";
}

echo "<br><a href='index.php'>Назад у меню</a>";
?>