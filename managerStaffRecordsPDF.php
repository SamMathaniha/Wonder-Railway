<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Staff Management Report</title>    
</head>
<body>

    <div class="tab-container">
        <h1>Wonder Railway Management</h1><br><br>
        <h1>Staff Management</h1>
        <table>
            <thead>
                <tr>
                    <th>Staff ID</th>
                    <th>Staff Name</th>
                    <th>NIC No</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Gender</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("db/dbconnection.php");

                if (isset($_POST['search_btn'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM staff WHERE concat(name,nic_no)  LIKE '%$search%' ";
                } else {
                    $sql = "SELECT * FROM staff";

                }
                $query_run = mysqli_query($conn,$sql);

                $Staff_id = 1;

                while($row = mysqli_fetch_array($query_run))
                {
                    $STF_id=$row['stf_id'];
                    $StaffName=$row['name'];
                    $NicNo=$row['nic_no'];
                    $Address=$row['address'];
                    $ContactNo=$row['con_no'];
                    $Gender=$row['gender'];
                    $Role=$row['role'];
                    
                ?>
                        
                <tr>
                    <td><?php echo $Staff_id  ?></td>
                    <td><?php echo $StaffName ?></td>
                    <td><?php echo $NicNo?></td>
                    <td><?php echo $Address ?></td>
                    <td><?php echo $ContactNo ?></td>
                    <td><?php echo $Gender ?></td>
                    <td><?php echo $Role ?></td>
                </tr>

                <?php $Staff_id ++; } ?>
            </tbody>
        </table>
    </div>

    <script>
        function printReport() {
            window.print();
        }

        window.onload = function() {
            printReport();
        };
    </script>
</body>
</html>