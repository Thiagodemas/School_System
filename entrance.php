<?php
$now_category = "Entrance";
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>School Entrance</title>

        <link rel="stylesheet" type="text/css" href="css/entrance.css"/>

        <?php
        require_once 'authentication_config.php';
        ?>

    </head>
    <body>
        <div id="box">
            <div id="entrance">
                <h1><strong>Your code is:</strong><a href="authentication_config.php?action=and"><strong>Logout</strong></a></h1>
            </div>
            <div id="logo">
                <img src="img/logo.svg" width="250px"/>
            </div>
            <?php
            if (isset($_POST['send'])) {
                $cpf = mysqli_real_escape_string($mysqli, $_POST['cpf']);

                if (empty($code)) {
                    echo '<h2>Please, enter the card number or access code!</h2>';
                }
            }
            ?>

            <div id="searchField">
                <form  method="post" action="entrance.php" name="send" enctype="multipart/form-data">
                    <input type="text" name="cpf" value=""/>
                    <input class="input" type="submit" name="submit" value="Search"/>
                </form>


                <br><br><br><br><h3><strong>Student:</strong><strong>Registration Number:</strong><strong>RG:</strong>
                    <a href="index.php?pg=confirma&code_a=<img src='img/corret.png' title='Confirm' border='0'"/></a>
                    <a href="index.php"><img src="img/delete.png" width="24px" title="Cancelar"/></a></h3><input type="hidden" name="codes" value=""/>
            </div>
            <br><br><br>
        </div>
    </body>
</html>
