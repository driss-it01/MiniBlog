<?php ob_start(); ?>
<a href="index.php?action=create"> NEW POST</a>
<table border="1" cellpadding="5">
    <tr><th>ID</th><th>Title</th><th>Content</th><th>Actions</th></tr>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= $post["id"] ?></td>
            <td><?= htmlspecialchars($post["title"]) ?></td>
            <td><?= nl2br(htmlspecialchars($post["content"])) ?></td>
            <td>
                <a href="index.php?action=edit&id=<?= $post["id"]?>">Edit</a>
                <a href="index.php?action=delete&id=<?= $post["id"]?>" onclick="return confirm('Delete this post?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
</table>
<?php $content = ob_get_clean(); include "layout.php"; ?>