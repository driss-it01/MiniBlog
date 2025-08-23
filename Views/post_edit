<?php ob_start(); ?>
<h2>Edit Post</h2>
<form action="" method="post">
    Title : <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required> <br> <br>
     Content : <br>
    <textarea name="content" rows="5" cols="40" required><?= htmlspecialchars($post['content']) ?></textarea> <br><br>
    <button type="submit">Update</button>
</form>
<?php $content = ob_get_clean(); include "layout.php"; ?>