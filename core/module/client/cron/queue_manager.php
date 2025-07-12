<?php
/**
 * Queue Manager for Cron Jobs
 * This file can be called independently to manage the queue
 */

require_once __DIR__ . '/../crons.php';

// Command line interface for queue management
if (php_sapi_name() === 'cli') {
    $command = $argv[1] ?? 'status';
    
    switch ($command) {
        case 'status':
            $manager = new CronQueueManager();
            $status = $manager->getStatus();
            echo "Queue Status:\n";
            echo "Total jobs: " . $status['total_jobs'] . "\n";
            echo "Pending: " . $status['pending'] . "\n";
            echo "Completed: " . $status['completed'] . "\n";
            echo "Error: " . $status['error'] . "\n";
            if ($status['next_run']) {
                echo "Next run: " . date('Y-m-d H:i:s', $status['next_run']) . "\n";
            }
            break;
            
        case 'reset':
            $manager = new CronQueueManager();
            $manager->removeLock();
            $queue = $manager->initializeQueue();
            echo "Queue reset with " . count($queue) . " jobs\n";
            break;
            
        case 'process':
            $manager = new CronQueueManager();
            if ($manager->isRunning()) {
                echo "Cron is already running\n";
                exit(1);
            }
            $manager->createLock();
            $processed = $manager->processNextJob();
            $manager->removeLock();
            echo $processed ? "Job processed\n" : "No jobs to process\n";
            break;
            
        case 'log':
            $logFile = __DIR__ . '/cron.log';
            if (file_exists($logFile)) {
                echo file_get_contents($logFile);
            } else {
                echo "No log file found\n";
            }
            break;
            
        default:
            echo "Usage: php queue_manager.php [status|reset|process|log]\n";
            break;
    }
}
?> 