<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <style>
    .co-md-6{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
    }    
    div {
    display: block;
}


.img-responsive {
    display: block;
    max-width: 100%;
    height: auto;
}
img {
    vertical-align: middle;
}
img {
    border: 0;
}

img {
    overflow-clip-margin: content-box;
    overflow: clip;
}
    </style> -->
</head>
<body>
<div class="container">
    <div class="col-md-12">
        <hr>
    </div>

    <div class="row">
        <section>
            <div class="container">
                <div class="col-md-6">
                    <br>


                    <img src=" <?php echo $row['img_link']; ?>" class="img-responsive">
                </div>
                <div class="subcontent col-md-6">
                    <h1 style="color:#FFB30E ; font-size:38px ;"><strong><?php echo '<td>' . $row['event_title'] . '</td>'; ?></strong></h1><!--title-->
                    <p style="color:#003300  ;font-size:20px ;"><!--content-->
                        <?php

                        echo 'Date:' . $row['Date'] . '<br>';
                        echo 'Time:' . $row['time'] . '<br>';
                        echo 'Location:' . $row['location'] . '<br>';
                        echo 'Student Co-ordinator:' . $row['st_name'] . '<br>';
                        echo 'Staff Co-ordinator:' . $row['name'] . '<br>';
                        echo 'Event Price:' . $row['event_price'] . '<br>';

                        ?>
                    </p>

                    <br><br>
                    <?php echo
                    '<a class="btn" href="register.php">Register</a>'
                    ?>
                </div><!--subcontent div-->
            </div><!--container div-->
        </section>
    </div>
</div><!--row div-->
</body>
</html>


