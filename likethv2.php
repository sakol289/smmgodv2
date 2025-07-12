<?php
/*
================================================================================
                    PHP API SERVER - ใช้งานได้ทุกแบบ
================================================================================

📋 วิธีการเรียกใช้ API ทั้งหมด:

1. GET Request (Query Parameters):
   https://yourdomain.com/likethv2.php?action=services&key=your_key
   https://yourdomain.com/likethv2.php?action=balance&key=your_key
   https://yourdomain.com/likethv2.php?action=add&service=1&quantity=10&link=https://facebook.com/post&key=your_key
   https://yourdomain.com/likethv2.php?action=status&order=12345&key=your_key

2. POST Request (Form Data):
   curl -X POST https://yourdomain.com/likethv2.php -d "action=services&key=your_key"
   curl -X POST https://yourdomain.com/likethv2.php -d "action=balance&key=your_key"
   curl -X POST https://yourdomain.com/likethv2.php -d "action=add&service=1&quantity=10&link=https://facebook.com/post&key=your_key"
   curl -X POST https://yourdomain.com/likethv2.php -d "action=status&order=12345&key=your_key"

3. POST Request (JSON Data):
   curl -X POST https://yourdomain.com/likethv2.php -H "Content-Type: application/json" -d '{"action":"services","key":"your_key"}'
   curl -X POST https://yourdomain.com/likethv2.php -H "Content-Type: application/json" -d '{"action":"balance","key":"your_key"}'
   curl -X POST https://yourdomain.com/likethv2.php -H "Content-Type: application/json" -d '{"action":"add","service":"1","quantity":"10","link":"https://facebook.com/post","key":"your_key"}'
   curl -X POST https://yourdomain.com/likethv2.php -H "Content-Type: application/json" -d '{"action":"status","order":"12345","key":"your_key"}'

📋 API Endpoints:
- /likethv2.php - สำหรับ likes/emojis (PRICESV2)
- /likethv2.php - สำหรับ comments (PRICES)

📋 Actions ที่รองรับ:
- services - ส่งคืนรายการบริการ
- balance - ดึงข้อมูลยอดเงิน
- add - สร้างคำสั่งซื้อใหม่
- status - ตรวจสอบสถานะคำสั่งซื้อ

================================================================================
*/

// Configuration - แก้ไขค่าต่างๆ ตรงนี้
$CONFIG = [
    'apikeynewlike' => 'c0aab25d03bf2ec12df7860e682a655d', // ใส่ API key ของคุณตรงนี้
    'likeapi' => 'https://v2.sc24shop.store/api/v2', // ใส่ URL ของ like API
    'likeapikey' => 'e09a1689839c30520e2aa66ac423c46e', // ใส่ API key ของ like service
    'commentapi' => 'https://ปั้มไลค์ฟรี.com/api/v2', // ใส่ URL ของ comment API
    'commentapikey' => '78ad1084ba9af8309a04c5e1c8194c95' // ใส่ API key ของ comment service
];

// Set content type to JSON
header('Content-Type: application/json; charset=utf-8');

// Enable CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Data structures
$PRICESV2 = [
    [
        'service' => 1,
        'name' => "👍 ไลค์",
        'type' => "Default",
        'rate' => "100.00",
        'min' => "10",
        'max' => "500",
        'dripfeed' => false,
        'refill' => false,
        'cancel' => false,
        'category' => "ปั้มไลค์ไทยsv1"
    ],
    [
        'service' => 2,
        'name' => "❤️ หัวใจ",
        'type' => "Default",
        'rate' => "100.00",
        'min' => "10",
        'max' => "500",
        'dripfeed' => false,
        'refill' => false,
        'cancel' => false,
        'category' => "ปั้มไลค์ไทยsv1"
    ],
    [
        'service' => 3,
        'name' => "😮 ว้าว",
        'type' => "Default",
        'rate' => "100.00",
        'min' => "10",
        'max' => "500",
        'dripfeed' => false,
        'refill' => false,
        'cancel' => false,
        'category' => "ปั้มไลค์ไทยsv1"
    ],
    [
        'service' => 4,
        'name' => "😆 ขำ",
        'type' => "Default",
        'rate' => "100.00",
        'min' => "10",
        'max' => "500",
        'dripfeed' => false,
        'refill' => false,
        'cancel' => false,
        'category' => "ปั้มไลค์ไทยsv1"
    ],
    [
        'service' => 7,
        'name' => "😥 เศร้า",
        'type' => "Default",
        'rate' => "100.00",
        'min' => "10",
        'max' => "500",
        'dripfeed' => false,
        'refill' => false,
        'cancel' => false,
        'category' => "ปั้มไลค์ไทยsv1"
    ],
    [
        'service' => 8,
        'name' => "😡 โกรธ",
        'type' => "Default",
        'rate' => "100.00",
        'min' => "10",
        'max' => "500",
        'dripfeed' => false,
        'refill' => false,
        'cancel' => false,
        'category' => "ปั้มไลค์ไทยsv1"
    ]
];

$PRICES = [
    [
        'service' => "1",
        'name' => "คอมเม้นท์ Facebook |🌎ต่างชาติ  |🔰 กำหนดเอง | ⭐Premium⭐| ทำงาน1-5นาที |",
        'type' => "Custom Comments",
        'rate' => "1000.00",
        'min' => "5",
        'max' => "3000",
        'dripfeed' => false,
        'refill' => false,
        'cancel' => false,
        'category' => "ปั้มคอมเม้น"
    ],
    [
        'service' => "210",
        'name' => "คอมเม้นท์ Facebook | 🇹🇭 คนไทย |🔰 กำหนดเอง | ⭐Premium⭐| ทำงาน1-5นาที |",
        'type' => "Custom Comments",
        'rate' => "2000.00",
        'min' => "5",
        'max' => "1000",
        'dripfeed' => false,
        'refill' => false,
        'cancel' => false,
        'category' => "ปั้มคอมเม้น"
    ],
    [
        'service' => "301",
        'name' => "คอมเม้นท์ Facebook | 🇹🇭 คนไทยแท้ มีตัวตน |🔰 กำหนดเอง | บริการระดับ ⭐⭐⭐⭐⭐| ทำงาน1-5นาที |",
        'type' => "Custom Comments",
        'rate' => "2000.00",
        'min' => "5",
        'max' => "400",
        'dripfeed' => false,
        'refill' => false,
        'cancel' => false,
        'category' => "ปั้มคอมเม้น"
    ]
];

// Helper function to get request data with proper content type handling
function getRequestData() {
    $method = $_SERVER['REQUEST_METHOD'];
    $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
    
    // Debug logging
    error_log("=== REQUEST DEBUG ===");
    error_log("Method: " . $method);
    error_log("Content-Type: " . $contentType);
    error_log("=====================");
    
    if ($method === 'POST') {
        // Handle JSON content type
        if (strpos($contentType, 'application/json') !== false) {
            $input = file_get_contents('php://input');
            error_log("Raw JSON input: " . $input);
            $result = json_decode($input, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                error_log("JSON decode error: " . json_last_error_msg());
                return [];
            }
            error_log("Parsed JSON: " . json_encode($result));
            return $result ?: [];
        }
        // Handle form-urlencoded content type
        elseif (strpos($contentType, 'application/x-www-form-urlencoded') !== false) {
            $input = file_get_contents('php://input');
            error_log("Raw form input: " . $input);
            parse_str($input, $parsed);
            error_log("Parsed form: " . json_encode($parsed));
            return $parsed;
        }
        // Handle multipart/form-data
        elseif (strpos($contentType, 'multipart/form-data') !== false) {
            error_log("Using $_POST data for multipart/form-data");
            return $_POST;
        }
        // Default fallback - try to get data from $_POST
        else {
            error_log("Unknown content type, using $_POST data");
            return $_POST;
        }
    } else {
        error_log("Using $_GET data for GET request");
        return $_GET;
    }
}

// Helper function to make HTTP requests with proper error handling
function makeRequest($url, $data = null, $method = 'POST') {
    // Prevent self-referencing
    $currentHost = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? '';
    $urlHost = parse_url($url, PHP_URL_HOST);
    
    error_log("Making request to: " . $url);
    error_log("Current host: " . $currentHost);
    error_log("URL host: " . $urlHost);
    
    // If trying to call self, return mock data
    if ($urlHost === $currentHost || strpos($url, $currentHost) !== false) {
        error_log("WARNING: Attempting to call self, returning mock data");
        
        $action = $data['action'] ?? '';
        switch ($action) {
            case 'balance':
                return [
                    'data' => json_encode(['balance' => '1000.00', 'currency' => 'THB']),
                    'status' => 200
                ];
            case 'add':
                return [
                    'data' => json_encode(['order' => rand(10000, 99999), 'status' => 'success']),
                    'status' => 200
                ];
            case 'status':
                $order = $data['order'] ?? '';
                return [
                    'data' => json_encode(['order' => $order, 'status' => 'completed', 'progress' => '100%']),
                    'status' => 200
                ];
            default:
                return [
                    'data' => json_encode(['error' => 'Invalid action']),
                    'status' => 400
                ];
        }
    }
    
    $ch = curl_init();
    
    // Set basic cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
    
    // Set headers
    $headers = [
        'User-Agent: PHP/1.0',
        'Accept: application/json, text/plain, */*'
    ];
    
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        if ($data) {
            // Always send as form data to avoid content type issues
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        }
    } else {
        curl_setopt($ch, CURLOPT_HTTPGET, true);
    }
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    // Execute request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    $curlInfo = curl_getinfo($ch);
    
    curl_close($ch);
    
    // Log response details
    error_log("Response status: " . $httpCode);
    error_log("Response data: " . $response);
    error_log("cURL info: " . json_encode($curlInfo));
    
    if ($response === false) {
        throw new Exception('cURL error: ' . $curlError);
    }
    
    // Handle HTTP errors
    if ($httpCode >= 400) {
        error_log("HTTP error: " . $httpCode);
        throw new Exception('HTTP error: ' . $httpCode . ' - ' . $response);
    }
    
    return [
        'data' => $response,
        'status' => $httpCode
    ];
}

// API key verification
function verifyApiKey($data) {
    global $CONFIG;
    $apiKey = $data['key'] ?? null;
    $envApiKey = $CONFIG['apikeynewlike'];
    
    error_log("API Key check: " . $envApiKey);
    error_log("Request key: " . $apiKey);
    
    if ($apiKey != $envApiKey) {
        error_log("Invalid API key: " . $apiKey);
        return false;
    }
    
    error_log("API key validated successfully");
    return true;
}

// Main request handler
function handleRequest() {
    global $CONFIG;
    
    try {
        $method = $_SERVER['REQUEST_METHOD'];
        $data = getRequestData();
        
        error_log("=== MAIN REQUEST HANDLER ===");
        error_log("Method: " . $method);
        error_log("Data: " . json_encode($data));
        error_log("============================");
        
        // Verify API key
        if (!verifyApiKey($data)) {
            // Uncomment the line below to enable API key validation
            // http_response_code(401);
            // echo json_encode(['error' => 'Invalid API key']);
            // return;
        }
        
        $action = $data['action'] ?? null;
        
        if (!$action) {
            error_log("Missing action field");
            echo json_encode(['error' => 'Missing action field']);
            return;
        }
        
        // Handle all actions
        switch ($action) {
            case 'services':
                error_log("Returning services data");
                global $PRICESV2;
                echo json_encode($PRICESV2);
                break;
                
            case 'balance':
                error_log("Fetching balance...");
                try {
                    $balanceResponse = makeRequest($CONFIG['likeapi'], [
                        'key' => $CONFIG['likeapikey'],
                        'action' => 'balance'
                    ]);
                    echo $balanceResponse['data'];
                } catch (Exception $e) {
                    error_log("Balance error: " . $e->getMessage());
                    http_response_code(500);
                    echo json_encode(['error' => 'Failed to fetch balance: ' . $e->getMessage()]);
                }
                break;
                
            case 'add':
                $service = $data['service'] ?? null;
                $quantity = $data['quantity'] ?? null;
                $link = $data['link'] ?? null;
                
                if (!$service || !$quantity || !$link) {
                    error_log("Missing required fields: " . json_encode($data));
                    http_response_code(400);
                    echo json_encode(['error' => 'Missing required fields']);
                    return;
                }
                
                error_log("Submitting order...");
                try {
                    $addResponse = makeRequest("https://v2.sc24shop.store/api/v3/emojithai/normal", [
                        'key' => $CONFIG['likeapikey'],
                        'id' => $service,
                        'link' => $link,
                        'amount' => $quantity
                    ]);
                    echo $addResponse['data'];
                } catch (Exception $e) {
                    error_log("Add order error: " . $e->getMessage());
                    http_response_code(500);
                    echo json_encode(['error' => 'Failed to submit order: ' . $e->getMessage()]);
                }
                break;
                
            case 'status':
                $order = $data['order'] ?? null;
                $orders = $data['orders'] ?? null;
                
                if ($order) {
                    $payload = [
                        'key' => $CONFIG['likeapikey'],
                        'action' => 'status',
                        'order' => $order
                    ];
                    
                    error_log("Checking order status...");
                    try {
                        $statusResponse = makeRequest($CONFIG['likeapi'], $payload);
                        echo $statusResponse['data'];
                    } catch (Exception $e) {
                        error_log("Status error: " . $e->getMessage());
                        http_response_code(500);
                        echo json_encode(['error' => 'Failed to check status: ' . $e->getMessage()]);
                    }
                    
                } elseif ($orders) {
                    $orderList = array_map('trim', explode(',', $orders));
                    $results = [];
                    
                    foreach ($orderList as $ord) {
                        try {
                            $response = makeRequest($CONFIG['likeapi'], [
                                'key' => $CONFIG['likeapikey'],
                                'action' => 'status',
                                'order' => $ord
                            ]);
                            $results[$ord] = json_decode($response['data'], true);
                        } catch (Exception $e) {
                            $results[$ord] = ['error' => 'Incorrect order ID'];
                        }
                    }
                    
                    echo json_encode($results);
                    
                } else {
                    error_log("Invalid status request, missing order/orders fields");
                    http_response_code(400);
                    echo json_encode(['error' => 'Missing order or orders parameter']);
                }
                break;
                
            default:
                error_log("Invalid action: " . $action);
                http_response_code(400);
                echo json_encode(['error' => 'Invalid action']);
                break;
        }
        
    } catch (Exception $e) {
        error_log("General error: " . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Internal server error: ' . $e->getMessage()]);
    }
}

// Handle the request
handleRequest();
?> 