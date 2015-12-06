<!-- File: /app/View/Posts/view.ctp -->


<!--CONTENT-->
		<div class="content">
			<div class="box" id="questions">
				<h2><?php echo h($question['Question']['title']); ?></h2>
				<div class="user_data">
					<img src="<?php 
						$id = $question['Question']['id_user'];
						echo $user[$id-2]['User']['avatar']; ?>" class="avatar" />
					<span><br/>
						<?php 
							echo $user[$id-1]['User']['username'];
						?><br/>
						<data><?php echo date('j F Y', strtotime($question['Question']['created'])); ?><br/><?php echo date('g:i a', strtotime($question['Question']['created'])); ?></data>
					</span>
				</div>
				<div class="question"><?php echo h($question['Question']['body']); ?></div>
				<div class="question_tags"><span>Category: <?php echo h($question['Question']['category']); ?></span></div>
			</div>
			
			<div class="box" id="answers">
				<h2>Deja tu respuesta</h2>
				<!--
				<form action="#">
					<textarea name="name" rows="5" cols="40" id="responder_comments" placeholder="Escribir aquí tu respuesta..."></textarea>
					<input type="button" name="name" id="button" value="Enviar respuesta">
				</form>
				-->
				
				<?php
				echo $this->Form->create('Answer');
				echo $this->Form->input('body', array('rows' => '3', 'id' => 'responder_comments', 'placeholder' => 'Escribe tu respuesta...'));				
				echo $this->Form->end(array('label' => 'Enviar respuesta','id' => 'button'));
				?>
				
			</div>
			


			
			<div class="box" id="answers">
				<h2>Respuestas (<?php echo count($answers); ?>)</h2>
	
				
	
				<?php if($answers) {  ?>
					<ul id="comments">					
						<?php foreach ($answers as $answer): ?>
							<li>
								<div class="user_data_comments">
									<img src="<?php echo $user[$id]['User']['avatar']; ?>" class="avatar_comments" />
									<span>
										<?php echo $user[$id-1]['User']['username']; ?>
									</span>
								</div>
								<div class="comment"><?php echo $answer['Answer']['body'];?>
									<div class="comment_options">	
									<?php echo $this->Html->link('Like', array('action'=>'like')); ?>									
									</div>
								</div>
							</li>
						<?php endforeach; ?>
						
					</ul>
				<?php } else { ?> 
				<center><p>Nadie ha respondido a esta pregunta todavía.</p></center>
				<?php } ?>
			</div>
			

					
		</div>