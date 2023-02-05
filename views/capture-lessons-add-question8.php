<?php
if ($_POST['r'] == 'capture-lessons-add-question8'   && !isset($_POST['crud'])) {

	$name_lessons_controller = new LessonsTitlesController();
	$name_lesson = $name_lessons_controller->get();
	$name_lesson_select = '';
	for ($n = 0; $n < count($name_lesson); $n++) {
		$name_lesson_select .= '<option value="' . $name_lesson[$n]['id_lesson_title'] . '">' . $name_lesson[$n]['name_lesson'] . '</option>';
	}

	printf('
		<h2 class="">Agregar pregunta</h2>
		<form method="POST" class="">
			<div class="">
				<input type="hidden" name="id_question8" value="0">
			</div>
			<div class="">
				<input type="text" name="question8" placeholder="Pregunta" required>
			</div>
			<div class="">
				<select name="name_lesson" placeholder="Nombre de lección" required>
					<option value="">name_lesson</option>
					%s
				</select>
			</div>
			<div class="">
				<input  class="button  add" type="submit" value="Agregar">
				<input type="hidden" name="r" value="capture-lessons-add-question8">
				<input type="hidden" name="crud" value="set">
			</div>
		</form>
	', $name_lesson_select);
} else if ($_POST['r'] == 'capture-lessons-add-question8'   && $_POST['crud'] == 'set') {
	$brc_controller = new QuestionsController1();

	$newtvc = array(
		'id_question8' =>  $_POST['id_question8'],
		'question8' =>  $_POST['question8'],
		'name_lesson' =>  $_POST['name_lesson']
	);

	$brc = $brc_controller->set8($newtvc);

	$template = '
		<div class="container">
			<p class="item  add">Pregunta <b>%s</b> salvado</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("capture-lessons")
			}
		</script>
	';

	printf(
		$template,
		$_POST['question8'],
	);
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}