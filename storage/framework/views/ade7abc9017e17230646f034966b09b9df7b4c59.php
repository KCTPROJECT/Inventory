<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Employees</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('employees.create')); ?>" class="btn btn-sm btn-primary">Add Employee</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Email / Contact </th>
                                <th>DOB</th>
                                <th>DOJ</th>
                                <th>Aadhar</th>
                                <th>Shift</th>
                                <th>Action</th> 
                            </thead>
                            <?php
                            ?>
                            <tbody>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                         <td><?php echo e($employee->aadhar); ?></td>
                                        <td><?php echo e($employee->shift); ?></td>
                                        
                                        <td class="td-actions text-left">
                                            <a href="<?php echo e(route('employees.show', $employee)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="<?php echo e(route('employees.edit', $employee)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Employee">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="<?php echo e(route('employees.destroy', $employee)); ?>" method="post" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Employee" onclick="confirm('Do you want this employee record?  press  yes to contine or no to cancel.') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody> 
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                   <!--  <nav class="d-flex justify-content-end" aria-label="...">
                        <?php echo e($employees->links()); ?>

                    </nav> -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => 'Employees', 'pageSlug' => 'employees', 'section' => 'employees'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/employees/index.blade.php ENDPATH**/ ?>