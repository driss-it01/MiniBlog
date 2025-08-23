<?php ob_start(); ?>
<h2>Create Post</h2>
<form action="" method="post">
    Title : <input type="text" name="title" required> <br><br>
    Content : <br>
    <textarea name="content" rows="5" cols="40" required></textarea> <br><br>
    <button type="submit">Save</button>
</form>
<?php $content = ob_get_clean(); include "layout.php"; ?>