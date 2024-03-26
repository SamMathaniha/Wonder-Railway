<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Inventory Management Report</title>    
</head>
<body>

    <div class="tab-container">
        <h1>Wonder Railway Management</h1><br><br>
        <h1>Inventory Management</h1>
        <table>
            <thead>
                <tr>
                    <th>Seat ID</th>
                    <th>Seat No</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("db/dbconnection.php");

                if (isset($_POST['search_btn'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM seat WHERE seat_no  LIKE '%$search%' ";
                } else {
                    $sql = "SELECT * FROM seat";

                }
                  $query_run = mysqli_query($conn,$sql);

                  $SEAT_id = 1;

                  while($row = mysqli_fetch_array($query_run))
                  {
                    $seat_id = $row['seat_id']; //want complete the code from here.
                    $SeatNo = $row['seat_no'];
                    $Status = $row['status'];
                ?>   
                <tr>
                    <td><?php echo $SEAT_id ?></td>
                    <td><?php echo $SeatNo?></td>
                    <td><?php echo $Status?></td>
                </tr>

                <?php $SEAT_id++; } ?>
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