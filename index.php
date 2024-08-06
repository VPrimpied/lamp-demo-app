<?php
function OpenCon() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "Password1!";

    try {
        $conn = new mysqli($dbhost, $dbuser, $dbpass);
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
    } catch (Exception $e) {
        echo '<script>console.error("Error: ' . $e->getMessage() . '");</script>'; 
    }

    return $conn;
}

function CloseCon($conn) {
    $conn->close();
}



$conn = OpenCon();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .success {
            color: #28a745;
            font-size: 18px;
        }
        .error {
            color: #dc3545;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($conn) {
            echo '<img src="https://media.giphy.com/media/nDSlfqf0gn5g4/giphy.gif" alt="Happy Sponge bob"><br><p class="success">Connected Successfully</p>';
        } else {
            echo '<img src="https://media.tenor.co/images/78b9c52985b31505adc96f79a56eaebd/tenor.gif" alt="Sad Sponge bob"><br><p class="error">Failed to connect to the database.</p>';
        }
        ?>
    </div>
</body>
</html>