<html>
<meta charset="utf-8">
<head>
<style>
ul {
    list-style-type: none;
    margin: 3px;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}
li {
    float: left;
}
li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
li a:hover, .dropdown:hover .dropbtn {
    background-color: blue;
}
li.dropdown {
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}
.dropdown-content a:hover {
    background-color: #f1f1f1;
}
.dropdown:hover .dropdown-content {
    display: block;
}
</style>
</head>
<body>
<ul>
    <li><a href="index.php">Головна</a></li>
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Клієнти</a>
        <div class="dropdown-content">
            <a href="form1.html">Додати запис в базу даних</a>
            <a href="form2.html">Знайти запис за П.І.Б.</a>
            <a href="form3.html">Видалити запис</a>
            <a href="form4.html">Відредагувати запис</a>
        </div>
    </li>
</ul>
</body>
</html>