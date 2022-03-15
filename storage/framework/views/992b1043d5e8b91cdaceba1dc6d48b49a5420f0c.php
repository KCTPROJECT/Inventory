<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('alerts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Sale Summary</h4>
                        </div>
                        <?php if(!$sale->finalized_at): ?>
                            <div class="col-4 text-right">
                                <?php if($sale->products->count() == 0): ?>
                                    <form action="<?php echo e(route('sales.destroy_old', $sale)); ?>" method="post" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            Delete Sale
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="confirm('ATTENTION: The transactions of this sale do not seem to coincide with the cost of the products, do you want to finalize it? Your records cannot be modified from now on.') ? window.location.replace('<?php echo e(route('sales.finalize', $sale)); ?>') : ''">
                                        Finalize Sale
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
                            <th>User</th>
                            <th>Client</th>
                            <th>products</th>
                            <th>Total Stock</th>
                            <th>Total Cost</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo e($sale->id); ?></td>
                                <td><?php echo e(date('d-m-y', strtotime($sale->created_at))); ?></td>
                                <td><?php echo e($sale->user->name); ?></td>
                                <td><a href="<?php echo e(route('clients.show', $sale->client)); ?>"><?php echo e($sale->client->name); ?><br><?php echo e($sale->client->document_type); ?>-<?php echo e($sale->client->document_id); ?></a></td>
                                <td><?php echo e($sale->products->count()); ?></td>
                                <td><?php echo e($sale->products->sum('qty')); ?></td>
                                <td><?php echo e(format_money($sale->products->sum('total_amount'))); ?></td>
                                <td><?php echo $sale->finalized_at ? 'Completed at<br>'.date('d-m-y', strtotime($sale->finalized_at)) : (($sale->products->count() > 0) ? 'TO FINALIZE' : 'ON HOLD'); ?></td>
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
                            <h4 class="card-title">products: <?php echo e($sale->products->sum('qty')); ?></h4>
                        </div>
                        <?php if(!$sale->finalized_at): ?>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('sales.product.add', ['sale' => $sale->id])); ?>" class="btn btn-sm btn-primary">Add</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price C/U</th>
                            <th>Total</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $sale->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sold_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($sold_product->product->id); ?></td>
                                    <td><a href="<?php echo e(route('categories.show', $sold_product->product->category)); ?>"><?php echo e($sold_product->product->category->name); ?></a></td>
                                    <td><a href="<?php echo e(route('products.show', $sold_product->product)); ?>"><?php echo e($sold_product->product->name); ?></a></td>
                                    <td><?php echo e($sold_product->qty); ?></td>
                                    <td><?php echo e(format_money($sold_product->price)); ?></td>
                                    <td><?php echo e(format_money($sold_product->total_amount)); ?></td>
                                    <td class="td-actions text-right">
                                        <?php if(!$sale->finalized_at): ?>
                                            <a href="<?php echo e(route('sales.product.edit', ['sale' => $sale, 'soldproduct' => $sold_product])); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Pedido">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="<?php echo e(route('sales.product.destroy', ['sale' => $sale, 'soldproduct' => $sold_product])); ?>" method="post" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Pedido" onclick="confirm('Estás seguro que quieres eliminar este pedido de producto/s? Su registro será eliminado de esta venta.') ? this.parentElement.submit() : ''">
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
<?php echo $__env->make('layouts.app', ['page' => 'Manage Sale', 'pageSlug' => 'sales', 'section' => 'transactions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/sales/show.blade.php ENDPATH**/ ?>