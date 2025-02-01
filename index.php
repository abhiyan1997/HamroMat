<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('Location: login.php');
}

// print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Hamroमत</title>
    <style>
        body {
            background-color: #fff;
            font-family: sans-serif;
        }

        .nav {
            width: 98.5%;
            background-color: navy;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .intro {
            border: 1px solid black;
            padding: 20px;
            width: 60%;
            height: 10%;
            margin-left: 20px;
        }

        .voting {
            display: flex;
        }

        .mayor {
            border: 1px solid black;
            margin-top: 25px;
            width: 40%;
            margin-left: 20px;
        }

        footer {
            width: 98.5%;
            background-color: navy;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>

<body>
    <header class="nav">
        <form action="livecounting.php" method="post" target="_blank">
            <button
                style="position:absolute; top: 40px; left:40px; height:40px; width:100px; cursor:pointer; background-color:black; border:none; color:white; font-weight:bold; display:flex; align-items:center; justify-content:center;">
                <img src="img/live.gif" style="width: 80px; height:40px; object-fit:cover;">
            </button>
        </form>

        <h1>Hamroमत</h1>
        <form action="logout.php" method="post">
            <button
                style="position:absolute; top: 40px; right:40px; height:40px; width:80px; cursor:pointer;">Logout</button>
        </form>
    </header>

    <h3 style="margin-left: 20px;">Welcome <?php echo $_SESSION['name']; ?> </h3>
    <div class="intro">
        <span style="font-weight: bold;">Your Voting Data</span><br><br>
        <label>Municipality</label>
        <input type="text" value="<?php echo $_SESSION['muni'] ?>" disabled>
        <label>Ward No</label>
        <input type="text" value="<?php echo $_SESSION['ward'] ?>" disabled>
        <label>Voting Center</label>
        <input type="text" value="<?php echo $_SESSION['votingcenter'] ?>" disabled>
    </div>
    
    <br><br>
    <div class="voting">
        <div class="mayor">
            <center>
                <h3>Mayors</h3>
            </center>
            <div class="candidates">
                <span>
                    <?php
                    include 'db.php';
                    $muni = $_SESSION['muni'];

                    $sql = "SELECT municipality, post, party,candidate_id, name FROM candidates WHERE municipality = '$muni' AND post = 'Mayor'";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo
                                    '<div style="border: 1px solid black; width:max; height:30px; margin: 15px; padding:15px;">
                                  <span>' . $row['name'] . '</span>
                                  <span>(' . $row['party'] . ')</span>
                                  <form action="votingmayor.php" method="post" style="display: inline;">
                                  <input type="hidden" value=' . $row['candidate_id'] . ' name="candidate_id">
                                  <input type="hidden" value="' . $row['name'] . '" name="candidate_name">
                                  <input type="hidden" value="' . $row['post'] . '" name="candidate_post">
                                  <input type="hidden" value="' . $row['party'] . '" name="candidate_party">
                                  <button style="float: right; height: 35px; cursor:pointer; border: none; outline:navy; transition:0.1s;" onclick="voteConfirm()">Vote ✅ </button>
                                  <script>
                                  function voteConfirm(){
                                  alert("Do you want to confirm your vote?");
                                  }
                                  </script>
                                  </form>
                                </div>
                                ';
                            }
                        }
                    }
                    ?>
                </span>
            </div>
        </div>

        <div class="mayor">
            <center>
                <h3>Deputy Mayors</h3>
            </center>
            <div class="candidates">
                <span>
                    <?php
                    include 'db.php';
                    $muni = $_SESSION['muni'];

                    $sql = "SELECT municipality, post, party, name,candidate_id FROM candidates WHERE municipality = '$muni' AND post = 'Deputy Mayor'";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo
                                    '<div style="border: 1px solid black; width:max; height:30px; margin: 15px; padding:15px;">
                                  <span>' . $row['name'] . '</span>
                                  <span>(' . $row['party'] . ')</span>
                                  <form action="votingdepmayor.php" method="post" style="display: inline;">

                                  <input type="hidden" value="' . $row['candidate_id'] . '" name="dep_candidate_id">
                                  <input type="hidden" value="' . $row['name'] . '" name="dep_candidate_name">
                                  <input type="hidden" value="' . $row['post'] . '" name="dep_candidate_post">
                                  <input type="hidden" value="' . $row['party'] . '" name="dep_candidate_party">

                                  <button style="float: right; height: 35px; cursor:pointer; border: none; outline:navy; transition:0.1s;" onclick="voteConfirm()">Vote ✅ </button>
                                  <script>
                                  function voteConfirm(){
                                  alert("Do you want to confirm your vote?");


                                  }


                                  </script>
                                  </form>
                                </div>
                                ';
                            }
                        }
                    }
                    ?>
                </span>
            </div>
        </div>
    </div>

    <footer>
        <span>&copy; Made by Abhiyan Paudel</span>
    </footer>

</body>

</html>