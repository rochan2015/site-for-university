<?php include("includes/header.php"); ?>
<h2>
	Выберите таблицу для редактирования
	</h>
<form>
<input class="button" value="Студенты" onClick='location.href="changestudents.php" ' > <br>
<br> <input class="button" value="Деканат" onClick='location.href="changefaculty.php"'> <br>
<br> <input class="button" value="Декан" onClick='location.href="changefacultydean.php"'> <br>
<br> <input class="button" value="Кафедра" onClick='location.href="changedepartment.php"'> <br>
<br> <input class="button" value="Секретарь кафедры" onClick='location.href="changedepartmentsecretary.php"'> <br>
<br> <input class="button" value="Директор кафедры" onClick='location.href="changedepatmentdirectory.php"'> <br>
<br> <input class="button" value="Преподователь" onClick='location.href="changelector.php"'> <br>
<br> <input class="button" value="Группы" onClick='location.href="changegroups.php"'> <br>
<br> <input class="button1" value="Вернутся обратно" onClick='location.href="intropage.php"'> <br>
</form>
<?php include("includes/footer.php"); ?>