<!-- File: /app/View/Posts/view.ctp -->

<!--CONTENT-->
		<div class="content">
			<?php
			if (@$results){
				?>
				<div class="box" id="questions">
				<h2>Resultados encontrados para: '<?php echo $_GET['search']; ?>'</h2>
				<ul>
				<?php foreach ($results as $result): ?>
				<li>
				<?php
					echo $this->Html->link(
										$result['Question']['title'],
										array('action' => 'view', $result['Question']['id'])
									);
				?>
				</li>
				<?php
				endforeach;
				?>
				</ul>
				</div>
				<?php
			}
			?>
			
		
		</div>