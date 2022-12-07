<?php
    require "header.php"
?>
    
    <body>
        <div><h2 class = "welcome">Welcome! Please select what sort of user you wish to be</h2></div>
            <form action = "parentLogin.php" method="post">
                <button class = "btn1" type ="submit" formaction="parentLogin.php"> Parent </button>
            </form>

            <form action = "teacherLogin.php" method="post">
                <button class = "btn2" type ="submit" formaction="teacherLogin.php"> Teacher </button>
            </form>

            <form action = "adminLogin.php" method="post">
                <button class = "btn3" type ="submit" formaction="adminLogin.php"> Admin </button>
            </form>

    </body>
</html>
