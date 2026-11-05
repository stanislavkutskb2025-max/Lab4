<?php

if (preg_match('/\.(?:png|jpg|jpeg|gif|ico|css|js)$/', $_SERVER['REQUEST_URI'])) {
    exit;
}

$filename = "counter.txt";


if (file_exists($filename)) {
    $fp = fopen($filename, "r");
    $counter = ($fp) ? (int)fgets($fp, 10) : 0;
    if ($fp) fclose($fp);
} else {
    $counter = 0;
}

$counter++;

$fp = fopen($filename, "w");
if ($fp) {
    fputs($fp, $counter);
    fclose($fp);
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <title>Menu</title>
    
    <link rel="icon" href="data:,">
</head>
<body>
    <h5>
        <p>Число відвідувань: Welcome <br>
        <?php echo $counter; ?>
        <br><br>
        <?php include_once "menu.php"; ?>
        </p>
    </h5>
</body>
</html>