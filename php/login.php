<?php

if (isset($_POST['login'])) {
	loginResultPage();
} else if (!isset($_COOKIE['SESSION_ID'])) {
	loginPage();
} else if (isset($_POST['logout'])) {
	logout();
} else {
	loginSucceededPage();
}
################################################################


function loginPage() {

print <<<LOGIN

<html>
<header>
<title>Login Page</title>
</header>
<body>
	<form method="post" action="$script">
	<table border=0 align="center">
		<tr>
			<td align="center">
				Username: <br/>
				<input type="text" name="username"/>
			</td>
		</tr>
		<tr>
			<td align="center">
				Password: <br/>
				<input type="password" name="password"/>
			</td>
		</tr>
		<tr>
			<td align="center">
				<input type="submit" name="login" value="Login"/>
				<input type="reset" value="Clear"/>
			</td>
		</tr>
	</table>
	</form>
</body>
</html>

LOGIN;

}

function loginResultPage() {

$script = $_SERVER['PHP_SELF'];

//check credentials
if ($_POST['username'] != 'guest' || $_POST['password'] != 'welcome') {
	loginFailedPage();
} else {
	$sessionId = session_start();
	$loginTime = time();
	setcookie('SESSION_ID', $sessionId, time() + 60, '/');
	setcookie('LOGIN_TIME', $loginTime, time() + 60, '/');
	loginSucceededPage();
}

}

function loginFailedPage() {
	print <<<PAGE
	<html>
	<body>
		<p>Login failed.</p>
	</body>
	</html>
PAGE;
}

function loginSucceededPage() {
	print <<<PAGE
	<html>
	<body>
		<p>Login succeeded.</p><br/>
		<form method="post" action="$script">
		<input type="submit" name="logout" value="Logout"/>
		</form>
	</body>
	</html>
PAGE;
}

function logout() {
	session_destroy();
	setcookie('SESSION_ID', '', time() - 3600, '/');
	setcookie('LOGIN_TIME', '', time() - 3600, '/');
	print 'Thank you.';
}

?>
