<?php
// File: /app/Controller/PostsController.php
class AnswersController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

	public function index() {
        $this->set('answers', $this->Answer->find('all'));
	}
	
	public function add() {
		if ($this->request->is('post')) {
			//Added this line
			$this->request->data['Answer']['id_user'] = $this->Auth->user('id');
			
			if ($this->Answer->save($this->request->data)) {
				$this->Flash->success(__('Your answer has been saved.'));
				return $this->redirect(array('controller' => 'questions', 'action' => 'index'));
			}
		}
	}
	
	public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid answer'));
    }

    $answer = $this->Answer->findById($id);
    if (!$answer) {
        throw new NotFoundException(__('Invalid answer'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->Answer->id = $id;
        if ($this->Answer->save($this->request->data)) {
            $this->Flash->success(__('Your answer has been updated.'));
            return $this->redirect(array('controller' => 'questions','action' => 'index'));
        }
        $this->Flash->error(__('Unable to update your answer.'));
    }

    if (!$this->request->data) {
        $this->request->data = $answer;
    }
	
}

public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Question->delete($id)) {
        $this->Flash->success(
            __('The question with id: %s has been deleted.', h($id))
        );
    } else {
        $this->Flash->error(
            __('The question with id: %s could not be deleted.', h($id))
        );
    }

    return $this->redirect(array('action' => 'index'));
}


public function isAuthorized($user) {
    // All registered users can add questions
    // if ($this->action === 'add') {
	if (in_array($this->action, array('add', 'index', 'view'))) {    
		return true;
    }

    // The owner of a post can edit and delete it
    if (in_array($this->action, array('edit', 'delete'))) {
        $postId = (int) $this->request->params['pass'][0];
        if ($this->Question->isOwnedBy($postId, $user['id'])) {
            return true;
        }
    }

    return parent::isAuthorized($user);
}


}