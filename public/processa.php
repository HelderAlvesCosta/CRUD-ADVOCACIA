<?php
use App\Model\Painel\User;

	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
        User::find($id);
        User::update(['name' => $name,'email', $email]);

?>
