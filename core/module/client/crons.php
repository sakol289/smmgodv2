<?php
echo "start";
foreach ( glob(__DIR__.'/cron/*.php') as $cron ) {
  require $cron;
}
echo "end";