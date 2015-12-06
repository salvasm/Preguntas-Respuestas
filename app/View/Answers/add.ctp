<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Answer</h1>
<?php
echo $this->Form->create('Answer');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Answer');
?>