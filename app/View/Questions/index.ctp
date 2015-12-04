<!-- File: /app/View/Questions/index.ctp -->

<!-- Here's where we loop through our $questions array, printing out question info -->
		<!--CONTENT-->
		<div class="content">
			<div class="left">
				<div class="box" id="questions">
					<h2>Últimas preguntas</h2>
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

						<!--
								<?php
									echo $this->Form->postLink(
										'Delete',
										array('action' => 'delete', $question['Question']['id']),
										array('confirm' => 'Are you sure?')
									);
								?>
								<?php
									echo $this->Html->link(
										'Edit', array('action' => 'edit', $question['Question']['id'])
									);
								?>
						-->
						<div class="details">
								<?php echo $question['Question']['created']; ?>
						</div>
								<?php endforeach; ?>
									</ul>
				</div>

				<div class="box" id="answers">
					<h2>Últimas respuestas</h2>
					<ul>
						<li>Sí, puede ser...</li>
						<li>Sí, puede ser...</li>
						<li>Sí, puede ser...</li>
						<li>Sí, puede ser...</li>
						<li>Sí, puede ser...</li>
					</ul>
				</div>
			</div>

			<div class="right">
				<div class="box preguntaya">
					<h2>¡Envía tu pregunta!</h2>
					<form action="#">
						<input type="text" name="name" value="" id="preguntaya" placeholder="Escribe tu pregunta..." />
						<input type="submit" name="name" id="button_preguntaya" value="Enviar pregunta" />
					</form>
				</div>
				<div class="box" id="users">
					<h2>Usuarios más activos</h2>
					<ol>
						<li>Usuario
							<span class="user_responses">6</span>
						</li>
						<li>Felipa
							<span class="user_responses">5</span>
						</li>
						<li>Administrador
							<span class="user_responses">3</span>
						</li>
						<li>Jose
							<span class="user_responses">3</span>
						</li>
						<li>Pepe
							<span class="user_responses">1</span>
						</li>
					</ol>
				</div>
			</div>