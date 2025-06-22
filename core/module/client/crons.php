<?php

echo 3;
error_reporting(E_ALL);
ini_set('display_errors', 1);

foreach ( glob(__DIR__.'/cron/*.php') as $cron ) {
  require $cron;
}