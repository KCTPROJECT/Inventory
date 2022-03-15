<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">customers</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('customers.create')); ?>" class="btn btn-sm btn-primary">Add Customer</a>
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
                                <th>Billing Address</th>
                                <th>Shipping Address</th>
                                <th>GST</th>
                                <!-- <th>Last purchase</th> -->
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($customer->name); ?></td>
                                        <td>
                                            <a href="mailto:<?php echo e($customer->email); ?>"><?php echo e($customer->email); ?></a>
                                            <br>
                                            <?php echo e($customer->phone); ?>

                                        </td>
                                        <td>
                                           <?php echo e($customer->billing_address); ?>

                                        </td>
                                        <td><?php echo e($customer->shipping_address); ?></td>
                                         <td><?php echo e($customer->gst); ?></td>
                                        
                                        <td class="td-actions text-left">
                                           
                                            <a href="<?php echo e(route('customers.edit', $customer)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Customer">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="<?php echo e(route('customers.destroy', $customer)); ?>" method="post" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Customer" onclick="confirm('Do you want to delete customer? press yes to contine.') ? this.parentElement.submit() : ''">
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
                        <?php echo e($customers->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => 'customers', 'pageSlug' => 'customers', 'section' => 'customers'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/customers/index.blade.php ENDPATH**/ ?>