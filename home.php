<?php

    session_start();
    
    $fileHandle = fopen('index.html', 'w+');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_SESSION['input'] = $_POST['input'];

        $fillFile = '
                    <!DOCTYPE html>
                    <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                        </head>
                        <body>
                            <input value="' . $_SESSION['input'] . '" placeholder="Click On Print..." />
                            <br />
                            <textarea rows="4" cols="50" placeholder="Click On Print...">' . $_SESSION['input'] . '</textarea>
                        </body>
                    </html>
                    ';

        $content = fwrite($fileHandle, $fillFile);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>saveMsg</title>    
    </head>
    <body>
        <form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <input name="input" type="text">
        </form>
        <iframe 
                width="600"
                height="500"
                src="index.html"
                name="iframe" >
            </iframe>
    </body>
</html>

