<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Train Management Report</title>    
</head>
<body>

    <div class="tab-container">
        <h1>Wonder Railway Management</h1><br><br>
        <h1>Train Management</h1>
        <table>
            <thead>
                <tr>
                    <th>Train ID</th>
                    <th>Train Name</th>
                    <th>Total Seats</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("db/dbconnection.php");

                if (isset($_POST['search_btn'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM train WHERE concat(name,nic_no)  LIKE '%$search%' ";
                } else {
                    $sql = "SELECT * FROM train";

                }
                $query_run = mysqli_query($conn,$sql);

                $id = 1;

                while($row = mysqli_fetch_array($query_run))
                {
                    $T_id=$row['trn_id'];
                    $trainName=$row['name'];
                    $totalSeats=$row['total_seats'];
                    $trainCategory=$row['train_category'];
                    
                ?>
                        
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $trainName ?></td>
                    <td><?php echo $totalSeats ?></td>
                    <td><?php echo $trainCategory ?></td>
                </tr>

                <?php $id ++; } ?>
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