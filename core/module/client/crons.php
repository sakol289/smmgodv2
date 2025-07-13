<?php
echo "start\n";

foreach (glob(__DIR__.'/cron/*.php') as $cron) {
    echo "Running: $cron\n";
    require $cron;
    echo "Done: $cron\n";
}

echo "end\n";
