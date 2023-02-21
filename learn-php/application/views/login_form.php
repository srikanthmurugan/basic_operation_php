<head>
    <title>Login</title>
</head>
<h1>Login</h1>
<div><?php echo validation_errors()?></div>

<form method="post" action="<?=base_url('user/login_process')?>">
    
    <input type="email" name="email" placeholder="Enter Your Email"><br><br>
    
    <input type="password" name="password"  placeholder="Enter Your Password"><br><br>
    <input type="submit" name="login_submit" required="" value="submit">
    <a href="<?=base_url('user/signup')?>">Sign Up?</a>
   
</form>
<style>
    form, h1,div {
        text-align: center;
        
    }

    div{
        color: red;
    }
    
    
</style>