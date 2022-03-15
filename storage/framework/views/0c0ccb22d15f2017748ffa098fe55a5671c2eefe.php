<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit Product</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('products.index')); ?>" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('products.update', $product)); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>

                            <h6 class="heading-small text-muted mb-4">Product Information</h6>
                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('item_code') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-item_code">Item Code</label>
                                    <input type="text" name="item_code" id="input-item_code" class="form-control form-control-alternative" placeholder="Item Code" value="<?php echo e(old('item_code', $product->item_code)); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'item_code'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-name"><?php echo e(__('Item Name')); ?></label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('name', $product->name)); ?>" required autofocus>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('product_category_id') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-name">Category</label>
                                    <select name="product_category_id" id="input-category" class="form-select form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" required>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($category['id'] == old('document') or $category['id'] == $product->product_category_id): ?>
                                                <option value="<?php echo e($category['id']); ?>" selected><?php echo e($category['name']); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($category['id']); ?>"><?php echo e($category['name']); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'product_category_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>


                              <!--   <div class="form-group<?php echo e($errors->has('description') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-description">Description</label>
                                    <input type="text" name="description" id="input-description" class="form-control form-control-alternative" placeholder="Description" value="<?php echo e(old('description', $product->description)); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'description'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                </div> -->
                                <div class="row">
                                    <div class="col-3"> 
                                        <div class="form-group<?php echo e($errors->has('purchase_price') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-purchase_price">Purchase Price</label>
                                            <input type="number" name="purchase_price" id="input-purchase_price" class="form-control form-control-alternative" placeholder="Purchase Price" value="<?php echo e(old('purchase_price', $product->purchase_price)); ?>" required>
                                            <?php echo $__env->make('alerts.feedback', ['field' => 'purchase_price'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                         </div>  
                                    </div>     
                                    <div class="col-3">                                    
                                        <div class="form-group<?php echo e($errors->has('price') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-price">Sales Price</label>
                                            <input type="number" step=".01" name="price" id="input-price" class="form-control form-control-alternative" placeholder="Price" value="<?php echo e(old('price', $product->price)); ?>" required>
                                            <?php echo $__env->make('alerts.feedback', ['field' => 'price'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group<?php echo e($errors->has('quantity') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-quantity">Quantity</label>
                                            <input type="number" name="quantity" id="input-quantity" class="form-control form-control-alternative" placeholder="Quantity" value="<?php echo e(old('quantity', $product->quantity)); ?>" required>
                                            <?php echo $__env->make('alerts.feedback', ['field' => 'quantity'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                    <div class="col-3">                                    
                                        <div class="form-group<?php echo e($errors->has('stock') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-stock">Minimum Stock To Maintain</label>
                                            <input type="number" name="stock" id="input-stock" class="form-control form-control-alternative" placeholder="Stock" value="<?php echo e(old('stock', $product->stock)); ?>" required>
                                            <?php echo $__env->make('alerts.feedback', ['field' => 'stock'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
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

<?php $__env->startPush('js'); ?>
    <script>
        new SlimSelect({
            select: '.form-select'
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', ['page' => 'Edit Product', 'pageSlug' => 'products', 'section' => 'inventory'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/inventory/products/edit.blade.php ENDPATH**/ ?>