<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Payment History Report</title>    
</head>
<body>

    <div class="tab-container">
        <h1>Wonder Railway Management</h1><br><br>
        <h1>Payment History Records</h1>
        <table>
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <th>Passenger</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("db/dbconnection.php");

                if (isset($_POST['search_btn'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM payment WHERE concat(tik_id,pas_id,date)  LIKE '%$search%' ";
                } else {
                    $sql = "SELECT * FROM payment";

                }
                  $query_run = mysqli_query($conn,$sql);

                  $Payment_id = 1;

                  while($row = mysqli_fetch_array($query_run))
                  {
                    $Payment_id=$row['pay_id'];
                    $date=$row['date'];
                    $amount=$row['amount'];
                    $pay_status=$row['pay_status'];
                    $pas_id=$row['pas_id'];
                ?>   
                <tr>
                    <td><?php echo $Payment_id ?></td>
                    <td><?php echo $date ?></td>
                    <td><?php echo $amount ?></td>
                    <td><?php echo $pay_status ?></td>
                    <td><?php echo $pas_id ?></td>
                </tr>

                <?php $Payment_id ++; } ?>
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