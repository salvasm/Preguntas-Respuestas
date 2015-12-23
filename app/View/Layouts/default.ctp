<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Preguntas&Respuestas
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
	<!--Tipografías provisionales-->
	<link href='https://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>
	<!-- Titulo principal -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<!-- Menú y titulos secundarios -->

</head>
<body>
<!--CONTENEDOR GLOBAL-->
	<div class="wrap">
		<!--HEADER-->
		<div class="header">
			<!--TITULO-->
			<div class="titulo">
					<h1><?php echo __('PREGUNTAS&RESPUESTAS')?> </h1>
			</div>
			<!--BUSCADOR-->
			<div class="search">
				<table>
					<tr>
						<td class="spanish"><?php echo $this->Html->link('español', array('action'=>'index','es')); ?></td>
						<td class="english"><?php echo $this->Html->link('english', array('action'=>'index','en')); ?></td>
						<td>    
							<?php
								echo $this->Form->create('question', array('action' => 'search', 'type' => 'get'));
								echo $this->Form->input('search', array('placeholder' => __('Buscar...')));
								echo $this->Form->end();
							?>
						<!--<input type="text" placeholder="<?php echo __('Buscar...')?>" /> </td>-->
					</tr>
				</table>
				
			</div>
		</div>

		<!--MENU-->
		<div class="menu">
		
			<?php 
			$session_id = $this->Session->read('User.id'); 
			$session_name = $this->Session->read('User.name'); 
			//$session_lang = $this->Session->read('User.lang');
			
			//Configure::write('Config.language', $session_lang);
			
			?>
			<?php if(!$session_id) { ?>
			<ul>
				<li>
					<?php echo $this->Html->link(
						'Login',
						'/users/login',
						array('class' => 'boton_der')
					); ?>
				</li>
				<li>
						<?php echo $this->Html->link(
							'Register',
							'/users/add',
							array('class' => 'boton')
						); ?>
				</li>				
			</ul>
			<?php } else { ?>
				<ul>
					<li>
						<?php echo $this->Html->link(
							'Logout',
							'/users/logout',
							array('class' => 'boton_der')
						); ?>
					</li>
					<li>
							<?php 
							echo $this->Html->link(__('Inicio'), array('controller' => 'questions', 'action'=>'index'), array('class' => 'boton'))
							
							; ?>
					</li>
					<span class="data_user"><?php echo __('Bienvenido')?> <?php echo $session_name; ?></span>
				</ul>
			<?php } ?>
		</div>


		
			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		
	
		</div>

		<!--FOOTER-->
		<div class="footer">
			<p><?php echo __('Todos los derechos reservados | 2015')?></p>
		</div>
		
	</div>
	<!--<?php echo $this->element('sql_dump'); ?>-->
</body>
</html>
