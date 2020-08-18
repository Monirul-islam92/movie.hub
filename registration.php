<?php include ('server.php')?>


<html>
<head>
  <title>Registration system PHP and MySQL</title>


<style type="text/css">
  

    body {
    font-family: Arial;
    color: #333;
    font-size: 0.95em;
}

.form-head {
    color: #191919;
    font-weight: normal;
    font-weight: 400;
    margin: 0;
    text-align: center;    
    font-size: 1.8em;
}

.error-message {
    padding: 7px 10px;
    background: #fff1f2;
    border: #ffd5da 1px solid;
    color: #d6001c;
    border-radius: 4px;
    margin: 30px 0px 10px 0px;
}

.success-message {
    padding: 7px 10px;
    background: #cae0c4;
    border: #c3d0b5 1px solid;
    color: #027506;
    border-radius: 4px;
    margin: 30px 0px 10px 0px;
}

.demo-table {
    background: #ffffff;
    border-spacing: initial;
    margin: 15px auto;
    word-break: break-word;
    table-layout: auto;
    line-height: 1.8em;
    color: #333;
    border-radius: 4px;
    padding: 20px 40px;
    width: 380px;
    border: 1px solid;
    border-color: #e5e6e9 #dfe0e4 #d0d1d5;
}

.demo-table .label {
    color: #888888;
}

.demo-table .field-column {
    padding: 15px 0px;
}

.demo-input-box {
    padding: 13px;
    border: #CCC 1px solid;
    border-radius: 4px;
    width: 100%;
}

.btnRegister {
    padding: 13px;
    background-color: #5d9cec;
    color: #f5f7fa;
    cursor: pointer;
    border-radius: 4px;
    width: 100%;
    border: #5791da 1px solid;
    font-size: 1.1em;
}

.response-text {
    max-width: 380px;
    font-size: 1.5em;
    text-align: center;
    background: #fff3de;
    padding: 42px;
    border-radius: 3px;
    border: #f5e9d4 1px solid;
    font-family: arial;
    line-height: 34px;
    margin: 15px auto;
}

.terms {
    margin-bottom: 5px;
}



</style>




</head>
<body>
  <div class="header">
    <h2>Register</h2>
  </div>
    <form name="frmRegistration" method="post" action="">
        <?php 
        // include('errors.php');
         ?>
<div class="demo-table">
        <div class="form-head">Sign Up</div>
            
        <?php if (! empty($errorMessage) && is_array($errorMessage)) {
            ?>  
            <div class="error-message">
            <?php 
            foreach($errorMessage as $message) {
                echo $message . "<br/>";
            }
            ?>
            </div>
<?php
}
?>
            <div class="field-column">
                <label>Username</label>
                <div>
                    <input type="text" class="demo-input-box"
                        name="username"
                        value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
                </div>
            </div>
            
            <div class="field-column">
                <label>Password</label>
                <div><input type="password" class="demo-input-box"
                    name="password_1" value=""></div>
            </div>
            <div class="field-column">
                <label>Confirm Password</label>
                <div>
                    <input type="password" class="demo-input-box"
                        name="password_2" value="">
                </div>
            </div>
        
            <div class="field-column">
                <label>Email</label>
                <div>
                    <input type="email" class="demo-input-box"
                        name="email"
                        value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                </div>
            </div>

            <div class="field-column">
                <div class="terms">
                    <input type="checkbox" name="terms"> I accept terms
                    and conditions
                </div>
            </div>
                
                <div>
                    <input type="submit"
                        name="reg_user" value="Register"
                        class="btnRegister">
                </div>

                <div class="terms">
                  <p>
                  Already a member? <a href="login.php">Sign in</a>
                  </p>

                </div>
            </div>
        
    </form>
</body>
</html>