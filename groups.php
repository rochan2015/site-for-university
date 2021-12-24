<?php include("includes/header.php"); ?>
<div id="tables1">
<?php
mysqli_connect("localhost", "root", "") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "univesity") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT groups.name, groups.id_speciality, lector.name, lector.id, groups.id_curator FROM `groups` , `lector` WHERE groups.id_curator=lector.id ");
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
    echo"Name group" . "<br>";
    echo"\n" . $stroka['name'] . "<br>"; 
    echo"Speciality" . "<br>"; 
    echo"\n" . $stroka['id_speciality'] . "<br>";
    echo"Name curator" . "<br>";
    echo"\n" .$stroka['name']. "<br>";
    echo"---------------------------------" . "<br>";
}

?>
</div>
<form>
<input class="button" value="Вернутся обратно" onClick='location.href="login.php"'>
</form>
<?php include("includes/footer.php"); ?>