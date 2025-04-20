

<div id="smart-button-container">
  <div style="text-align: center;">
    <form action="<?php echo e(route('order')); ?>" method="post">
      <?php echo csrf_field(); ?>
      <button type="submit" class="btn btn-success"><?php echo e(get_phrase('Pay')); ?> </button>
      <input type="hidden" name="identifier" value="zarinpal">
    </form>
  </div>
</div><?php /**PATH C:\Users\PicoNet\Desktop\linkedin\resources\views/payment/zarinpal/index.blade.php ENDPATH**/ ?>