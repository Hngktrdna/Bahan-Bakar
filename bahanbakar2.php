<?php 
require "bahanbakar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shell Receipt</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f1f1f1;
    }
    .container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        background-color: #FFD457;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
        color: black;
    }
    .receipt {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #FFE8A5;
    }
    .row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    .column {
        flex-basis: 45%;
    }
    .column select, .column input {
        width: 100%;
        padding: 8px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    .total {
        text-align: right;
        margin-top: 20px;
    }
    .logo {
        display: block;
        margin: 0 auto;
        width: 100px;
    }
    pre {
        text-align: center;
    }
    
    
</style>
</head>
<body>
    <div class="container">
        <h1>Shell</h1>
        <img src="img/Shell logo.png" alt="https://upload.wikimedia.org/wikipedia/id/thumb/e/e8/Shell_logo.svg/1200px-Shell_logo.svg.png" class="logo">
        <div class="receipt">
            <!-- Column to choose the type of fuels -->
            <form action="" method="post">
            <div class="row">
                <div class="column">
                    <label for="fuel">Fuel Type:</label>
                    <select id="fuel" name="fuel">
                        <option value="Shell Super">Shell Super</option>
                        <option value="Shell Diesel Extra">Shell Diesel Extra</option>
                        <option value="Shell V Power">Shell V Power</option>
                        <option value="Shell V Power Diesel">Shell V Power Diesel</option>
                        <option value="Shell Power Nitro Plus">Shell Power Nitro Plus</option>
                    </select>
                </div>
                <!-- Column to fill the quantity of fuel -->
                <div class="column">
                    <label for="quantity">Quantity (Liters):</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1">
                </div>
            </div>
            <div class="total">
                <!-- Button to calculate total of payment -->
                <button type="submit">Calculate Total</button>
            </div>
        </form>
            <pre id="receiptResult"></pre>
        </div>
    </div>

    
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jenisBahanBakar = $_POST["fuel"];
        $jumlahLiter = $_POST["quantity"];
        $shell = new Shell($jenisBahanBakar, $jumlahLiter);
            //  echo $shell->getReceipt();
             echo "<script>
             document.getElementById('receiptResult').append(`".$shell->getReceipt()."`) 
             </script>";
    }
             
            ?>
</body>
</html>
