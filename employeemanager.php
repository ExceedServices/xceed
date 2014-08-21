<?php if(!isset($_SESSION)) session_start();
require_once("roles.php");
require_once("connect.php");
require_once('classes/Crypt.php');

if(isset($_POST))
{
    if($_GET['a'] == 1 && $_POST['save'])
    {
        $name = mysql_real_escape_string($_POST['name']);
        $email = mysql_real_escape_string($_POST['email']);
        $pwd = Crypt::hash($_POST['pwd']);
        $roles = mysql_real_escape_string($_POST['Roles']);
        $phone = mysql_real_escape_string($_POST['phone']);
        
        $sql = "insert into Users (name,email,password,Roles,phone) values ('".$name."','".$email."','".$pwd."','".$roles."','".$phone."')";
        $result = mysql_query($sql);
        if(!$result)
        {
            echo($sql);
            die(mysql_error());
        }
        header("Location: employeemanager.php");
    }
    else if($_POST['save'])
    {
        $id = mysql_real_escape_string($_POST['id']);
        $name = mysql_real_escape_string($_POST['name']);
        $email = mysql_real_escape_string($_POST['email']);
        $roles = mysql_real_escape_string($_POST['Roles']);
        $phone = mysql_real_escape_string($_POST['phone']);
        
        $sql = "update Users set name = '".$name."',email = '".$email."',Roles = '".$roles."',phone = '".$phone."' where id = '".$id."'";
        $result = mysql_query($sql);
        if(!$result)
        {
            echo($sql);
            die(mysql_error());
        }
        header("Location: employeemanager.php");
    }
    else if($_POST['delete'])
    {
        $id = mysql_real_escape_string($_POST['id']);
        $sql = "delete from Users where id = '".$id."'";
        $result = mysql_query($sql);
        if(!$result)
        {
            die(mysql_error());
        }
        header("Location: employeemanager.php");
    }
    else if($_POST['cancel'])
    {
        header("Location: employeemanager.php");
    }
}
if(hasRole("admin"))
{?>
<!doctype html>
<html>
    <head>
        <!-- our original -->
        <link rel="stylesheet" href="main.css" type="text/css"></link>
        <!-- google fonts -->
        <link href='http://fonts.googleapis.com/css?family=Asap|Ubuntu:500' rel='stylesheet' type='text/css'>
        <title>Exceed Services Employee Manager</title>
    </head>
    <body>
        <div class="bodywrap">
            <div id="logo"><img alt="Exceed Logo" src="logo.jpg" /></div>
            <div id="userbar">
		        <?php echo($_SESSION['name']);?> <a href="killsession.php">X</a>
	        </div>
            <br class="floatreset"/><p></p>
<?php
if(isset($_GET['userId']) && isset($_GET['reset'])){
    $id = mysql_real_escape_string($_GET['userId']);
    $sql= "update Users set password = '".Crypt::hash('changeme')."' where id = '".$id."'";
    $result = mysql_query($sql);
    if(!$result)
    {
        echo($sql);
        die(mysql_error());
    }
    echo("User's password is now 'changeme'.");
}
if($_GET['a'] == 1)
{
    $form=
<<<DIV
<form style='width:100%;' method='post'>
            Name:
    <input name='name' style='display:inline;' type='text' value=''/>
    Email:
    <input name='email' style='display:inline;' type='text' value=''/>
    Password:
    <input name='pwd' style='display:inline;' type ='text' value=''/>
    Roles Code:
    <input name='Roles' style='display:inline;' type='text' value=''/>
    Phone:
    <input name='phone' style='display:inline;' type='text' value=''/>
    <input name='save' style='display:inline;' type='submit' value='Save'/>
    <input name='cancel' style='display:inline;' type='submit' value='Cancel'/>
    <input name='delete' style='display:inline;' type='submit' value='Delete'/>
</form>
DIV
;
}
$sql = "select * from Users";
$result = mysql_query($sql);
echo(mysql_error());
echo('<table style="width:100%;">');
while($user = mysql_fetch_array($result))
{
if($_GET['id'] == $user['id'])
{
$form=
<<<DIV
<form style='width:100%;' method='post'>
    <input name='id' type='hidden' value='{$user['id']}'/>
    <input name='name' style='display:inline;' type='text' value='{$user['name']}'/>
    <input name='email' style='display:inline;' type='text' value='{$user['email']}'/>
    <input name='Roles' style='display:inline;' type='text' value='{$user['Roles']}'/>
    <input name='phone' style='display:inline;' type='text' value='{$user['phone']}'/>
    <input name='save' style='display:inline;' type='submit' value='Save'/>
    <input name='cancel' style='display:inline;' type='submit' value='Cancel'/>
    <input name='delete' style='display:inline;' type='submit' value='Delete'/>
</form>
DIV
;
}
else{
echo(
<<<DIV
<tr id='{$user['id']}'>
    <td>{$user['name']}</td>
    <td>{$user['email']}</td>
    <td>{$user['Roles']}</td>
    <td>{$user['phone']}</td>
    <td><a href="employeemanager.php?id={$user['id']}">Edit</a></td>
    <td><a href="employeemanager.php?userId={$user['id']}&reset=y">Reset Password</a></td>
</tr>
DIV
);}
} ?>
</table>
<?php echo($form);
if(!isset($form))
    echo("<a href='employeemanager.php?a=1'>Add Employee</a>"); ?>
<p><a style='text-align:center;' href="dashboard.php">Return to Dashboard</a></p>
        </div>
    </body>
</html>
<?php }
else
{
    header("Location: dashboard.php");
    die();
}?>
