	<!--CONTENT-->
	
	<div class="content">
			<?php
			echo $this->Flash->render('auth');
			echo $this->Form->create('User');
		?>
		<div class="box" id="questions">

		<h2><?php echo __('Login'); ?> </h2>
			<div class="form_basic">
			<?php
				echo $this->Form->input('username', array('placeholder'=> __('Username')));
				echo $this->Form->input('password', array('placeholder'=> __('Password')));
				echo $this->Form->end(__('Login'));
			?>
			</div>
		</div>
	</div>