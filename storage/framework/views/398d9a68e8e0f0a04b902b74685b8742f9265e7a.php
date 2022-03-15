<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alerts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Employee Information</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('employees.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to List')); ?></a>
                            </div>
                        </div>
                    </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                             <th>Employee ID</th>
                                <th>Name</th>
                                <th>Email / Contact </th>
                                <th>DOB</th>
                                <th>DOJ</th>
                                <th>Blood Group</th>
                                <th>Designation</th>
                                <th>Address</th>
                                <th>Aadhar</th>
                                <th>Shift</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo e($employee->emp_id); ?></td>
                                        <td><?php echo e($employee->name); ?></td>
                                        <td>
                                            <a href="mailto:<?php echo e($employee->email); ?>"><?php echo e($employee->email); ?></a>
                                            <br>
                                            <?php echo e($employee->phone); ?>

                                        </td>
                                        <td>
                                           <?php echo e($employee->dob); ?>

                                        </td>
                                        <td><?php echo e($employee->doj); ?></td>
                                         <td><?php echo e($employee->blood_group); ?></td>
                                          <td><?php echo e($employee->designation); ?></td>
                                           <td><?php echo e($employee->address); ?></td>
                                         <td><?php echo e($employee->aadhar); ?></td>
                                        <td><?php echo e($employee->shift); ?></td>
                                        
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['page' => 'Employee Information', 'pageSlug' => 'employees', 'section' => 'employees'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/employees/show.blade.php ENDPATH**/ ?>