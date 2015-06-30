<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'User',
		'secret' => '',
	],

	'google' => [
	    'client_id' 	=> '620980086153-jg176821cr1vmjd1kl55r48khca6385d.apps.googleusercontent.com',
	    'client_secret' => 'HmA7K-2zcvTZbXCk8GC3erFJ',
	    'redirect' 		=> 'http://localhost:8000/redirect',
	],

];
