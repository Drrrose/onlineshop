<?php if ($session->get("errors")): ?>
    <?php foreach ($session->get("errors") as $error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endforeach; ?>
    <?php $session->remove("errors"); ?>
<?php endif; ?>