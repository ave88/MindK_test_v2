<form class="form-horizontal" >
<input type="hidden" class="form-control id" name='id' value="<?= $student->id ?>">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Имя</label>
    <div class="col-sm-10">
      <input type="text" class="form-control name" name='name' value="<?= $student->name ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Фамилия</label>
    <div class="col-sm-10">
      <input type="text" class="form-control surname" name='surname' value="<?= $student->surname ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Возраст</label>
    <div class="col-sm-10">
      <input type="text" class="form-control age" name='age' value="<?= $student->age ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Пол</label>
    <div class="col-sm-10">
		<div class="radio">
	  		<label>
	    		<input type="radio" name="sex" class="sex" value="0" <?=($student->sex==0) ? 'checked' : ''; ?> >
	    		Женский
	  		</label>
		</div>
		<div class="radio">
	  		<label>
	    		<input type="radio" name="sex" class="sex" value="1" <?=($student->sex==1) ? 'checked' : ''; ?> >
	    		Мужской
	  		</label>
		</div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Факультет</label>
    <div class="col-sm-10">
      <input type="text" class="form-control faculty" name='faculty' value="<?= $student->faculty ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Группа</label>
    <div class="col-sm-10">
      <input type="text" class="form-control class" name='class' value="<?= $student->class ?>">
    </div>
  </div>
</form>