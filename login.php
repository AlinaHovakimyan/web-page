<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    $nameErr = $snameErr = $emailErr = $ageErr = $genderErr = $websiteErr = $passwordErr = "";
    $name = $sname = $email = $age = $gender = $website = $password = "";
    $color=[];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            $color["name"]='red';
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
                $color["name"]='red';
            }
        }
        if (empty($_POST["sname"])) {
            $snameErr = "Last Name is required";
            $color["sname"]='red';
        } else {
            $sname = test_input($_POST["sname"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $sname)) {
                $snameErr = "Only letters and white space allowed";
                $color["sname"]='red';
            }
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $color["email"]='red';
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $color["email"]='red';
            }
        }
        if (empty($_POST["age"])) {
            $ageErr = "Age is required";
            $color["age"]='red';
        } else {
            $age = test_input($_POST["age"]);
            if (!preg_match("/^[0-9]*$/", $age)) {
                $ageErr = "Only numbers allowed";
                $color["age"] = 'red';
            }
        }
            if (empty($_POST["password"])) {
                $passwordErr = "password is required";
                $color["password"]='red';
            } else {
                $password = test_input($_POST["password"]);
                if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
                    $passwordErr = "Only letters,numbers and white space allowed";
                    $color["password"]='red';
                }
            }
                if (empty($_POST["website"])) {
            $websiteErr="Website is required";
            $color["website"]='red';
        } else {
            $website = test_input($_POST["website"]);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&#@\/%=~_|]/i", $website)) {
                $websiteErr = "Invalid URL";
                $color["website"]='red';
            }
        }

        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>
    <div class="row">
        <div class="col-xs-4 col-xs-push-4">
            <form action="login.php" method="POST">
                <div class="form-group">

                    <label for="exampleInputEmail1">First Name</label>
                    <input type="name" class="form-control" id="name" placeholder="First name" name="name"
                           value="<?php echo $name; ?>" style="border-color:<?php echo $color["name"]?>">
                    <span class="error"><?php echo $nameErr; ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="name" class="form-control" id="sname" placeholder="Last name"
                           name="sname" value="<?php echo $sname ?>" style="border-color:<?= $color["sname"]?>">
                    <span class="error"><?php echo $snameErr; ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Age</label>
                    <input type="text" class="form-control" id="age" placeholder="Age"
                           name="age" value="<?php echo $age ?>" style="border-color:<?php echo $color["age"]?>">
                    <span class="error"><?php echo $ageErr; ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>

                    <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                           value="<?php echo $email; ?>" style="border-color:<?php echo $color["email"]?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Website</label>
                    <input type="text" class="form-control" id="website" placeholder="website" name="website"
                           value="<?php echo $website ?>" style="border-color:<?php echo $color["website"]?>">
                    <span class="error"><?php echo $websiteErr; ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                           value="<?php echo $password ?>" style="border-color:<?php echo $color["password"]?>">
                    <span class="error"><?php echo $passwordErr; ?></span><br/>
                    Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gender:</label></br>
                        <input type="radio"
                               name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?>
                               value="male"> Male<br>
                        <input type="radio"
                               name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?>
                               value="female"> Female
                        <span class="error"><?php echo $genderErr; ?></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

        </div>
    </div>

</div>

</body>
</html>

