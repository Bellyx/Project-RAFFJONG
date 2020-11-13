<?php

date_default_timezone_set('Asia/Bangkok');
//MySQL Connect
define("DB_HOST","localhost");
define("DB_NAME","cinema");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("ISO","utf-8");

// ข้อมูลเว็บ

$mysqli = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$mysqli->query("SET NAMES UTF8");

