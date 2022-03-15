<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Expense Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('expenses.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to List')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('expenses.update', $expense)); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Expense information')); ?></h6>
                             <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('expense_type') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-expense_type">Expense Type</label>
                                    <select name="expense_type" id="input-expense_type" class="form-control form-control-alternative<?php echo e($errors->has('expense_type') ? ' is-invalid' : ''); ?>" >
                                         <option value="" disabled="tue" selected="true">Select Expense Type</option>
                                         <option value="Electricity" <?php echo ($expense->expense_type=='Electricity'?'selected':'')?>>Electricity</option>
                                         <option value="Loan" <?php echo ($expense->expense_type=='Loan'?'selected':'')?>>Loan</option>
                                         <option value="Packing" <?php echo ($expense->expense_type=='Packing'?'selected':'')?>>Packing</option>
                                         <option value="Petrol" <?php echo ($expense->expense_type=='Petrol'?'selected':'')?>>Petrol</option>
                                         <option value="Rent" <?php echo ($expense->expense_type=='Rent'?'selected':'')?>>Rent</option>
                                         <option value="Salary" <?php echo ($expense->expense_type=='Salary'?'selected':'')?>>Salary</option>
                                         <option value="Transport" <?php echo ($expense->expense_type=='Transport'?'selected':'')?>>Transport</option>
                                    </select>
                                 
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'expense_type'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                                </div>
                                <div class="form-group<?php echo e($errors->has('date') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-date">Date</label>
                                    <input type="date" name="date" id="input-date" class="form-control form-control-alternative<?php echo e($errors->has('date') ? ' is-invalid' : ''); ?>" placeholder="date" value="<?php echo e(old('date', $expense->date)); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'date'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('amount') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="input-amount">Amount</label>
                                    <input type="text" name="amount" id="input-amount" class="form-control form-control-alternative<?php echo e($errors->has('amount') ? ' is-invalid' : ''); ?>" placeholder="Amount" value="<?php echo e(old('amount',$expense->amount)); ?>" required>
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

<?php echo $__env->make('layouts.app', ['page' => 'Edit Expense', 'pageSlug' => 'expenses', 'section' => 'expenses'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/expenses/edit.blade.php ENDPATH**/ ?>