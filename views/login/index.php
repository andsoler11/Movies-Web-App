<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <title>Login</title>
</head>
<body>

    <div class="wrapper">
        <section class="form login">
            <header>MovieList</header>
            
            <form action="<?php echo constant('URL'); ?>/login/authenticate" method="POST">
                <?php if($this->showMessages()) :    ?>
                    <div class="good-txt"><?php  $this->showMessages();  ?></div>
                <?php endif; ?>
                <div class="field input">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Enter your email" value="<?php if(isset($email)){ echo $email;} ?>">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>
                </div>
 
                <div class="field button">
                    <input type="submit" value="Continue to MovieList" name="accion">
                </div>
                
            </form>
            <div class="link">Not yet signed up? <a href="<?php echo constant('URL'); ?>/signup">Signup now</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>

    
</body>
</html>