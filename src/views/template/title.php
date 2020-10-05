<div class="content-title">
    <?php if ($icon) { ?>
        <i class="icon <?= $icon ?> mr-2"></i>
    <?php } ?>
    <div class="">
        <h1><?= $title ?></h1>
        <h2><?= $subtitle ?></h2>
    </div>
    <div class="message">
        <?php include(TEMPLATE_PATH . "/messages.php"); ?>
        <?= isset($message) ? "<script>$('#message').fadeOut(6000);</script>" : ''; ?>
    </div>
</div>