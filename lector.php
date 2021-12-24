<?php include("includes/header.php"); ?>
<div id="tables1">
<?php
mysqli_connect("localhost", "root", "") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "univesity") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT name, expirience,post, tele_number FROM `lector`");
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
    echo"Name lector" . "<br>";
    echo"\n" . $stroka['name'] . "<br>"; 
    echo"Expirience" . "<br>"; 
    echo"\n" . $stroka['expirience'] . "<br>";
    echo"Post" . "<br>"; 
    echo"\n" . $stroka['post'] . "<br>";
    echo"Telephone number" . "<br>";
    echo"\n" . $stroka['tele_number'] . "<br>";
    echo"---------------------------------" . "<br>";
}
?>
</div>
<form>
<br> <input class="button" value="Вернутся обратно" onClick='location.href="login.php"'> <br>
</form>
<?php include("includes/footer.php"); ?>