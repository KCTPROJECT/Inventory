<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">suppliers</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('suppliers.create')); ?>" class="btn btn-sm btn-primary">Add Supplier</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th>Name</th>
                                <th>Email / Phone</th>
                                <th>Address</th>
                                
                                <th>GST</th>
                                <!-- <th>Last purchase</th> -->
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($supplier->name); ?></td>
                                        <td>
                                            <a href="mailto:<?php echo e($supplier->email); ?>"><?php echo e($supplier->email); ?></a>
                                            <br>
                                            <?php echo e($supplier->phone); ?>

                                        </td>
                                        <td>
                                           <?php echo e($supplier->address); ?>

                                        </td>
                                       
                                         <td><?php echo e($supplier->gst); ?></td>
                                        
                                        <td class="td-actions text-left">
                                           
                                            <a href="<?php echo e(route('suppliers.edit', $supplier)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Supplier">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="<?php echo e(route('suppliers.destroy', $supplier)); ?>" method="post" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Supplier" onclick="confirm('Do you want to delete supplier? press yes to contine.') ? this.parentElement.submit() : ''">
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
                    <nav class="d-flex justify-content-end" aria-label="...">
                        <?php echo e($suppliers->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => 'suppliers', 'pageSlug' => 'suppliers', 'section' => 'suppliers'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/suppliers/index.blade.php ENDPATH**/ ?>