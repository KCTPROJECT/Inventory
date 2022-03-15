<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Total sales</h5>
                            <h2 class="card-title">Annual yield</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                            <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                <input type="radio" name="options" checked>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Sales</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                           <!--  <label class="btn btn-sm btn-primary btn-simple" id="1">
                                <input type="radio" class="d-none d-sm-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Purchases</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-gift-2"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="2">
                                <input type="radio" class="d-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Clients</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-tap-02"></i>
                                </span>
                            </label> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Expense</h5>
                    <h3 class="card-title"><i class="tim-icons icon-money-coins text-primary"></i><?php echo e(format_money($expenseAmount)); ?></h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLinePurple"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category"> Purchase</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bank text-info"></i> <?php echo e(format_money($purchaseAmount)); ?></h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="CountryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Profit</h5>
                    <h3 class="card-title"><i class="tim-icons icon-paper text-success"></i> <?php echo e(format_money($profitAmount)); ?></h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!--  <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card card-tasks">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Pending Sales</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('sales.create')); ?>" class="btn btn-sm btn-primary">New Sale</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Client
                                    </th>
                                    <th>
                                        Products
                                    </th>
                                    <th>
                                        Paid out
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $unfinishedsales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(date('d-m-y', strtotime($sale->created_at))); ?></td>
                                        <td><a href=""><?php echo e($sale->client->name); ?><br><?php echo e($sale->client->document_type); ?>-<?php echo e($sale->client->document_id); ?></a></td>
                                        <td><?php echo e($sale->products->count()); ?></td>
                                        <td><?php echo e(format_money($sale->transactions->sum('amount'))); ?></td>
                                        <td><?php echo e(format_money($sale->products->sum('total_amount'))); ?></td>
                                        <td class="td-actions text-right">
                                            <a href="<?php echo e(route('sales.show', ['sale' => $sale])); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="View Sale">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card card-tasks">
                <div class="card-header">
                <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Latest Transactions</h4>
                        </div>
                        <div class="col-4 text-right">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#transactionModal">
                                New Transaction
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Medium
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $lasttransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr> 
                                        <td>
                                            <?php if($transaction->type == 'expense'): ?>
                                                Expense
                                            <?php elseif($transaction->type == 'sale'): ?>
                                                Sale
                                            <?php elseif($transaction->type == 'payment'): ?>
                                                Payment
                                            <?php elseif($transaction->type == 'income'): ?>
                                                Income
                                            <?php else: ?>
                                                <?php echo e($transaction->type); ?>

                                            <?php endif; ?>
                                            
                                        </td>
                                        <td><?php echo e($transaction->title); ?></td>
                                        <td><?php echo e($transaction->method->name); ?></td>
                                        <td><?php echo e(format_money($transaction->amount)); ?></td>
                                        <td class="td-actions text-right">
                                            <?php if($transaction->sale_id): ?>
                                                <a href="<?php echo e(route('sales.show', $transaction->sale_id)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More details">
                                                    <i class="tim-icons icon-zoom-split"></i>
                                                </a>
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
    </div>

    <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Transaction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo e(route('transactions.create', ['type' => 'payment'])); ?>" class="btn btn-sm btn-primary">Payment</a>
                        <a href="<?php echo e(route('transactions.create', ['type' => 'income'])); ?>" class="btn btn-sm btn-primary">Income</a>
                        <a href="<?php echo e(route('transactions.create', ['type' => 'expense'])); ?>" class="btn btn-sm btn-primary">Expense</a>
                        <a href="<?php echo e(route('sales.create')); ?>" class="btn btn-sm btn-primary">Sale</a>
                        <a href="<?php echo e(route('transfer.create')); ?>" class="btn btn-sm btn-primary">Transfer</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('assets/js/plugins/chartjs.min.js')); ?>"></script>
    
    <script>
        var lastmonths = [];

        <?php $__currentLoopData = $lastmonths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            lastmonths.push('<?php echo e(strtoupper($month)); ?>')
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        var lastincomes = <?php echo e($lastincomes); ?>;
        var lastexpenses = <?php echo e($lastexpenses); ?>;
        var anualsales = <?php echo e($anualsales); ?>;
        var anualclients = <?php echo e($anualclients); ?>;
        var anualproducts = <?php echo e($anualproducts); ?>;
        var monthlyexpense = <?php echo e($monthlyexpense); ?>;
        var profitonsale  = <?php echo e($profitonsale); ?>;
        var annualpurchases = <?php echo e($anualpurchases); ?>;
        var methods = [];
        var methods_stats = [];
          console.log(">> anualsales ",anualsales);
          console.log(">> annualexpenses",monthlyexpense);
          console.log(">>> annualpurchases ",annualpurchases);
          console.log(">> profitonsale ",profitonsale);
        <?php $__currentLoopData = $monthlybalancebymethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method => $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            methods.push('<?php echo e($method); ?>');
            methods_stats.push('<?php echo e($balance); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        $(document).ready(function() {
            //initDashboardPageCharts();
            demo.initDashboardPageCharts();
           // chart 1 Total sale bar chart

        var chart_labels = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
        var chart_data = anualsales;
        var ctx = document.getElementById("chartBig1").getContext('2d');
        var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

        gradientStroke.addColorStop(1, 'rgba(72,72,176,0.1)');
        gradientStroke.addColorStop(0.4, 'rgba(72,72,176,0.0)');
        gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors

        var config = {
            type: 'line',
            data: {
                labels: chart_labels,
                datasets: [{
                    label: "Sale Count",
                    fill: true,
                    backgroundColor: gradientStroke,
                    borderColor: '#d346b1',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    pointBackgroundColor: '#d346b1',
                    pointBorderColor: 'rgba(255,255,255,0)',
                    pointHoverBackgroundColor: '#d346b1',
                    pointBorderWidth: 20,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 15,
                    pointRadius: 4,
                    data: chart_data,
                }]
            },
           options: gradientChartOptionsConfigurationWithTooltipPurple
        };

        var myChartData = new Chart(ctx, config);
           // chart 1 end

          // chart 2 expense chart start
        var ctx = document.getElementById("chartLinePurple").getContext("2d");

        var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

        gradientStroke.addColorStop(1, 'rgba(72,72,176,0.2)');
        gradientStroke.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors
        var expenseData = monthlyexpense;
        var data = {
            // labels: ['JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
             labels: chart_labels,
            datasets: [{
                label: "Expense count",
                fill: true,
                backgroundColor: gradientStroke,
                borderColor: '#d048b6',
                borderWidth: 2,
                borderDash: [],
                borderDashOffset: 0.0,
                pointBackgroundColor: '#d048b6',
                pointBorderColor: 'rgba(255,255,255,0)',
                pointHoverBackgroundColor: '#d048b6',
                pointBorderWidth: 20,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 15,
                pointRadius: 4,
                data : monthlyexpense,
                //data: [80, 100, 70, 80, 120, 80],
            }]
        };

        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: gradientChartOptionsConfigurationWithTooltipPurple
        });
          // chart 2 expense chart end
          // chart 3 start profit on sale
          var ctxGreen = document.getElementById("chartLineGreen").getContext("2d");

        var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

        gradientStroke.addColorStop(1, 'rgba(66,134,121,0.15)');
        gradientStroke.addColorStop(0.4, 'rgba(66,134,121,0.0)'); //green colors
        gradientStroke.addColorStop(0, 'rgba(66,134,121,0)'); //green colors

        var data = {
           // labels: ['JUL', 'AUG', 'SEP', 'OCT', 'NOV'],
           labels: chart_labels,
            datasets: [{
                label: "Profit count",
                fill: true,
                backgroundColor: gradientStroke,
                borderColor: '#00d6b4',
                borderWidth: 2,
                borderDash: [],
                borderDashOffset: 0.0,
                pointBackgroundColor: '#00d6b4',
                pointBorderColor: 'rgba(255,255,255,0)',
                pointHoverBackgroundColor: '#00d6b4',
                pointBorderWidth: 20,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 15,
                pointRadius: 4,
                data: profitonsale,
               // data: [90, 27, 60, 12, 80],
            }]
        };

        var myChart = new Chart(ctxGreen, {
            type: 'line',
            data: data,
            options: gradientChartOptionsConfigurationWithTooltipGreen

        });

          // chart 3 end
           
    //     var ctx = document.getElementById("CountryChart").getContext("2d");

    //     var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    //     gradientStroke.addColorStop(1, 'rgba(29,140,248,0.2)');
    //     gradientStroke.addColorStop(0.4, 'rgba(29,140,248,0.0)');
    //     gradientStroke.addColorStop(0, 'rgba(29,140,248,0)'); //blue colors

    //     var myChart = new Chart(ctx, {
    //         type: 'bar',
    //         responsive: true,
    //         legend: {
    //             display: false
    //         },
    //         data: {
    //             labels: ['USA', 'GER', 'AUS', 'UK', 'RO', 'BR'],
    //             datasets: [{
    //                 label: "Countries",
    //                 fill: true,
    //                 backgroundColor: gradientStroke,
    //                 hoverBackgroundColor: gradientStroke,
    //                 borderColor: '#1f8ef1',
    //                 borderWidth: 2,
    //                 borderDash: [],
    //                 borderDashOffset: 0.0,
    //                 data: [53, 20, 10, 80, 100, 45],
    //             }]
    //         },
    //         options: gradientBarChartConfiguration
    //     });

    // },



        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', ['pageSlug' => 'dashboard', 'page' => 'Dashboard', 'section' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/dashboard.blade.php ENDPATH**/ ?>