<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claim</title>
    <style>
        .hidden {
            display: none;
        }
        .menu{
            text-align: center;
        }
        .content-div{
            display: flex;
            justify-content: space-around;
            align-items:center ;
        }
        .claim-method{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%); 
        }
        .cash{
            display: none;
        }
    </style>
</head>
<body>  
    <section class="menu">
        <div class="content-div">
            <div>
                <p></p>
            </div>
            <div>
                <h1>Laundry System</h1>
            </div>
            
            <div class="container">
                <div class="button">
                    <a href="terminal.php"><button type="button">Back</button></a>
                </div>
            </div>
        </div>
    </section>

    <section class="body">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if transaction ID is provided
            if (isset($_POST['trans_id']) && !empty($_POST['trans_id'])) {
                $id = $_POST['trans_id'];
        
                // Prepare a statement to prevent SQL injection
                $stmt = $conn->prepare("SELECT * FROM orders WHERE transaction_id = ?");
                $stmt->bind_param("s", $id); // "s" indicates a string parameter
                $stmt->execute();
                $result = $stmt->get_result();
        
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                } else {
                    $error_message = "No order found for the provided Transaction ID.";
                }
        
                $stmt->close();
            } else {
                $error_message = "Please enter a valid Transaction ID.";
            }
        }
        ?>
        <div class="claim-method">
            <div>
                <form action="" method="post">
                    <div class="total">
                        <label for="trans_id">Enter Id:</label>
                        <input type="text" name="trans_id" placeholder="transaction_id" required>
                        <button type="submit">confirm</button>
                    </div>

                    <div>
                        <?php if (isset($row)): ?>
                            <label>Transaction ID: <?php echo htmlspecialchars($row['transaction_id']); ?></label><br>
                            <label>TOTAL: <?php echo htmlspecialchars($row['total']); ?></label><br>
                            <label>Status: <?php echo htmlspecialchars($row['statuss']); ?></label><br>
                            <label>Balance: <?php echo htmlspecialchars($row['balance']); ?></label>
                        <?php elseif (isset($error_message)): ?>
                            <p><?php echo $error_message; ?></p>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <div class="choice" id="choices">
                <button type="button" class="btn" onclick="cash_btn()">Cash</button>
                <button type="button" class="btn" id="credit-btn">Credit</button>
            </div>

            <div class="cash" id="payment-form">
                <form>
                    <div class="scale" id="cash">
                        <h1 class="scaleh1">Enter cash amount</h1>
                        <input type="number" name="cash" class="cash-input" min="0.1" step="0.1" required>                    
                        <div class="btn">
                            <div><button type="submit" class="okay" id="okay-btn">Okay</button></div>
                            <div><button type="button" class="cancel" id="cancel-btn">Cancel</button></div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        
    </section>

    <script>
       function cash_btn(){
            var form = document.getElementById('payment-form');
            if(form.style.display=='none'){
                form.style.display="block";
            }
            else{
                form.style.display='none'
            }
       }
    </script>
</body>
</html>
