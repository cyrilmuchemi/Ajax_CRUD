<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function query($query, $data = [])
{
    $res = [];
    if (!$con = mysqli_connect('localhost', 'root', '', 'customer_records')) {
        die("unable to connect!");
    }

    $result = mysqli_query($con, $query);

    if ($result !== false) {
        if ($result instanceof mysqli_result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $res[] = $row;
            }
        }
    }

    return $res;
}


if (count($_POST) > 0) {
    $info = [];

    $info['data_type'] = $_POST['data_type'];

    if ($_POST['data_type'] == 'read') {
        $query = "select * from customer order by id desc";
        $result = query($query);

        $info['data'] = $result;

    }else if ($_POST['data_type'] == 'delete') {
        $id = (int)$_POST['id'];
        $query = "delete from customer where id = $id limit 1";
        $result = query($query);

        $info['data'] = "Record Deleted";

    } else if ($_POST['data_type'] == 'save') {
        $image = "";

        if (!empty($_FILES['image']['name'])) {
            $allowed = ['image/jpeg', 'image/png'];

            if (in_array($_FILES['image']['type'], $allowed)) {

                $folder = 'uploads/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }

                $path = $folder . time() . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $path);

                $image = $path;
            }
        }

        $name = addcslashes($_POST['name'], "'");
        $age = addcslashes($_POST['age'], "");
        $image = $image;
        $email = addcslashes($_POST['email'], "'");
        $city = addcslashes($_POST['city'], "'");
        $query = "insert into customer (name, age, image, email, city) values ('$name', '$age', '$image', '$email', '$city')";
        $result = query($query);
        
        if ($result === false) {
            http_response_code(500);
            $info['error'] = "Error saving record!";
            echo json_encode($info);
            exit();
        } else {
            $info['data'] = "Record was saved!";
        }

    }

    echo json_encode($info);
    header('Content-Type: application/json');

}
?>
