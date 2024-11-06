<?php 
$host = "mysql-24c8e3ad-quillflux-tech.j.aivencloud.com";
$port = '15332';
$dbname = 'bambam';
$username = 'avnadmin';
$password = 'AVNS_Qe-vsVRVV2XN7zqOo0Y';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch daily production records
    $productionQuery = "SELECT * FROM production WHERE DATE(production_date) = CURDATE()";
    $productionStmt = $pdo->prepare($productionQuery);
    $productionStmt->execute();
    $productionRecords = $productionStmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch daily delivery records
    $deliveryQuery = "SELECT * FROM delivery WHERE DATE(supply_date) = CURDATE()";
    $deliveryStmt = $pdo->prepare($deliveryQuery);
    $deliveryStmt->execute();
    $deliveryRecords = $deliveryStmt->fetchAll(PDO::FETCH_ASSOC);



} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?><?php 
$port = '3306';
$dbname = 'bambam';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=localhost;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch daily production records
    $productionQuery = "SELECT * FROM production WHERE DATE(production_date) = CURDATE()";
    $productionStmt = $pdo->prepare($productionQuery);
    $productionStmt->execute();
    $productionRecords = $productionStmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch daily delivery records
    $deliveryQuery = "SELECT * FROM delivery WHERE DATE(supply_date) = CURDATE()";
    $deliveryStmt = $pdo->prepare($deliveryQuery);
    $deliveryStmt->execute();
    $deliveryRecords = $deliveryStmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Records</title>
    <style>
        :root {
            --main-bg-color: #f4f4f4;
            --primary-color: #007bff;
            --text-color: #333;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: var(--main-bg-color);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 90%;
            width: 800px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: var(--text-color);
        }
        .table-container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 0.9em;
            min-width: 600px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: var(--primary-color);
            color: white;
        }
        .navbar {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .navbar a {
            text-decoration: none;
            color: var(--primary-color);
            padding: 10px 15px;
            margin: 0 5px;
            border: 1px solid var(--primary-color);
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .navbar a:hover {
            background-color: var(--primary-color);
            color: white;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 15px;
            }
            table, th, td {
                font-size: 0.8em;
                padding: 8px;
            }
            .navbar {
                flex-direction: column;
                align-items: center;
            }
            .navbar a {
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <a href="productions.php">Production Records</a>
            <a href="customers.php">List of Customers</a>
            <a href="customer_supply.php">Supply Records</a>
        </div>

        <h2>Production Records for Today</h2>
        <div class="table-container">
            <table>
                <tr>
                    <th>Date</th>
                    <th>Cement</th>
                    <th>Blocks</th>
                    <th>Rate</th>
                    <th>B-Price</th>
                    <th>Workers</th>
                    <th>Total</th>
                </tr>
                <?php 
                $totalCement = $totalBlocks = $totalBlockPrice = $totalWorkersDue = $totalFinal = 0;
                if (count($productionRecords) > 0): 
                    foreach ($productionRecords as $record): 
                        $blockPrice = $record['blocks_produced'] * $record['rate'];
                        $total = $blockPrice + $record['workers_due'];
                        $totalCement += $record['cement_used'];
                        $totalBlocks += $record['blocks_produced'];
                        $totalBlockPrice += $blockPrice;
                        $totalWorkersDue += $record['workers_due'];
                        $totalFinal += $total;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($record['production_date']); ?></td>
                    <td><?php echo htmlspecialchars($record['cement_used']); ?></td>
                    <td><?php echo htmlspecialchars($record['blocks_produced']); ?></td>
                    <td><?php echo htmlspecialchars($record['rate']); ?></td>
                    <td><?php echo htmlspecialchars(number_format($blockPrice, 2)); ?></td>
                    <td><?php echo htmlspecialchars($record['workers_due']); ?></td>
                    <td><?php echo htmlspecialchars(number_format($total, 2)); ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong><?php echo number_format($totalCement, 2); ?></strong></td>
                    <td><strong><?php echo number_format($totalBlocks, 2); ?></strong></td>
                    <td>-</td>
                    <td><strong><?php echo number_format($totalBlockPrice, 2); ?></strong></td>
                    <td><strong><?php echo number_format($totalWorkersDue, 2); ?></strong></td>
                    <td><strong><?php echo number_format($totalFinal, 2); ?></strong></td>
                </tr>
                <?php else: ?>
                <tr>
                    <td colspan="7">No production records for today.</td>
                </tr>
                <?php endif; ?>
            </table>
        </div>

        <h2>Delivery Records for Today</h2>
        <div class="table-container">
            <table>
                <tr>
                    <th>Supply Date</th>
                    <th>Customer Name</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Delivery Price</th>
                    <th>Balance</th>
                </tr>
                <?php 
                $totalQuantity = $totalDeliveryPrice = 0;
                if (count($deliveryRecords) > 0): 
                    foreach ($deliveryRecords as $record): 
                        $totalQuantity += $record['quantity'];
                        $totalDeliveryPrice += $record['delivery_price'];
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($record['supply_date']); ?></td>
                    <td><?php echo htmlspecialchars($record['customer_name']); ?></td>
                    <td><?php echo htmlspecialchars($record['quantity']); ?></td>
                    <td><?php echo htmlspecialchars($record['rate']); ?></td>
                    <td><?php echo htmlspecialchars($record['delivery_price']); ?></td>
                    <td>-</td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td><strong>Total</strong></td>
                    <td>-</td>
                    <td><strong><?php echo number_format($totalQuantity, 2); ?></strong></td>
                    <td>-</td>
                    <td><strong><?php echo number_format($totalDeliveryPrice, 2); ?></strong></td>
                    <td><strong><?php echo number_format($totalFinal - $totalDeliveryPrice, 2); ?></strong></td>
                </tr>
                <?php else: ?>
                <tr>
                    <td colspan="6">No delivery records for today.</td>
                </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</body>
</html>
