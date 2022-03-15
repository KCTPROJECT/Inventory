<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">New Production Entry</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('production.index')); ?>" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('production.store')); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>

                            <h6 class="heading-small text-muted mb-4">Production Information</h6>
                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('date') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-item_code">Date</label>
                                    <input type="date" name="date" id="input-date" class="form-control form-control-alternative" placeholder="Date" value="<?php echo e(old('date')); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'date'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                 <input type="hidden" name="item_code" id="item_code" value="">
                                 <input type="hidden" name="product_category_id" id="product_category_id">
                                 <div class="form-group<?php echo e($errors->has('item_code') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-name">Item Code</label>
                                    <select name="product_id" id="input-product_id" class="form-select form-control-alternative<?php echo e($errors->has('product_id') ? ' is-invalid' : ''); ?>" required autofocus>
                                         <option value="" disabled selected="true">Select Item Code</option>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($product['id']); ?>"><?php echo e($product['item_code']); ?></option> 
                                           <!--  <?php if($product['id'] == old('document')): ?>
                                                <option value="<?php echo e($product['id']); ?>" selected><?php echo e($product['item_code']); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($product['id']); ?>"><?php echo e($product['item_code']); ?></option>
                                            <?php endif; ?> -->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'item_code'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <div class="row"> 
                              <div class="col-6">
                                <div class="form-group<?php echo e($errors->has('item_name') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-name">Item Name</label>
                                    <input type="text" name="item_name" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('item_name') ? ' is-invalid' : ''); ?>" placeholder="Item Name" value="<?php echo e(old('item_name')); ?>" readonly="true">
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'item_name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                               </div>
                              <div class="col-6">                                    
                                <div class="form-group<?php echo e($errors->has('item_quantity') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-quantity">Quantity</label>
                                            <input type="number" name="item_quantity" id="input-quantity" class="form-control form-control-alternative" placeholder="Quantity" value="<?php echo e(old('item_quantity')); ?>" required readonly="true">
                                            <?php echo $__env->make('alerts.feedback', ['field' => 'item_quantity'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                               </div> 
                               <div class="row">          
                                    <div class="col-6">                                    
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-price">Category</label>
                                            <span id="category" class="form-control" type="box"></span>
                                            
                                        </div>
                                    </div> 
                                    <div class="col-6">                                    
                                        <div class="form-group<?php echo e($errors->has('production') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-stock">Per Hour Production</label>
                                            
                                              <input type="number" name="item_per_hour" id="item_per_hour" class="form-control form-control-alternative" placeholder="Item Per Hour (in Amount)" value="<?php echo e(old('item_per_hour')); ?>" required readonly="true">
                                            <?php echo $__env->make('alerts.feedback', ['field' => 'item_per_hour'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                                             
                                </div>
                                 <div class="form-group<?php echo e($errors->has('no_of_hours') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-no_of_hours">Number Of Hours</label>
                                    <input type="number" name="no_of_hours" id="input-no_of_hours" class="form-control form-control-alternative" placeholder="Number of Hours" value="<?php echo e(old('no_of_hours')); ?>" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'no_of_hours'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-production">Production ( No of hours * item per hour)</label>
                                    <span id="input-production" class="form-control" type="box"></span>
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
         $('#input-no_of_hours').change(function(){
             var hours = $(this).val();
             var productionamount = $("#item_per_hour").val();
             let result = hours*productionamount;
             //console.log(">>> hours ",hours,' amount ', productionamount);
             $("#input-production").text(result);

         })
         $('#input-product_id').change(function() {
         var id = $(this).val();
         var url = '<?php echo e(route("production.getDetails", ":id")); ?>';
         url = url.replace(':id', id);
          //console.log(">>> id ",id , "url ",url); 
         $.ajax({
             url: url,
             type: 'get',
             dataType: 'json',
             success: function(response) {
                //console.log(">> response ",response);
                 let productionamount = response.productionamount.price;
                 $("#category").text(response.productionamount.name);
                 $("#item_per_hour").val(response.productionamount.price);
                 $("#input-name").val(response.item.name);
                 $("#input-quantity").val(response.item.quantity);
                // $("#product_id").val(response.item.id);
                 $("#product_category_id").val(response.productionamount.id);
                 $("#item_code").val(response.item.item_code);
                 //console.log(">>> productionamount ",productionamount);    
                 // if (response != null) {
                 //     $('#rev').val(response.rev_no);
                 //     $('#title').val(response.title);
                 // }
             }
         });
     });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', ['page' => 'New Production', 'pageSlug' => 'production', 'section' => 'production'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/inventory/productions/create.blade.php ENDPATH**/ ?>