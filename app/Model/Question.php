<?php
class Question extends AppModel {
    
	public $name = 'Question';
	
	public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        )
    );

	/* hasMany Pruebas */
	public $hasMany = array (
		'Answer'   =>  array(
			'className' => 'Answer',
			'foreignKey' => 'id_question',
			'order' => 'date DESC'
		),
	);
	
	public function isOwnedBy($question, $user) {
		return $this->field('id', array('id' => $question, 'id_user' => $user)) !== false;
	}
}