<?php


include 'user.php';
$utilisateurs = new user();
$utilisateurs->register('loli' , 'rr' , 'mrOy@gmail.com' , 'Mel' , 'Hafrad');
$utilisateurs->connect('loli' , 'rr');
$utilisateurs->update('lui', 'riou', 'mrOy@gmail.com', 'lal', 'wiwi'); #Modifie les informations de l’utilisateur en base de données.
//$utilisateurs->delete();
//$utilisateurs->isConnected();
$utilisateurs->getAllInfos();
$utilisateurs->getLogin();
$utilisateurs->getEmail();
$utilisateurs->getFirstname();
$utilisateurs->getlastname();
$utilisateurs->refresh();
$utilisateurs->disconnect();
?>