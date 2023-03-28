<?php
$mail = $_POST['mail'];
$password = $_POST['password'];

if(!empty($mail) || !empty($password)){
    $host = "localhost:3307";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname="travel";

    $conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);

    if(mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    } else {
        $SELECT = "SELECT mail From travel Where mail = ? Limit 1";
        $INSERT = "INSERT into travel (mail,password) values (?, ?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$mail);
        $stmt->execute();
        $stmt->bind_result($mail);
        $stmt->store_result();
        $rnum=$stmt->num_rows;

        if($rnum==0){
            $stmt->close();

            $stmt = $conn ->prepare($INSERT);
            $stmt->bind_param("ss",$mail,$password);
            $stmt->execute();
            echo "Login successfully";

        }else{
            echo"Already registered using this email";
        }
        $stmt->close();
        $conn->close();
    }
}else{
    echo "All fields are required";
    die();
}
?>
