<p></p>
<table style="width:100%;">
<?php
foreach ($users as $user)
{
echo
<<<DIV
<tr id='{$user['id']}'>
    <td>{$user['name']}</td>
    <td>{$user['email']}</td>
    <td>{$user['Roles']}</td>
    <td>{$user['phone']}</td>
    <td><a href="employee_manager.php?id={$user['id']}">Edit</a></td>
</tr>
DIV
;
} ?>
</table>
<?php
if (isset($id)) { ?>
<style>
#employee_form input { display: inline; }
</style>
<form id="employee_form" style='width:100%;' method='post'>
    <input name='id' type='hidden' value='<?php echo $id; ?>'/>
	Name:
    <input name='name' type='text' value='<?php echo $name; ?>'/>
    Email:
    <input name='email' type='text' value='<?php echo $email; ?>'/>
<?php
	if (empty($id)) { ?>
    Password:
    <input name='password' type ='text' value=''/>
<?php
	} ?>
    Roles Code:
    <input name='Roles' type='text' value='<?php echo $Roles; ?>'/>
    Phone:
    <input name='phone' type='text' value='<?php echo $phone; ?>'/>
    <input name='save' type='submit' value='Save'/>
    <input name='cancel' type='submit' value='Cancel'/>
    <input name='delete' type='submit' value='Delete'/>
</form>
<?php
} else { ?>
    <a href='employee_manager.php?a=1'>Add Employee</a>
<?php
} ?>
<p><a style='text-align:center;' href="dashboard.php">Return to Dashboard</a></p>