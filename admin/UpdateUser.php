<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: ../login_form.php");
    exit();
}
?>
<?php
require '../conn.php';

function updateUser($conn, $id, $username, $email, $image, $user_type) {
    $update_query = "UPDATE userform SET username = '$username', email = '$email', image = '$image', user_type = '$user_type' WHERE id = $id";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        return true;
    } else {
        return false;
    }
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $user_query = "SELECT * FROM userform WHERE id = $user_id";
    $user_result = mysqli_query($conn, $user_query);

    if (mysqli_num_rows($user_result) == 1) {
        $user_data = mysqli_fetch_assoc($user_result);
        $username = $user_data['username'];
        $email = $user_data['email'];
        $image = $user_data['image'];
        $user_type = $user_data['user_type'];
    } else {
        header("Location: userDetails.php");
        exit();
    }
} else {
    header("Location: userDetails.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];
    $new_image = $_POST['image'];
    $new_user_type = $_POST['user_type'];

    if (updateUser($conn, $user_id, $new_username, $new_email, $new_image, $new_user_type)) {
        header("Location: userDetails.php");
        exit();
    } else {
        $error_message = "Failed to update user record.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .form-container{
            /* margin-top: 100px; */
            margin-left: 225px; 
            transition: margin-left 0.5s ease; 
        }
    </style>
</head>

<body>
    <?php require 'nav.php'; ?>
    <div class="container form-container">
        <h2>Update User</h2>
        <br>
        <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control" id="image" name="image" value="<?php echo $image; ?>">
            </div>
            <div class="mb-3">
                <label for="user_type" class="form-label">User Type</label>
                <input type="text" class="form-control" id="user_type" name="user_type" value="<?php echo $user_type; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
