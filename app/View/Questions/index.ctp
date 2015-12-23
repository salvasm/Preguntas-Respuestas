<!-- File: /app/View/Questions/index.ctp -->

<!-- Here's where we loop through our $questions array, printing out question info -->
		<!--CONTENT-->
		<?php 
			$session_lang = $this->Session->read('User.lang');
			Configure::write('Config.language', $session_lang);
		?>
		
		<div class="content">			
			<div class="left">
				<div class="box" id="questions">
				
					<h2> <?php echo __('Ultimas preguntas'); ?></h2>
					<ul>		
						
						<?php foreach ($questions as $question): ?>
						
						<li>
							   <?php
									echo $this->Html->link(
										$question['Question']['title'],
										array('action' => 'view', $question['Question']['id'])
									);
								?>
						</li>
	
						<div class="details" title="<?php echo date('g:ia', strtotime($question['Question']['created'])); ?>">
								<?php echo "<span>" . date('j/m/Y', strtotime($question['Question']['created'])) . "</span>" .
									$this->Html->link(count($question['Answer']) . " comentario/s" ,
									array(
										'controller' => 'questions',
										'action' => 'view/' . $question['Question']['id'] . "#answers")
									);
									
									
								?>
						</div>
						<?php endforeach; ?>
						<li class="background_button"><?php echo $this->Html->link("Ver todas las preguntas", array('controller' => 'answers'));?></li>
					</ul>
				</div>

				<div class="box" id="answers">
					<h2><?php echo __('Últimas respuestas')?></h2>
					<ul>
					<?php foreach ($answers as $answer): ?>
						<li><?php echo $this->Html->link(substr($answer['Answer']['body'], 0, 60) . " ...",
										array('action' => 'view', $answer['Answer']['id_question']));?></li>
					<?php endforeach; ?>

					</ul>
				</div>
			</div>
		
			<div class="right">
			<?php $session_id = $this->Session->read('User.id'); 
			$session_name = $this->Session->read('User.name');
			?>
				<?php if(@$session_name) { ?>
				<div class="box preguntaya">
					<h2><?php echo __('¡Envía tu pregunta!')?></h2>
					<?php
					echo $this->Form->create('Question');
					echo $this->Form->input('title', array('id' => 'preguntaya', 'placeholder'=> __('Escribe el título de tu pregunta')));
					echo $this->Form->input('body', array('id' => 'preguntaya', 'placeholder'=> __('Escribe detalladamante el contenido de tu pregunta'), 'rows' => '2'));
					echo $this->Form->input('category', array(
										'options' => array('comedia'=>'comedia','accion' =>'accion','educación' =>'educación','cine' =>'cine','deportes' =>'deportes',
										'política'=> 'política','sexo'=> 'sexo','anime' => 'anime','general' => 'general','ficción'=>'ficción','ciencias'=>'ciencias',
										'viajes'=>'viajes'),
										'empty' => __('Elige una'), 'id' => 'preguntaya'));
					echo $this->Form->end(array('label' => __('Enviar pregunta'),'id' => 'button_preguntaya'));
					?>
				</div>
				<?php } ?>
				<div class="box" id="users">
					<h2><?php echo __('Usuarios más activos')?></h2>
					<ol>
						<?php foreach ($join as $mostActives): ?>
							<li><?php echo $mostActives['User']['username'];?>
								<span class="user_responses"><?php echo $mostActives[0]['num_comments']; ?></span>				
							</li>
						<?php endforeach; ?>
					</ol>
				</div>
			</div>
			</div>