<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Hamroमत</title>
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

        form {
            background-color: #F5F5F5;
            border: 2px solid #003366;
            padding: 20px;
            max-width: 300px;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translate(0,20%);
        }

        form input {
            width: 200px;
            height: 30px;
            outline: navy;
            border: 1px solid navy;
        }

        form button {
            width: 100px;
            height: 30px;
            outline: navy;
            border: none;
            cursor: pointer;
            transition: 0.1s;
            background-color: #00509E;
            color: white;
        }

        form button:hover {
            color: white;
            background-color: navy;
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
        <h1>Hamroमत</h1>
    </header>

    <form action="logindata.php" method="post">
        <center>
            <h2>Login</h2>
            <label>Voter ID: </label>
            <input type="number" name="voter_id" id="voter_id" maxlength="8"><br><br>
            <label>Password: </label>
            <input type="password" name="pw" id="pw"><br><br>
            <button type="submit">Login</button><br><br>
            <span style=" font-weight:bold;"><i>(Note: Enter your genuine Voter ID number and Password provided by
                    Election Commission of Nepal through SMS)</i></span>
        </center>
    </form>

    <footer>
        <span>&copy; Made by Abhiyan Paudel</span>
    </footer>
</body>

</html>