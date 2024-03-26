<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Passenger Record Report</title>    
</head>
<body>

    <div class="tab-container">
        <h1>Wonder Railway Management</h1><br><br>
        <h1>Passenger Records</h1>
        <table>
            <thead>
                <tr>
                    <th>Passager ID</th>
                    <th>Name</th>
                    <th>Nic or Passport No</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Hint</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("db/dbconnection.php");

                if (isset($_POST['search_btn'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM passenger WHERE concat(name,nic_or_pp_no)  LIKE '%$search%' ";
                } else {
                    $sql = "SELECT * FROM passenger";

                }
                  $query_run = mysqli_query($conn,$sql);

                  $PASS_id = 1;

                  while($row = mysqli_fetch_array($query_run))
                  {
                    $Pass_id=$row['pas_id'];
                    $Name=$row['name'];
                    $Nic_or_PP_No=$row['nic_or_pp_no'];
                    $Contact_No=$row['con_no'];
                    $Email=$row['email'];
                    $Password=$row['password'];
                    $Hint=$row['hint'];
                ?>   
                <tr>
                    <td><?php echo $PASS_id ?></td>
                    <td><?php echo $Name ?></td>
                    <td><?php echo $Nic_or_PP_No ?></td>
                    <td><?php echo $Contact_No ?></td>
                    <td><?php echo $Email ?></td>
                    <td><?php echo $Password ?></td>
                    <td><?php echo $Hint ?></td>
                </tr>

                <?php $PASS_id++; } ?>
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