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
    <title>Live Counting | Hamroमत</title>
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
            margin: 20px;
        }

        footer {
            width: 98.5%;
            background-color: navy;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            left: 0;
            bottom: 0;
        }

        table {
            border-collapse: collapse;
            margin: 15px;
        }

        tr,
        td {
            padding: 20px
        }

        .mayor {
            margin: 20px;
            border: 2px solid gray;
            width: 60%;
        }
    </style>
</head>

<body>
    <header class="nav">
        <a href="index.php" style="text-decoration:none; color:white;">
            <h1>Hamroमत</h1>
        </a>
        <form action="logout.php" method="post">
            <button
                style="position:absolute; top: 40px; right:40px; height:40px; width:80px; cursor:pointer;">Logout</button>
        </form>
    </header>
    <div class="main">
        <div class="intro">
            <span style="font-weight: bold;">Your Voting Data</span><br><br>
            <label>Municipality</label>
            <input type="text" value="<?php echo $_SESSION['muni'] ?>" disabled>
            <label>Ward No</label>
            <input type="text" value="<?php echo $_SESSION['ward'] ?>" disabled>
            <label>Voting Center</label>
            <input type="text" value="<?php echo $_SESSION['votingcenter'] ?>" disabled>
        </div>

        <div class="counting">
            <div class="mayor">
                <h3 style="margin: 15px;">Mayors</h3>
                <table border="1">
                    <tr>
                        <th>Candidate ID</th>
                        <th>Name</th>
                        <th>Party</th>
                        <th>Total Votes</th>
                    </tr>
                    <?php
                    include 'db.php';
                    $sql = "SELECT * FROM candidates WHERE post='Mayor' AND municipality= '" . $_SESSION['muni'] . "' ";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['candidate_id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['party'] . "</td>";
                                $count_sql = "SELECT COUNT(*) AS total_votes FROM votes WHERE candidate_name= '" . $row['name'] . "'";
                                $count_result = mysqli_query($conn, $count_sql);
                                if ($count_result) {
                                    $count_row = mysqli_fetch_array(($count_result));
                                    $total_votes = $count_row['total_votes'];
                                    echo "<td> $total_votes </td>";
                                }
                                echo "</tr>";
                            }
                        }
                    }
                    ?>
                </table>
            </div>

            <div class="mayor">
                <h3 style="margin: 15px;">Deputy Mayors</h3>
                <table border="1">
                    <tr>
                        <th>Candidate ID</th>
                        <th>Name</th>
                        <th>Party</th>
                        <th>Total Votes</th>
                    </tr>
                    <?php
                    include 'db.php';
                    $sql = "SELECT * FROM candidates WHERE post='Deputy Mayor' AND municipality= '" . $_SESSION['muni'] . "' ";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['candidate_id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['party'] . "</td>";
                                $count_sql = "SELECT COUNT(*) AS total_votes FROM votes WHERE candidate_name= '" . $row['name'] . "'";
                                $count_result = mysqli_query($conn, $count_sql);
                                if ($count_result) {
                                    $count_row = mysqli_fetch_array(($count_result));
                                    $total_votes = $count_row['total_votes'];
                                    echo "<td> $total_votes </td>";
                                }
                                echo "</tr>";
                            }
                        }
                    }
                    ?>
                </table>
            </div>

        </div>

    </div>

    <footer>
        <span>&copy; Made by Abhiyan Paudel</span>
    </footer>