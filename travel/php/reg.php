<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$psw = $_POST['psw'];

if(!empty($fname)||  !empty($lname) || !empty($email) || !empty($psw)){
    $host = "localhost:3307";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname="registration";

    $conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);

    if(mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    } else {
        $SELECT = "SELECT email From details Where email = ? Limit 1";
        $INSERT = "INSERT into details (fname, lname, email, psw) values (?, ?, ?, ?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum=$stmt->num_rows;

        if($rnum==0){
            $stmt->close();

            $stmt = $conn ->prepare($INSERT);
            $stmt->bind_param("ssss",$fname,$lname, $email,$psw);
            $stmt->execute();
            echo "New record has been successfully inserted";

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
