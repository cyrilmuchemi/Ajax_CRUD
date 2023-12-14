<?php

function query($query, $data = [])
{
    $res = false;
    if(!$con = mysqli_connect('localhost', 'root', '', 'customer_records'))
    {
        die("unable to connect!");
    }

    $result = mysqli_query($con, $query);

    if($result && mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $res[] = $row;
        }
    }

    return $res;
}

if(count($_POST) > 0)
{
    $info = [];

    $info['data_type'] = $_POST['data_type'];

    if($_POST['data_type'] == 'read')
    {
        $query = "select * from customer";
        $result = query($query);

        $info['data'] = $result;
    }

    echo json_encode($info);
}