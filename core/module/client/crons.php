<?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);

echo "=== CRON DEBUG START ===\n";
echo "Time: " . date('Y-m-d H:i:s') . "\n";
echo "Memory usage: " . round(memory_get_usage() / 1024 / 1024, 2) . " MB\n";
echo "PHP version: " . PHP_VERSION . "\n";
echo "Error reporting: " . error_reporting() . "\n\n";

// Include only essential files
echo "📁 Including essential files...\n";

// 1. Include config
echo "🔄 Trying to include: config.php\n";
try {
    $config = require __DIR__ . '/../../../int/config.php';
    echo "✅ Included: config.php\n";
    echo "Database: " . $config['db']['name'] . "\n";
} catch (Exception $e) {
    echo "❌ ERROR in config.php: " . $e->getMessage() . "\n";
    exit(1);
}

// 2. Create database connection
echo "🔄 Creating database connection...\n";
try {
    $conn = new PDO(
        "mysql:host=" . $config["db"]["host"] . ";dbname=" . $config["db"]["name"] . ";charset=" . $config["db"]["charset"] . ";", 
        $config["db"]["user"], 
        $config["db"]["pass"]
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Database connection created successfully\n";
} catch (PDOException $e) {
    echo "❌ Database connection failed: " . $e->getMessage() . "\n";
    exit(1);
}

// 3. Include SMMApi class
echo "🔄 Trying to include: smmapi.php\n";
try {
    require_once __DIR__ . '/../../../int/classes/smmapi.php';
    echo "✅ Included: smmapi.php\n";
    
    // Test if classes are available
    if (class_exists('SMMApi')) {
        echo "✅ SMMApi class is available\n";
        $smmapi = new SMMApi();
    } else {
        echo "❌ SMMApi class not found\n";
    }
    
    if (class_exists('socialsmedia_api')) {
        echo "✅ socialsmedia_api class is available\n";
        $fapi = new socialsmedia_api();
    } else {
        echo "❌ socialsmedia_api class not found\n";
    }
    
} catch (Exception $e) {
    echo "❌ ERROR in smmapi.php: " . $e->getMessage() . "\n";
}

// Set default variables
$start_count = time();
echo "✅ Set \$start_count = " . $start_count . "\n";

echo "Memory after includes: " . round(memory_get_usage() / 1024 / 1024, 2) . " MB\n\n";

// Get all cron files
$cronFiles = glob(__DIR__.'/cron/*.php');
echo "Found " . count($cronFiles) . " cron files:\n";

foreach ($cronFiles as $index => $cron) {
    $filename = basename($cron);
    echo "\n--- Processing file " . ($index + 1) . "/" . count($cronFiles) . " ---\n";
    echo "File: " . $filename . "\n";
    echo "Full path: " . $cron . "\n";
    echo "File size: " . round(filesize($cron) / 1024, 2) . " KB\n";
    echo "Last modified: " . date('Y-m-d H:i:s', filemtime($cron)) . "\n";
    
    // Check if file is readable
    if (!is_readable($cron)) {
        echo "❌ ERROR: File not readable\n";
        continue;
    }
    
    // Check file syntax
    $syntaxCheck = shell_exec("php -l " . escapeshellarg($cron) . " 2>&1");
    if (strpos($syntaxCheck, 'No syntax errors') === false) {
        echo "❌ SYNTAX ERROR: " . $syntaxCheck . "\n";
        continue;
    } else {
        echo "✅ Syntax OK\n";
    }
    
    // Try to include the file
    echo "🔄 Including file...\n";
    $startTime = microtime(true);
    $startMemory = memory_get_usage();
    
    try {
        // Capture output
        ob_start();
        
        // Include the file
        require $cron;
        
        // Get output
        $output = ob_get_clean();
        
        $endTime = microtime(true);
        $endMemory = memory_get_usage();
        $executionTime = round($endTime - $startTime, 3);
        $memoryUsed = round(($endMemory - $startMemory) / 1024 / 1024, 2);
        
        echo "✅ File executed successfully\n";
        echo "⏱️  Execution time: " . $executionTime . " seconds\n";
        echo "💾 Memory used: " . $memoryUsed . " MB\n";
        
        if (!empty($output)) {
            echo "📤 Output: " . substr($output, 0, 200) . (strlen($output) > 200 ? "..." : "") . "\n";
        } else {
            echo "📤 No output\n";
        }
        
    } catch (ParseError $e) {
        ob_end_clean();
        echo "❌ PARSE ERROR: " . $e->getMessage() . "\n";
        echo "Line: " . $e->getLine() . "\n";
    } catch (Exception $e) {
        ob_end_clean();
        echo "❌ EXCEPTION: " . $e->getMessage() . "\n";
        echo "File: " . $e->getFile() . "\n";
        echo "Line: " . $e->getLine() . "\n";
    } catch (Error $e) {
        ob_end_clean();
        echo "❌ ERROR: " . $e->getMessage() . "\n";
        echo "File: " . $e->getFile() . "\n";
        echo "Line: " . $e->getLine() . "\n";
    }
    
    echo "--- End of file " . $filename . " ---\n";
}

echo "\n=== CRON DEBUG END ===\n";
echo "Final memory usage: " . round(memory_get_usage() / 1024 / 1024, 2) . " MB\n";
echo "Peak memory usage: " . round(memory_get_peak_usage() / 1024 / 1024, 2) . " MB\n";
echo "Total execution time: " . round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 3) . " seconds\n";

?>