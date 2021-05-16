<?php

include('head.php');
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once ('./vendor/autoload.php');

if (isset($_POST["import"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 0; $i <= $sheetCount; $i ++) {
            $name = "";
            if (isset($spreadSheetAry[$i][0])) {
                $name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }
            $department = "";
            if (isset($spreadSheetAry[$i][1])) {
                $department = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }
             $semester = "";
            if (isset($spreadSheetAry[$i][2])) {
                $semester = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }
             $dob = "";
            if (isset($spreadSheetAry[$i][3])) {
                $dob = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
            }
             $university_number = "";
            if (isset($spreadSheetAry[$i][4])) {
                $university_number = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }
             $email = "";
            if (isset($spreadSheetAry[$i][5])) {
                $email = mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
            }
             $phone_number = "";
            if (isset($spreadSheetAry[$i][6])) {
                $phone_number = mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
            }
             $address = "";
            if (isset($spreadSheetAry[$i][7])) {
                $address = mysqli_real_escape_string($conn, $spreadSheetAry[$i][7]);
            }

            if (! empty($name) || ! empty($department)) {
                $query = "INSERT INTO student_data   (name, department, semester,dob,university_number,email,phone_number,address)
VALUES ('$name','$department','$semester','$dob','$university_number','$email','$phone_number','$address')";
                $paramType = "ss";
                $paramArray = array(
                    $name,
                    $department,
                    $semester,
                    $dob,
                    $university_number,
                    $email,
                    $phone_number,
                    $address
                );
                $insertId = $db->insert($query, $paramType, $paramArray);
                // $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
                // $result = mysqli_query($conn, $query);

                if (!empty($insertId)) {
                    // session_start();
// $username = $_SESSION['username'];
                      $type = "success";
                    $message = "Excel Data Imported into the Database";
                 } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }
            }
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: Arial;
    /*width: 550px;*/
}

.outer-container {
    background: #F0F0F0;
    border: #e0dfdf 1px solid;
    padding: 40px 20px;
    border-radius: 2px;
}

.btn-submit {
    background: #333;
    border: #1d1d1d 1px solid;
    border-radius: 2px;
    color: #f0f0f0;
    cursor: pointer;
    padding: 5px 20px;
    font-size: 0.9em;
}

.tutorial-table {
    margin-top: 40px;
    font-size: 0.8em;
    border-collapse: collapse;
    width: 100%;
}

.tutorial-table th {
    background: #f0f0f0;
    border-bottom: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

.tutorial-table td {
    background: #FFF;
    border-bottom: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

#response {
    padding: 10px;
    margin-top: 10px;
    border-radius: 2px;
    display: none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>
</head>

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
    <h2>Import Excel File into MySQL Database using PHP</h2>

    <div class="outer-container">
        <form action="" method="post" name="frmExcelImport"
            id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Choose Excel File</label> <input type="file"
                    name="file" id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>

            </div>

        </form>

    </div>
<!--     <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>


<?php
$sqlSelect = "SELECT * FROM student_data";
$result = $db->select($sqlSelect);
if (! empty($result)) {
    ?>

    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>

            </tr>
        </thead>
<?php
    foreach ($result as $row) { // ($row = mysqli_fetch_array($result))
        ?>
        <tbody>
            <tr>
                <td><?php  echo $row['name']; ?></td>
                <td><?php  echo $row['semester']; ?></td>
            </tr>
<?php
    }
    ?>
        </tbody>
    </table> -->
<?php
}
include('footer.php')
?>

