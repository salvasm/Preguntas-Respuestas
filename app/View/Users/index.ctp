<!-- File: /app/View/Questions/index.ctp -->

<h1>Blog user</h1>
<p><?php echo $this->Html->link('Add User', array('action' => 'add')); ?></p>
<p><?php echo $this->Html->link('Logout', array('action' => 'logout')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Rol</th>
        <th>Birthday</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td><?php echo $user['User']['username']; ?></td>
        <td><?php echo $user['User']['user_type']; ?></td>
        <td><?php echo $user['User']['birthday']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>