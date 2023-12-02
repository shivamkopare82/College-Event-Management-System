<?php
require_once 'conn.php';

$sql = "SELECT textarea FROM tiny WHERE id='2'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $savedData = $row['textarea'];
} else {
    $savedData = "No data found.";
}

if (isset($_POST['textarea'])) {
    $textarea = $_POST['textarea'];

    $stmt = $conn->prepare("INSERT INTO tiny (textarea) VALUES (?)");
    $stmt->bind_param("s", $textarea);

    if ($stmt->execute()) {
        echo "Content saved successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="instyle.css">
    <style>
        h3 {
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <?php
    include 'utils/nav.php';

    if (isset($_POST['submit'])) {
        if (isset($_POST['textarea'])) {
            $content = $_POST['textarea'];
        }
    }
    ?>

    <h3></h3>
    <form action="" method="post">
        <?php
        if (isset($_POST['openEditor'])) {
        ?>
            <input type="submit" name="closeEditor" value="Close Editor">
        <?php
        } else {
        ?>
            <input type="submit" name="openEditor" value="Open Editor">
        <?php
        }
        ?>
    </form>

    <?php
    if (isset($_POST['openEditor'])) {
    ?>
        <form action="" method="post">
            <textarea name="textarea" id="default"><?php echo $savedData; ?></textarea>
            <input type="submit" name="submit" value="Submit">
        </form>
    <?php
    }
    ?>

    <script src="tinymce/tinymce.min.js"></script>
    <script src="script.js"></script>
</body>

</html>