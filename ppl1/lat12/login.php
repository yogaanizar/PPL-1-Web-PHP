<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>LOGIN</title>
    </head>
    <body>
    <h1><center>Login</center></h1>
        <form action="login.php" method="POST">
            <table align="center">
                <tr>
                    <td width="130"> Username </td>
                    <td><input type="text" name="username" placeholder="Username" required></br>
                </tr>
                <tr>
                    <td> Password </td>
                    <td><input type="text" name="password" placeholder="Password" required></br>
                </tr>
                <tr>
                    <td><br></br></td>
                    <td><input type="submit" value="Login" name="login"></td>
                </tr>
            </table>
        </form>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "db_akademik";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            if ($_POST) {
                $msg = "";
                // variable pendefinisian kredensial
                $usernamelogin = $_POST['username'];
                $passwordlogin = $_POST['password'];
                $passwordlogin = md5($passwordlogin);

                // memulai session
                session_start();

                // pengecekan kredensial login
                if (!empty($usernamelogin) && !empty($passwordlogin)) {
                    $sql = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$usernamelogin' AND password = '$passwordlogin'");
                    $result = mysqli_num_rows($sql);
                        if ($result) {
                            $_SESSION['username'] = $_POST["username"];
                            header("Location: datamahasiswa.php");
                        } else {
                            echo $msg="Username dan Password salah";
                        }

                } else {
                    echo $msg="Silahkan isi Username dan Password!";
                }
            }
        ?>
    </body>
</html>