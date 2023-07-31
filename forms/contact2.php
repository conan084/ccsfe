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

$contact->smtp = array(
  'host' => 'mail.sfe.epesf', 
  'port' => '25', 
  'username' => 'conan084@epe.santafe.gov.ar',
  //'password' => '',
  //'encryption' => 'tls',
);

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();
?>