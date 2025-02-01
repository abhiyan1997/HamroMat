<?php
include 'db.php';
session_start();
if (!isset($_SESSION['name'])) {
    header('Location: login.php');
}

$candidate_id= $_POST['dep_candidate_id'];
$candidate_name= $_POST['dep_candidate_name'];
$post= $_POST['dep_candidate_post'];
$party= $_POST['dep_candidate_party'];

$duplicate_sql= "SELECT voter_id, post FROM votes WHERE voter_id= '".$_SESSION['voterid']."' AND post='$post'";
$duplicate_result= mysqli_query($conn, $duplicate_sql);

if($duplicate_result)
{
    if(mysqli_num_rows($duplicate_result)>0){
        echo '<header class="nav" style="width: 98.5%;
            background-color: navy;
            color: white;
            padding: 10px;
            text-align: center;">
        <h1>Hamroमत</h1>
        </header>';
        echo "<center><h1>You have casted your vote already !!!</center>";
    }
}

$sql = "INSERT INTO votes (candidate_id, voter_id, candidate_name, post, party, municipality) VALUES ('$candidate_id', '" . $_SESSION['voterid'] . "', '$candidate_name', '$post','$party', '" . $_SESSION['muni'] . "')";
$result= mysqli_query($conn,$sql);

if($result){
    header('Location:index.php');
}

else
{
    echo "Voting Not Successful";
}
?>