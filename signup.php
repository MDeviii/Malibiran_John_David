<?php
require_once('classes/database.php');
$con = new database();

$error = "";

if (isset($_POST['signup'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthday = $_POST['birthday'];
    $sex = $_POST['sex'];
    $username = $_POST['Username'];
    $password = $_POST['password'];
    $ConfirmPass_word = $_POST['ConfirmPass_word'];

   
    if ($con->isUsernameTaken($username)) {
        $error = "Username is already taken. Please choose another one.";
    } else {
        if ($Pass_word === $ConfirmPass_word) { 
            $result = $con->signupUser($username, $password, $firstName, $lastName, $birthday, $sex);
            if ($result) {
                header('location: login.php');
                exit;
            } else {
                $error = "Error occurred while registering. Please try again.";
            }
        } else {
            $error = "Passwords do not match. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .signup-container {
            max-width: 400px;
            margin: 0 auto;
            height: auto;
            padding: 20px;
            margin-top: 100px;
        }
    </style>
</head> 
<body>

<div class="container-fluid signup-container rounded shadow">
    <h2 class="text-center mb-4">Sign Up</h2>

    <form method="post">
        <div class="form-group">
        <div class="mb-3">
        <label for="First Name">FirstName:</label>
        <input type="text" class="form-control" name="firstName" placeholder="Enter your First Name">
        <label for="Last Name">LastName:</label>
        <input type="text" class="form-control" name="lastName" placeholder="Enter your Last Name">
      <label for="Birthday" class="form-label">Birthday:</label>
      <input type="date" class="form-control" name="birthday">
    </div>
    <div class="mb-3">
      <label for="Sex" class="form-label">Sex:</label>
      <select class="form-select" name="sex">
        <option selected disabled>Select Sex</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
    </div>
            <label for="Username">Username:</label>
            <input type="text" class="form-control" name="Username" placeholder="Enter username">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password">
        </div>
        
        <div class="form-group"> 
            <label for="ConfirmPass_word">Confirm Password:</label>
            <input type="password" class="form-control" name="ConfirmPass_word" placeholder="Confirm password">
        </div>

        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <input type="submit" class="btn btn-danger btn-block" value="Sign Up" name="signup">
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>