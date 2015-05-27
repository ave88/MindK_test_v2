<table class="table table-bordered">	
	<tr>						
		<th>Номер</th>
		<th>Имя</th>
		<th>Фамилия</th>
		<th>Возраст</th>
		<th>Пол</th>
		<th>Факультет</th>
		<th>Группа</th>
		<th style="width:210px">Действия</th>
	</tr>	
	<?php foreach($students as $student){ ?>
		<tr>
			<td class="user-id"><?=$student->id ?></td>
	 		<td class="user-name"><?=$student->name ?></td>
	 		<td class="user-surname"><?=$student->surname ?></td>
	 		<td class="user-age"><?=$student->age ?></td>
	 		<td class="user-sex"><?= ($student->sex==1) ?'Мужской':'Женский'; ?></td>
	 		<td class="user-faculty"><?=$student->faculty ?></td>
	 		<td class="user-class"><?=$student->class ?></td>			
			<td style="width:210px">
				<button type="button" class="btn btn-default btn-xs edit-button">
  					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Редактировать
				</button>				
				<button type="button" class="btn btn-default btn-xs dell-button">
  					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Удалить
				</button>
			</td>
	 	</tr>
	<?php } ?>	
</table>