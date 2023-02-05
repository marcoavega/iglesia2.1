<?php
$qc_controller = new QuestionsController1();

if ($_POST['r'] == 'capture-lessons-delete-question5'   && !isset($_POST['crud'])) {

	$question5 = $qc_controller->get5($_POST['question5']);

	if (empty($question5)) {
		$template = '
			<div class="container">
				<p class="item  error">No existen preguntas <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("capture-lessons")
				}
			</script>
		';

		printf($template, $_POST['question5']);
	} else {
		$template_question5 = '
			<h2 class="">Eliminar pregunta</h2>
			<form method="POST" class="">
				<div class="">
					¿Estas seguro de eliminar pregunta: 
					<mark class="">%s</mark>?
				</div>
				<div class="">
					<input  class="" type="submit" value="SI">
					<input class="" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="question5" value="%s">
					<input type="hidden" name="r" value="capture-lessons-delete-question5">
					<input type="hidden" name="crud" value="del">
				</div>
			</form>
		';

		printf(
			$template_question5,
			$question5[0]['question5'],
			$question5[0]['question5']
		);
	}
} else if ($_POST['r'] == 'capture-lessons-delete-question5'   && $_POST['crud'] == 'del') {

	$question5 = $qc_controller->del5($_POST['question5']);

	$template = '
		<div class="container">
			<p class="item  delete">Pregunta <b>%s</b> eliminada</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("capture-lessons")
			}
		</script>
	';

	printf($template, $_POST['question5']);
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}