<?php if(session($key ?? 'error')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo session($key ?? 'error'); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/alerts/error.blade.php ENDPATH**/ ?>