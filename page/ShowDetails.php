<?php
session_start();

// Check if email and password are set in the session
if(!isset($_SESSION['email']) || !isset($_SESSION['password'])){
    header('location:../login.php');
    exit();
}

// Initialize variables
$name = $age = $gender = $course = $campus = $section = $college = "---";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Capture and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $age = htmlspecialchars($_POST['age']);
    $gender = htmlspecialchars($_POST['gender']);
    $course = htmlspecialchars($_POST['course']);
    $campus = htmlspecialchars($_POST['campus']);
    $section = htmlspecialchars($_POST['section']);
    $college = htmlspecialchars($_POST['college']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Details Page</title>
    <?php include('../layout/style.php'); ?>
    <style>
        body {
            background: linear-gradient(135deg, #000000, #ff007f);
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .details-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.4);
            text-align: center;
        }

        .details-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #ff007f;
            border-bottom: 2px solid #ff007f;
            padding-bottom: 10px;
        }

        .details-container p {
            font-size: 18px;
            color: #ff80b3;
        }
    </style>
</head>
<body>
    <?php include('../layout/header.php'); ?>

    <div id="layoutSidenav">
        <?php include('../layout/navigation.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="details-container">
                        <h2>Submitted Details</h2>
                        <p><strong>Name:</strong> <?php echo $name; ?></p>
                        <p><strong>Age:</strong> <?php echo $age; ?></p>
                        <p><strong>Gender:</strong> <?php echo $gender; ?></p>
                        <p><strong>Course:</strong> <?php echo $course; ?></p>
                        <p><strong>Campus:</strong> <?php echo $campus; ?></p>
                        <p><strong>Section:</strong> <?php echo $section; ?></p>
                        <p><strong>College:</strong> <?php echo $college; ?></p>
                    </div>
                </div>
            </main>
            <?php include('../layout/footer.php'); ?>
        </div>
    </div>
    <?php include('../layout/script.php'); ?>
</body>
</html>
