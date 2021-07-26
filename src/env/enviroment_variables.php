<?php

$env = '../.env';
if (!file_exists($env)) throw new Exception(".env file not exists!");

$fs = fopen($env, 'r');



while (!feof($fs)) {
    $line = fgets($fs);
    if (empty(trim($line))) continue;
    $line = explode('=', $line, 2);

    if ($line[0] == 'DATABASE') define("DATABASE", trim($line[1]));
    if ($line[0] == 'DATABASE_HOST') define("DATABASE_HOST", trim($line[1]));
    if ($line[0] == 'DATABASE_NAME') define("DATABASE_NAME", trim($line[1]));
    if ($line[0] == 'DATABASE_USER') define("DATABASE_USER", trim($line[1]));
    if ($line[0] == 'DATABASE_PASSWORD') define("DATABASE_PASSWORD", trim($line[1]));
    if ($line[0] == 'ENVIRONMENT') define("ENVIRONMENT", trim($line[1]));
}
