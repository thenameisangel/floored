<?php
/*
if (isset($_POST['login'])) {
	loginResultPage();
} else if (!isset($_COOKIE['SESSION_ID'])) {
	loginPage();
} else if (isset($_POST['logout'])) {
	logout();
} else if (isset($_GET['registerPage'])) {
	registerPage();
} else {
	loginSucceededPage();
}
*/

if (isset($_POST['login'])) {
	loginResultPage();
} else if (isset($_GET['registerPage'])) {
	registerPage();
} else if (!isset($_COOKIE['SESSION_ID'])) {
	loginPage();
} else if (isset($_POST['logout'])) {
	logout();
} else {
	loginSucceededPage();
}

$script = $_SERVER['PHP_SELF'];

################################################################

function registerPage() {

$script = $_SERVER['PHP_SELF'];

print <<<REGISTER
<html>
<head>
<title>Register</title>
<!-- import google fonts -->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- import materialize.css -->
<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
<!-- optimize browser for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<div class="container">

<h1 align="center">Register for an Account</h1>

<div class="row">
    <form method="post" action="$script" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input name="firstName" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input name="lastName" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="password_1" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="password" type="password" class="validate">
          <label for="password">Confirm Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="register">Register
         <i class="material-icons right">send</i>
       </button>
    </form>
  </div>
</div>

<!-- import materialize js files -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>

</body>

REGISTER;
}

function register() {
    
    //read in valid credentials from file
    $users = file_get_contents('passwd.txt');
    $fh = fopen('passwd.txt','r');
    
    //retrieve user login attempt credentials
    $username = trim($_POST["username"]);
    $password = trim($_POST['password']);
    
    //check if user entered an empty string
    if ($username == "" || $password == "") {
        registerPage();
    }

    //check if user entered an existing username
    if (strpos($users, "\n".$username.":") == true){
        print "That username already exists. Please try again.";
    }

    //concatenate user input and add to file
    $info = $username.":".$password;
    fclose($fh);
    if (strpos($users, $info)!== false) {
        loginResultPage();
    } else {
        $fh = fopen('passwd.txt','a');
        fwrite($fh, $info."\n");
        loginResultPage();
    }


}


function loginPage() {

print <<<LOGIN

<html>
<header>
<title>Login Page</title>
<!-- import google fonts -->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- import materialize.css -->
<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
<!-- optimize browser for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</header>
<body>
<div class="container">

<h1> Login </h1>

<div class="row">
    <form method="post" action="$script" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input name="userName" type="text" class="validate">
          <label for="username">Username</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="login">Login
         <i class="material-icons right">send</i>
       </button>
      <button class="btn waves-effect waves-light" type="reset">Clear
         <i class="material-icons right">send</i>
       </button>
    </form>
  </div>
</form>	

<form method="get" action="$script">
	<a href="?registerPage">Register for an account</a>
</form>

<!-- import materialize js files -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
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
