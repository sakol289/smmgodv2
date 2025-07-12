<?php
/*
================================================================================
                    PHP API SERVER - ใช้งานได้ทุกแบบ
================================================================================

📋 วิธีการเรียกใช้ API ทั้งหมด:

1. GET Request (Query Parameters):
   https://yourdomain.com/server.php/api/v2?action=services&key=your_key
   https://yourdomain.com/server.php/api/v2?action=balance&key=your_key
   https://yourdomain.com/server.php/api/v2?action=add&service=1&quantity=10&link=https://facebook.com/post&key=your_key
   https://yourdomain.com/server.php/api/v2?action=status&order=12345&key=your_key

2. POST Request (Form Data):
   curl -X POST https://yourdomain.com/server.php/api/v2 -d "action=services&key=your_key"
   curl -X POST https://yourdomain.com/server.php/api/v2 -d "action=balance&key=your_key"
   curl -X POST https://yourdomain.com/server.php/api/v2 -d "action=add&service=1&quantity=10&link=https://facebook.com/post&key=your_key"
   curl -X POST https://yourdomain.com/server.php/api/v2 -d "action=status&order=12345&key=your_key"

3. POST Request (JSON Data):
   curl -X POST https://yourdomain.com/server.php/api/v2 -H "Content-Type: application/json" -d '{"action":"services","key":"your_key"}'
   curl -X POST https://yourdomain.com/server.php/api/v2 -H "Content-Type: application/json" -d '{"action":"balance","key":"your_key"}'
   curl -X POST https://yourdomain.com/server.php/api/v2 -H "Content-Type: application/json" -d '{"action":"add","service":"1","quantity":"10","link":"https://facebook.com/post","key":"your_key"}'
   curl -X POST https://yourdomain.com/server.php/api/v2 -H "Content-Type: application/json" -d '{"action":"status","order":"12345","key":"your_key"}'

📋 API Endpoints:
- /server.php/api/v2 - สำหรับ likes/emojis (PRICESV2)
- /server.php/api/v3 - สำหรับ comments (PRICES)

📋 Actions ที่รองรับ:
- services - ส่งคืนรายการบริการ
- balance - ดึงข้อมูลยอดเงิน
- add - สร้างคำสั่งซื้อใหม่
- status - ตรวจสอบสถานะคำสั่งซื้อ

📋 ตัวอย่างการใช้งาน JavaScript:
fetch('https://yourdomain.com/server.php/api/v2', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({
        action: 'services',
        key: 'your_key'
    })
})

📋 ตัวอย่างการใช้งาน PHP:
$data = [
    'action' => 'services',
    'key' => 'your_key'
];
$ch = curl_init('https://yourdomain.com/server.php/api/v2');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

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
header('Content-Type: application/json');

// Enable CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

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

// Helper function to make HTTP requests
function makeRequest($url, $data = null, $method = 'POST', $contentType = 'form') {
    // Prevent self-referencing
    $currentHost = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? '';
    $currentScript = $_SERVER['SCRIPT_NAME'] ?? '';
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
    
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        if ($data) {
            if ($contentType === 'json') {
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                $headers = [
                    'Content-Type: application/json',
                    'User-Agent: PHP/1.0'
                ];
            } else {
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                $headers = [
                    'Content-Type: application/x-www-form-urlencoded',
                    'User-Agent: PHP/1.0'
                ];
            }
        } else {
            $headers = [
                'User-Agent: PHP/1.0'
            ];
        }
    } else {
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        $headers = [
            'User-Agent: PHP/1.0'
        ];
    }
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);
    
    if ($response === false) {
        throw new Exception('cURL error: ' . $curlError);
    }
    
    return [
        'data' => $response,
        'status' => $httpCode
    ];
}

// Helper function to get request data
function getRequestData() {
    $method = $_SERVER['REQUEST_METHOD'];
    
    // Debug logging
    error_log("Request method: " . $method);
    error_log("Content-Type: " . ($_SERVER['CONTENT_TYPE'] ?? 'not set'));
    error_log("POST data: " . json_encode($_POST));
    error_log("GET data: " . json_encode($_GET));
    
    if ($method === 'POST') {
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        
        // Handle JSON content type
        if (strpos($contentType, 'application/json') !== false) {
            $input = file_get_contents('php://input');
            error_log("Raw JSON input: " . $input);
            $result = json_decode($input, true) ?: [];
            error_log("Parsed JSON: " . json_encode($result));
            return $result;
        }
        // Handle form-urlencoded content type
        elseif (strpos($contentType, 'application/x-www-form-urlencoded') !== false) {
            $input = file_get_contents('php://input');
            error_log("Raw form input: " . $input);
            parse_str($input, $parsed);
            error_log("Parsed form: " . json_encode($parsed));
            return $parsed;
        }
        // Handle multipart/form-data or other form types
        else {
            error_log("Using $_POST data");
            return $_POST; // Form data
        }
    } else {
        error_log("Using $_GET data");
        return $_GET; // Query parameters
    }
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
    $method = $_SERVER['REQUEST_METHOD'];
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $data = getRequestData();
    
    // Debug: Log request details
    error_log("=== REQUEST DEBUG ===");
    error_log("Method: " . $method);
    error_log("Path: " . $path);
    error_log("Request URI: " . $_SERVER['REQUEST_URI']);
    error_log("Data: " . json_encode($data));
    error_log("=====================");
    
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
    
    // Determine API version from path - รองรับหลายรูปแบบ URL
    if (strpos($path, '/v2') !== false || strpos($path, 'v2') !== false) {
        handleV2API($action, $data);
    } elseif (strpos($path, '/v3') !== false || strpos($path, 'v3') !== false) {
        handleV3API($action, $data);
    } else {
        // ถ้าไม่เจอ version ให้ใช้ v2 เป็น default
        handleV2API($action, $data);
    }
}

// V2 API handler (for likes/emojis)
function handleV2API($action, $data) {
    global $CONFIG, $PRICESV2;
    try {
        switch ($action) {
            case 'services':
                error_log("Returning services data");
                echo json_encode($PRICESV2);
                break;
                
            case 'balance':
                error_log("Fetching balance...");
                try {
                    $balanceResponse = makeRequest($CONFIG['likeapi'], [
                        'key' => $CONFIG['likeapikey'],
                        'action' => 'balance'
                    ]);
                    error_log("Balance response status: " . $balanceResponse['status']);
                    error_log("Balance response data: " . $balanceResponse['data']);
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
                
                error_log("Submitting order to like API...");
                try {
                    $addResponse = makeRequest("https://v2.sc24shop.store/api/v3/emojithai/normal", [
                        'key' => $CONFIG['likeapikey'],
                        'id' => $service,
                        'link' => $link,
                        'amount' => $quantity
                    ]);
                    error_log("Add order response status: " . $addResponse['status']);
                    error_log("Add order response data: " . $addResponse['data']);
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
                        error_log("Status response status: " . $statusResponse['status']);
                        error_log("Status response data: " . $statusResponse['data']);
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
                    echo json_encode(['error' => 'Internal error']);
                }
                break;
                
            default:
                error_log("Invalid action: " . $action);
                http_response_code(400);
                echo json_encode(['error' => 'Invalid action']);
                break;
        }
    } catch (Exception $e) {
        error_log("Error in processing request: " . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
}

// V3 API handler (for comments)
function handleV3API($action, $data) {
    global $CONFIG, $PRICES;
    try {
        switch ($action) {
            case 'services':
                error_log("Returning services data");
                echo json_encode($PRICES);
                break;
                
            case 'balance':
                error_log("Fetching balance...");
                try {
                    $balanceResponse = makeRequest($CONFIG['commentapi'], [
                        'key' => $CONFIG['commentapikey'],
                        'action' => 'balance'
                    ]);
                    error_log("V3 Balance response status: " . $balanceResponse['status']);
                    error_log("V3 Balance response data: " . $balanceResponse['data']);
                    echo $balanceResponse['data'];
                } catch (Exception $e) {
                    error_log("V3 Balance error: " . $e->getMessage());
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
                
                $linkParts = explode('|', $link);
                if (count($linkParts) !== 2) {
                    error_log("Invalid link format");
                    http_response_code(400);
                    echo json_encode(['error' => 'Invalid link format']);
                    return;
                }
                
                $pastebinUrl = $linkParts[0];
                $fbUrl = $linkParts[1];
                
                if (strpos($pastebinUrl, 'pastebin') === false) {
                    error_log("Invalid Pastebin link: " . $pastebinUrl);
                    http_response_code(400);
                    echo json_encode(['error' => 'neworder.error.link.pastebin']);
                    return;
                }
                
                error_log("Fetching comments from Pastebin...");
                $pastebinResponse = makeRequest($pastebinUrl, null, 'GET');
                $lines = explode("\n", $pastebinResponse['data']);
                $comments = implode("\n", array_slice($lines, 0, intval($quantity)));
                
                error_log("Submitting order to comment API...");
                try {
                    $addResponse = makeRequest($CONFIG['commentapi'], [
                        'key' => $CONFIG['commentapikey'],
                        'action' => 'add',
                        'service' => $service,
                        'link' => $fbUrl,
                        'comments' => $comments
                    ]);
                    error_log("V3 Add order response status: " . $addResponse['status']);
                    error_log("V3 Add order response data: " . $addResponse['data']);
                    echo $addResponse['data'];
                } catch (Exception $e) {
                    error_log("V3 Add order error: " . $e->getMessage());
                    http_response_code(500);
                    echo json_encode(['error' => 'Failed to submit order: ' . $e->getMessage()]);
                }
                break;
                
            case 'status':
                $order = $data['order'] ?? null;
                $orders = $data['orders'] ?? null;
                
                $payload = [
                    'key' => $CONFIG['commentapikey'],
                    'action' => 'status'
                ];
                
                if ($order) {
                    $payload['order'] = $order;
                } elseif ($orders) {
                    $payload['orders'] = $orders;
                } else {
                    error_log("Invalid status request, missing order/orders fields");
                    http_response_code(400);
                    echo json_encode(['error' => 'Internal error']);
                    return;
                }
                
                error_log("Checking order status...");
                try {
                    $statusResponse = makeRequest($CONFIG['commentapi'], $payload);
                    error_log("V3 Status response status: " . $statusResponse['status']);
                    error_log("V3 Status response data: " . $statusResponse['data']);
                    echo $statusResponse['data'];
                } catch (Exception $e) {
                    error_log("V3 Status error: " . $e->getMessage());
                    http_response_code(500);
                    echo json_encode(['error' => 'Failed to check status: ' . $e->getMessage()]);
                }
                break;
                
            default:
                error_log("Invalid action: " . $action);
                http_response_code(400);
                echo json_encode(['error' => 'Invalid action']);
                break;
        }
    } catch (Exception $e) {
        error_log("Error in processing request: " . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
}

// Handle the request
handleRequest();
?> 