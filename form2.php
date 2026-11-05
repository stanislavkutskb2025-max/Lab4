<?php
include_once 'connecta.php';

$usertable = "patients";

if (isset($_REQUEST['user_name']) && trim($_REQUEST['user_name']) != '') {
    $user_name = mysqli_real_escape_string($dbc, trim($_REQUEST['user_name']));
    $query = "SELECT * FROM $usertable WHERE full_name LIKE '%$user_name%'";
    
    if ($result = mysqli_query($dbc, $query)) {
        $number = mysqli_num_rows($result);
        echo "Знайдено записів: <b>$number</b><br><br>";

        if ($number > 0) {
            print "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
            print "<tr bgcolor='#f2f2f2'>
                    <th>ID</th>
                    <th>П.І.Б.</th>
                    <th>Дата народження</th>
                    <th>Стать</th>
                    <th>Адреса</th>
                    <th>Телефон</th>
                    <th>Паспортні дані</th>
                    <th>Пільги</th>
                    <th>Контактна особа</th>
                   </tr>";
            
            while ($row = mysqli_fetch_assoc($result)) {
                print "<tr>
                        <td>{$row['patient_id']}</td>
                        <td>" . htmlspecialchars($row['full_name']) . "</td>
                        <td>{$row['birth_date']}</td>
                        <td>" . htmlspecialchars($row['gender']) . "</td>
                        <td>" . htmlspecialchars($row['address']) . "</td>
                        <td>" . htmlspecialchars($row['phone']) . "</td>
                        <td>" . htmlspecialchars($row['passport_data']) . "</td>
                        <td>" . htmlspecialchars($row['privilege_category']) . "</td>
                        <td>" . htmlspecialchars($row['contact_person']) . "</td>
                       </tr>";
            }
            print "</table>";
            mysqli_free_result($result);
        } else {
            print "Пацієнта з таким П.І.Б. не знайдено!<br>";
        }
    }
} else {
    echo "Будь ласка, введіть П.І.Б. для пошуку!<br>";
}

echo "<br><a href='index.php'>Назад у меню</a>";
?>