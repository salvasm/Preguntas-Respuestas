<!-- File: /app/View/Question/edit.ctp -->

<h1>Edit Question</h1>
<?php
echo $this->Form->create('Question');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Question');
?>