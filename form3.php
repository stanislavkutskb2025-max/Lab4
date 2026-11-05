<?php
include_once 'connecta.php';

$usertable = "patients";

if (isset($_REQUEST['pid']) && is_numeric($_REQUEST['pid'])) {
    $idv = intval($_REQUEST['pid']);
    $query = "SELECT * FROM $usertable WHERE patient_id = $idv";
    
    if ($result = mysqli_query($dbc, $query)) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            print "<form method='post' action='form8.php'>";
            print "<h3>Підтвердження вилучення пацієнта</h3>";
            print "<b>П.І.Б.:</b> " . htmlspecialchars($row['full_name']) . "<br>";
            print "<b>Дата народження:</b> " . htmlspecialchars($row['birth_date']) . "<br>";
            print "<b>Телефон:</b> " . htmlspecialchars($row['phone']) . "<br>";
            print "<input type='hidden' name='pid' value='$idv'>";
            print "<br><input type='submit' value='Підтвердити вилучення' style='color:red;'>";
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
                    <td><a href='form3.php?pid=" . $row['patient_id'] . "'>Вилучити</a></td>
                </tr>";
            }
            print "</table>";
            mysqli_free_result($result);
        }
    }
} else {
    echo "Введіть дані для пошуку!<br>";
}

echo "<br><a href='index.php'>Назад у меню</a>";
?>
