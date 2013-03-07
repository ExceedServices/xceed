            <div class="dashlet" >
                <h1>
		            <?php echo($_SESSION['user']['name']);?>
                </h1>
                <form action="profile-submit.php" method="post">
                Display Name:<br>
                <input type="text" name="name" value="<?php echo($_SESSION['user']['name']); ?>"/><br/>
                Primary Phone Number:<br>
				<input type="tel" name="phone" value="<?php echo($_SESSION['user']['phone']); ?>"/><input type="checkbox" name="canSMS" <?php echo ($_SESSION['user']['canSMS'] ? 'checked':'');?>/>SMS<br>
                Login Address:<br>
                <input type="email" name="email" value="<?php echo($_SESSION['user']['email']); ?>"/><br>
                Password: (leave blank for no change)<br>
                <input type="password" name="password" /><br>
                Again:<br>
                <input type="password" name="password-confirm" /><br>
                <input type="hidden" name="CSRF_TOKEN" value="<?php echo $token;?>" />
                <input type="submit" value="Update Profile" />
                </form>
            </div>