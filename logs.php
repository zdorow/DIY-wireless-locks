
<!DOCTYPE html>
        <html>
        <style>
        form {
        margin:auto;
        width:35%;
        text-align:center;
        background-color:#000000;
        font-family:Verdana, Arial;
        color:#e4dc1a;
        opacity: 0.9;
        }
body {
        text-align:center;
        background-image: url('https://media.giphy.com/media/OujsFrgpWpfzi/giphy.gif?response_id=591de49dde85cbd42f5b553c');
        background-size: cover;
        font-family:Verdana, Arial, Helvetica, sans-serif;
        color:#e4dc1a;
}
</style>
<?php
$output = shell_exec("cat /var/www/html/log*");
echo "<pre>$output</pre>";
?>
