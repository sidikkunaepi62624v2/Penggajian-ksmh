<?php $__env->startSection('content'); ?>
          <br><br><br><br><br><br>
                  <div class="x_title">
                    <center><h2>Detail Pegawai</h2></center>
                  </div>
                    <form class="form-horizontal">
        <div class="form-group">
            <label for="isbn" class="col-sm-2 control-label">NIP</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="isbn" placeholder="<?php echo e($data->Nip); ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="isbn" class="col-sm-2 control-label">Jabatan</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="isbn" placeholder="<?php echo e($data->Jabatan->Nama_jabatan); ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="isbn" class="col-sm-2 control-label">Golongan</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="isbn" placeholder="<?php echo e($data->Golongan->Nama_golongan); ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="isbn" class="col-sm-2 control-label">Photo</label>
            <div class="col-sm-8">
                <img src="<?php echo e(asset('/image/'.$data->Photo)); ?>" height="120px" width="100px">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="<?php echo e(url('Pegawai')); ?>" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
                
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.penggajian', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>