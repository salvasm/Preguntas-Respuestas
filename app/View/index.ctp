<!-- File: /app/View/Posts/index.ctp -->

<h1>PREGUNTAS Y RESPUESTAS</h1>
<p><?php echo $this->Html->link('Add User', array('action' => 'add')); ?></p>
<p><?php echo $this->Html->link('Logout', array('action' => 'logout')); ?></p>

<h2>Bienvenido a nuestra web</h2>

<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Rol</th>
        <th>Created</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td><?php echo $user['User']['username']; ?></td>
        <td><?php echo $user['User']['role']; ?></td>
        <td><?php echo $user['User']['created']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>