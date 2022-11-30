<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width= devive-width, initial-scale=1.0">
        <title>Home Page</title>
        <style>
            .flex-parent{
                display: flex;
            }

            .jc-center {
                justify-content: center; 
            }

            .button {

            }
        </style>
    
    </head>

    <h1>childDocs</h1>
    <body bgcolor="FBB917">
        <div><h2>Please select what sort of user you wish to be</h2></div>
        <div class="flex-parent jc-center">
            <form action = "parentLogin.php" method="post">
                <button type ="submit" formaction="parentLogin.php"> Parent </button>
            </form>
        </div>
        <div class="flex-parent jc-center">
            <form action = "teacherLogin.php" method="post">
                <button type ="submit" formaction="teacherLogin.php"> Teacher </button>
            </form>
        </div>
        <div class="flex-parent jc-center">
            <form action = "adminLogin.php" method="post">
                <button type ="submit" formaction="adminLogin.php"> Admin </button>
            </form>
        </div>

    </body>
</html>
