<?php $__env->startSection('content'); ?>
          <br><br><br><br><br><br>
                  <div class="x_title">
                    <center><h2>Detail Data User</h2></center>
                  </div>
                    <br />
                    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="<?php echo e($data->name); ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="<?php echo e($data->email); ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Permission</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="<?php echo e($data->permission); ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="<?php echo e(url('User')); ?>" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>


    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.penggajian', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>