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
 
input[type=tel] { 
                margin:auto;
                width: 35%;
                padding: 18px 14px;
                border: 1px solid #000000;
                box-sizing: content-box;
                text-align:center;
                }

        button {
               
                background-color: #3be00b;
                color: black;
                padding: 18px 14px;
                margin: auto;
                border: 1px solid #000000;
                cursor: pointer;
                width: 43%;
                text-align:center;
                margin: auto;
        }

        button:hover {
                opacity: 0.8;
        }

        .container {
                padding: 16px;
        }

        span.psw {
                float: right;
                padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 100px) {
                span.psw {
                   display: block;
                   float: none;
                }
        }
       </style>
                               <body>
<?php

        // Set the passcode here...
        $passCode = "1234";
        $passCodeL = "123456";

        // Check to see if the form has been submitted
        if (isset($_POST['submit'])) {
                // Get the value entered from the POST data
                $enteredCode = $_POST['psw'];
                //log attmepts
        $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
            "Attempt: ".($enteredCode == $passCode || $enteredCode == $passCodeL ?'Success':'Failed').PHP_EOL.
            "Pass: ".$enteredCode.PHP_EOL.
            "-------------------------".PHP_EOL;
        file_put_contents('./log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
                 // Check to see if the value entered is the same as the set passcode
                if ($passCode == $enteredCode) {

                        // Execute script to open the door here...
                        // Not sure if this will work, but found it on a post on the interweb
                        $output = shell_exec("/var/www/scripts/open.sh");
                        print_r($output);
                        echo "<h1>Short Passcode Correct! Opening Door...</h1>";
                }
                else if ($passCodeL == $enteredCode) {

                        // Execute script to open the door here...
                        // Not sure if this will work, but found it on a post on the interweb
                        $output = shell_exec("/var/www/scripts/openL.sh");
                        print_r($output);
                        echo "<h1>Long Passcode Correct! Opening Door...</h1>";
                }
                else {
                        echo "<h1>Passcode Incorrect!</h1>";
                        echo '<img src="https://media.giphy.com/media/hd4CLTKUf4lfW/giphy.gif?response_id=591ddca6f328d7119ff34e14" border=0>'; 
                        sleep(1);
                }
        }
?>
                <h2>Backdoor Passcode</h2>

                <form action="#" method="post" name = "psw">
                  <div class="container">
                        <label><b>Passcode:</b></label>
                        <p><input type="tel" placeholder="Enter Passcode" name="psw" required></p>
                        <p><button type="submit" name="submit" value="Open Door">Open Door</button></p>
</form>
</body>
</html>