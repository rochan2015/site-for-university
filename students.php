<?php include("includes/header.php"); ?>
<div id="tables1">
<?php
mysqli_connect("localhost", "root", "") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "univesity") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT name, date_of_birth, tele_number, id_group,number_passes,headman,budjet FROM `students`");
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
    echo"Name student" . "<br>";
    echo"\n" . $stroka['name'] . "<br>"; 
    echo"Date of birth" . "<br>"; 
    echo"\n" . $stroka['date_of_birth'] . "<br>";
    echo"Telephone number" . "<br>";
    echo"\n" . $stroka['tele_number'] . "<br>";
        echo"Group id" . "<br>";
    echo"\n" . $stroka['id_group'] . "<br>";
        echo"Number passes" . "<br>";
    echo"\n" . $stroka['number_passes'] . "<br>";
        echo"Headman" . "<br>";
    if ($stroka['headman']) {
    echo"\n yes" . "<br>" ;
} 
else{
     echo"no" . "<br>" ;
}
            echo"Budjet" . "<br>";
    if ($stroka['budjet']) {
    echo"\n yes" . "<br>" ;
} 
else{
     echo"no" . "<br>" ;
}
    echo"-----------------------" . "<br>";
}
?>
</div>
<form>
<input class="button" value="Вернутся обратно" onClick='location.href="login.php"'>
</form>
<?php include("includes/footer.php"); ?>