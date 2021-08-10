<?php /** @var object $task */
// If $task->description is not defined we need it to be an empty string
if ($task->description) {
	$description = $task->description;
} else {
	$description = '';
}
?>
<div>
	<?= form_label('Description', 'description'); ?>
	<?= form_input('description', old('description', $description) , ['id' => 'description']); ?>
</div>