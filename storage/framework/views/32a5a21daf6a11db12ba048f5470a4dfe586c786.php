

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Purchase Bills</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('purchases.create')); ?>" class="btn btn-sm btn-primary">Add Bill</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table" id="tableitem">
                            <thead>
                                <th>Date</th>
                                <th>Invoice Number</th>
                                <th>Party Name</th>
                                <th>Amount</th>
                                <th>Payment Type</th>
                                <th>Balance</th>
                                
                                <th>Options</th>
                            </thead>
                            <tbody>
                                <?php
                                 // print_r($purchases);   
                                ?>
                                <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(date('d-m-y', strtotime($sale->date))); ?></td>
                                        <td><?php echo e($sale->invoice_no); ?></td>
                                        <td><?php echo e($sale->party_name); ?></td>
                                        
                                        <td><?php echo e(format_money($sale->amount)); ?></td>
                                        <td><?php echo e($sale->payment_type); ?></td>
                                        <td><?php echo e($sale->balance); ?></td>
                
                                        
                                        <td class="td-actions text-right">
                                                <a href="<?php echo e(route('purchases.edit', ['purchase' => $sale])); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Purchase Bill">
                                                    <i class="tim-icons icon-pencil"></i>
                                                </a>
                                          
                                            <form action="<?php echo e(route('purchases.destroy', $sale)); ?>" method="post" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Purchase Bill" onclick="confirm('Are you sure you want to delete this purchase? All your records will be permanently deleted.') ? this.parentElement.submit() : ''">
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
                     <button onclick="exportData()">
                       <span class="tim-icons icon-paper"></span>
                       Download list
                    </button>
                    <nav class="d-flex justify-content-end" aria-label="...">
                        <?php echo e($purchases->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<script type="text/javascript">
    function exportData(){
    /* Get the HTML data using Element by Id */
    var table = document.getElementById("tableitem");
 
    /* Declaring array variable */
    var rows =[];
 
      //iterate through rows of table
    for(var i=0,row; row = table.rows[i];i++){
        //rows would be accessed using the "row" variable assigned in the for loop
        //Get each cell value/column from the row
        column1 = row.cells[0].innerText;
        column2 = row.cells[1].innerText;
        column3 = row.cells[2].innerText;
       // column4 = row.cells[3].innerText;
         var currency = row.cells[3].innerText;
        column4 = currency.replace(/,/g, "");
        column5 = row.cells[4].innerText;
        column6 = row.cells[5].innerText;
 
    /* add a new records in the array */
        rows.push(
            [
                column1,
                column2,
                column3,
                column4,
                column5,
                column6
            ]
        );
 
        }
        csvContent = "data:text/csv;charset=utf-8,";
         /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
        rows.forEach(function(rowArray){
            row = rowArray.join(",");
            csvContent += row + "\r\n";
        });
 
        /* create a hidden <a> DOM node and set its download attribute */
        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "PurchaseBills_Report.csv");
        document.body.appendChild(link);
         /* download the data file named "Stock_Price_Report.csv" */
        link.click();
}
</script>


<?php echo $__env->make('layouts.app', ['page' => 'Purchases', 'pageSlug' => 'purchases', 'section' => 'purchases'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/purchases/bills/index.blade.php ENDPATH**/ ?>