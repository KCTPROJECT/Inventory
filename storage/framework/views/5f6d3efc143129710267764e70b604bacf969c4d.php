<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('alerts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Receipt Summary</h4>
                        </div>
                        <?php if(!$receipt->finalized_at): ?>
                            <div class="col-4 text-right">
                                <?php if($receipt->products->count() === 0): ?>
                                    <form action="<?php echo e(route('receipts.destroy', $receipt)); ?>" method="post" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            Delete Receipt
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="confirm('ATTENTION: At the end of this receipt you will not be able to load more products in it.') ? window.location.replace('<?php echo e(route('receipts.finalize', $receipt)); ?>') : ''">
                                        Finalize Receipt
                                    </button>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>User</th>
                            <th>Provider</th>
                            <th>products</th>
                            <th>Stock</th>
                            <th>Defective Stock</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo e($receipt->id); ?></td>
                                <td><?php echo e(date('d-m-y', strtotime($receipt->created_at))); ?></td>
                                <td style="max-width:150px;"><?php echo e($receipt->title); ?></td>
                                <td><?php echo e($receipt->user->name); ?></td>
                                <td>
                                    <?php if($receipt->provider_id): ?>
                                        <a href="<?php echo e(route('providers.show', $receipt->provider)); ?>"><?php echo e($receipt->provider->name); ?></a>
                                    <?php else: ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($receipt->products->count()); ?></td>
                                <td><?php echo e($receipt->products->sum('stock')); ?></td>
                                <td><?php echo e($receipt->products->sum('stock_defective')); ?></td>
                                <td><?php echo $receipt->finalized_at ? 'Finalized' : '<span style="color:red; font-weight:bold;">TO FINALIZE</span>'; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">products: <?php echo e($receipt->products->count()); ?></h4>
                        </div>
                        <?php if(!$receipt->finalized_at): ?>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('receipts.product.add', ['receipt' => $receipt])); ?>" class="btn btn-sm btn-primary">Add</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Stock</th>
                            <th>Defective Stock</th>
                            <th>Total Stock</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $receipt->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $received_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><a href="<?php echo e(route('categories.show', $received_product->product->category)); ?>"><?php echo e($received_product->product->category->name); ?></a></td>
                                    <td><a href="<?php echo e(route('products.show', $received_product->product)); ?>"><?php echo e($received_product->product->name); ?></a></td>
                                    <td><?php echo e($received_product->stock); ?></td>
                                    <td><?php echo e($received_product->stock_defective); ?></td>
                                    <td><?php echo e($received_product->stock + $received_product->stock_defective); ?></td>
                                    <td class="td-actions text-right">
                                        <?php if(!$receipt->finalized_at): ?>
                                            <a href="<?php echo e(route('receipts.product.edit', ['receipt' => $receipt, 'receivedproduct' => $received_product])); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Pedido">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="<?php echo e(route('receipts.product.destroy', ['receipt' => $receipt, 'receivedproduct' => $received_product])); ?>" method="post" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Pedido" onclick="confirm('Estás seguro que quieres eliminar este producto?') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('assets')); ?>/js/sweetalerts2.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', ['page' => 'Manage Receipt', 'pageSlug' => 'receipts', 'section' => 'inventory'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/inventory/receipts/show.blade.php ENDPATH**/ ?>