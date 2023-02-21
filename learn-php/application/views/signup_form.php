<head>
    <title>Signup</title>
</head>
<h1>Sign Up</h1>
<div><?php echo validation_errors()?></div>
<?php
if(isset($message)){
    echo $message;
}
?>

<form method="post" action="<?=base_url('user/submit')?>">
    <input type="text" name="name" required="" placeholder="Enter Your Name"><br><br>
    <input type="email" name="email" required="" placeholder="Enter Your Email"><br><br>
    
    <input type="password" name="password" required="" placeholder="Enter Your Password"><br><br>
    <input type="submit"  required="" value="submit">
    <a href="<?=base_url('user/login')?>">Log In?</a>
</form>
<style>
    form, h1,div {
        text-align: center;
        
    }
    div{
        color: red;
    }

   
    
    
</style>