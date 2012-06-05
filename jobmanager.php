<?php
if(!isset($_SESSION)) session_start();
require_once("roles.php");
require_once("connect.php");

if(isset($_POST))
{
    if($_GET['a'] == 1 && $_POST['save'])
    {
        $client = mysql_real_escape_string($_POST['client_id']);
        $invoice = mysql_real_escape_string($_POST['invoice_id']);
        $ticket = mysql_real_escape_string($_POST['ticket_id']);
        $tasking = mysql_real_escape_string($_POST['tasking_id']);
        $accountDir = mysql_real_escape_string($_POST['account_director_id']);
        $inventory = mysql_real_escape_string($_POST['inventory_id']);
        $proposal = mysql_real_escape_string($_POST['proposal_id']);
        
        $sql = "insert into Jobs(client_id, invoice_id, ticket_id, tasking_id, account_director_id, inventory_id, proposal_id) 
values ('".$client."','".$invoice."','".$ticket."','".$tasking."','".$accountDir."','".$inventory."','".$proposal."')";
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
        $client = mysql_real_escape_string($_POST['client_id']);
        $invoice = mysql_real_escape_string($_POST['invoice_id']);
        $ticket = mysql_real_escape_string($_POST['ticket_id']);
        $tasking = mysql_real_escape_string($_POST['tasking_id']);
        $accountDir = mysql_real_escape_string($_POST['account_director_id']);
        $inventory = mysql_real_escape_string($_POST['inventory_id']);
        $proposal = mysql_real_escape_string($_POST['proposal_id']);
        
        $sql = "update Jobs set client_id = '".$client."',invoice_id = '".$invoice.
        "',ticket_id = '".$ticket."',tasking_id = '".$tasking."',account_director_id = '".$accountDir.
        "',inventory_id = '".$inventory."',proposal_id = '".$proposal."' where id = '".$id."'";
        $result = mysql_query($sql);
        if(!$result)
        {
            echo($sql);
            die(mysql_error());
        }
        header("Location: jobmanager.php");
    }
    else if($_POST['delete'])
    {
        $id = mysql_real_escape_string($_POST['id']);
        $sql = "delete from Jobs where id = '".$id."'";
        $result = mysql_query($sql);
        if(!$result)
        {
            die(mysql_error());
        }
        header("Location: jobmanager.php");
    }
    else if($_POST['cancel'])
    {
        header("Location: jobmanager.php");
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
        <title>Exceed Services Job Manager</title>
    </head>
    <body>
        <div class="bodywrap">
            <div id="logo"><img src="logo.jpg" /></div>
            <div id="userbar">
		        <?php echo($_SESSION['name']);?> <a href="killsession.php">X</a>
	        </div>
            <br class="floatreset"/><p></p>
<?php
if($_GET['a'] == 1)
{
    $form=
<<<DIV
<form style='width:100%;' method='post'>
    <input name='client_id' style='display:inline;' type='text' value=''/>
    <input name='invoice_id' style='display:inline;' type='text' value=''/>
    <input name='ticket_id' style='display:inline;' type ='text' value=''/>
    <input name='tasking_id' style='display:inline;' type='text' value=''/>
    <input name='account_director_id' style='display:inline;' type='text' value=''/>
    <input name='inventory_id' style='display:inline;' type ='text' value=''/>
    <input name='proposal_id' style='display:inline;' type='text' value=''/>
    <input name='save' style='display:inline;' type='submit' value='Save'/>
    <input name='cancel' style='display:inline;' type='submit' value='Cancel'/>
    <input name='delete' style='display:inline;' type='submit' value='Delete'/>
</form>
DIV
;
}
$sql = "select * from Jobs";
$result = mysql_query($sql);
echo(mysql_error());
echo('<table style="width:100%;">');
while($job = mysql_fetch_array($result))
{
if($_GET['id'] == $job['id'])
{
$form=
<<<DIV
<form style='width:100%;' method='post'>
    <input name='id' type='hidden' value='{$job['id']}'/>
    <input name='client_id' style='display:inline;' type='text' value='{$job['client_id']}'/>
    <input name='invoice_id' style='display:inline;' type='text' value='{$job['invoice_id']}'/>
    <input name='ticket_id' style='display:inline;' type ='text' value='{$job['ticket_id']}'/>
    <input name='tasking_id' style='display:inline;' type='text' value='{$job['tasking_id']}'/>
    <input name='account_director_id' style='display:inline;' type='text' value='{$job['account_director_id']}'/>
    <input name='inventory_id' style='display:inline;' type ='text' value='{$job['inventory_id']}'/>
    <input name='proposal_id' style='display:inline;' type='text' value='{$job['proposal_id']}'/>
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
<tr id='{$job['client_id']}'>
    <td>{$job['invoice_id']}</td>
    <td>{$job['ticket_id']}</td>
    <td>{$job['tasking_id']}</td>
    <td>{$job['account_director_id']}</td>
    <td>{$job['inventory_id']}</td>
    <td>{$job['proposal_id']}</td>
    <td><a href="jobmanager.php?id={$user['id']}">Edit</a></td>
</tr>
DIV
);}
} ?>
</table>
<?php echo($form);
if(!isset($form))
    echo("<a href='jobmanager.php?a=1'>Add Job</a>"); ?>
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
