<!-- File: /app/View/Posts/view.ctp -->


<!--CONTENT-->
		<div class="content">
			<div class="box" id="questions">
				<h2><?php echo h($question['Question']['title']); ?></h2>
				<div class="user_data">
					<img src="src/img/user_256.png" class="avatar" />
					<span><br/>
						<?php 
							$id = $question['Question']['id_user'];
							echo $user[$id]['User']['username'];
						?><br/>
						<data><?php echo $question['Question']['created']; ?></data>
					</span>
				</div>
				<div class="question"><?php echo h($question['Question']['body']); ?></div>
				<div class="question_tags"><span>Tag: <?php echo h($question['Question']['id_tag']); ?></span></div>
			</div>
			
			<div class="box" id="answers">
				<h2>Deja tu respuesta</h2>
				<form action="#">
					<textarea name="name" rows="5" cols="40" id="responder_comments" placeholder="Escribir aquí tu respuesta..."></textarea>
					<input type="button" name="name" id="button" value="Enviar respuesta">
				</form>
			</div>
			
			<div class="box" id="answers">
				<h2>Respuestas</h2>
				<ul id="comments">
					<li>
						<div class="user_data_comments">
							<img src="src/img/user_256.png" class="avatar_comments" />
							<span>
								<?php 
									$id = $answer['Answer']['id_user'];
									echo $answer[$id]['User']['username'];
								?>
							</span>
						</div>
						<div class="comment">
							<div class="comment_options">
								<input type="button" name="Responder" id="button_response" value="Responder comentario" />
							</div>
						</div>
					</li>
				

				</ul>
			</div>
		</div>