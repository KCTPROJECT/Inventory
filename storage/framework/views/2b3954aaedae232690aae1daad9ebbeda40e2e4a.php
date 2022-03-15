

<?php $__env->startSection('content'); ?>
<?php
// print_r($employeesalary);
// echo "employees ";
// print_r($employees);
?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Employees Attendance Info</h4>
                        </div>
                        
                    </div>
                </div>
                <div class="card-body">
                    <span id="msg"></span>
                    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row">
                        <div class="col-md-3">
                           <input type="text" class="form-control" name="date" id="date" value="<?php echo e(date('d-M-Y')); ?>"   readonly="true">
                        </div>
                        <div class="col-md-3">
                           <input type="text" class="form-control" name="month" id="month" value="<?php echo e(date('M')); ?>" readonly="true" >
                            <!-- <select placeholder="MM" class="form-control">
                              <option name="" value="" style="display:none;">MM</option>
                              <option name="January" value="January" selected="">January</option>
                              <option name="February" value="Feb">February</option>
                              <option name="March" value="Mar">March</option>
                              <option name="April" value="Apr">April</option>
                              <option name="May" value="May">May</option>
                              <option name="June" value="Jun">June</option>
                              <option name="July" value="Jul">July</option>
                              <option name="August" value="Aug">August</option>
                              <option name="September" value="Sep">September</option>
                              <option name="October" value="Oct">October</option>
                              <option name="November" value="Nov">November</option>
                              <option name="December" value="Dec">December</option>
                            </select> -->
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="year" id="year" value="<?php echo e(2022); ?>" readonly="true" >
                            <!-- <select class="form-control form-select" name="yearManufactured" required >  
                                <option>Select Year</option>
                                  <?php
                                    foreach(range(2010, (int)date("Y")) as $year) {
                                      echo "<option value='".$year."'>".$year."</option>\n\r";
                                  }
                                  ?> 
                                 <option value="2022" selected="">2022</option>
                                 <option value="2021">2021</option>
                                </select>
 -->                        </div>
                        <div class="col-md-3">
                             <!-- <button class="btn btn-primary" id="search" onclick="searchUpdate()"> Search</button>
 -->                        </div>
                       <!--  <div class="col-md-1"></div> -->

                    </div>  
                    </br></br> 
                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th>Date</th>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Email / Contact </th>
                                <th>Attendance Status</th>
                            </thead>
                            <?php
                            ?>
                           <tbody>
                            <?php
                            //  print_r($employeeList);
                            // // $result=$employeeList->where('date',date('Y-m-d'));
                            //   echo "\n >>> employeeAttendance \n";
                            //  print_r($employeeAttendance);
                            //  $empids=[];
                            //   echo ">>> employees ";
                            //   print_r($employees);
                            //   echo ">> emp count ",count($employees), ">>> atten count ",count($employeeAttendance);
                              
                            ?> 
                              <?php if(count($employees)>count($employeeAttendance)): ?>  
                                 <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if(count($employeeAttendance)==0): ?>
                                    <tr>
                                        <td><?php echo e(date('Y-m-d')); ?></td>
                                        <td><?php echo e($employee->emp_id); ?> </td>
                                        <td><?php echo e($employee->name); ?></td>
                                        <td>
                                            <a href="mailto:<?php echo e($employee->email); ?>"><?php echo e($employee->email); ?></a>
                                        </td>                                    
                                        <td>
                                              <?php if($employee->status!=''): ?>
                                              <button class="btn btn-primary"> <?php echo e($employee->status); ?></button>
                                                 
                                                <?php else: ?>
                                          
                                              <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Update Attendance Status" onclick="statusUpdate('<?php echo e($employee->id); ?>')"> Mark as Present 
                                                 
                                                </button>
                                      <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php else: ?>
                                     <!-- employees count> empattendance current date count-->
                                     <!-- -->  
                                       <?php $__currentLoopData = $employeeAttendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeeattendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <?php if($employee->id!=$employeeattendance->employee_id || count($employeeAttendance)==0): ?>

                                    <tr>
                                        <td><?php echo e(date('Y-m-d')); ?></td>
                                        <td><?php echo e($employee->emp_id); ?> </td>
                                        <td><?php echo e($employee->name); ?></td>
                                        <td>
                                            <a href="mailto:<?php echo e($employee->email); ?>"><?php echo e($employee->email); ?></a>
                                        </td>                                    
                                        <td>
                                              <?php if($employee->status!=''): ?>
                                              <button class="btn btn-primary"> <?php echo e($employee->status); ?></button>
                                                 
                                                <?php else: ?>
                                          
                                              <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Update Attendance Status" onclick="statusUpdate('<?php echo e($employee->id); ?>')"> Mark as Present 
                                                 
                                                </button>
                                      <?php endif; ?>
                                        </td>
                                    </tr>
                                     <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                   <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <!-- attendacne data  history data -->
                                <?php $__currentLoopData = $employeeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($employee->date); ?></td>
                                        <td><?php echo e($employee->emp_id); ?></td>
                                        <td><?php echo e($employee->name); ?></td>
                                        <td>
                                            <a href="mailto:<?php echo e($employee->email); ?>"><?php echo e($employee->email); ?></a>
                                            
                                           
                                        </td>
                                        <td>
                                              <?php if($employee->status!=''): ?>
                                                <button class="btn btn-primary"> <?php echo e($employee->status); ?></button>
                                                 
                                                <?php else: ?>
                                                 
                                              <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Update Attendance Status" onclick="statusUpdate('<?php echo e($employee->id); ?>')"> Mark as Present 
                                                 
                                                </button>
<!--                                              <form action="<?php echo e(route('employees.salaryupdate')); ?>" method="post" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('post'); ?>
                                                <input type="hidden" name="month" value="January">
                                                <input type="hidden" name="year" value="2022">
                                                <input type="hidden" name="status" value="Present">
                                              <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Update Salary Status" onclick="confirm('Are you sure you want to update this employee salary? ') ? this.parentElement.submit() : ''"> Pay Now
                                                  
                                                </button>
                                                </form> -->
                                              <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody> 
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                   <!--  <nav class="d-flex justify-content-end" aria-label="...">
                        <?php echo e($employees->links()); ?>

                    </nav>
                  -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<script type="text/javascript">
  function statusUpdate(id){
    //console.log(">> s update id "+id);
   // alert("status",id);
    var url = '<?php echo e(route("employees.attendanceupdate")); ?>';
    var dataString = "month='January'&& status = 'Present'";
         //url = url.replace(':id', id);
          //console.log(">>> id ",id , "url ",url); 
         $.ajax({
             url: url,
             type: 'post',
             data: {
              "_token": "<?php echo e(csrf_token()); ?>",
              "id": id,
              "employee_id" : id              
              },
             dataType: 'json',
             success: function(response) {
                console.log(">> response ",response);
                  $('#msg').html('<div class="alert alert-success alert-solid alert-dismissible col-ssm-12" >Successfully Updated Employee attendance status.</div>');
                 var url ="<?php echo e(route('employees.attendance')); ?>"; //the url I want to redirect to
                  $(location).attr('href', url);
             },
             error: function(err){
              console.log(">>>> err ",err);
             }
         });
  }
  function searchUpdate(){
       alert('hi');
       var url = '<?php echo e(route("employees.attendanceupdate")); ?>';
    var dataString = "month='January'&& status = 'Present'";
         //url = url.replace(':id', id);
          //console.log(">>> id ",id , "url ",url); 
         $.ajax({
             url: url,
             type: 'post',
             data: {
              "_token": "<?php echo e(csrf_token()); ?>",
              // "id": id,
              // "employee_id" : id              
              },
             dataType: 'json',
             success: function(response) {
                console.log(">> response ",response);
                //  $('#msg').html('<div class="alert alert-success alert-solid alert-dismissible col-ssm-12" >Successfully Updated Employee attendance status.</div>');
                 var url ="<?php echo e(route('employees.attendance')); ?>"; //the url I want to redirect to
                  //$(location).attr('href', url);
             },
             error: function(err){
              console.log(">>>> err ",err);
             }
         });
  }
  // $(document).ready(function(){
  //   console.log(">>> ww");
  // })
</script>

<?php echo $__env->make('layouts.app', ['page' => 'Employees', 'pageSlug' => 'employees', 'section' => 'employees'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\Inventory-Management\resources\views/employees/attendance.blade.php ENDPATH**/ ?>