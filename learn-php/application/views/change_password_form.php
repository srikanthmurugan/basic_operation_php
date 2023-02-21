<head>
    <title>Change Password</title>
</head>
<h1>Change Password</h1>
<div><?php echo validation_errors()?></div>
<div><?php if(isset($message)){
    echo $message;
} 
?></div>

<form method="post" action="<?=base_url('user/update_password')?>">
    <input type="password" name="old_password"  placeholder="Enter Your Old Password"><br><br>
    <input type="password" name="new_password"  placeholder="Enter Your New Password"><br><br>
    <input type="password" name="confirm_password"  placeholder="Confirm New  Password"><br><br>
    <input type="submit"  required="" value="submit">
    
</form>
<style>
    form{
        
        text-align: center;
        
        
    }

    div{
        color: red;
        text-align: center;
        
    }
    h1{
        text-align: center; 
       
    }
    
    
</style>