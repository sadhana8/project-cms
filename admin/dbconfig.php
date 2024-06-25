<link href="../css/sb-admin-2.min.css" rel="stylesheet"> 
<?php

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "college";

$conn= mysqli_connect($server_name,$db_username,$db_password,$db_name);
$dbconfig = mysqli_select_db($conn,$db_name);


if($dbconfig){

}else
{
  die("Connection failed: " . mysqli_connect_error());
    echo '
        <div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title bg-danger text-white"> Database Connection Failed </h1>
                            <h2 class="card-title"> Database Failure</h2>
                            <p class="card-text"> Please Check Your Database Connection.</p>
                            <a href="#" class="btn btn-primary">:( </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
}

// function filteration($data)
// {
//     foreach ($data as $key => $value) {
//         $data[$key] = trim($value);
//         $data[$key] = stripcslashes($value);
//         $data[$key] = htmlspecialchars($value);
//         $data[$key] = strip_tags($value);
//     }
//     return $data;
// }

// function select($sql, $values, $datatypes)
// {
//     $conn = $GLOBALS['conn'];
//     if ($stmt = mysqli_prepare($conn, $sql)) {
//         mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
//         if (mysqli_stmt_execute($stmt)) {
//             $res = mysqli_stmt_get_result($stmt);
//             mysqli_stmt_close($stmt);
//             return $res;
//         } else {
//             mysqli_stmt_close($stmt);
//             die('Query cannot be executed - select');
//         }
//     } else {
//         die('Query cannot be prepared - select');
//     }
// }


?>