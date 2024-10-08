<?php
session_start();
        $pdf_url = isset($_SESSION['pdf_file']) ? $_SESSION['pdf_file'] : '';
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry</title>
    <style>
     
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .scaleh1{
            font-size: 20px;
            font-family: cursive;
        }
        body {
        
            flex-direction: row;
            height: 100vh;
            align-items: center;
            justify-content: space-between;
           

        }
        .contents
        {   
            justify-content: center;
            display: flex;
            flex-flow: row;
            width: 90%;
            margin-left: 5%;
            height: 86%;
        }
        .laundry-types  {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .laundry-list{
            display: flex;
            align-items: center;
            justify-content: center;

    
        }

        .scale{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 50%;
            border: solid 3px black;
        }
        .laundry-list {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
          
            margin-right: 20px;
         
        }

        .laundry-types {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            
        }

        .types {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 30px;
            width: 95%;
            overflow: auto;
            flex-wrap: wrap;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            border: solid 2px black;
            color: #FFF8E8;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 35.9em;

        }
        td, th {
            border: 1px solid black;
            text-align: left;
            padding: 10px;
            cursor: pointer;
        }

        tr:nth-child(even) {
            background-color: rgba(0, 0, 0, 0.25);

        }

        .button-28 {
            appearance: none;
            background-color: transparent;
            border: 2px solid black;
            border-radius: 15px;
            color: 674636;
            cursor: pointer;
            display: inline-block;
            font-family: Roobert, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 16px;
            font-weight: 600;
            line-height: normal;
            min-height: 60px;
            min-width: 0;
            outline: none;
            padding: 16px 24px;
            text-align: center;
            text-decoration: none;
            transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
            user-select: none;
            width: auto;
        }

        .button-28:hover {
            color: white;
            background-color: black;
            box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
            transform: translateY(-2px);
        }

        .button-28:active {
            box-shadow: none;
            transform: translateY(0);
        }

        .choicestext {
            border: 2px solid black;
            width: 95%;
            height: 40px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .scale {
            margin-left: 45%;
            width: 200px;
            height: 200px;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            gap: 20px;
            padding: 20px;
        }
        .okays{
            width: 100px;
            height: 50px;
            border-radius: 10px;
            cursor: pointer;
            border: 2px solid black;

        }
        .okayss{
            width: 100px;
            height: 50px;
            border-radius: 10px;
            cursor: pointer;
            border: 2px solid black;

        }
        .total-amount{
            font-size: 40px;
        }
        .status {
            width: 60%;
            height: 30rem;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            gap: 20px;
            padding: 20px;
            position: relative;
            bottom: 100px;
            margin-top:9%;
        }
        .payment-sec{
            display: flex;
            flex-direction: column;
            gap:10px;
            align-items: center;
            justify-content: center;
        }
        .btns-amount{
            display: flex;
            flex-direction: column;
            gap: 10px;
            
        }
        .payment-input{
            font-size :20px;
            padding: 10px;
        }
        .btn-align{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .okay{
            background-color: #3B3B3B;
            color: white;
            border: solid 2px black;
           padding: 10px;
           border-radius: 10px;
        }
        .okay:hover{
            color: #674636;
            background-color: #F7EED3;
            box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
            transform: translateY(-2px);
        }
        .hidden {
            display: none;
        }
        header{
            margin: 0;
            padding: 0;
            background-color: rgba(0, 0, 0, 0.25);
            width: 100%;
            height: 100px;
            display: flex;
        }
        .tableheader{
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            justify-content: center;
            display: flex;
        }
        .print{
            padding: 10px;
            border-radius: 10px;
            margin-top: 20px;
            margin-left: 20px;
   
            
            border: solid 3px black;
        }
        .print:hover{
            color: #717171;
            background-color: #1A1A1A;
            box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
            transform: translateY(-2px);

        }
        .okays:hover{
            color: #717171;
            background-color: #1A1A1A;
            box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
            transform: translateY(-2px);

        }
        .payment-input {
            font-size: 24px;
            padding: 10px;
            margin-bottom: 20px;
            display: block;
            width: 100%;
            box-sizing: border-box;
            border-color: transparent;
            border-bottom: 2px solid black ;
        }
     
        .selected {
            background-color: #f5cba7;
            }
            .headerdiv{
                display: flex;
                align-items: center;
                justify-content: space-around;
                width: 100%;
            }
    </style>

</head>

<body>
    <header>
        <div class="headerdiv">
            <div>
                <h1>Laundry ni JEAN</h1>
            </div>
            <div>
                <button class="print" id = "print"> Print</button>
                <a href="claim.php"><button class="print" > Claim</button></a>
            </div>

        </div>

    </header>
    <div class="contents">
        <div class="laundry-list" id="laundry-list">
            <div class="list-panel">
                <div class="tableheader"><h1>Items list</h1></div>
                <div class="table" id="modify-btn">
                    <table id="itemsTable">                    
                        <tr>
                            <th>Name</th>
                            <th>Kilogram</th>
                            <th>Price</th>
                            <th>SubTotal</th>
                        </tr>
                        <?php
                        include("connection.php");
                        $select = "SELECT * FROM items";
                        $result = $conn->query($select);
                        if ($result === false) {
                            echo "Error: " . $conn->error;
                        } else 
                        {
                            while ($row = $result->fetch_assoc()) 
                            {
                        ?>
                        <tr data-name="<?php echo htmlspecialchars($row["namee"]); ?>"
                            data-kilo="<?php echo htmlspecialchars($row["kilo"]); ?>"
                            data-price="<?php echo htmlspecialchars($row["price"]); ?>">
                            <td><?php echo htmlspecialchars($row["namee"]); ?></td>
                            <td><?php echo htmlspecialchars($row["kilo"]); ?></td>
                            <td><?php echo htmlspecialchars($row["price"]); ?></td>
                            <td><?php echo htmlspecialchars($row["total"]); ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
                <p style="text-align: right; font-size: 30px; font-weight: bold; margin-top: 10px;">
                    TOTAL: 
                    <?php 
                    $sumTotal = 0;
                    $select = "SELECT total FROM items";
                    $result = $conn->query($select);

                    if ($result === false) {
                        echo "Error: " . $conn->error;
                    } else {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if (isset($row['total']) && $row['total'] !== null) {
                                    $totalValue = (float)$row['total'];
                                    $sumTotal += $totalValue;
                                }
                            }
                        } else {
                            echo "";
                        }
                        if($sumTotal == 0){
                            echo "";
                        }else{
                            $finalTotal = ($sumTotal < 150) ? 150 : $sumTotal;
                            echo number_format($finalTotal, 2); 
                        }                                   
                    }
                    ?>
                </p>  
            </div>
        </div>
    <div class="laundry-types hidden" id="laundry-types">

    <div class="choicestext"><h1>Choices</h1></div>
        <div class="types">
            <?php
                $select = "SELECT * FROM types";
                $result = $conn->query($select);
                if ($result === false) {
                    echo "Error: " . $conn->error;
                } else {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='type_button'>
                        <form method='POST' action='laundry.php'>
                            <input type='hidden' name='type_name' value='" . htmlspecialchars($row["type_name"]) . "'>
                            <button class='button-28' role='button' name='typebtn' type='submit'>" . htmlspecialchars($row["type_name"]) . "</button>
                        </form></div>";
                    }
                }
            ?>
        </div>
    </div>

        <div class="scale" id="scale">
            <h1 class="scaleh1">Input how many Kilos</h1>
            <input type="number" name="kilo" class="kilo-input" min="0.1" step="0.1">
            <div class="btn">
                <div><button type="button" class="okay" id="okay-btn">Okay</button></div>
                <div><button type="button" class="back" id="back-btn">Back</button></div>
            </div>
        </div>
    
    <div class = "status hidden" id="status" >
        <form method="POST" action="payment.php">
            <div>
                <div style="text-align:center;">
                    <?php
                    if($sumTotal <= 150 ) {
                        $sumTotal = 150;
                    }
                    echo '<h1 class="total-amount">TOTAL: '.$sumTotal.'</h1>';
                    ?>
                </div>
            </div>

            <div class="payment-sec" id="payment-sec">
                <div>
                    <div><h1 class="scaleh1">Payment</h1></div>
                    <input name="sumtotal" type="hidden" value="<?php echo htmlspecialchars($sumTotal); ?>">
                    <input name="amount" id="amount" class="payment-input" placeholder="0">
                </div>
                <div>
                    <div><h1 class="scaleh1">Job Number</h1></div>
                    <input name="sumtotal" type="hidden">
                    <input name="trans_id" id="trans_id" class="payment-input" placeholder="0" required>
                </div>
            </div>
            <?php 
            if ($pdf_url): ?>
            <iframe src="<?php echo ($pdf_url); ?>" width="100%" height="600px" id="pdfFrame" style="display: none;"></iframe>
            <?php else: ?>
            <p>No PDF available to display.</p>
            <?php endif; ?>
            <div class="numpad">       
                <div class="btn-align">
                    <button type="button" class="okays">1</button>
                    <button type="button" class="okays">2</button>
                    <button type="button" class="okays">3</button>
                    <button type="button" class="okays">4</button>
                    <button type="button" class="okays">5</button>
                </div>
                <div class="btn-align">
                    <button type="button" class="okays">6</button>
                    <button type="button" class="okays">7</button>
                    <button type="button" class="okays">8</button>
                    <button type="button" class="okays">9</button>
                    <button type="button" class="okays">0</button>
                </div>
                <div class="btn-align">
                    <div><button type="submit" class="okayss" id="paidbtn" name="payment-btn" >Confirm</button></div>
                    <div><button type="button" class="okays" id="exactAmountBtn" onclick="setExactAmount()">Exact Amount</button></div>
                    <div><button type="button" class="okays" id="deletebtn" onclick="clearAmount()">Delete</button></div>
                    <div><button type="button" class="okays" id="closebtn"  onclick="close()">Back</button></div>
                </div>
            </div>
        </form>
    </div>
    <script>
        closebtn.addEventListener('click', function(){
            
            window.location.reload();
        });
        document.addEventListener('DOMContentLoaded', function() {
        var laundryList = document.getElementById('laundry-list');
        var laundryTypes = document.getElementById('laundry-types');
        var scale = document.getElementById('scale');
        var okayBtn = document.getElementById('okay-btn');
        var backBtn = document.getElementById('back-btn');
        var selectedType = '';
        var selectedRow = null;
    
        laundryList.classList.remove('hidden');
        laundryTypes.classList.remove('hidden');
        scale.classList.add('hidden');

      
        document.querySelectorAll('.type_button form').forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                selectedType = this.querySelector('input[name="type_name"]').value;
                console.log("Selected Type: " + selectedType);

                laundryList.classList.add('hidden');
                laundryTypes.classList.add('hidden');
                scale.classList.remove('hidden');
            });
        });

        //  back button click
        backBtn.addEventListener('click', function(){
            laundryList.classList.remove('hidden');
            laundryTypes.classList.remove('hidden');
            scale.classList.add('hidden');
            window.location.reload();
        });

         //  okay button click
         okayBtn.addEventListener('click', function() {
            var kiloInput = document.querySelector('input[name="kilo"]').value;

        if(isNaN(kiloInput) || kiloInput < 0){
            alert('Please enter a valid non-negative number for kilograms.');
        }else if(kiloInput == 0){
            alert("Invalid Input");
        }else{
            if (kiloInput && selectedType) {
                fetch('insertdata.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'type_name=' + encodeURIComponent(selectedType) + '&kilo=' + encodeURIComponent(kiloInput)
                })
                .then(response => response.text())
                .then(data => {
                    console.log("Response from server: " + data);

                    laundryList.classList.remove('hidden');
                    laundryTypes.classList.remove('hidden');
                    scale.classList.add('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                });
                window.location.reload();
            } else {
                console.log("Please input kilo or select a type");
            }
        }          
        });
        
        document.querySelectorAll("#itemsTable tr").forEach(row => {
            row.addEventListener("click", function() {
                document.querySelectorAll("#itemsTable tr").forEach(r => r.classList.remove("selected"));
                this.classList.add("selected");
                selectedRow = this;
            });
        });

        const modifyBtn = document.getElementById('modify-btn');
            modifyBtn.addEventListener('click', function() {
                if (selectedRow) {
                    const itemName = selectedRow.getAttribute("data-name");
                    const newKilo = parseFloat(prompt("Enter new kilogram", selectedRow.cells[1].innerText));

                    // Check if newKilo is a valid number and not negative
                    if (isNaN(newKilo) || newKilo < 0) {
                        alert('Please enter a valid non-negative number for kilograms.');
                    } else if (newKilo == 0) {
                        // delete
                        fetch('deleteitem.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'name=' + encodeURIComponent(itemName)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Item deleted successfully!');
                                selectedRow.remove();
                                window.location.reload();
                            } else {
                                alert('Failed to delete the item: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    } else {
                        //  update
                        selectedRow.cells[1].innerText = newKilo;

                        fetch('modifykilo.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'name=' + encodeURIComponent(itemName) + '&newKilo=' + encodeURIComponent(newKilo)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Item updated successfully!');
                                window.location.reload();
                            } else {
                                alert('Failed to update the item: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                       
                    }
                } else {
                    alert("Please select a row to modify.");
                }
            });
        });

        // PRINT
    document.getElementById('print').addEventListener('click', function() {
    var status = document.getElementById('status');
    var laundryList = document.getElementById('laundry-list');
    var laundryTypes = document.getElementById('laundry-types');

    // Hide the laundry list and types
    laundryList.classList.add('hidden');
    laundryTypes.classList.add('hidden');

    // Show the status div
    status.classList.remove('hidden');
});
    
    //fetch total on insertdata.php
    function fetchTotal() {
            fetch('fetch_totals.php') // Call the PHP script that returns the latest total
                .then(response => response.json()) // Parse the JSON response
                .then(data => {
                    if (data.total !== undefined) {
                        document.getElementById('total-cell').innerText = 'TOTAL: ' + data.total;
                    } else if (data.error) {
                        console.error('Error:', data.error);
                    }
                })
                .catch(error => console.error('Fetch error:', error));
        }
    
    document.addEventListener('DOMContentLoaded', function() {
            fetchTotal(); 
            setInterval(fetchTotal, 1000);
        });
        function addToInput(amount) {
    const inputField = document.querySelector('.payment-input');
    let currentValue = parseFloat(inputField.value) || 0;
    inputField.value = currentValue + parseFloat(amount);
}

function setExactAmount() {
        const sumTotal = <?php echo json_encode($sumTotal); ?>;
        document.getElementById('amount').value = sumTotal;
    }

//for the buttons
document.getElementById('trans_id').addEventListener('focus', function() {
    activeInput = this; // Set the active input to the transaction ID input
});
        let activeInput = document.getElementById('amount'); 


            document.querySelectorAll('.okays').forEach(button => {
            button.addEventListener('click', function() {
                const num = this.innerText;
                activeInput.value += num; 
            });
});
//exact amount button
document.getElementById('exactAmountBtn').addEventListener('click', function() {
    setExactAmount(); 
});

 //delete
function clearAmount() {
        document.getElementById('amount').value = '';
    }
</script>

</body>
</html>
