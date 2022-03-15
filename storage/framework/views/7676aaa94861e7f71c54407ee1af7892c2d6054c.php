

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Sales Return/Credit</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('salesreturn.create')); ?>" class="btn btn-sm btn-primary">Register Sales Return/Credit </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table">
                            <thead>
                                <th>Date</th>
                                <th>Reference Number</th>
                                <th>Party Name</th>
                                <th>Amount</th>
                                <th>Payment Type</th>
                                <th>Balance</th>
                                
                                <th>Options</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(date('d-m-y', strtotime($sale->date))); ?></td>
                                        <td><?php echo e($sale->ref_no); ?></td>
                                        <td><?php echo e($sale->party_name); ?></td>
                                        
                                        <td><?php echo e(format_money($sale->amount)); ?></td>
                                        <td><?php echo e($sale->payment_type); ?></td>
                                        <td><?php echo e($sale->balance); ?></td>
                
                                        
                                        <td class="td-actions text-right">
                                                <a href="<?php echo e(route('salesreturn.edit', ['salesreturn' => $sale])); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Sales Returns">
                                                    <i class="tim-icons icon-pencil"></i>
                                                </a>
                                          
                                            <form action="<?php echo e(route('salesreturn.destroy', ['salesreturn'=>$sale])); ?>" method="post" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Sales Returns" onclick="confirm('Are you sure you want to delete this sale return? All your records will be permanently deleted.') ? this.parentElement.submit() : ''">
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
                        <?php echo e($sales->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', ['page' => 'Sales', 'pageSlug' => 'salesreturns', 'section' => 'transactions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/sales/returns/index.blade.php ENDPATH**/ ?>