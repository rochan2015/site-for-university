<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>
	
<?php include("includes/header.php"); ?>
<div id="welcome">
<h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
  <p><a href="logout.php">Выйти</a> из системы</p>
</div>
	
<form>
<input class="button" value="Студенты" onClick='location.href="students.php" ' > <br>
<br> <input class="button" value="Деканат" onClick='location.href="faculty.php"'> <br>
<br> <input class="button" value="Кафедра" onClick='location.href="department.php"'> <br>
<br> <input class="button" value="Преподователь" onClick='location.href="lector.php"'> <br>
<br> <input class="button" value="Группы" onClick='location.href="groups.php"'> <br>
<br> <input class="button" value="Редактировать базу данных" onClick='location.href="changemenu.php"'> <br>
</form>

<?php include("includes/footer.php"); ?>
	
<?php endif; ?>
