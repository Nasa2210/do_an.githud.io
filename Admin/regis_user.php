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
                    <input type="submit" value="Register" />
            </div>
                
                
        </from>