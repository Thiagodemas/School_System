<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>School System</title>

        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="shortcut icon" href="img/iconP.png"/>
    </head>
    <body>
        <?php
        require_once './controller/Conection.php';
        
        ?>

        <div id="logo">
            <img src="img/logo.svg"/>
        </div>
        <div id="login">
            <?php
                    if (isset($_POST['button'])) {
                        $code = mysqli_real_escape_string($mysqli, $_POST['code']);
                        $pass = mysqli_real_escape_string($mysqli, $_POST['password']);
                        
                        if(empty($code)|| empty($pass)){
                            if(empty($code)){
                                echo '<h2>Please, enter the card number or access code!</h2>';
                            }
                            elseif (empty($pass)) {
                                echo '<h2>Please, enter your password!</h2>';
                            }
                        }else {
                        $query = "SELECT * FROM register WHERE code='$code' and pass='$pass'" ;
                        $result = mysqli_query($mysqli, $query);
                        
                        if (mysqli_num_rows($result) > 0) {
                           
                            while ($res = mysqli_fetch_assoc($result)){
                                $status = $res['status'];
                                $code = $res['code'];
                                $pass = $res['pass'];
                                $name = $res['name'];
                                $category = $res['category'];
                            }
                            if ($status == "Inativo"){
                                echo '<h2>Inactive user, search the Administration!</h2>';
                            }else{
                                session_start();
                                $_SESSION['code'] = $code;
                                $_SESSION['name'] = $name;
                                $_SESSION['pass'] = $pass;
                                $_SESSION['category'] = $category;
                                
                                if ($category === 'Admin'){
                                    header("location:admin.php");
                                }else if ($category == 'Student'){
                                    header("location:student.php");
                                }else if ($category == 'Teacher'){
                                    header("location:teacher.php");
                                }else if ($category == 'Entrance'){
                                    header("location:entrance.php");
                                }else if ($category == 'Treasury'){
                                    header("location:treasury.php");
                                }
                            }
                        }  else {
                            echo '<h2>Invalid Code or Password</h2>';
                        }
                    }
                        
                    }
            
            ?>
            <form action="" method="post" name="form" enctype="multipart/form-date">
                <table>
                    <tr>
                        <td><h1>Card number or Access code</h1></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="code"/></td>
                    </tr>
                    <tr>
                        <td><h1>Password</h1></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="password"/></td>
                    </tr>
                    <tr>
                        <td><input class="input" type="submit" name="button" value="Enter"/></td>
                    </tr>
                    
            </form>
        </table>
    </div>
</body>
</html>
