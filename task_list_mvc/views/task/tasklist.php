<div class="index_container">
	<h2><? echo htmlspecialchars($_SESSION['login']); ?></h2>
	<form method="POST">
		<div class="menu_container">
			Задайте себе задание:<input type="text" name="task_name"><br>
			<input type="submit" name="task_add" value="Добавить">
			<input type="submit" name="task_all_clean" value="Очистить">
			<input type="submit" name="task_clean" value="Убрать Задания">
			<input type="submit" name="task_done" value="Отм. как выполненно">
			<input type="submit" name="out" value="Выйти">
		</div>
		<div class="list_container">
			<table>
				<? foreach ($tasks as $task) { ?>
					<tr>
						<td style="color:<?if(htmlspecialchars($task['status']) == 1):?>green<?php endif;?>;"><?= htmlspecialchars($task['description'])?></td>
						<td><input type="checkbox" name="checked[]" value="<?=htmlspecialchars($task[id]) ?>" /></td>
					</tr>
				<? } ?>
			</table>
		</div>
	</form>
</div>