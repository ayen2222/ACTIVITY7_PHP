<?php
// Initialize variables
$fullname = "";
$sampleage = 0;
$sex = "";
$result = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['submit'])) {
    // Sanitize the input data
    $fullname = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : "";
    $sampleage = isset($_GET['age']) ? (int) $_GET['age'] : 0; // Ensure it's an integer
    $sex = isset($_GET['gender']) ? htmlspecialchars($_GET['gender']) : "";

    // Determine if the person is an adult or minor
    $result = ($sampleage >= 21) ? "ADULT" : "MINOR";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Show Data</title>
    <!-- You can link to your stylesheet here -->
    <!-- <link href="path/to/your/styles.css" rel="stylesheet"> -->
</head>
<body class="sb-nav-fixed">
    <!-- Dashboard Navigation (Side/Nav) -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="#">My Dashboard</a>
    </nav>

    <!-- Main Content Area -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard - Add Data</h1>
                    
                    <!-- Form to Input Data -->
                    <div class="row">
                        <div class="col-md-6">
                            <form method="get" action="">
                                <div class="form-group">
                                    <label for="name">Full Name:</label>
                                    <input type="text" id="name" name="name" value="<?php echo $fullname; ?>" class="form-control" required><br>
                                </div>
                                <div class="form-group">
                                    <label for="age">Age:</label>
                                    <input type="number" id="age" name="age" value="<?php echo $sampleage; ?>" class="form-control" required><br>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender:</label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="Male" <?php echo ($sex == 'Male') ? 'selected' : ''; ?>>Male</option>
                                        <option value="Female" <?php echo ($sex == 'Female') ? 'selected' : ''; ?>>Female</option>
                                        <option value="Other" <?php echo ($sex == 'Other') ? 'selected' : ''; ?>>Other</option>
                                    </select><br>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <br><hr><br>

                    <!-- Display Data If Submitted -->
                    <?php if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['submit'])): ?>
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Submitted Data:</h3>
                                <p><strong>Name:</strong> <?php echo $fullname; ?></p>
                                <p><strong>Age:</strong> <?php echo $sampleage; ?></p>
                                <p><strong>Gender:</strong> <?php echo $sex; ?></p>
                                <p><strong>Result:</strong> <?php echo $result; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>

    <!-- Include Footer and Scripts -->
    <!-- Example footer, you can replace this with your actual footer -->
    <footer>
        <p class="text-center">2024 - My Dashboard</p>
    </footer>

    <!-- Include JS Libraries (Optional for charts or interactivity) -->
    <!-- <script src="path/to/your/script.js"></script> -->
</body>
</html>
