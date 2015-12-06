<!-- File: /app/View/Questions/index.ctp -->

<!-- Here's where we loop through our $questions array, printing out question info -->
		<!--CONTENT-->
		<div class="content">

		<?php
		
		$session_id = $this->Session->read('User.id'); 
		$session_name = $this->Session->read('User.name'); 
		
		if($session_name) { ?>
		
			<?php foreach ($answers as $answer): ?>
				<li><?php echo $answer['Answer']['body']; ?></li>
			<?php endforeach; ?>

		</div>