<?php
class Answer extends AppModel {
    public $validate = array(
        'body' => array(
            'rule' => 'notBlank'
        )
    );
		
	public function isOwnedBy($answer, $user) {
		return $this->field('id', array('id' => $answer, 'id_user' => $user)) !== false;
	}
}