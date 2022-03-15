<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Category Information</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>products</th>
                            <th>Stocks</th>
                            <th>Stocks Faulty</th>
                            <th>Average Price</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo e($category->id); ?></td>
                                <td><?php echo e($category->name); ?></td>
                                <td><?php echo e($category->products->count()); ?></td>
                                <td><?php echo e($category->products->sum('stock')); ?></td>
                                <td><?php echo e($category->products->sum('stock_defective')); ?></td>
                                <td>$<?php echo e(round($category->products->avg('price'), 2)); ?></td>
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
                    <h4 class="card-title">products: <?php echo e($products->count()); ?></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Defective Stock</th>
                            <th>Base price</th>
                            <th>Average Price</th>
                            <th>Total sales</th>
                            <th>Income Produced</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><a href="<?php echo e(route('products.show', $product)); ?>"><?php echo e($product->id); ?></a></td>
                                    <td><a href="<?php echo e(route('products.show', $product)); ?>"><?php echo e($product->name); ?></a></td>
                                    <td><?php echo e($product->stock); ?></td>
                                    <td><?php echo e($product->stock_defective); ?></td>
                                    <td><?php echo e(format_money($product->price)); ?></td>
                                    <td><?php echo e(format_money($product->solds->avg('price'))); ?></td>
                                    <td><?php echo e($product->solds->sum('qty')); ?></td>
                                    <td><?php echo e(format_money($product->solds->sum('total_amount'))); ?></td>
                                    <td class="td-actions text-right">
                                        <a href="<?php echo e(route('products.show', $product)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                            <i class="tim-icons icon-zoom-split"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end">
                        <?php echo e($products->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['page' => 'Category Information', 'pageSlug' => 'categories', 'section' => 'inventory'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/inventory/categories/show.blade.php ENDPATH**/ ?>