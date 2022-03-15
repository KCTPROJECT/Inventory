

<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt--7">
    <?php echo $__env->make('alerts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Register Sale</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('sales.index')); ?>" class="btn btn-sm btn-primary">Back to list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('sales.storeinvoice')); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>

                            <h6 class="heading-small text-muted mb-4">Invoice information</h6>
                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('date') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-date">Date</label>
                                    <input type="date" name="date" id="input-date" class="form-control form-control-alternative<?php echo e($errors->has('date') ? ' is-invalid' : ''); ?>" placeholder="Date" value="<?php echo e(old('date')); ?>" required autofocus>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'date'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('invoice_no') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-invoice_no">Invoice Number</label>
                                    <input type="text" name="invoice_no" id="input-invoice_no" class="form-control form-control-alternative<?php echo e($errors->has('invoice_no') ? ' is-invalid' : ''); ?>" placeholder="Invoice Number" value="<?php echo e(old('invoice_no')); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'invoice_no'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('party_name') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="input-party_name">Party Name</label>
                                    <input type="text" name="party_name" id="input-party_name" class="form-control form-control-alternative<?php echo e($errors->has('party_name') ? ' is-invalid' : ''); ?>" placeholder="Party Name" value="<?php echo e(old('party_name')); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'party_name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('amount') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="input-amount"> Amount</label>
                                    <input type="text" name="amount" id="input-amount" class="form-control form-control-alternative<?php echo e($errors->has('amount') ? ' is-invalid' : ''); ?>" placeholder="Amount" value="<?php echo e(old('amount')); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'amount'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('payment_type') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="input-payment_type">Payment Type</label>
                                    <input type="text" name="payment_type" id="input-payment_type" class="form-control form-control-alternative<?php echo e($errors->has('payment_type') ? ' is-invalid' : ''); ?>" placeholder="Payment Type" value="<?php echo e(old('payment_type')); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'payment_type'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                 <div class="form-group<?php echo e($errors->has('balance') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="input-balance">Balance</label>
                                    <input type="text" name="balance" id="input-balance" class="form-control form-control-alternative<?php echo e($errors->has('balance') ? ' is-invalid' : ''); ?>" placeholder="Balance" value="<?php echo e(old('balance')); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'balance'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php $__env->startPush('js'); ?>
    <script>
        new SlimSelect({
            select: '.form-select'
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', ['page' => 'Register Sale', 'pageSlug' => 'sales-create', 'section' => 'transactions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/sales/invoices/create.blade.php ENDPATH**/ ?>