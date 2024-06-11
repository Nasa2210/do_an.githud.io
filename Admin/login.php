<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://kit.fontawesome.com/0f57b9b4e5.js" crossorigin="anonymous"></script>
    <script src="../Js/validator.js"></script>
</head>
<body>
    <div class="wapper">
        <form action="login_submit.php" method="post" id="form_login" name="form_login">
            <div class="box sign_in">
                <h2>Sign in</h2>
                    <div class="input_box form_group">
                        <input id="username" class="form-control" type="text" required="required" name="user">
                        <span ><i class="fa-solid fa-user-secret"></i>User name </span>
                        <span class="form-message"></span>
                        <div></div>
                         
                    </div>
                    <div class="input_box form_group">
                        <input id="password" class="form-control" type="password" required="required" name="pass">
                        <span><i class="fa-solid fa-lock"></i>Password</span>
                        <span class="form-message"></span>
                        <div></div>
                         
                    </div>
                    <div class="links ">
                        <a href="">Forgot Password</a>
                        <a href="#" class="links_signup">Sign up</a>
                    </div>
                    <input type="submit" class="form-control" value="Login">
            </div>
        </form>
        
        <form action="regis_submit.php" method="post" id="form_regis" name="form_regis">
            <div class="box sign_up">
                <h2>Registration</h2>
                    <div class="input_box form_group">
                        <input id="regis_username" type="text" required="required" name="username">
                        <span><i class="fa-solid fa-user"></i>Tên người dùng</span>
                        <span class="form-message"></span>
                        <div></div>
                        
                    </div>
                    <div class="input_box form_group">
                        <input id="name_login" type="text" required="required" name="user">
                        <span><i class="fa-solid fa-user-secret"></i>User name</span>
                        <span class="form-message"></span>
                        <div></div>
                        

                    </div>
                    <div class="input_box form_group">
                        <input id="regis_password1" type="password" required="required" name="pass">
                        <span><i class="fa-solid fa-lock"></i>Password</span>
                        <span class="form-message"></span>
                        <div></div>
                        
                        
                    </div>
                    <div class="input_box form_group">
                        <input id="regis_password2"  type="password" required="required" name ="conpass">
                        <span><i class="fa-solid fa-lock"></i>Confirm Password</span>
                        <span class="form-message"></span>
                        <div></div>
                        
                       
                    </div>
                    <div class="links form_group">
                        <div></div>
                        <a href="#" class="links_signin">Login</a>
                    </div>
                    <input type="submit" value="Register" />
            </div>
                
                
        </from>
       
        <script src="../Js/login.js"></script>
    </div>
        <script>
            Validator({
                form: '#form_login',
                orrorSelector: '.form-message',
                formGroupSelector: '.form_group' ,
                rules: [
                 Validator.isRequired('#username'),
                 Validator.isRequired('#password'),
                ]
            }) 
            Validator({
                form: '#form_regis',
                orrorSelector: '.form-message',
                formGroupSelector: '.form_group' ,
                rules: [
                 Validator.isRequired('#regis_username'),
                 Validator.isRequired('#name_login'),
                 Validator.isRequired('#regis_password1'),
                 Validator.minLength('#regis_password1', 5),
                 Validator.isRequired('#regis_password2'),
                 Validator.minLength('#regis_password2', 5),
                 Validator.isConfirmed('#regis_password2', function()
                 {
                    return document.querySelector("#form_regis #regis_password1").value;
                 }, 'Mật khẩu không trùng khớp nhau!!!'),
                ]
            }) 
            
        </script>
</body>
</html>