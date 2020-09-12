<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanitization</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="column column-50 column-offset-25">
            <h1>Input Sanitization</h1>
            <p>
                <?php
                    $fname = '';
                    $lname = '';
                ?>
                <?php if (isset($_REQUEST['fname']) && !empty($_REQUEST['fname'])) { 
                    // $fname = htmlspecialchars($_REQUEST['fname']);
                    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
                }
                ?>
                    
                
                <?php if (isset($_REQUEST['lname']) && !empty($_REQUEST['lname'])) { 
                    // $lname = htmlspecialchars($_REQUEST['lname']);
                    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS);
                }
                // reference - https://www.php.net/manual/en/filter.filters.sanitize.php
                // reference - https: //www.php.net/manual/en/function.filter-input.php

                ?>
            </p>
            <p>
                First Name: <?php echo $fname; ?> <br>
                Last Name: <?php echo $lname; ?>
            </p>
            <form method="POST">
                <fieldset>
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" placeholder="First Name" id="fname" value="<?php echo $fname; ?>">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" placeholder="Last Name" id="lname" value="<?php echo $lname; ?>">
                    <input class="button-primary" type="submit" value="Submit">
                </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>
