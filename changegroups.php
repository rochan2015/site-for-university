
<?php include("includes/header.php"); ?>
<h2>
    Введите данные для заполнения, та выберите нужное действие
    </h>
<form action="changegroups.php" method="post">
      <p>
        <label for="id">id_group:</label>
        <input type="number" name="id" id="id">
    </p>
    <p>
        <label for="name">name:</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="id_curator">id_curator:</label>
        <input type="number" name="id_curator" id="id_curator">
    </p>
    <p>
        <label for="id_speciality">id_speciality:</label>
        <input type="number" name="id_speciality" id="id_speciality">
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
$id_group = mysqli_real_escape_string($link, $_REQUEST['id']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$id_curator = mysqli_real_escape_string($link, $_REQUEST['id_curator']);
$id_speciality = mysqli_real_escape_string($link, $_REQUEST['id_speciality']);
// Attempt insert query execution
if($id_group!=null && $name!=null && $id_curator!=null && $id_speciality!=null){
$sql = "INSERT INTO groups (id, name, id_curator, id_speciality) VALUES ('$id_group','$name', '$id_curator', '$id_speciality')";
if(mysqli_query($link, $sql)){
     $message = "Records added successfully.";
} else{
    $message = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}else{
    $message = "Fields don`t have to be empty";
}
mysqli_close($link);
}else {}
?>


<?php
if(isset($_POST["delete"])){
$link = mysqli_connect("localhost", "root", "", "univesity");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$id_group = mysqli_real_escape_string($link, $_REQUEST['id']);
 
// Attempt delete query execution
if($id_group!=null){
$sql = "DELETE FROM groups WHERE id='$id_group'";
if(mysqli_query($link, $sql)){
     $message = "Records were deleted successfully.";
} else{
     $message = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}else{
    $message = "Fields don`t have to be empty";
}
}else{}
?>


<?php
if(isset($_POST["update"])){
$link = mysqli_connect("localhost", "root", "", "univesity");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$id_group = mysqli_real_escape_string($link, $_REQUEST['id']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$id_curator = mysqli_real_escape_string($link, $_REQUEST['id_curator']);
$id_speciality = mysqli_real_escape_string($link, $_REQUEST['id_speciality']);
 
// Attempt update query execution
if($id_group!=null && $name!=null && $id_curator!=null && $id_speciality!=null){
$sql = "UPDATE groups SET name ='$name', id_curator ='$id_curator', id_speciality ='$id_speciality' WHERE id='$id_group'";

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