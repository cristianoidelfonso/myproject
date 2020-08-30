<?php
    $errors = [];
    $message = null;

    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    } elseif (isset($exception)) {
        $message = [
            'type' => 'error',
            'message' => $exception->getMessage()
        ];

        if (get_class($exception) === 'ValidationException') {
            $errors = $exception->getErrors();
        }
    }

    if (isset($message)) {
        $alertType = $message['type'] === 'error' ? 'danger' : 'success';
    }

?>

<?php if (isset($message)) : ?>
    <div id="message" role="alert" class="text-center alert alert-<?= $alertType ?>">
        <?= isset($message) ? $message['message'] : '' ?>
    </div>
<?php endif ?>
