
<?php include("includes/header.php"); ?>
<h2>
    Введите данные для заполнения, та выберите нужное действие
    </h>
<form action="changelector.php" method="post">
      <p>
        <label for="id">id_lector:</label>
        <input type="number" name="id" id="id">
    </p>
    <p>
        <label for="id_department">id_department:</label>
        <input type="number" name="id_department" id="id_department">
    </p>
    <p>
        <label for="name">name:</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="age">age</label>
        <input type="number" name="age" id="age">
    </p>
    <p>
        <label for="expirience">expirience:</label>
        <input type="number" name="expirience" id="expirience">
    </p>
  <p>
        <label for="post">post:</label>
        <input type="text" name="post" id="post">
    </p>
    <p>
        <label for="tele_number">tele_number:</label>
        <input type="number" name="tele_number" id="tele_number">
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
$id_lector = mysqli_real_escape_string($link, $_REQUEST['id']);
$id_department = mysqli_real_escape_string($link, $_REQUEST['id_department']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
$expirience = mysqli_real_escape_string($link, $_REQUEST['expirience']);
$post= mysqli_real_escape_string($link, $_REQUEST['post']);
$tele_number = mysqli_real_escape_string($link, $_REQUEST['tele_number']);

// Attempt insert query execution
if($id_lector!=null && $id_department!=null && $name!=null && $age!=null && $expirience!=null && $post!=null && $tele_number!=null){
$sql = "INSERT INTO lector (id, id_department, name, age, expirience, post, tele_number) VALUES ('$id_lector','$id_department', '$name', '$age','$expirience','$post','$tele_number')";
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

$id_lector = mysqli_real_escape_string($link, $_REQUEST['id']);
 
// Attempt delete query execution
if($id_lector!=null){
$sql = "DELETE FROM lector WHERE id='$id_lector'";
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

$id_lector = mysqli_real_escape_string($link, $_REQUEST['id']);
$id_department = mysqli_real_escape_string($link, $_REQUEST['id_department']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
$expirience = mysqli_real_escape_string($link, $_REQUEST['expirience']);
$post= mysqli_real_escape_string($link, $_REQUEST['post']);
$tele_number = mysqli_real_escape_string($link, $_REQUEST['tele_number']);
 
// Attempt update query execution
if($id_lector!=null && $id_department!=null && $name!=null && $age!=null && $expirience!=null && $post!=null && $tele_number!=null){
$sql = "UPDATE lector SET id_department='$id_department', name ='$name', age = '$age', expirience ='$expirience', post ='$post' ,tele_number ='$tele_number' WHERE id='$id_lector'";

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