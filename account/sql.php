<?php
$db = new MySQLi('localhost', 'u639268505_addwevseusr', 'addwevseusr', 'u639268505_addwevse');
$db->set_charset('utf8mb4');

if ($db->connect_errno) {
    die("Database connection error");
}