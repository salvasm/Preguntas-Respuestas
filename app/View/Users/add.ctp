<!-- app/View/Questions/add.ctp -->
<div class="content">
<?php echo $this->Form->create('User'); ?>
 		<div class="box" id="questions">

		<h2><?php echo __('Login'); ?> </h2>
			<div class="form_basic">
        <?php
		echo $this->Form->input('username', array('placeholder'=> __('Username')));
		echo $this->Form->input('email', array('placeholder'=> __('Correo electronico')));
        echo $this->Form->input('password', array('placeholder'=> __('Password')));
		echo "Fecha de nacimiento:";
		echo $this->Form->input('birthday', array('placeholder'=> __('Fecha de nacimiento')));
		//echo $this->Form->input('avatar', array('type' => 'file'));
        //echo $this->Form->input('user_type', array(
        //    'options' => array('admin' => 'Admin', 'author' => 'Author')
        ;
	echo $this->Form->end(__('Resistrarse')); ?>
	</div>
		</div>
	</div>