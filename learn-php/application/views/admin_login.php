<h1>Admin Login</h1>
<div><?php echo validation_errors()?></div>

<form method="post" action=<?=base_url('user/admin_login_process')?>>
    <input type="text" name="username" placeholder="Enter Admin Username" ><br><br>
    <input type="password" name="password" placeholder="Password" ><br><br>
    <input type="submit"  value="submit" ><br><br>
</form>
<style>
    form, h1,div {
        text-align: center;
        
    }

    div{
        color: red;
    }
    
    
</style>