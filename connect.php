<?php
    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');
    $date = filter_input(INPUT_POST, 'date');
    $time = filter_input(INPUT_POST, 'time');
    $service = filter_input(INPUT_POST, 'service');

    if (!empty($name)) {
        if (!empty($email)){
            $host = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "appointment";


            // create connection

            $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

            if (mysqli_connect_error()) {
                die('Connect Error ('.mysqli_connect_errno() .')'
                .mysqli_connect_error());
            }
            else{
                $sql = "INSERT INTO appointment (name, email, date, time, service)
                values ('$name', '$email', '$date', '$time', '$service')";
                if ($conn->query($sql)) {
                    echo "Sent";
                }
                else{
                    echo "Error: ". $sql . "<br>". $conn->error;
                }
                $conn->close();
            }
        }
        else{
            echo "Email should not be empty";
        }
    }

    else{
        echo "Name should not be empty";
        die();

    }

?>