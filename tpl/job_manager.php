<p></p>
<table style="width:100%;">
<?php
foreach ($jobs as $job)
{
	echo(
<<<DIV
<tr id='{$job['client_id']}'>
    <td>{$job['invoice_id']}</td>
    <td>{$job['ticket_id']}</td>
    <td>{$job['tasking_id']}</td>
    <td>{$job['account_director_id']}</td>
    <td>{$job['inventory_id']}</td>
    <td>{$job['proposal_id']}</td>
    <td><a href="jobmanager.php?id={$job['id']}">Edit</a></td>
</tr>
DIV
);}
} ?>
</table>
<?php
if (isset($id)) { ?>
<style>
#job_form input { display: inline; }
</style>
<form id="job_form" style='width:100%;' method='post'>
    <input name='id' type='hidden' value='<?php echo $id; ?>'/>
    <input name='client_id' type='text' value='<?php echo $client_id; ?>'/>
    <input name='invoice_id' type='text' value='<?php echo $invoice_id; ?>'/>
    <input name='ticket_id' type ='text' value='<?php echo $ticket_id; ?>'/>
    <input name='tasking_id' type='text' value='<?php echo $tasking_id; ?>'/>
    <input name='account_director_id' type='text' value='<?php echo $account_director_id; ?>'/>
    <input name='inventory_id' type ='text' value='<?php echo $inventory_id; ?>'/>
    <input name='proposal_id' type='text' value='<?php echo $proposal_id; ?>'/>
    <input name='save' type='submit' value='Save'/>
    <input name='cancel' type='submit' value='Cancel'/>
    <input name='delete' type='submit' value='Delete'/>
</form>
<?php
} else { ?>
    <a href='jobmanager.php?a=1'>Add Job</a>
<?php
} ?>
<p><a style='text-align:center;' href="dashboard.php">Return to Dashboard</a></p>