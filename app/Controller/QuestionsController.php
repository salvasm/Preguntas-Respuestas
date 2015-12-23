<?php
// File: /app/Controller/PostsController.php

class QuestionsController extends AppController {
	
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash', 'Session', 'Cookie');

	public function beforeFilter() {
		parent::beforeFilter();
		// Allow all users to...
		$this->Auth->allow('index', 'search', 'view', 'like');
		
		$session_name = $this->Session->read('User.name');
		$this->Cookie->name = $session_name;
	}
	
    public function index() {
        $this->set('questions', $this->Question->find('all'));
		
		// Load comentarios para pregunta según ID
		$this->loadModel('Answer');
		$this->loadModel('User');
		
		// LAST 5 ANSWERS...
		$answers = $this->Answer->find('all', array('limit' => 5, 'order' => 'id DESC'));
		$this->set('answers', $answers);
		
		// HasMany -> QUESTIONS -> ANSWERS...
			
		$questions = $this->Question->find('all', array('limit' => 5, 'order' => 'id DESC'));
		$this->set('questions', $questions);
		
		// FIN HasMany -> QUESTIONS -> ANSWERS
		
		
		// JOIN de USUARIOS & ANSWERS
		
		$options['fields'] = array(
			'User.id', 
			'Answer.id_user',
			'User.username',
			'COUNT(Answer.id_user) AS num_comments'
		);
		$options['joins'] = array(
			array(
				'table' => 'answers',
				'alias' => 'Answer',
				'type' => 'INNER',
				'foreignKey' => TRUE,
				'conditions' => array('User.id = Answer.id_user')
			)
		);
		$options['group'] = array('User.username');
		$options['order'] = 'num_comments DESC';
		$options['limit'] = 5;
		$join = $this->User->find('all', $options);
		
		$this->set('join', $join);
		
		// FIN JOIN de USUARIOS & ANSWERS

			
		// Funcion para enviar pregunta
		if ($this->request->is('post')) {
			$this->request->data['Question']['id_user'] = $this->Auth->user('id');
			if ($this->Question->save($this->request->data)) {
				$this->Flash->success(__('Your question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
		}
		
		// funcion para enviar busquedas
		
		
			
    }
	
	public function search() {
		@$query = $this->request->query['search'];
			
			if ($query) {

			//$this->Question->findById($id);
			
			//$this->set($query, $this->request->query['search']);
			$conditions = array(
				'conditions' => array(
					'or' => array(
						'Question.title LIKE' => "%$query%"
						)
					)
				);
			
			$results = $this->Question->find('all', $conditions);
			$this->set('results', $results);
				if (!$results) {
					$this->Flash->default(__('No hay resultados para: ') . $query);
					return $this->redirect(array('controller' => 'questions', 'action' => 'index'));
				}

			}else {
				return $this->redirect(array('controller' => 'questions', 'action' => 'index'));
			}
	}
	
	public function like($id) {
		if (!$id) {
            throw new NotFoundException(__('Invalid request for like'));
        }
		
		$this->loadModel('Answer');
		$like = $this->Answer->findById($id);
		$this->set('like', $like);
		
		if (!$this->Cookie->read('User.like' . $id)){
			
			$this->Answer->id = $id;
			$this->Answer->updateAll(array(
				'Answer.likes' => 'Answer.likes + 1'),
				array('Answer.id' => $id));
			
			$name = $this->Cookie->read('name');
			
			$this->Cookie->write('User.like' . $id, $id);
			//$this->Session->write('User.like' . $id, $id);
			$this->Flash->success(__('Like correctamente!'));		
			$this->redirect(array('controller' => 'questions', 'action' => 'view/' . $like['Answer']['id_question']));
		} else {
			$this->Flash->error(__('No puedes votar más de una vez cada respuesta.'));		
			$this->redirect(array('controller' => 'questions', 'action' => 'view/' . $like['Answer']['id_question']));
		}
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
		$answers = $this->Answer->findAllByIdQuestion($id);
		$this->set('answers', $answers);

		// Añadir answer
		if ($this->request->is('post')) {
			
			$this->request->data['Answer']['id_user'] = $this->Auth->user('id');
			$this->request->data['Answer']['id_question'] = $id;
			
			if ($this->Answer->save($this->request->data)) {
				$this->Flash->success(__('Your answer has been saved.'));
				return $this->redirect(array('controller' => 'questions', 'action' => 'index'));
			}
		}
		
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
	if (in_array($this->action, array('add', 'index', 'view', 'profile', 'search'))) {    
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