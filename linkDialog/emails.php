<?php
const EMAILS = [
		'email1' => 'user1@example.com',
		'email2' => 'user2@example.com'
];

function getEmail($emailId) {
	return EMAILS[$emailId] ?? null;
}
