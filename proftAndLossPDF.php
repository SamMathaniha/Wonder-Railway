<!DOCTYPE html>
<html>
<head>
    <title>Total Amount and Profit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .total-amount {
            font-size: 24px;
            margin-top: 20px;
        }

        table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ddd;
  }

  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
  }

  .profitStyle {
    border: 2px solid #3498db;
    background-color: #f2f2f2;
    padding: 8px;
    border-radius: 10px;
    text-align: center;
  }

  .profitText {
    font-size: 25px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
  }

  .profitAmount {
    font-size: 25px;
    color: red;
    font-weight: bold;
  }
  h1{
    color:blue;
    font-family: 'Georgia', serif;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
  }

  h2{
    color:red;
    font-family: 'Georgia', serif;
    text-shadow: 1px 2px 3px rgba(0, 0, 0, 0.2);
  }

  hr {
    border: 3px solid #ccc;
  }
    </style>

<script>
        function printReport() {
            window.print();
        }

        window.onload = function() {
            printReport();
        };
    </script>
    
</head>
<body>
    <h1> Wonder Railway Management System </h1>
    <hr>
    <h2> Profit & Loss Report </h2>
    <hr>

    <?php
    // Database connection settings
    $servername = "localhost";
    $username = "Hazz_Wondor";
    $password = "Hazz@2023";
    $dbname = "hazz_wonder";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve payment amounts from the database
    $paymentSql = "SELECT amount FROM payment";
    $paymentResult = $conn->query($paymentSql);

    // Calculate the total payment amount
    $totalPaymentAmount = 0;
    if ($paymentResult->num_rows > 0) {
        while ($row = $paymentResult->fetch_assoc()) {
            $totalPaymentAmount += $row["amount"];
        }
    }

    // Retrieve other_expenses amounts from the database
    $otherExpensesSql = "SELECT amount FROM other_expenses";
    $otherExpensesResult = $conn->query($otherExpensesSql);

    // Calculate the total other_expenses amount
    $totalOtherExpensesAmount = 0;
    if ($otherExpensesResult->num_rows > 0) {
        while ($row = $otherExpensesResult->fetch_assoc()) {
            $totalOtherExpensesAmount += $row["amount"];
        }
    }

    // Calculate profit
    $profit = $totalPaymentAmount - $totalOtherExpensesAmount;

    // Close the connection
    $conn->close();
    ?>
    <br>
    <table> 
        <tr style = "color:blue;">
            <th >Invoices</th>
            <th>Amount</th>
       </tr>
       <tr>
            <th> Income </th>
            <th></th>
       </tr>
       <tr>
            <td>Total Amount of Ticket Booking revenue</td>
            <td><?php echo $totalPaymentAmount; ?></td>
       </tr>
       <tr>
            <th> Expenses </th>
            <th></th>
       </tr>
       <tr>
            <td>Total Amount of Other Expenses</td>
            <td><?php echo $totalOtherExpensesAmount; ?></td>
       </tr>
       
    
       <tr style = "color:Green;">
            <th>Total Amount (Income - Expenses) : </th>
            <th><?php echo $profit; ?></th>
       </tr>
 
    </table>
    <br>
    <div class="profitStyle">
  <p class="profitText">Total Profit Amount is :</p>
  <p class="profitAmount"><?php echo $profit; ?>.00 /=</p>
</div>  

</body>
</html>
