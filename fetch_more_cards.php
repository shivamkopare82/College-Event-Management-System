<?php
require_once 'conn.php';

$type_id = $_GET['type_id'];
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 4;

$sql = "SELECT DISTINCT events.event_id, events.event_title, events.event_price, events.img_link, events.type_id, event_info.Date, event_info.time, event_info.location FROM events JOIN event_info ON events.event_id = event_info.event_id";
if (!empty($type_id)) {
    $sql .= " WHERE events.type_id = '$type_id'";
}

$sql .= " LIMIT $offset, 4";

$more_events = $conn->query($sql);
$hasMoreCards = mysqli_num_rows($more_events) > 0;

ob_start();
while ($row = mysqli_fetch_assoc($more_events)) {
    $event_id = $row['event_id'];
    $event_title = $row['event_title'];
    $event_price = $row['event_price'];
    $img_link = $row['img_link'];
    $type_id = $row['type_id'];
    $date = $row['Date'];
    $time = $row['time'];
    $location = $row['location'];
?>
    <div class="info-box">
        <div class="image-top">
            <img src="<?= $img_link ?>" alt="<?= $event_title ?>">
        </div>
        <h2><?= $event_title ?></h2>
        <p class="paragraph"><strong>Date:</strong> <?= $date ?></p>
        <p class="paragraph"><strong>Time:</strong> <?= $time ?></p>
        <p class="paragraph"><strong>Location:</strong> <?= $location ?></p>
        <p class="paragraph"><strong>Price:</strong> $<?= $event_price ?></p>
        <a href="book.php?id=<?= $event_id ?>">Book Now</a>
    </div>
<?php
}
$cardsHTML = ob_get_clean();

header("Content-type: text/html");
header("X-Has-More-Cards: " . ($hasMoreCards ? "true" : "false"));
echo $cardsHTML;
?>
