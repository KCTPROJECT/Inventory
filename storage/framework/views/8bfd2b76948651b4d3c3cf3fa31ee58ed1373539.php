

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Sales</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('sales.create')); ?>" class="btn btn-sm btn-primary">Register Invoice</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table" id="tableitem">
                            <tr>
                                <th>Date</th>
                                <th>Invoice Number</th>
                                <th>Party Name</th>
                                <th>Amount</th>
                                <th>Payment Type</th>
                                <th>Balance</th>
                                
                                <th>Options</th>
                            </tr>
                            <tbody>
                                <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(date('d-m-y', strtotime($sale->date))); ?></td>
                                        <td><?php echo e($sale->invoice_no); ?></td>
                                        <td><?php echo e($sale->party_name); ?></td>
                                        <!--  <td><?php echo e($sale->amount); ?></td> -->
                                        <td style='mso-number-format:"#,##0.00"'><?php echo e(format_money($sale->amount)); ?></td>
                                        <td><?php echo e($sale->payment_type); ?></td>
                                        <td><?php echo e($sale->balance); ?></td>
                
                                        
                                        <td class="td-actions text-right">
                                                <a href="<?php echo e(route('sales.edit', ['sale' => $sale])); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Sales Invoice">
                                                    <i class="tim-icons icon-pencil"></i>
                                                </a>
                                          
                                            <form action="<?php echo e(route('sales.destroy', $sale)); ?>" method="post" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Sales Invoice" onclick="confirm('Are you sure you want to delete this sale? All your records will be permanently deleted.') ? this.parentElement.submit() : ''">
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
                        <?php echo e($sales->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<script type="text/javascript">
     function exportData_new(){
        //tableToExcel('tableitem', 'Sheet 1', 'Sales_Invoice_Report.xls')
             var table = document.getElementById("tableitem");
             var $rows = $table.find('tr:has(td)');
             var filename = "report.csv";  
            // Temporary delimiter characters unlikely to be typed by keyboard
            // This is to avoid accidentally splitting the actual contents
            tmpColDelim = String.fromCharCode(11), // vertical tab character
            tmpRowDelim = String.fromCharCode(0), // null character

            // actual delimiter characters for CSV format
            colDelim = '","',
            rowDelim = '"\r\n"',

            // Grab text from table into CSV formatted string
            csv = '"' + $rows.map(function (i, row) {
                var $row = $(row),
                    $cols = $row.find('td');

                return $cols.map(function (j, col) {
                    var $col = $(col),
                        text = $col.text();

                    return text.replace('"', '""'); // escape double quotes

                }).get().join(tmpColDelim);

            }).get().join(tmpRowDelim)
                .split(tmpRowDelim).join(rowDelim)
                .split(tmpColDelim).join(colDelim) + '"',

            // Data URI
            csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

        $(this)
            .attr({
            'download': filename,
                'href': csvData,
                'target': '_blank'
        });

     }
      function exportData_nw() {
 
            // Variable to store the final csv data
            var csv_data = [];
 
            // Get each row data
            var rows = document.getElementsByTagName('tr');
            for (var i = 0; i < rows.length; i++) {
 
                // Get each column data
                var cols = rows[i].querySelectorAll('td,th');
 
                // Stores each csv row data
                var csvrow = [];
                for (var j = 0; j < cols.length; j++) {
 
                    // Get the text data of each cell
                    // of a row and push it to csvrow
                    csvrow.push(cols[j].innerHTML);
                }
 
                // Combine each column value with comma
                csv_data.push(csvrow.join(","));
            }
 
            // Combine each row data with new line character
            csv_data = csv_data.join('\n');
 
            // Call this function to download csv file 
            downloadCSVFile(csv_data);
 
        }
 
        function downloadCSVFile(csv_data) {
 
            // Create CSV file object and feed
            // our csv_data into it
            CSVFile = new Blob([csv_data], {
                type: "text/csv"
            });
 
            // Create to temporary link to initiate
            // download process
            var temp_link = document.createElement('a');
 
            // Download csv file
            temp_link.download = "GfG.csv";
            var url = window.URL.createObjectURL(CSVFile);
            temp_link.href = url;
 
            // This link should not be displayed
            temp_link.style.display = "none";
            document.body.appendChild(temp_link);
 
            // Automatically click the link to
            // trigger download
            temp_link.click();
            document.body.removeChild(temp_link);
        }
     function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}   
    function exportData(){
    /* Get the HTML data using Element by Id */
    var table = document.getElementById("tableitem");
/* test */
 var csv_data = [];
var rows = document.getElementsByTagName('thead');
 for (var i = 0; i < rows.length; i++) {
    var cols = rows[i].querySelectorAll('td,th');
    var csvrow = [];
        for (var j = 0; j < cols.length; j++) {
            csvrow.push(cols[j].innerHTML);
        }
        //console.log(">>> csvrow",csvrow);
        csv_data.push(csvrow.join(","));
    }
    csv_data = csv_data.join('\n');
    //console.log(">>> csv data", csv_data ,">>> ")
/* end test */
    /* Declaring array variable */
    var rows =[];
 
      //iterate through rows of table
    for(var i=0,row; row = table.rows[i];i++){
        //rows would be accessed using the "row" variable assigned in the for loop
        //Get each cell value/column from the row
        column1 = row.cells[0].innerText;
        column2 = row.cells[1].innerText;
        column3 = row.cells[2].innerText;
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
         console.log(">> 2nd rows ", rows);
        rows.forEach(function(rowArray){
            console.log(">>> row array ",rowArray);
            row = rowArray.join(",");
            console.log(">>>> row ",row);
            csvContent += row + "\r\n";
        });
 
        /* create a hidden <a> DOM node and set its download attribute */
         var encodedUri = encodeURI(csvContent);
         var link = document.createElement("a");
         link.setAttribute("href", encodedUri);
         link.setAttribute("download", "Sales_Invoice_Report.csv");
         document.body.appendChild(link);
         /* download the data file named "Stock_Price_Report.csv" */
        link.click();
}
</script>
    
<?php echo $__env->make('layouts.app', ['page' => 'Sales', 'pageSlug' => 'sales', 'section' => 'transactions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/sales/invoices/index.blade.php ENDPATH**/ ?>