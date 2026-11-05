<?php
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Menu</title>
</head>
<body>
    <b></b>
    <h5>
        <p>Число відвідувань:
        Welcome <br>
        <?php
        $filename = "counter.txt";
        $fp = fopen($filename, "r");
        if ($fp) {
            $counter = fgets($fp, 10);
            fclose($fp);
        } else {
            $counter = 0;
        }
        $counter++;
        print $counter;
        $fp = fopen($filename, "w");
        if ($fp) {
            $ii = fputs($fp, $counter);
            fclose($fp);
        }
        include "menu.php";
        ?>
        </p>
    </h5>
</body>
</html>