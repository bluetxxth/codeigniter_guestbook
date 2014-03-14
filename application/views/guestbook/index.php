<!doctype html>
<meta charset=utf-8>
<title><?php echo $title; ?></title>

<!--inline style for the guest book -->
<style>
body{font-family:tahoma,sans-serif}
article{border:1px dotted gray;padding:0 1em;}
</style>

<!-- get guestbook url -->
<a href="<?php echo site_url('guestbook'); ?>"><h1>Guestbook</h1></a>

<!-- validate -->
<?php echo validation_errors(); ?>

<!-- display form-->
<?php echo $form; ?>

<!-- post all items  in the guestbook -->
<?php foreach($posts as $posts_item): ?>
<article>
<p><?php echo $posts_item['text']; ?></p>

<!-- Display author -->
<p>Author: <em><?php echo $posts_item['author']; ?></em></p>
</article>
<?php endforeach; ?>
<hr>
<strong>&copy; 2012 ake1</strong>