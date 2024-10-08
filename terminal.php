<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry System</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 20%;

        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            margin-left: 10%;
        }
        .button {
            display: flex;
            flex-direction: row;
            gap: 40px;
        }
        .button button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 10px;
            background-color: #353336;
            color: white;
            font-size: 40px; 
            transition: background-color 0.3s, color 0.3s;
        }
        .button button:hover {
            background-color:#767674;
            color: white;
        }
        .content-div{
            display: flex;
            flex-direction: column;
            gap: 100px;

            width: 800px;
            height: 500px;
            border-radius: 20px;
        }
        h1{
            margin-top: 20px;
            font-size: 80px;
        
            font-family: Fantasy, Copperplate;
        }
    </style>
</head>
<body>
    <div class="content-div">
    <h1>Laundry System</h1>
    <div class="container">
        <div class="button">
            <a href="laundry.php"><button type="button">Laundry</button></a>
            <a href="claim.php"><button type="button">Claim</button></a>
        </div>
    </div>
    </div>
    
</body>
</html>
