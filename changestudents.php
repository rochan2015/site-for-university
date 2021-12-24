
<?php include("includes/header.php"); ?>
<h2>
    Введите данные для заполнения, та выберите нужное действие
    </h>
<form action="changestudents.php" method="post">
      <p>
        <label for="id">id_students:</label>
        <input type="number" name="id" id="id">
    </p>
    <p>
        <label for="name">name:</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="date_of_birth">date of birth:</label>
        <input type="date" name="date_of_birth" id="date_of_birth">
    </p>
    <p>
        <label for="tele_number">tele number:</label>
        <input type="number" name="tele_number" id="tele_number">
    </p>
    <p>
        <label for="budjet">budjet:</label>
        <input type="bool" name="budjet" id="budjet">
    </p>
    <p>
        <label for="id_group">id group:</label>
        <input type="id_group" name="id_group" id="id_group">
    </p>
    <p>
        <label for="number_passes">missed days:</label>
        <input type="text" name="number_passes" id="number_passes">
    </p>

<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить"><br>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"><br>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Изменить"><br>
<br> <input class="button1" value="Вернутся обратно" onClick='location.href="changemenu.php"'> <br>
<br> <input class="button1" value="Вернутся в главное меню" onClick='location.href="intropage.php"'> <br>
</form>

<?php include("includes/footer.php"); ?>



<?php
if(isset($_POST["add"])){
$link = mysqli_connect("localhost", "root", "", "univesity");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$id_students = mysqli_real_escape_string($link, $_REQUEST['id']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$date_of_birth = mysqli_real_escape_string($link, $_REQUEST['date_of_birth']);
$tele_number = mysqli_real_escape_string($link, $_REQUEST['tele_number']);
$budjet = mysqli_real_escape_string($link, $_REQUEST['budjet']);
$id_group = mysqli_real_escape_string($link, $_REQUEST['id_group']);
$number_passes = mysqli_real_escape_string($link, $_REQUEST['number_passes']);
// Attempt insert query execution
if($id_students!=null && $name!=null && $date_of_birth!=null && $tele_number!=null && $budjet!=null && $id_group!=null && $number_passes!=null){
$sql = "INSERT INTO students (id, name, date_of_birth, tele_number,budjet,id_group,number_passes) VALUES ('$id_students','$name', '$date_of_birth', '$tele_number','$budjet','$id_group','$number_passes')";
if(mysqli_query($link, $sql)){
     $message = "Records added successfully.";
} else{
    $message = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}else{
    $message = "Fields don`t have to be empty";
}
}else {}
?>


<?php
if(isset($_POST["delete"])){
$link = mysqli_connect("localhost", "root", "", "univesity");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$id_students = mysqli_real_escape_string($link, $_REQUEST['id']);
 
// Attempt delete query execution
if($id_students!=null){
$sql = "DELETE FROM students WHERE id='$id_students'";
if(mysqli_query($link, $sql)){
     $message = "Records were deleted successfully.";
} else{
     $message = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}else{
    $message = "Fields don`t have to be empty";
}
}else {}
?>


<?php
if(isset($_POST["update"])){
$link = mysqli_connect("localhost", "root", "", "univesity");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$id_students = mysqli_real_escape_string($link, $_REQUEST['id']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$date_of_birth = mysqli_real_escape_string($link, $_REQUEST['date_of_birth']);
$tele_number = mysqli_real_escape_string($link, $_REQUEST['tele_number']);
$budjet = mysqli_real_escape_string($link, $_REQUEST['budjet']);
$id_group = mysqli_real_escape_string($link, $_REQUEST['id_group']);
$number_passes = mysqli_real_escape_string($link, $_REQUEST['number_passes']);
 
// Attempt update query execution
if($id_students!=null && $name!=null && $date_of_birth!=null && $tele_number!=null && $budjet!=null && $id_group!=null && $number_passes!=null){
$sql = "UPDATE students SET name ='$name', date_of_birth = '$date_of_birth', tele_number ='$tele_number', budjet = '$budjet', id_group='$id_group', number_passes='$number_passes' WHERE id='$id_students'";

if(mysqli_query($link, $sql)){
     $message = "Records were updated successfully.";
} else {
     $message = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
}else{
    $message = "Fields don`t have to be empty";
}
}else {}
?>
<?php if (!empty($message)) {echo "<p class='error'>" . "MESSAGE: ". $message . "</p>";} ?>