<?php
#Get all of the variable from the request string
$fulluri = $_SERVER['REQUEST_URI'];

$res = $_REQUEST['res'];
$challenge = $_REQUEST['challenge'];
$login_url = $_REQUEST['login_url'];
$logoff_url = $_REQUEST['logoff_url'];
$ap_id = $_REQUEST['ap_id'];
$uamip = $_REQUEST['uamip'];
$uamport = $_REQUEST['uamport'];
$ap_ssid = $_REQUEST['ap_ssid'];
$client_mac = $_REQUEST['client_mac'];
$client_ip = $_REQUEST['client_ip'];
$blackout_time = $_REQUEST['blackout_time'];
$failure_count = $_REQUEST['failure_count'];
$redirect_type = $_REQUEST['redirect_type'];
$gate_state_to_portal = $_REQUEST['gate_state_to_portal'];
$userurl = $_REQUEST['userurl'];
$conf_hash = $_REQUEST['conf_hash'];
$login_timeout = $_REQUEST['login_timeout'];
$home_page = $_REQUEST['home_page'];
$challenge_timeout = $_REQUEST['challenge_timeout'];

#This is the shared secret from the SSID setup
$sharedsecret = '1234567890';

#Now to build the HASH
$key = sha1($sharedsecret);
$key = substr($key, 0, 40);
$asciiKey = pack("H*", $key);
$digest = hash_hmac("sha1", $userurl, $asciiKey);

#Now to build the link back to the AP
$return_to_ap = $login_url . "?res=success&challenge=" . $challenge . "&digest=" . $digest 

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style>
  .spacer {
    height: 30px;
  }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Arista Payment Portal - SAMPLE</title>
</head>
<body bgcolor="#D1D1D1" alink="#0000FF" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0" text="#000000">
<table bgcolor="#ffffff" width="955" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr>
    <td height="50"><img src="../images/arista_logo.png" width="258" height="40"></td>
    <td align="right" valign="bottom"><font color="#5b5b5b" size="4" face="Helvetica, Arial, sans-serif">3<sup>rd</sup> Party Hosted Portal</font></td>
  </tr>
  <tr>
    <td width="50%" height="250" align="left">
      <font size="2" face="Helvetica, Arial, sans-serif">This is a 3rd party hosted portal designed as an example to building your own paid or free internet access. You can add more features like a database or e-commerce to charge customers for internet access. All of the code will be posted on github and continued development.</font>
    </td>
    <td width="50%" height="250" align="center">
      <strong><font size="3" face="Helvetica, Arial, sans-serif"><a href="">Join Internet Link</a></font></strong></br></br></br>
      <font size="1" face="Helvetica, Arial, sans-serif">This link above sends a code to the AP for the individual to gain access.</br>
      </font>
    </td>
  </tr>
  <tr>
    <td width="50%">
      <font color="#5b5b5b" size="1" face="Helvetica, Arial, sans-serif">Company Copyright &copy; 2023. | Terms of Use | Contact Us | Problems?</font>
    </td>
    <td width="50%" align="right">
      <font color="#5b5b5b" size="1" face="Helvetica, Arial, sans-serif">Company Logo</font>
    </td>
  </tr>
</table>
<div class="spacer">
  
</div>
<table bgcolor="#ffffff" width="955" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr>
    <td><font size="1" face="Helvetica, Arial, sans-serif">
      </br><strong>Full URL</strong></br>
      Full URL: <?=$fulluri?>
      </br>Individual Variables</br>
      Challenge: <?=$challenge?></br>
      Login URL: <?=$login_url?></br>
      AP_ID: <?=$ap_id?></br>
      UAM_IP: <?=$uamip?></br>
      UAM_Port: <?=$uamport?></br>
      Failure Count: <?=$failure_count?></br>
      User URL: <?=$userurl?></br>
      Logoff URL: <?=$logoff_url?></br>
      Blackout Time: <?=$blackout_time?></br>
      Response: <?=$res?></br>
      Client Mac: <?=$client_mac?></br></br>
      <strong>Encoding the URL</strong></br>
      Return Link: <?=$return_to_ap?></font>
    </td>
  </tr>
</table>
</body>
</html>
