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
						<data><?php echo $question['Question']['created']; ?></data>
					</span>
				</div>
				<div class="question"><?php echo h($question['Question']['body']); ?></div>
				<div class="question_tags"><span>Tag: <?php echo h($question['Question']['id_tag']); ?></span></div>
			</div>
			
			<div class="box" id="answers">
				<h2>Deja tu respuesta</h2>
				<!--
				<form action="#">
					<textarea name="name" rows="5" cols="40" id="responder_comments" placeholder="Escribir aquí tu respuesta..."></textarea>
					<input type="button" name="name" id="button" value="Enviar respuesta">
				</form>
				-->
				
				<h1>Add Question</h1>
				<?php
				echo $this->Form->create('Answers');
				echo $this->Form->input('body', array('rows' => '3'));
				echo $this->Form->input('id_question');
				echo $this->Form->end('Save Answer');
				print_r ($answer[0]);
				?>
				
			</div>
			


			
			<div class="box" id="answers">
				<h2>Respuestas (<?php echo count($answer); ?>)</h2>
	
				<?php if($answer) {  ?>
					<ul id="comments">				
						<?php foreach ($answer as $answers): ?>
							<li>
								<div class="user_data_comments">
									<img src="<?php echo $user[$id-2]['User']['avatar']; ?>" class="avatar_comments" />
									<span>
										<?php echo $user[$id-2]['User']['username']; ?>
									</span>
								</div>
								<div class="comment"><?php echo $answers['Answer']['body'];?>
									<div class="comment_options">
										<input type="button" name="Responder" id="button_response" value="Responder comentario" />
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