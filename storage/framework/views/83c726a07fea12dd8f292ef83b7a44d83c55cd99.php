<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('User Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('users.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('users.store')); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Adding User information')); ?></h6>
                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?></label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('name')); ?>" required autofocus>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-email"><?php echo e(__('Email')); ?></label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Email')); ?>" value="<?php echo e(old('email')); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'email'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <!-- dob -->
                                 <div class="form-group<?php echo e($errors->has('dob') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-email"><?php echo e(__('Date Of Birth')); ?></label>
                                    <input type="date" name="dob" id="input-dob" class="form-control form-control-alternative<?php echo e($errors->has('dob') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Date Of Birth')); ?>" value="<?php echo e(old('dob')); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'dob'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <!-- contact-->
                                  <div class="form-group<?php echo e($errors->has('contact') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-email"><?php echo e(__('Contact Number')); ?></label>
                                    <input type="number" name="contact" id="input-contact" class="form-control form-control-alternative<?php echo e($errors->has('contact') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Contact Number')); ?>" value="<?php echo e(old('contact')); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'contact'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('password') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-password"><?php echo e(__('Password')); ?></label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Password')); ?>" value="" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'password'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation"><?php echo e(__('Confirm Password')); ?></label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="<?php echo e(__('Confirm Password')); ?>" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users', 'section' => 'users'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/users/create.blade.php ENDPATH**/ ?>