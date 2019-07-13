<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>PAGE 1</title>
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = " width=device-width, initial-scale=1">
    <link rel = "stylesheet" type = "text/css" href="sessionStyle.css">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity = "sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin = "anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity = "sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin = "anonymous"></script>
    <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
<div class = "container">
    <div class = "row">
        <div class = " col-xs-4 col-xs-push-4">
            <form action = "page1html.php" method = "POST">

                <?php require 'page1.php' ?>
                <div class = "form-group">

                    <label>First Name</label>
                    <input type = "name" class = "form-control" id = "name" placeholder = "First name" name="name"
                           value = "<?php echo $name; ?>" style = "border-color:<?php echo $color["name"] ?>">
                    <span class = "error"><?php echo $nameErr; ?></span>
                </div>
                <div class = "form-group">
                    <label>Last Name</label>
                    <input type = "name" class = "form-control" id = "sname" placeholder = "Last name"
                           name = "sname" value = "<?php echo $sname ?>" style = "border-color:<?= $color["sname"] ?>">
                    <span class = "error"><?php echo $snameErr; ?></span>
                </div>
                <div class = "form-group">
                    <label>Age</label>
                    <input type = "text" class = "form-control" id = "age" placeholder = "Age"
                           name = "age" value = "<?php echo $age ?>" style="border-color:<?php echo $color["age"] ?>">
                    <span class = "error"><?php echo $ageErr; ?></span>
                </div>
                <button type = "submit" class = "btn btn-default">Submit</button>
            </form>
        </div>
    </div>
    <div class = "row">
        <div class = "col-xs-4 col-xs-push-8">
            <a class = "btn btn-primary" href = "page2html.php" role = "button">NEXT</a>
        </div>
    </div>
</div>

</body>
</html>