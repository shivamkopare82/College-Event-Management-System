<?php

function connect()
{
    $mysqli = new mysqli('localhost', 'root', '', 'project');
    if ($mysqli->connect_errno != 0) {
        return $mysqli->connect_error;
    } else {
        return $mysqli;
    }
}


function getAllEvents()
{
    $mysqli = connect();
    $res = $mysqli->query("SELECT * FROM events, event_info ORDER BY RAND()");
    while ($row = $res->fetch_assoc()) {
        $events[] = $row;
    }
    return $events;
}

function getEventsByTypeid($type_id)
{
    $mysqli = connect();
    $res = $mysqli->query("SELECT * FROM events WHERE type_id = '$type_id'");
    while ($row = $res->fetch_assoc()) {
        $events[] = $row;
    }
    return $events;
}
?>



