
<?php include("includes/header.php"); ?>
<h2>
    Введите данные для заполнения, та выберите нужное действие
    </h>
<form action="changefaculty.php" method="post">
      <p>
        <label for="id">id_decanat:</label>
        <input type="number" name="id" id="id">
    </p>
    <p>
        <label for="name">name:</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="id_department">id_department:</label>
        <input type="number" name="id_department" id="id_department">
    </p>
    <p>
        <label for="id_dean">id_dean:</label>
        <input type="number" name="id_dean" id="id_dean">
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
$id_decanat = mysqli_real_escape_string($link, $_REQUEST['id']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$id_department = mysqli_real_escape_string($link, $_REQUEST['id_department']);
$id_dean = mysqli_real_escape_string($link, $_REQUEST['id_dean']);
// Attempt insert query execution
if($id_decanat!=null && $name!=null && $id_department!=null && $id_dean!=null){
$sql = "INSERT INTO faculty (id, name, id_department, id_dean) VALUES ('$id_decanat','$name', '$id_department', '$id_dean')";
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

$id_decanat = mysqli_real_escape_string($link, $_REQUEST['id']);
 
// Attempt delete query execution
if($id_decanat!=null){
$sql = "DELETE FROM faculty WHERE id='$id_decanat'";
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

$id_decanat = mysqli_real_escape_string($link, $_REQUEST['id']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$id_department = mysqli_real_escape_string($link, $_REQUEST['id_department']);
$id_dean = mysqli_real_escape_string($link, $_REQUEST['id_dean']);
 
// Attempt update query execution
if($id_decanat!=null && $name!=null && $id_department!=null && $id_dean!=null ){
$sql = "UPDATE faculty SET name ='$name', id_department ='$id_department', id_dean ='$id_dean' WHERE id='$id_decanat'";

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