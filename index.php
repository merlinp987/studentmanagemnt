<?php 
include('config.php'); 


include('head.php');
$sql = "SELECT * FROM student_data";
$result =mysqli_query($db,$sql);
 ?>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                           
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Student Details</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
     <table id="mytable" style="width:100%; z-index:1;" border=1>
    <!-- tablennu oru id koduthale athine call cheythu script nu pattullu -->
    <thead><tr>
        <th>Student Name</th>
        <th>Student Department</th>
        <th>Department</th>
        <th>DOB</th>
        <th>University Number</th>
        <th>Email</th>
        <th>Phone Number</th>
        <!-- <th>Student Class</th> -->
        <th>Student Address</th>
        <!-- <th>Student Name</th> -->
    </tr></thead>
    <tbody>
        
        <tr>
       <?php
        while($row = mysqli_fetch_array($result)) { ?>
        <td><?= $row['name']; ?></td>
        <td><?= $row['department']; ?></td>
        <td><?= $row['semester']; ?></td>
        <td><?= $row['dob']; ?></td>
        <td><?= $row['university_number']; ?></td>
       <td><?= $row['email']; ?></td>
               <td><?= $row['phone_number']; ?></td>
       <td><?= $row['address']; ?></td>
    </tr><?php }?>
    </tbody>
    <tfoot>
        <tr>
 <th>Student Name</th>
        <th>Student Department</th>
        <th>Department</th>
        <th>DOB</th>
        <th>University Number</th>
        <th>Email</th>
        <th>Phone Number</th>
        <!-- <th>Student Class</th> -->
        <th>Student Address</th>
        <!-- <th>Student Name</th> -->
    </tr>
    </tfoot>
    
    
</table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
      
        






      
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<!-- ithu jquery call cheyyanathanu -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js
"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js

"></script> 

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js
"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js
"></script>


<!-- //https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js
https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js
https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js
https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js
https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js/ -->






         <?php include('footer.php') ?>  