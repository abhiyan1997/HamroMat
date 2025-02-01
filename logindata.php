<?php
include 'db.php';
session_start();

$voter_id = $_POST['voter_id'];
$pw = $_POST['pw'];

$sql = "SELECT `voterid`, `pw`, `municipality`, `wardno`, `name`, `votingcenter` FROM voters WHERE voterid= '$voter_id' AND pw= '$pw' ";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row= mysqli_fetch_array($result);
        $_SESSION['voterid'] = $row['voterid'];
        $_SESSION['muni']= $row['municipality'];
        $_SESSION['ward']= $row['wardno'];
        $_SESSION['name']= $row['name'];
        $_SESSION['votingcenter']= $row['votingcenter'];

        header(('Location: index.php'));

    } 
    else {
        echo '
        <header class="nav" style="width: 98.5%;
            background-color: navy;
            color: white;
            padding: 10px;
            text-align: center;">
        <h1>Hamroमत</h1>
        </header>
        <center><h1>Enter Correct Credentials</h1></center';
    }
}


?>