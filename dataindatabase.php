<?php


            $usn=$_POST["usn1"];
            $id = $_POST['id1'];
            $name = $_POST['name1'];
            $branch = $_POST['branch1'];
            $sem = $_POST['sem1'];
            $email = $_POST['email1'];
            $phone = $_POST['phone1'];
            $college = $_POST['college1'];
            $amount = $_POST['amount1'];
            $purpose = $_POST['purpose1'];
            echo "<script>document.getElementById('prat').innerHTML='usn".$usn."id".$id."name".$name."';";
            $insert_sql = "INSERT INTO participent (usn, id, name, branch, sem, email, phone, college, amount, purpose) VALUES ('$usn','$id', '$name', '$branch', '$sem', '$email', '$phone', '$college', '$amount', '$purpose')";

            if ($conn->query($insert_sql) === TRUE) {
               // header("Location: $payment_request_url");
                exit();
            } else {
                // Handle database insertion error
                echo "Error inserting registration data into the database: " . $conn->error;
            }
       ?>