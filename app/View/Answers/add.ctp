<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Answer</h1>
<?php
echo $this->Form->create('Answer');
echo $this->Form->input('body', array('rows' => '3'));
//echo $this->Form->input('id_question', array('type' => 'hidden'), ['value' => 4]);
//echo $this->Form->input('id_question', array('type' => 'hidden'));
echo $this->Form->end('Save Answer');
?>