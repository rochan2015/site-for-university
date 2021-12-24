<?php include("includes/header.php"); ?>
<div id="tables">
<?php
mysqli_connect("localhost", "root", "") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "univesity") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT id, name FROM `department`");
$rows1 = mysqli_query($con, "SELECT name, age,tele_number FROM `department secretary`");
$rows2 = mysqli_query($con, "SELECT name, age,tele_number FROM `head of the department`");
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
    echo"Name department" . "<br>";
    echo"\n" . $stroka['name'] . "<br>"; 
    echo"" . "<br>";
}
?>
</div>
<div id="tables">

<?php
while ($stroka = mysqli_fetch_array($rows1)){
    echo"\n";
    echo"Name department secretary" . "<br>";
    echo"\n" . $stroka['name'] . "<br>"; 
    echo"Age secreatry" . "<br>"; 
    echo"\n" . $stroka['age'] . "<br>";
    echo"Telephone number" . "<br>";
    echo"\n" . $stroka['tele_number'] . "<br>";
    echo"" . "<br>";
}
?>
</div>
<div id="tables1">
<?php
while ($stroka = mysqli_fetch_array($rows2)){
    echo"\n";
    echo"Name head department" . "<br>";
    echo"\n" . $stroka['name'] . "<br>"; 
    echo"Age department" . "<br>"; 
    echo"\n" . $stroka['age'] . "<br>";
    echo"Telephone number" . "<br>";
    echo"\n" . $stroka['tele_number'] . "<br>";
    echo"" . "<br>";
}
?>
</div>

<form>
<input class="button" value="Вернутся обратно" onClick='location.href="login.php"'>
</form>
<?php include("includes/footer.php"); ?>