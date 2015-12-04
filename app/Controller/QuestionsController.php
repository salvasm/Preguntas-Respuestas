<?php
// File: /app/Controller/PostsController.php
class QuestionsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function index() {
        $this->set('questions', $this->Question->find('all'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid question'));
        }

        $question = $this->Question->findById($id);
        if (!$question) {
            throw new NotFoundException(__('Invalid question'));
        }
        $this->set('question', $question);
		
		// Load Users
		$this->loadModel('User');
		$users = $this->User->find('all');
		$this->set('user', $users);
		
		// Load comentarios para pregunta según ID
		$this->loadModel('Answer');
		$answers = $this->Answer->findAllById_question($id);
		$this->set('answer', $answers);

    }

	public function add() {
		if ($this->request->is('post')) {
			//Added this line
			$this->request->data['Question']['id_user'] = $this->Auth->user('id');
			if ($this->Question->save($this->request->data)) {
				$this->Flash->success(__('Your question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
	
	public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid question'));
    }

    $question = $this->Question->findById($id);
    if (!$question) {
        throw new NotFoundException(__('Invalid question'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->Question->id = $id;
        if ($this->Question->save($this->request->data)) {
            $this->Flash->success(__('Your question has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Unable to update your question.'));
    }

    if (!$this->request->data) {
        $this->request->data = $question;
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