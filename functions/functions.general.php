<?php

/**
 * Displays a series of feedback messages when given an array of message types
 * 
 * If no specific value is provided uses the default messages global
 * 
 * If our active session contains messages (such as confirmations) we display and kill these here too
 *
 * @param array $messages
 * @return void
 */
function display_feedback($messages = null)
{
    if(is_null($messages)){ $messages = $GLOBALS['messages']; }
    if(isset($_SESSION['messages'])){ $messages = array_merge_recursive($messages, $_SESSION['messages']); unset($_SESSION['messages']); }
    foreach($messages as $key => $value)
    {
        if(count($value) > 0)
        {
            switch($key)
            {
                case"error":
                case"errors":
                    extract(array("f_type" => "danger", "f_header" => "Error"));
                break;
                case"warning":
                    extract(array("f_type" => "warning", "f_header" => "Note"));
                break;
                case"success":
                    extract(array("f_type" => "success", "f_header" => "Success"));
                break;
            }
            extract(array("feedback" => $messages[$key]));
            require "../templates/tmp_feedback.php";
        }
    }
}


/**
 * @param $date integer of unixtimestamp format, not actual date type
 * @return string
 */
function zdateRelative($date)
{
    $now = time();
    $diff = $now - $date;

    if ($diff < 60){
        return sprintf($diff > 1 ? '%s seconds ago' : 'Just now', $diff);
    }

    $diff = floor($diff/60);

    if ($diff < 60){
        return sprintf($diff > 1 ? '%s minutes ago' : 'one minute ago', $diff);
    }

    $diff = floor($diff/60);

    if ($diff < 24){
        return sprintf($diff > 1 ? '%s hours ago' : 'an hour ago', $diff);
    }

    $diff = floor($diff/24);

    if ($diff < 7){
        return sprintf($diff > 1 ? '%s days ago' : 'yesterday', $diff);
    }

    if ($diff < 30)
    {
        $diff = floor($diff / 7);

        return sprintf($diff > 1 ? '%s weeks ago' : 'one week ago', $diff);
    }

    $diff = floor($diff/30);

    if ($diff < 12){
        return sprintf($diff > 1 ? '%s months ago' : 'last month', $diff);
    }

    $diff = date('Y', $now) - date('Y', $date);

    return sprintf($diff > 1 ? '%s years ago' : 'last year', $diff);
}


//for login and sign up page
function password(){
switch($GLOBALS['url_loc'][1]){
    case "signup":		
		echo("
<script>
const passwordToggle = document.querySelector('.js-password-toggle')

passwordToggle.addEventListener('change', function() {
  const password = document.querySelector('.js-password'),
    passwordLabel = document.querySelector('.js-password-label')

  if (password.type === 'password') {
    password.type = 'text'
    passwordLabel.innerHTML = 'Hide'
  } else {
    password.type = 'password'
    passwordLabel.innerHTML = 'Show'
  }

  password.focus()
})
</script>");		
    break;
    case "redeem":	
		echo("
<script>
const passwordToggle = document.querySelector('.js-password-toggle')

passwordToggle.addEventListener('change', function() {
  const password = document.querySelector('.js-password'),
    passwordLabel = document.querySelector('.js-password-label')

  if (password.type === 'password') {
    password.type = 'text'
    passwordLabel.innerHTML = 'Hide'
  } else {
    password.type = 'password'
    passwordLabel.innerHTML = 'Show'
  }

  password.focus()
})
</script>");
	break;
    case "login":	
		echo("
<script>
const passwordToggle = document.querySelector('.js-password-toggle')

passwordToggle.addEventListener('change', function() {
  const password = document.querySelector('.js-password'),
    passwordLabel = document.querySelector('.js-password-label')

  if (password.type === 'password') {
    password.type = 'text'
    passwordLabel.innerHTML = 'Hide'
  } else {
    password.type = 'password'
    passwordLabel.innerHTML = 'Show'
  }

  password.focus()
})
</script>
");		
    break; 	
}
}

//for redirect parameters
function preserve_qs() {
    if (empty($_SERVER['QUERY_STRING']) && strpos($_SERVER['REQUEST_URI'], "?") === false) {
        return "";
    }
    return "?" . $_SERVER['QUERY_STRING'];
}


