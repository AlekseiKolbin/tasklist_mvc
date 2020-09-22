<form method="POST">
	<div class="index_container">
		Логин:<input name="login" type="text" required><br>
		Пароль:<input name="password" type="password" required><br>
		<input name="submit" type="submit" value="Зарегистрироваться/Войти"><br>
		<?= $err ;?>
	</div>
</form>