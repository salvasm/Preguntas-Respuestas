<!-- File: /app/View/Questions/index.ctp -->

<!-- Here's where we loop through our $questions array, printing out question info -->
		<!--CONTENT-->
		<div class="content">
			<div class="box" id="questions">
				<h2><?php echo __('Todas las preguntas'); ?></h2>

				<ul>
		<?php
		
		$session_id = $this->Session->read('User.id'); 
		$session_name = $this->Session->read('User.name'); 

	
			foreach ($question as $questions): ?>
			
			<li><?php
									echo $this->Html->link(
										$questions['Question']['title'],
										array('controller' => 'questions', 'action' => 'view', $questions['Question']['id'])
									);
								?></li>
			
						
		<?php endforeach; 
		?>	
		</ul>
			<br/>
			</div>
		</div>