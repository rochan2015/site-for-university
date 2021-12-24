<?php include("includes/header.php"); ?>
<div id="tables1">
<?php
mysqli_connect("localhost", "root", "") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "univesity") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT name, age,tele_number FROM `dean`");
$rows2 = mysqli_query($con, "SELECT name FROM `faculty`");
while ($stroka = mysqli_fetch_array($rows2)){
    echo"\n";
    echo"Name decanat" . "<br>";
    echo"\n" . $stroka['name'] . "<br>"; 
    echo"---------------------------------" . "<br>";
}
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
    echo"Name dean" . "<br>";
    echo"\n" . $stroka['name'] . "<br>"; 
    echo"Age dean" . "<br>"; 
    echo"\n" . $stroka['age'] . "<br>";
    echo"Telephone number" . "<br>";
    echo"\n" . $stroka['tele_number'] . "<br>";
    echo"---------------------------------" . "<br>";
}
?>
</div>
<form>
<input class="button" value="Вернутся обратно" onClick='location.href="login.php"'>
</form>
<?php include("includes/footer.php"); ?>