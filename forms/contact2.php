<?php
$receiving_email_address = 'hcossu@epe.santafe.gov.ar';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
$contact->smtp = array(
  'host' => 'smtp-relay.gmail.com', // Your mail server hostname or IP address
  'port' => '465', // The SMTP port, which is usually 25 for unencrypted connections
  'username' => 'conan084', // If required, enter your SMTP username
  'password' => 'buscarsalidas8419@', // If required, enter your SMTP password
  // 'encryption' => 'tls', // If your server requires encryption, uncomment and specify the type here (e.g., 'tls' or 'ssl')
);

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();
?>