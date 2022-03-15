<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Add Expense</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('expenses.index')); ?>" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('expenses.store')); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <h6 class="heading-small text-muted mb-4">Expense Information</h6>
                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('expense_type') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-expense_type">Expense Type</label>
                                    <select name="expense_type" id="input-expense_type" class="form-control form-control-alternative<?php echo e($errors->has('expense_type') ? ' is-invalid' : ''); ?>" >
                                         <option value="" disabled="tue" selected="true">Select Expense Type</option>
                                         <option value="Electricity">Electricity</option>
                                         <option value="Loan">Loan</option>
                                         <option value="Packing">Packing</option>
                                         <option value="Petrol">Petrol</option>
                                         <option value="Rent">Rent</option>
                                         <option value="Salary">Salary</option>
                                         <option value="Transport">Transport</option>
                                    </select>
                                 <!--    <input type="text" name="expense_type" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="Name" value="<?php echo e(old('name')); ?>" required autofocus> -->
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'expense_type'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                                </div>
                                <div class="form-group<?php echo e($errors->has('date') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-date">Date</label>
                                    <input type="date" name="date" id="input-date" class="form-control form-control-alternative<?php echo e($errors->has('date') ? ' is-invalid' : ''); ?>" placeholder="date" value="<?php echo e(old('date')); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'date'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('amount') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="input-amount">Amount</label>
                                    <input type="text" name="amount" id="input-amount" class="form-control form-control-alternative<?php echo e($errors->has('amount') ? ' is-invalid' : ''); ?>" placeholder="Amount" value="<?php echo e(old('amount')); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'amount'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('layouts.app', ['page' => 'Register Expense', 'pageSlug' => 'expenses', 'section' => 'expenses'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/expenses/create.blade.php ENDPATH**/ ?>