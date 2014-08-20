<?php
// Change these
define('API_KEY',      'spd57ok3hgc3'                                          );
define('API_SECRET',   '3tJqcps8QHxIhzeO'                                       );
//define('REDIRECT_URI', 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME']);
define('REDIRECT_URI', 'http://dev-2014.fuyuko.net/wp-content/themes/2014-fuyuko-net-custom-template/linkedin-cron.php');
define('SCOPE', 'r_fullprofile r_emailaddress r_Network'                        );


// You'll probably use a database
session_name('linkedin');
session_start();

// OAuth 2 Control Flow
if (isset($_GET['error'])) {
	// LinkedIn returned an error
	print $_GET['error'] . ': ' . $_GET['error_description'];
	exit;
} elseif (isset($_GET['code'])) {
	// User authorized your application
	if ($_SESSION['state'] == $_GET['state']) {
		// Get token so you can make API calls
		
		//echo "REDIRECT_URI: " . REDIRECT_URI . "<br><br>\n";
		
		//echo "GET before Access Token: ";
		//var_dump($_GET);
		//echo "<br/><br/>\n";
		
		//echo "Session berfore Access Token: ";
		//var_dump($_SESSION);
		//echo "<br/><br/>\n";
		
		getAccessToken();
	} else {
		// CSRF attack? Or did you mix up your states?
		exit;
	}
} else { 
	if ((empty($_SESSION['expires_at'])) || (time() > $_SESSION['expires_at'])) {
		// Token has expired, clear the state
		$_SESSION = array();
	}
	if (empty($_SESSION['access_token'])) {
		// Start authorization process
		getAuthorizationCode();
	}
}

// Congratulations! You have a valid token. Now fetch your profile 
//echo "Session after Access Token: ";
//var_dump($_SESSION);
//echo "<br/>\n";

$request_data = ":(first-name,last-name,headline,location,industry,num-recommenders,current-status,current-status-timestamp,connections,summary,positions,educations,recommendations-received,skills,picture-url,certifications)";
$user = fetch('GET', '/v1/people/~' . $request_data) ;

//print "Hello $user->firstName $user->lastName.";
header("Location: http://fuyuko.net/resume/");

if(strcmp($user->firstName,"Fuyuko") == 0){
	file_put_contents('linkedin-profile.txt', json_encode($user));
}
exit;

function getAuthorizationCode() {
	$params = array('response_type' => 'code',
					'client_id' => API_KEY,
					'scope' => SCOPE,
					'state' => uniqid('', true), // unique long string
					'redirect_uri' => REDIRECT_URI,
			  );

	// Authentication request
	$url = 'https://www.linkedin.com/uas/oauth2/authorization?' . http_build_query($params);
	
	// Needed to identify request when it returns to us
	$_SESSION['state'] = $params['state'];

	// Redirect user to authenticate
	header("Location: $url");
	exit;
}
	
function getAccessToken() {

	$params = array('grant_type' => 'authorization_code',
					'code' => $_GET['code'],
					'redirect_uri' => REDIRECT_URI,
					'client_id' => API_KEY,
					'client_secret' => API_SECRET);
	
	// Access Token request
	$url = 'https://www.linkedin.com/uas/oauth2/accessToken?' . http_build_query($params);
	
	
	// Tell streams to make a POST request
	$context = stream_context_create(
					array('http' => 
						array('method' => 'GET' /*supposedly POST should work but it gives error*/
	                    )
	                )
	            );

	// Retrieve access token information
	$response = file_get_contents($url, false, $context); //FAILS HERE
	

	//echo "response value: ";
	//var_dump($response);
	//echo "<br/><br/>\n";
	
	$token = json_decode($response);

	// Store access token and expiration time
	$_SESSION['access_token'] = $token->access_token; // guard this! 
	$_SESSION['expires_in']   = $token->expires_in; // relative time (in seconds)
	$_SESSION['expires_at']   = time() + $_SESSION['expires_in']; // absolute time
	
	//echo "inside getAccessToken url: ";
	//var_dump($url);
	//echo "<br/><br/>\n";
	
	return true;
}

function fetch($method, $resource, $body = '') {
	$params = array('oauth2_access_token' => $_SESSION['access_token'],
					'format' => 'json',
			  );
	
	// Need to use HTTPS
	$url = 'https://api.linkedin.com' . $resource . '?' . http_build_query($params);
	// Tell streams to make a (GET, POST, PUT, or DELETE) request
	$context = stream_context_create(
					array('http' => 
						array('method' => $method,
	                    )
	                )
	            );


	// Hocus Pocus
	$response = file_get_contents($url, false, $context);

	// Native PHP object, please
	return json_decode($response);
	}