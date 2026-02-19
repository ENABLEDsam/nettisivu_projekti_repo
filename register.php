<?php
if (isset($_POST["email"]) && isset($_POST["password"]) &&
         isset($_POST["etunimi"]) && isset($_POST["sukunimi"])) {
    $email=$_POST("email");
    $etunimi=$_POST("etunimi");
    $sukunimi=$_POST("sukunimi");
    $password=$_POST("password");
}
else{
    header("location:register.html");
    exit;
}

$yhteys=mysqli_connect("0.0.0.0");
$tietokanta=mysqli_select_db($yhteys, "kantis");
$sql="insert into kantis values(?, ?, ?, ?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_param($stmt, "ssss", $email, $etunimi, $sukunimi, md5($password));
mysqli_stmt_execute($stmt);

header("(location:register.html");
exit;

?>