<div class="mt-4 mb-2">
    <h3 class="alert alert-danger" style="overflow: auto;" role="alert"><?php echo $this->Get('excpMsg'); ?></h3>
</div>

<?php if (DEBUG): ?>
    <div class="alert alert-danger" role="alert">
        Stack Trace:
        <?php
        var_dump($this->
                        Get('excpTrc'));
        ?>
    </div>
<?php endif; ?>