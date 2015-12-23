<!-- File: /app/View/Posts/view.ctp -->

<!--CONTENT-->
		<div class="content">
			<div class="box" id="questions">
				<h2><?php echo h($question['Question']['title']); ?></h2>
				<div class="user_data">
					<img src="<?php 
						$id = $question['Question']['id_user'];
						echo $user[$id-1]['User']['avatar']; ?>" class="avatar" />
					<span><br/>
						<?php 
							echo $user[$id-1]['User']['username'];
						?><br/>
						<data><?php echo date('j F Y', strtotime($question['Question']['created'])); ?><br/><?php echo date('g:i a', strtotime($question['Question']['created'])); ?></data>
					</span>
				</div>
				<div class="question"><?php echo h($question['Question']['body']); ?></div>
				<div class="question_tags"><span><?php echo __('Categoria: '); ?> <?php echo h($question['Question']['category']); ?></span></div>
			</div>
			<?php 
			$session_id = $this->Session->read('User.id'); 
			$session_name = $this->Session->read('User.name');
			?>
			<?php if(@$session_name) { ?>
			<div class="box" id="answers">
				<h2><?php echo __('Deja tu respuesta'); ?></h2>
				
				<?php
				echo $this->Form->create('Answer');
				echo $this->Form->input('body', array('rows' => '3', 'id' => 'responder_comments', 'placeholder' => __('Escribe tu respuesta...')));				
				echo $this->Form->end(array('label' => __('Enviar respuesta'),'id' => 'button'));
				?>
				
			</div>
			<?php } else { ?>
		</div>
				<div class="message">Debes ser usuario registrado para poder responder.</div>
			
			
			<?php } ?>
			
			<div class="box" id="answers">
				<h2><?php echo __('Respuestas'); ?> (<?php echo count($answers); ?>)</h2>
	
				<?php if($answers) {  ?>
					<ul id="comments">					
						<?php foreach ($answers as $answer): ?>
							<li>
								<div class="user_data_comments">
									<img src="<?php echo $user[$id]['User']['avatar']; ?>" class="avatar_comments" />
									<span><br/>
										<?php 
										$id_user = $answer['Answer']['id_user'];
										echo $user[$id_user-1]['User']['username']; ?>
									</span>
								</div>
								<div class="comment"><?php echo $answer['Answer']['body'];?>
									<div class="comment_options">
										<?php
												echo "<p>" . $answer['Answer']['likes'] . "</p>";
												echo "<span>Likes</span>";
											if(@$session_name) {
												$answer_id = $answer['Answer']['id'];
												echo $this->Form->create('question', array('action' => 'like/' . $answer_id));
												echo $this->Form->end('like_32.png');
											}
										?>
									<!--<?php echo $this->Html->link('Like', array('action'=>'like')); ?>-->
									</div>
								</div>
							</li>
						<?php endforeach; ?>
						
					</ul>
				<?php } else { ?> 
				<center><p>Nadie ha respondido a esta pregunta todavía.</p></center>
				<?php } ?>
			</div>
		
					