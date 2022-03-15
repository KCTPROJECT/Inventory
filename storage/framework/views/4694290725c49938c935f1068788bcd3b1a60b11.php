<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Customer Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('customers.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to List')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('customers.update', $customer)); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Customer information')); ?></h6>
                             <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-name">Name</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="Name" value="<?php echo e(old('name',$customer->name)); ?>" required autofocus>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-email">Email</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="Email" value="<?php echo e(old('email',$customer->email)); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'email'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('phone') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="input-phone">Contact No</label>
                                    <input type="text" name="phone" id="input-phone" class="form-control form-control-alternative<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" placeholder="Telephone" value="<?php echo e(old('phone',$customer->phone)); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'phone'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('billing_address') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="input-dob">Billing Address</label>
                                    <input type="text" name="billing_address" id="input-billing_address" class="form-control form-control-alternative<?php echo e($errors->has('billing_address') ? ' is-invalid' : ''); ?>" placeholder="Billing Address" value="<?php echo e(old('billing_address',$customer->billing_address)); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'billing_address'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                 <div class="form-group<?php echo e($errors->has('shipping_address') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="input-dob">Shippingg Address</label>
                                    <input type="text" name="shipping_address" id="input-shipping_address" class="form-control form-control-alternative<?php echo e($errors->has('shipping_address') ? ' is-invalid' : ''); ?>" placeholder="Shippingg Address" value="<?php echo e(old('shipping_address',$customer->shipping_address)); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'shipping_address'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('gst') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="input-gst">GST</label>
                                    <input type="gst" name="gst" id="input-gst" class="form-control form-control-alternative<?php echo e($errors->has('gst') ? ' is-invalid' : ''); ?>" placeholder="GST" value="<?php echo e(old('gst',$customer->gst)); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'gst'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                 <div class="form-group<?php echo e($errors->has('products_purchased') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="input-products_purchased">Products Purchased</label>
                                    <input type="text" name="products_purchased" id="input-products_purchased" class="form-control form-control-alternative<?php echo e($errors->has('products_purchased') ? ' is-invalid' : ''); ?>" placeholder="Products Purchased" value="<?php echo e(old('products_purchased',$customer->products_purchased)); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'products_purchased'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => 'Edit Customer', 'pageSlug' => 'customers', 'section' => 'customers'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/customers/edit.blade.php ENDPATH**/ ?>