<!-- File: /app/View/Books/view.ctp -->

<h1><?php echo h($book['Books']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?> | Created: <?php echo $post['Post']['user_id']; ?></small></p>

<p><?php echo h($post['Post']['body']); ?></p>