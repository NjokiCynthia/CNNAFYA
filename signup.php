<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="left">
                <div class="form">
                    <div class="logo">
                    <img src="img/logo.jpg" />
                    </div>
                    <form action="includes/signup.inc.php" method="POST">
                    <div class="rende">
                        <div>
                        <p><label>First Name</label></p>
                        <input type="text" name="first_name" class="text-input">
                        </div>
                        <div>
                        <p><label>Last Name</label></p>
                        <input type="text" name="last_name" class="text-input">
                        </div>
                    </div>
                    
                    <div class="rende">
                        <div>
                        <p><label>Phone Number</label></p>
                        <input type="text" name="phone_number" class="text-input">
                        </div>
                        <div>
                        <p><label>Email</label></p>
                        <input type="email" name="email" class="text-input">
                        </div>
                    </div>
                    
                    <div class="rende">
                        <div>
                        <p><label>Password</label></p>
                        <input type="password" name="password" class="text-input">
                        </div>
                        <div>
                        <p><label>Confirm Password</label></p>
                        <input type="password" name="password_2" class="text-input">
                        </div>
                    </div>
                    
                        <button type="submit" name="signup-submit" class="signup-btn">Sign Up</button>
                    
                    </form>
                    <div class="already">
                        Already have an account?
                    </div>
                    <div>
                        <a href="index.php" class="login-btn">Log In</a>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="showcase">
                    <div class="showcase-content">
                        <h1>This is the future</h1>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>