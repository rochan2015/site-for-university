
<?php include("includes/header.php"); ?>
<h2>
    Введите данные для заполнения, та выберите нужное действие
    </h>
<form action="changedepartment.php" method="post">
      <p>
        <label for="id">id_department:</label>
        <input type="number" name="id" id="id">
    </p>
    <p>
        <label for="name">name:</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="id_head_department">id_head_department:</label>
        <input type="number" name="id_head_department" id="id_head_department">
    </p>
    <p>
        <label for="id_department_secretary">id_department_secretary:</label>
        <input type="number" name="id_department_secretary" id="id_department_secretary">
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
$id_department = mysqli_real_escape_string($link, $_REQUEST['id']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$id_head_department = mysqli_real_escape_string($link, $_REQUEST['id_head_department']);
$id_department_secretary = mysqli_real_escape_string($link, $_REQUEST['id_department_secretary']);
// Attempt insert query execution
if($id_department!=null && $name!=null && $id_head_department!=null && $id_department_secretary!=null){
$sql = "INSERT INTO department (id, name, id_head_department, id_department_secretary) VALUES ('$id_department','$name', '$id_head_department', '$id_department_secretary')";
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

$id_department = mysqli_real_escape_string($link, $_REQUEST['id']);
 
// Attempt delete query execution
if($id_department!=null){
$sql = "DELETE FROM department WHERE id='$id_department'";
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

$id_department = mysqli_real_escape_string($link, $_REQUEST['id']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$id_head_department = mysqli_real_escape_string($link, $_REQUEST['id_head_department']);
$id_department_secretary = mysqli_real_escape_string($link, $_REQUEST['id_department_secretary']);
 
// Attempt update query execution
if($id_department!=null && $name!=null && $id_head_department!=null && $id_department_secretary!=null){
$sql = "UPDATE department SET name ='$name', id_head_department ='$id_head_department', id_department_secretary ='$id_department_secretary' WHERE id='$id_department'";

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