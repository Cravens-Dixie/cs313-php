<?php
session_start();
// Report all PHP errors (see changelog)
error_reporting(E_ALL);

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $password = htmlspecialchars($_POST['password']);

    if (empty($name)) {
        $errors[] = 'Please provide a username.';
    }

    if (empty($password)) {
        $errors[] = 'Please provide a password.';
    }

    if (!isset($errors)) { // No errors yet.
        $sql = 'SELECT user_name, password
                    FROM users07
                    WHERE user_name = :name';

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->execute();
        $credentials = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($credentials) { // Record found.
            $fetchedUsername = $credentials['user_name'];
            $fetchedPasswordHash = $credentials['password'];

            if (
                $name === $fetchedUsername &&
                password_verify($password, $fetchedPasswordHash)) {
                //set $_SESSION variables
                $_SESSION['name'] = $name;
                header('Location: welcome_page.php');
                exit();
            } else {
                $errors[] = 'Invalid credentials. Please try again.';
            }
        } else {
            $errors[] = 'No credentials found for the given user.';
        }

    }
}
?>

<!--if (password_verify('rasmuslerdorf', $hash)) {-->
<!--   echo 'Password is valid!';-->
<!-- else {-->
<!--   echo 'Invalid password.';-->
<!--}-->
<!---->
<!--//Output: Password is valid!-->
<!--?>-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In week 07</title>

</head>
<body>
    <h2>Sign in to access your account!</h2>
    <div class="messages">
    <?php
    if (isset($errors)) {
        foreach ($errors as $error) {
            echo "<div class='error'> $error</div>";
        }
    }
    ?>
    </div>
<!--TODO: not sure if the action is right. Would it be the welcome_page.php?-->
    <form action=" " method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="John Smith"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Gr3at pAs$w0rd"><br><br>
        <button type="submit">Sign In</button>
        <button  onclick="document.location = 'sign_up.php'">Sign Up</button>
    </form>

</body>
</html>
<!--info for form verify from: https://stackoverflow.com/questions/51730509/how-can-i-make-the-password-verify-function-work-with-post-->