<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Other Expenses Report</title>    
</head>
<body>

    <div class="tab-container">
        <h1>Wonder Railway Management</h1><br><br>
        <h1>Other Expenses Records</h1>
        <table>
            <thead>
                <tr>
                    <th>Oex ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("db/dbconnection.php");

                if (isset($_POST['search_btn'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM other_expenses WHERE name LIKE '%$search%' ";
                } else {
                    $sql = "SELECT * FROM other_expenses";

                }
                  $query_run = mysqli_query($conn,$sql);

                  $OEX_id = 1;

                  while($row = mysqli_fetch_array($query_run))
                  {
                    $oex_id=$row['oex_id'];
                    $Name=$row['name'];
                    $Type=$row['type'];
                    $Amount=$row['amount'];
                    $date=$row['date'];
                    $Description=$row['description'];
                ?>   
                <tr>
                    <td><?php echo $OEX_id  ?></td>
                    <td><?php echo $Name ?></td>
                    <td><?php echo $Type ?></td>
                    <td><?php echo $Amount ?></td>
                    <td><?php echo $date ?></td>
                    <td><?php echo $Description ?></td>
                </tr>

                <?php  $OEX_id ++; } ?>
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