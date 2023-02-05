<?php
$qc_controller = new QuestionsController1();

if ($_POST['r'] == 'capture-lessons-delete-question3'   && !isset($_POST['crud'])) {

	$question3 = $qc_controller->get3($_POST['question3']);

	if (empty($question3)) {
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

		printf($template, $_POST['question3']);
	} else {
		$template_question3 = '
			<h2 class="">Eliminar pregunta</h2>
			<form method="POST" class="">
				<div class="">
					¿Estas seguro de eliminar pregunta: 
					<mark class="">%s</mark>?
				</div>
				<div class="">
					<input  class="" type="submit" value="SI">
					<input class="" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="question3" value="%s">
					<input type="hidden" name="r" value="capture-lessons-delete-question3">
					<input type="hidden" name="crud" value="del">
				</div>
			</form>
		';

		printf(
			$template_question3,
			$question3[0]['question3'],
			$question3[0]['question3']
		);
	}
} else if ($_POST['r'] == 'capture-lessons-delete-question3'   && $_POST['crud'] == 'del') {

	$question3 = $qc_controller->del3($_POST['question3']);

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

	printf($template, $_POST['question3']);
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}