<?php

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

function CreateApiKey($data)
{
    global $conn;
    $data = md5($data["email"] . $data["username"] . rand(9999, 2324332));
    $row = $conn->prepare("SELECT * FROM clients WHERE apikey=:key ");
    $row->execute(["key" => $data]);
    if ($row->rowCount()) {
        CreateApiKey();
    } else {
        return $data;
    }
}
function guardDeleteAllRoles()
{
    $update = $conn->prepare("UPDATE clients SET access=:access WHERE client_id=:c_id ");
    $update->execute(["c_id" => $user["client_id"], "access" => "{\"admin_access\":\"0\"}"]);
    header("Location:" . site_url(""));
}
function guardLogout()
{
    unset($_SESSION["neira_userid"]);
    unset($_SESSION["neira_userpass"]);
    unset($_SESSION["neira_userlogin"]);
    setcookie("u_id", $user["client_id"], time() - 604800, "/", NULL, NULL, true);
    setcookie("u_password", $user["password"], time() - 604800, "/", NULL, NULL, true);
    setcookie("u_login", "ok", time() - 604800, "/", NULL, NULL, true);
    setcookie("a_login", "ok", time() - 604800, "/", NULL, NULL, true);
    session_destroy();
    header("Location:" . site_url(""));
}
function replace_tr($text)
{
    $text = trim($text);
    $search = ["Ç", "ç", "Ğ", "ğ", "ı", "İ", "Ö", "ö", "Ş", "ş", "Ü", "ü", " ", ".", ",", "<", ">", "!"];
    $replace = ["c", "c", "g", "g", "i", "i", "o", "o", "s", "s", "u", "u", "-", "", "", "", "", ""];
    $new_text = str_replace($search, $replace, $text);
    return $new_text;
}
function convertSecToStr($secs)
{
    $output = "";
    if (86400 <= $secs) {
        $days = floor($secs / 86400);
        $secs = $secs % 86400;
        $output = $days . " Days";
        if ($days != 1) {
            $output .= "";
        }
        if (0 < $secs) {
            $output .= ", ";
        }
    }
    if (3600 <= $secs) {
        $hours = floor($secs / 3600);
        $secs = $secs % 3600;
        $output .= $hours . " Hours";
        if ($hours != 1) {
            $output .= "";
        }
        if (0 < $secs) {
            $output .= ", ";
        }
    }
    if (60 <= $secs) {
        $minutes = floor($secs / 60);
        $secs = $secs % 60;
        $output .= $minutes . " Minutes";
        if ($minutes != 1) {
            $output .= "";
        }
        if (0 < $secs) {
            $output .= " ";
        }
    }
    return $output;
}
function ortalama($array)
{
    $toplam = 0;
    $sayi = count($array);
    foreach ($array as $ort) {
        if (is_numeric($ort)) {
            $toplam += $ort;
        } else {
            $sayi--;
        }
    }
    if ($sayi) {
        $islem = $toplam / $sayi;
        return $islem;
    }
    return "NaN";
}
function createReferral()
{
    $karakterler = "1234567890abcdefghijKLMNOPQRSTuvwxyzABCDEFGHIJklmnopqrstUVWXYZ0987654321";
    $sifre = "";
    for ($i = 0; $i < 5; $i++) {
        $sifre = $karakterler[rand() % 72];
    }
    return $sifre;
}
function createPaymentCode()
{
    global $conn;
    $row = $conn->prepare("SELECT * FROM payments WHERE payment_method!=:method ORDER BY payment_privatecode DESC LIMIT 1 ");
    $row->execute(["method" => 4]);
    $row = $row->fetch(PDO::FETCH_ASSOC);
    return $row["payment_privatecode"];
}
function generate_shopier_form($data)
{
    $api_key = $data->apikey;
    $secret = $data->apisecret;
    $user_registered = date("Y.m.d");
    $time_elapsed = time() - strtotime($user_registered);
    $buyer_account_age = (int) ($time_elapsed / 86400);
    $currency = 0;
    $dataArray = $data;
    $productinfo = $data->item_name;
    $producttype = 1;
    $productinfo = str_replace("\"", "", $productinfo);
    $productinfo = str_replace("\"", "", $productinfo);
    $current_language = 0;
    $current_lan = 0;
    $modul_version = "1.0.4";
    srand(time(NULL));
    $random_number = rand(1000000, 9999999);
    $args = ["API_key" => $api_key, "website_index" => $data->website_index, "platform_order_id" => $data->order_id, "product_name" => $productinfo, "product_type" => $producttype, "buyer_name" => $data->buyer_name, "buyer_surname" => $data->buyer_surname, "buyer_email" => $data->buyer_email, "buyer_account_age" => $buyer_account_age, "buyer_id_nr" => 0, "buyer_phone" => $data->buyer_phone, "billing_address" => $data->billing_address, "billing_city" => $data->city, "billing_country" => "TR", "billing_postcode" => "", "shipping_address" => $data->billing_address, "shipping_city" => $data->city, "shipping_country" => "TR", "shipping_postcode" => "", "total_order_value" => $data->ucret, "currency" => $currency, "platform" => 0, "is_in_frame" => 1, "current_language" => $current_lan, "modul_version" => $modul_version, "random_nr" => $random_number];
    $data = $args["random_nr"] . $args["platform_order_id"] . $args["total_order_value"] . $args["currency"];
    $signature = hash_hmac("SHA256", $data, $secret, true);
    $signature = base64_encode($signature);
    $args["signature"] = $signature;
    $args_array = [];
    foreach ($args as $key => $value) {
        $args_array[] = "<input type='hidden' name='" . $key . "' value='" . $value . "'/>";
    }
    if (!empty($dataArray->apikey) && !empty($dataArray->apisecret) && !empty($dataArray->website_index)) {
        $_SESSION["data"]["payment_shopier"] = true;
        return "<html> <!doctype html><head> <meta charset=\"UTF-8\"> <meta content=\"True\" name=\"HandheldFriendly\"> <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n      <meta name=\"robots\" content=\"noindex, nofollow, noarchive\" />\n      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=0\" /> <title lang=\"tr\">Güvenli Ödeme Sayfası</title><body><head>\n      <form action=\"https://www.shopier.com/ShowProduct/api_pay4.php\" method=\"post\" id=\"shopier_payment_form\" style=\"display: none\">" . implode("", $args_array) . "<script>setInterval(function(){document.getElementById(\"shopier_payment_form\").submit();},2000)</script></form></body></html>";
    }
}
function weePayMobile()
{
    $mobile = false;
    $useragent = $_SERVER["HTTP_USER_AGENT"];
    if (preg_match("/(android|bb\\d+|meego).+mobile|avantgo|bada\\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i", $useragent) || preg_match("/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\\-(n|u)|c55\\/|capi|ccwa|cdm\\-|cell|chtm|cldc|cmd\\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\\-s|devi|dica|dmob|do(c|p)o|ds(12|\\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\\-|_)|g1 u|g560|gene|gf\\-5|g\\-mo|go(\\.w|od)|gr(ad|un)|haie|hcit|hd\\-(m|p|t)|hei\\-|hi(pt|ta)|hp( i|ip)|hs\\-c|ht(c(\\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\\-(20|go|ma)|i230|iac( |\\-|\\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\\/)|klon|kpt |kwc\\-|kyo(c|k)|le(no|xi)|lg( g|\\/(k|l|u)|50|54|\\-[a-w])|libw|lynx|m1\\-w|m3ga|m50\\/|ma(te|ui|xo)|mc(01|21|ca)|m\\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\\-2|po(ck|rt|se)|prox|psio|pt\\-g|qa\\-a|qc(07|12|21|32|60|\\-[2-7]|i\\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\\-|oo|p\\-)|sdk\\/|se(c(\\-|0|1)|47|mc|nd|ri)|sgh\\-|shar|sie(\\-|m)|sk\\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\\-|v\\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\\-|tdg\\-|tel(i|m)|tim\\-|t\\-mo|to(pl|sh)|ts(70|m\\-|m3|m5)|tx\\-9|up(\\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\\-|your|zeto|zte\\-/i", substr($useragent, 0, 4))) {
        $mobile = true;
    }
    return $mobile;
}
function username_check($username)
{
    if (preg_match("/^[a-z\\d_]{4,32}\$/i", $username)) {
        $validate = true;
    } else {
        $validate = false;
    }
    return $validate;
}
function email_check($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validate = true;
    } else {
        $validate = false;
    }
    return $validate;
}
function userdata_check($where, $data)
{
    global $conn;
    $row = $conn->prepare("SELECT * FROM clients WHERE " . $where . "=:data ");
    $row->execute(["data" => $data]);
    if ($row->rowCount()) {
        $validate = true;
    } else {
        $validate = false;
    }
    return $validate;
}
function userlogin_check($username, $pass)
{
    global $conn;
    $row = $conn->prepare("SELECT * FROM clients WHERE username=:username && password=:password ");
    $row->execute(["username" => $username, "password" => md5(sha1(md5($pass)))]);
    if ($row->rowCount()) {
        $validate = true;
    } else {
        $validate = false;
    }
    return $validate;
}
function service_price($service)
{
    global $conn;
    global $user;
    $row = $conn->prepare("SELECT * FROM clients_price WHERE service_id=:s_id && client_id=:c_id ");
    $row->execute(["s_id" => $service, "c_id" => $user["client_id"]]);
    if ($row->rowCount()) {
        $row = $row->fetch(PDO::FETCH_ASSOC);
        $price = $row["service_price"];
    } else {
        $row = $conn->prepare("SELECT * FROM services WHERE service_id=:id");
        $row->execute(["id" => $service]);
        $row = $row->fetch(PDO::FETCH_ASSOC);
        $price = $row["service_price"];
    }
    /* new order price decimail */

    $price = round(floatval(preg_replace('/[^\d.]/', '', $price)), 3);

    /* new order price decimail */

    return $price;
}
function client_price($service, $userid)
{




    global $conn;
    global $user;
    $row = $conn->prepare("SELECT * FROM clients_price WHERE service_id=:s_id && client_id=:c_id ");
    $row->execute(["s_id" => $service, "c_id" => $userid]);
    if ($row->rowCount()) {
        $row = $row->fetch(PDO::FETCH_ASSOC);
        $price = $row["service_price"];
    } else {
        $row = $conn->prepare("SELECT * FROM services WHERE service_id=:id");
        $row->execute(["id" => $service]);
        $row = $row->fetch(PDO::FETCH_ASSOC);
        $price = $row["service_price"];
    }

    /* new order price decimail */
    $price = round(floatval(preg_replace('/[^\d.]/', '', $price)), 3);

    /* new order price decimail */


    return $price;
}
function open_ticket($user)
{
    global $conn;
    $row = $conn->prepare("SELECT * FROM tickets WHERE client_id=:client && status=:status ");
    $row->execute(["client" => $user, "status" => "pending"]);
    $validate = $row->rowCount();
    return $validate;
}
function open_bankpayment($user)
{
    global $conn;
    $row = $conn->prepare("SELECT * FROM payments WHERE client_id=:client && payment_status=:status && payment_method=:method ");
    $row->execute(["client" => $user, "status" => 1, "method" => 6]);
    $validate = $row->rowCount();
    return $validate;
}
function new_ticket($user)
{
    global $conn;
    $row = $conn->prepare("SELECT * FROM tickets WHERE client_id=:client && support_new=:new ");
    $row->execute(["client" => $user, "new" => 2]);
    $validate = $row->rowCount();
    return $validate;
}
function countRow($data)
{
    global $conn;
    $where = "";
    if ($data["where"]) {
        $where = "WHERE ";
        foreach ($data["where"] as $key => $value) {
            $where .= " " . $key . "=:" . $key . " && ";
            $execute[$key] = $value;
        }
        $where = substr($where, 0, -3);
    } else {
        $execute[] = "";
    }
    $row = $conn->prepare("SELECT * FROM " . $data["table"] . " " . $where . " ");
    $row->execute($execute);
    $validate = $row->rowCount();
    return $validate;
}
function getRows($data)
{
    global $conn;
    $where = "";
    $order = "";
    $order = "";
    $limit = "";
    $execute[] = "";
    if ($data["where"]) {
        $where = "WHERE ";
        foreach ($data["where"] as $key => $value) {
            $where .= " " . $key . "=:" . $key . " && ";
            $execute[$key] = $value;
        }
        $where = substr($where, 0, -3);
    }
    if ($data["order"]) {
        $order = "ORDER BY " . $data["order"] . " " . $data["order_type"];
    }
    if ($data["limit"]) {
        $limit = "LIMIT " . $data["limit"];
    }
    $row = $conn->prepare("SELECT * FROM " . $data["table"] . " " . $where . " " . $order . " " . $limit . " ");
    $row->execute($execute);
    if ($row->rowCount()) {
        $rows = $row->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $rows = [];
    }
    return $rows;
}
function getRow($data)
{
    global $conn;
    $where = "WHERE ";
    foreach ($data["where"] as $key => $value) {
        $where .= " " . $key . "=:" . $key . " && ";
        $execute[$key] = $value;
    }
    $where = substr($where, 0, -3);
    $row = $conn->prepare("SELECT * FROM " . $data["table"] . " " . $where . " ");
    $row->execute($execute);
    if ($row->rowCount()) {
        $row = $row->fetch(PDO::FETCH_ASSOC);
    } else {
        $row = [];
    }
    return $row;
}
function statutoTR($status)
{
    switch ($status) {
        case "pending":
            $statu = "Beklemede";
            break;
        case "inprogress":
            $statu = "Yükleniyor";
            break;
        case "completed":
            $statu = "Tamamlandı";
            break;
        case "partial":
            $statu = "Kısmi tamamlandı";
            break;
        case "processing":
            $statu = "processing";
            break;
        case "canceled":
            $statu = "İptal";
            break;
        default:
            return $statu;
    }
}
function dripfeedstatutoTR($status)
{
    switch ($status) {
        case "active":
            $statu = "Aktif";
            break;
        case "canceled":
            $statu = "İptal";
            break;
        case "completed":
            $statu = "Tamamlandı";
            break;
        default:
            return $statu;
    }
}
function ticketStatu($status)
{
    switch ($status) {
        case "closed":
            $statu = "Kapalı";
            break;
        case "answered":
            $statu = "Yanıtlanmış";
            break;
        case "pending":
            $statu = "Cevap bekliyor";
            break;
        default:
            return $statu;
    }
}
function subscriptionstatutoTR($status)
{
    switch ($status) {
        case "active":
            $statu = "Aktif";
            break;
        case "canceled":
            $statu = "İptal";
            break;
        case "completed":
            $statu = "Tamamlanmış";
            break;
        case "paused":
            $statu = "Durdurulmuş";
            break;
        case "expired":
            $statu = "Süresi dolmuş";
            break;
        case "limit":
            $statu = "Gönderimde";
            break;
        default:
            return $statu;
    }
}
function serviceTypeGetList($type)
{
    switch ($type) {
        case "Default":
            $service_type = 1;
            break;
        case "Package":
            $service_type = 2;
            break;
        case "Custom Comments":
            $service_type = 3;
            break;
        case "Custom Comments Package":
            $service_type = 4;
            break;
        case "Mentions":
            $service_type = 5;
            break;
        case "Mentions with hashtags":
            $service_type = 6;
            break;
        case "Mentions custom list":
            $service_type = 7;
            break;
        case "Mentions custom list":
            $service_type = "8";
            break;
        case "Mentions user followers":
            $service_type = 9;
            break;
        case "Mentions media likers":
            $service_type = 10;
            break;
        case "Subscriptions":
            $service_type = 11;
            break;
        default:
            return $service_type;
    }
}
function array_group_by($arr, $key)
{
    if (!is_string($key) && !is_int($key) && !is_float($key) && !is_callable($key)) {
        trigger_error("array_group_by(): The key should be a string, an integer, a float, or a function", 256);
    }
    $isFunction = !is_string($key) && is_callable($key);
    $grouped = [];
    foreach ($arr as $value) {
        $groupKey = NULL;
        if ($isFunction) {
            $groupKey = $key($value);
        } else {
            if (is_object($value)) {
                $groupKey = $value->{$key};
            } else {
                $groupKey = $value[$key];
            }
        }
        $grouped[$groupKey][] = $value;
    }
    if (2 < func_num_args()) {
        $args = func_get_args();
        foreach ($grouped as $groupKey => $value) {
            $params = array_merge([$value], array_slice($args, 2, func_num_args()));
            $grouped[$groupKey] = call_user_func_array("array_group_by", $params);
        }
    }
    return $grouped;
}
function force_download($file)
{
    if (isset($file) && file_exists($file)) {
        header("Content-length: " . filesize($file));
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"" . $file . "\"");
        readfile((int) $file);
    } else {
        echo "No file selected";
    }
}
function dayPayments($day, $ay, $year, $extra = NULL)
{
    global $conn;
    if (!empty($extra["methods"])) {
        if (count($extra["methods"])) {
            $where = "&& ( ";
            foreach ($extra["methods"] as $method) {
                $where .= "payment_method='" . $method . "' || ";
            }
            $where = substr($where, 0, -3);
            $where .= ") ";
        } else {
            $where = "";
        }
    }
    $first = $year . "-" . $ay . "-" . $day . " 00:00:00";
    $last = $year . "-" . $ay . "-" . $day . " 23:59:59";
    $row = $conn->query("SELECT SUM(payment_amount) FROM payments WHERE payment_delivery='2' && payment_status='3' && payment_create_date<='" . $last . "' && payment_create_date>='" . $first . "' " . $where . "  ")->fetch(PDO::FETCH_ASSOC);
    $charge = $row["SUM(payment_amount)"];
    return number_format($charge, 2, ".", ",");
}
function monthPayments($ay, $year, $extra = NULL)
{
    global $conn;
    if (!empty($extra["methods"])) {
        if (count($extra["methods"])) {
            $where = "&& ( ";
            foreach ($extra["methods"] as $method) {
                $where .= "payment_method='" . $method . "' || ";
            }
            $where = substr($where, 0, -3);
            $where .= ") ";
        } else {
            $where = "";
        }
    }
    $first = $year . "-" . $ay . "-1 00:00:00";
    $last = $year . "-" . $ay . "-31 23:59:59";
    $row = $conn->query("SELECT SUM(payment_amount) FROM payments WHERE payment_delivery='2' && payment_status='3' && payment_create_date<='" . $last . "' && payment_create_date>='" . $first . "' " . $where . " ")->fetch(PDO::FETCH_ASSOC);
    $charge = $row["SUM(payment_amount)"];
    return number_format($charge, 2, ".", ",");
}
function dayCharge($day, $ay, $year, $extra = NULL)
{
    global $conn;
    if (!empty($extra["status"])) {
        if (count($extra["status"])) {
            $where = "&& ( ";
            if (in_array("cron", $extra["status"])) {
                $where .= "order_detail='cronpending' || ";
            }
            if (in_array("fail", $extra["status"])) {
                $where .= "order_error!='-' || ";
            }
            foreach ($extra["status"] as $statu) {
                if ($statu != "cron" || $statu != "fail") {
                    $where .= "order_status='" . $statu . "' || ";
                }
            }
            $where = substr($where, 0, -3);
            $where .= ") ";
        } else {
            $where = "";
        }
    }
    if (!empty($_POST["services"]) && count($_POST["services"])) {
        $where .= "&& ( ";
        foreach ($extra["services"] as $service) {
            $where .= " service_id='" . $service . "' || ";
        }
        $where = substr($where, 0, -3);
        $where .= ") ";
    }
    $first = $year . "-" . $ay . "-" . $day . " 00:00:00";
    $last = $year . "-" . $ay . "-" . $day . " 23:59:59";
    $row = $conn->query("SELECT SUM(order_charge) FROM orders WHERE order_create<='" . $last . "' && order_create>='" . $first . "' && dripfeed='1' && subscriptions_type='1'   " . $where . "   ")->fetch(PDO::FETCH_ASSOC);
    $charge = $row["SUM(order_charge)"];
    return number_format($charge, 2, ".", ",");
}
function monthCharge($month, $year, $extra = NULL)
{
    global $conn;
    if (!empty($extra["status"])) {
        if (count($extra["status"])) {
            $where = "&& ( ";
            if (in_array("cron", $extra["status"])) {
                $where .= "order_detail='cronpending' || ";
            }
            if (in_array("fail", $extra["status"])) {
                $where .= "order_error!='-' || ";
            }
            foreach ($extra["status"] as $statu) {
                if ($statu != "cron" || $statu != "fail") {
                    $where .= "order_status='" . $statu . "' || ";
                }
            }
            $where = substr($where, 0, -3);
            $where .= ")";
        } else {
            $where = "";
        }
    }
    if (!empty($_POST["services"]) && count($_POST["services"])) {
        $where .= "&& ( ";
        foreach ($extra["services"] as $service) {
            $where .= " service_id='" . $service . "' || ";
        }
        $where = substr($where, 0, -3);
        $where .= ") ";
    }
    $first = $year . "-" . $month . "-1 00:00:00";
    $last = $year . "-" . $month . "-31 23:59:59";
    $row = $conn->query("SELECT SUM(order_charge) FROM orders WHERE order_create<='" . $last . "' && order_create>='" . $first . "'  && dripfeed='1' && subscriptions_type='1' " . $where . "   ")->fetch(PDO::FETCH_ASSOC);
    $charge = $row["SUM(order_charge)"];
    return number_format($charge, 2, ".", ",");
}
function monthChargeNet($month, $year, $extra = NULL)
{
    global $conn;
    if (!empty($extra["status"])) {
        if (count($extra["status"])) {
            $where = "&& ( ";
            if (in_array("cron", $extra["status"])) {
                $where .= "order_detail='cronpending' || ";
            }
            if (in_array("fail", $extra["status"])) {
                $where .= "order_error!='-' || ";
            }
            foreach ($extra["status"] as $statu) {
                if ($statu != "cron" || $statu != "fail") {
                    $where .= "order_status='" . $statu . "' || ";
                }
            }
            $where = substr($where, 0, -3);
            $where .= ")";
        } else {
            $where = "";
        }
    }
    if (!empty($_POST["services"]) && count($_POST["services"])) {
        $where .= "&& ( ";
        foreach ($extra["services"] as $service) {
            $where .= " service_id='" . $service . "' || ";
        }
        $where = substr($where, 0, -3);
        $where .= ") ";
    }
    $first = $year . "-" . $month . "-1 00:00:00";
    $last = $year . "-" . $month . "-31 23:59:59";
    $row = $conn->query("SELECT SUM(order_profit) FROM orders WHERE order_create<='" . $last . "' && order_create>='" . $first . "' && dripfeed='1' && subscriptions_type='1' && order_api!='0' " . $where . "  ")->fetch(PDO::FETCH_ASSOC);
    $row2 = $conn->query("SELECT SUM(order_charge) FROM orders WHERE order_create<='" . $last . "' && order_create>='" . $first . "' && dripfeed='1' && subscriptions_type='1'  " . $where . "  ")->fetch(PDO::FETCH_ASSOC);
    $charge = $row2["SUM(order_charge)"] - $row["SUM(order_profit)"];
    return number_format($charge, 2, ".", ",");
}
function dayOrders($day, $month, $year, $extra = NULL)
{
    global $conn;
    if (!empty($extra["status"])) {
        if (count($extra["status"])) {
            $where = "&& ( ";
            if (in_array("cron", $extra["status"])) {
                $where .= "order_detail='cronpending' || ";
            }
            if (in_array("fail", $extra["status"])) {
                $where .= "order_error!='-' || ";
            }
            foreach ($extra["status"] as $statu) {
                if ($statu != "cron" || $statu != "fail") {
                    $where .= "order_status='" . $statu . "' || ";
                }
            }
            $where = substr($where, 0, -3);
            $where .= ") ";
        } else {
            $where = "";
        }
    }
    if (!empty($extra["status"]) && count($_POST["services"])) {
        $where .= "&& ( ";
        foreach ($extra["services"] as $service) {
            $where .= " service_id='" . $service . "' || ";
        }
        $where = substr($where, 0, -3);
        $where .= ") ";
    }
    $first = $year . "-" . $month . "-" . $day . " 00:00:00";
    $last = $year . "-" . $month . "-" . $day . " 23:59:59";
    return $row = $conn->query("SELECT order_id FROM orders WHERE order_create<='" . $last . "' && order_create>='" . $first . "' " . $where . " ")->rowCount();
}
function monthOrders($month, $year, $extra = NULL)
{
    global $conn;
    if (!empty($extra["status"])) {
        if (count($extra["status"])) {
            $where = "&& ( ";
            if (in_array("cron", $extra["status"])) {
                $where .= "order_detail='cronpending' || ";
            }
            if (in_array("fail", $extra["status"])) {
                $where .= "order_error!='-' || ";
            }
            foreach ($extra["status"] as $statu) {
                if ($statu != "cron" || $statu != "fail") {
                    $where .= "order_status='" . $statu . "' || ";
                }
            }
            $where = substr($where, 0, -3);
            $where .= ")";
        } else {
            $where = "";
        }
    }
    if (!empty($_POST["services"]) && count($_POST["services"])) {
        $where .= "&& ( ";
        foreach ($extra["services"] as $service) {
            $where .= " service_id='" . $service . "' || ";
        }
        $where = substr($where, 0, -3);
        $where .= ") ";
    }
    $first = $year . "-" . $month . "-1 00:00:00";
    $last = $year . "-" . $month . "-31 23:59:59";
    return $row = $conn->query("SELECT order_id FROM orders WHERE order_create<='" . $last . "' && order_create>='" . $first . "' " . $where . " ")->rowCount();
}
function priceFormat($price)
{
    $priceExplode = explode(".", $price);
    if ($priceExplode[1]) {
        if (strlen($priceExplode[1]) == 1) {
            return $price . "0";
        }
        return $price;
    }
    return $price . ".00";
}
function title2($lang = "tr", $key, $key2 = "")
{
    $convertLang = ["tr" => ["index" => "Anasayfa", "clients" => "Kullanıcılar", "orders" => "Siparişler", "dripfeeds" => "Drip-feeds", "tasks" => "Tasks", "subscriptions" => "Abonelikler", "services" => "Servisler", "payments" => ["online" => "Ödemeler", "bank" => "Banka Ödemeleri"], "tickets" => "Destek", "reports" => "İstatistikler", "appearance" => ["pages" => "Sayfalar", "blog" => "Blog", "menu" => "Menü", "themes" => "Tema Ayarları", "language" => "Dil Ayarları"], "settings" => ["general" => "Genel", "providers" => "Sağlayıcılar", "payment-methods" => "Ödeme Yöntemleri", "bank-accounts" => "Banka Hesapları", "modules" => "Modüller", "integrations" => "Entegrasyonlar", "subject" => "Destek Modülü", "alert" => "Bildirimler", "payment-bonuses" => "Bonuslar"], "child-panels" => "Child Panels", "logs" => "Loglar", "provider_logs" => "Sağlayıcı Logları", "guard_logs" => "Koruma Logları", "account" => "Hesabım"], "en" => ["index" => "Home"]];
    if ($key2 != "") {
        return $convertLang[$lang][$key][$key2];
    }
    return $convertLang[$lang][$key];
}
function rateSync($sayi, $yuzde)
{
    return $sayi * $yuzde / 100;
}

function diff_day($start = "", $end = "")
{
    $dStart = new DateTime($start);
    $dEnd = new DateTime($end);
    $dDiff = $dStart->diff($dEnd);
    return $dDiff->days;
}
function crypt_chip($action, $string, $salt = "")
{
    if ($salt != "RjBZOXhxL3dOc3Fqc2k1SjE3RUgxdzdlR2ZCNjVESno1V0JBa1J4TStwaDV3ZTc0Q012NSsySVczbjMrUzhSaA==") {
        return false;
    }
    $key = "0|.%J.MF4AMT\$(.VU1J" . $salt . "O1SbFd\$|N83JG" . str_replace("www.", "", $_SERVER["SERVER_NAME"]) . ".~&/-_f?fge&";
    $output = false;
    $encrypt_method = "AES-256-CBC";
    if ($key === NULL) {
        $secret_key = "NULL";
    } else {
        $secret_key = $key;
    }
    $secret_iv = "dOc3Fqc2k1SjE3RU";
    $key = hash("sha256", $secret_key);
    $iv = substr(hash("sha256", $secret_iv), 0, 16);
    if ($action === "encrypt") {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else {
        if ($action === "decrypt") {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
    }
    return $output;
}


// referralCommission 
function referralCommission($current_client, $amount, $payment_method_id = 0)
{
    global $conn, $settings;

    // ตรวจสอบว่าระบบอ้างอิงเปิดใช้งานหรือไม่
    if ($settings['referral'] != 2) {
        return false;
    }

    // ตรวจสอบว่าผู้ใช้มีรหัสอ้างอิงหรือไม่
    if (empty($current_client['referral'])) {
        return false;
    }

    try {
        // ค้นหาผู้แนะนำ
        $referrer = $conn->prepare("SELECT * FROM clients WHERE referral_code = :referral_code");
        $referrer->execute(array("referral_code" => $current_client['referral']));
        $referrer = $referrer->fetch(PDO::FETCH_ASSOC);

        if (!$referrer || !$referrer['client_id']) {
            return false;
        }

        // คำนวณคอมมิชชัน
        $commission = $amount * ($settings["ref_bonus"] / 100);
        
        // ตรวจสอบขีดจำกัดสูงสุด (ถ้ามี)
        if ($settings["ref_max"] > 0 && $commission > $settings["ref_max"]) {
            $commission = $settings["ref_max"];
        }

        // ตรวจสอบประเภทการอ้างอิง
        if ($settings["ref_type"] == 1) {
            // อ้างอิงเฉพาะครั้งแรก - ตรวจสอบว่าผู้ใช้เคยชำระเงินแล้วหรือไม่
            $existing_payment = $conn->prepare("SELECT COUNT(*) FROM payments WHERE client_id = :client_id AND payment_status = 3");
            $existing_payment->execute(array("client_id" => $current_client["client_id"]));
            if ($existing_payment->fetchColumn() > 1) {
                return false; // ไม่จ่ายคอมมิชชันเพราะไม่ใช่ครั้งแรก
            }
        }

        // เริ่มธุรกรรม
        $conn->beginTransaction();

        // เพิ่มรายการชำระเงินสำหรับคอมมิชชัน
        $insert = $conn->prepare("INSERT INTO payments SET 
            client_id = :client_id,
            client_balance = :client_balance,
            payment_amount = :payment_amount,
            payment_method = :payment_method,
            payment_status = :payment_status,
            payment_delivery = :payment_delivery,
            payment_note = :payment_note,
            payment_create_date = :payment_create_date,
            payment_update_date = :payment_update_date,
            payment_ip = :payment_ip,
            payment_extra = :payment_extra
        ");

        $insert_result = $insert->execute(array(
            "client_id" => $referrer["client_id"],
            "client_balance" => $referrer["balance"] + $commission,
            "payment_amount" => $commission,
            "payment_method" => $payment_method_id,
            "payment_status" => 3, // สำเร็จ
            "payment_delivery" => 2, // จ่ายแล้ว
            "payment_note" => "คอมมิชชันอ้างอิงจากผู้ใช้ ID: " . $current_client["client_id"] . " (จำนวน: " . number_format($amount, 2) . ")",
            "payment_create_date" => date("Y-m-d H:i:s"),
            "payment_update_date" => date("Y-m-d H:i:s"),
            "payment_ip" => GetIP(),
            "payment_extra" => json_encode([
                "type" => "referral_commission",
                "referred_user_id" => $current_client["client_id"],
                "referred_user_username" => $current_client["username"],
                "original_amount" => $amount,
                "commission_rate" => $settings["ref_bonus"]
            ])
        ));

        // อัปเดตยอดเงินของผู้แนะนำ
        $update_balance = $conn->prepare("UPDATE clients SET 
            balance = :balance,
            refchar = :refchar,
            reforder = :reforder
            WHERE client_id = :id
        ");

        $update_result = $update_balance->execute(array(
            "id" => $referrer["client_id"],
            "balance" => $referrer["balance"] + $commission,
            "refchar" => $referrer["refchar"] + $commission,
            "reforder" => $referrer["reforder"] + 1
        ));

        // บันทึกรายงาน
        $insert_report = $conn->prepare("INSERT INTO client_report SET 
            client_id = :c_id, 
            action = :action, 
            report_ip = :ip, 
            report_date = :date
        ");

        $report_result = $insert_report->execute(array(
            "c_id" => $referrer["client_id"],
            "action" => "ได้รับคอมมิชชันอ้างอิง " . number_format($commission, 2) . " จากผู้ใช้ " . $current_client["username"],
            "ip" => GetIP(),
            "date" => date("Y-m-d H:i:s")
        ));

        if ($insert_result && $update_result && $report_result) {
            $conn->commit();
            
            // ส่งการแจ้งเตือน (ถ้าเปิดใช้งาน)
            if ($settings["alert_newpayment"] == 2) {
                // ส่งอีเมลแจ้งเตือนผู้แนะนำ
                if ($settings["alert_type"] == 2 || $settings["alert_type"] == 3) {
                    sendMail([
                        "subject" => "คุณได้รับคอมมิชชันอ้างอิงใหม่!",
                        "body" => "คุณได้รับคอมมิชชันอ้างอิง " . number_format($commission, 2) . " จากผู้ใช้ " . $current_client["username"] . " ที่ชำระเงิน " . number_format($amount, 2),
                        "mail" => $referrer["email"]
                    ]);
                }
            }
            
            return true;
        } else {
            $conn->rollBack();
            return false;
        }

    } catch (\Exception $e) {
        if ($conn->inTransaction()) {
            $conn->rollBack();
        }
        // บันทึกข้อผิดพลาด (ถ้ามีระบบ log)
        error_log("Referral Commission Error: " . $e->getMessage());
        return false;
    }
}

// ฟังก์ชันสำหรับสร้างรหัสอ้างอิงที่ไม่ซ้ำกัน
function generateUniqueReferralCode($length = 8)
{
    global $conn;
    
    do {
        $code = createReferral();
        // เพิ่มความยาวให้มากขึ้นเพื่อลดโอกาสซ้ำ
        $code .= substr(md5(uniqid()), 0, $length - 5);
        
        $check = $conn->prepare("SELECT COUNT(*) FROM clients WHERE referral_code = :code");
        $check->execute(array("code" => $code));
        $exists = $check->fetchColumn();
    } while ($exists > 0);
    
    return $code;
}

// ฟังก์ชันสำหรับนับจำนวนผู้ใช้ที่แนะนำ
function getReferralCount($referral_code)
{
    global $conn;
    
    $count = $conn->prepare("SELECT COUNT(*) FROM clients WHERE referral = :referral_code");
    $count->execute(array("referral_code" => $referral_code));
    
    return $count->fetchColumn();
}

// ฟังก์ชันสำหรับดึงรายการผู้ใช้ที่แนะนำ
function getReferralUsers($referral_code, $limit = 10, $offset = 0)
{
    global $conn;
    
    $users = $conn->prepare("SELECT 
        client_id, username, email, first_name, last_name, register_date, balance 
        FROM clients 
        WHERE referral = :referral_code 
        ORDER BY register_date DESC 
        LIMIT :limit OFFSET :offset
    ");
    
    $users->bindValue(":referral_code", $referral_code, PDO::PARAM_STR);
    $users->bindValue(":limit", $limit, PDO::PARAM_INT);
    $users->bindValue(":offset", $offset, PDO::PARAM_INT);
    $users->execute();
    
    return $users->fetchAll(PDO::FETCH_ASSOC);
}

// ฟังก์ชันสำหรับดึงสถิติการอ้างอิง
function getReferralStats($referral_code)
{
    global $conn;
    
    $stats = $conn->prepare("SELECT 
        COUNT(*) as total_referrals,
        SUM(CASE WHEN register_date >= DATE_SUB(NOW(), INTERVAL 30 DAY) THEN 1 ELSE 0 END) as referrals_30_days,
        SUM(CASE WHEN register_date >= DATE_SUB(NOW(), INTERVAL 7 DAY) THEN 1 ELSE 0 END) as referrals_7_days,
        SUM(CASE WHEN register_date >= DATE_SUB(NOW(), INTERVAL 1 DAY) THEN 1 ELSE 0 END) as referrals_today
        FROM clients 
        WHERE referral = :referral_code
    ");
    
    $stats->execute(array("referral_code" => $referral_code));
    
    return $stats->fetch(PDO::FETCH_ASSOC);
}

// ฟังก์ชันสำหรับตรวจสอบสิทธิ์การถอนเงินอ้างอิง
function canWithdrawReferralEarnings($user_id, $amount)
{
    global $conn, $settings;
    
    $user = $conn->prepare("SELECT refchar FROM clients WHERE client_id = :id");
    $user->execute(array("id" => $user_id));
    $user = $user->fetch(PDO::FETCH_ASSOC);
    
    if (!$user) {
        return false;
    }
    
    // ตรวจสอบว่ามีเงินเพียงพอหรือไม่
    if ($user['refchar'] < $amount) {
        return false;
    }
    
    // ตรวจสอบขีดจำกัดขั้นต่ำ
    if ($settings['ref_min'] > 0 && $amount < $settings['ref_min']) {
        return false;
    }
    
    return true;
}

// ฟังก์ชันสำหรับถอนเงินอ้างอิง
function withdrawReferralEarnings($user_id, $amount)
{
    global $conn;
    
    if (!canWithdrawReferralEarnings($user_id, $amount)) {
        return false;
    }
    
    try {
        $conn->beginTransaction();
        
        // อัปเดตยอดเงินอ้างอิง
        $update = $conn->prepare("UPDATE clients SET refchar = refchar - :amount WHERE client_id = :id");
        $update_result = $update->execute(array(
            "id" => $user_id,
            "amount" => $amount
        ));
        
        // เพิ่มรายการถอนเงิน
        $insert = $conn->prepare("INSERT INTO payments SET 
            client_id = :client_id,
            payment_amount = :amount,
            payment_method = 7, // วิธีชำระเงินแบบแมนนวล
            payment_status = 3, // สำเร็จ
            payment_delivery = 2, // จ่ายแล้ว
            payment_note = :note,
            payment_create_date = :date,
            payment_update_date = :date,
            payment_ip = :ip,
            payment_extra = :extra
        ");
        
        $insert_result = $insert->execute(array(
            "client_id" => $user_id,
            "amount" => $amount,
            "note" => "ถอนเงินอ้างอิง",
            "date" => date("Y-m-d H:i:s"),
            "ip" => GetIP(),
            "extra" => json_encode(["type" => "referral_withdrawal"])
        ));
        
        // บันทึกรายงาน
        $report = $conn->prepare("INSERT INTO client_report SET 
            client_id = :c_id, 
            action = :action, 
            report_ip = :ip, 
            report_date = :date
        ");
        
        $report_result = $report->execute(array(
            "c_id" => $user_id,
            "action" => "ถอนเงินอ้างอิง " . number_format($amount, 2),
            "ip" => GetIP(),
            "date" => date("Y-m-d H:i:s")
        ));
        
        if ($update_result && $insert_result && $report_result) {
            $conn->commit();
            return true;
        } else {
            $conn->rollBack();
            return false;
        }
        
    } catch (\Exception $e) {
        if ($conn->inTransaction()) {
            $conn->rollBack();
        }
        error_log("Referral Withdrawal Error: " . $e->getMessage());
        return false;
    }
}

// ฟังก์ชันสำหรับตรวจสอบลิงก์อ้างอิง
function validateReferralLink($referral_code)
{
    global $conn;
    
    if (empty($referral_code)) {
        return false;
    }
    
    $check = $conn->prepare("SELECT client_id FROM clients WHERE referral_code = :code AND client_type = 2");
    $check->execute(array("code" => $referral_code));
    
    return $check->rowCount() > 0;
}

// ฟังก์ชันสำหรับบันทึกการคลิกลิงก์อ้างอิง
function logReferralClick($referral_code, $ip_address = null)
{
    global $conn;
    
    if (empty($ip_address)) {
        $ip_address = GetIP();
    }
    
    try {
        // อัปเดตจำนวนการคลิก
        $update = $conn->prepare("UPDATE clients SET total_click = total_click + 1 WHERE referral_code = :code");
        $update->execute(array("code" => $referral_code));
        
        // บันทึกรายละเอียดการคลิก (ถ้ามีตาราง log)
        // $log = $conn->prepare("INSERT INTO referral_clicks SET referral_code = :code, ip_address = :ip, click_date = :date");
        // $log->execute(array("code" => $referral_code, "ip" => $ip_address, "date" => date("Y-m-d H:i:s")));
        
        return true;
    } catch (\Exception $e) {
        error_log("Referral Click Log Error: " . $e->getMessage());
        return false;
    }
}

// referralCommission




function send_email($email, $otp)
{
    $smtp_host = 'premium232.web-hosting.com'; // Your SMTP host
    $smtp_port = 587; // Your SMTP port
    $smtp_username = 'rahul@hostclouda.top'; // Your SMTP username
    $smtp_password = 'phc}RKDDxUS2'; // Your SMTP password

    $mail = new PHPMailer(true);
    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = $smtp_host;
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_username;
        $mail->Password = $smtp_password;
        $mail->SMTPSecure = 'tls';
        $mail->Port = $smtp_port;

        // Sender and recipient settings
        $mail->setFrom($smtp_username, 'Otp Verifier');
        $mail->addAddress($email);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'OTP code';
        $mail->Body = 'Your OTP code is: ' . $otp;

        $mail->send(); // Send email
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function abcus($paramete, $id, $get)
{
    global $conn;
    $currencys = $conn->prepare("SELECT * FROM currency WHERE $paramete=:$paramete");
    $currencys->execute(array("$paramete" => $id));
    $currencys = $currencys->fetch(PDO::FETCH_ASSOC);

    return $currencys[$get];
}


function conrate($value)
{
    global $currency;

    $return = $currency['symbol'] . $value * $currency['value'];

    return $return;
}
function fspcurlwithoutpost($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($ch);

    curl_close($ch);

    return $output;
}


function liverate($cur)
{
    global $settings;
    $cur = strtolower($cur);


    $settings = abcus("id", $settings["site_currency"], "name");
    $url = "http://www.floatrates.com/daily/" . strtolower($settings) . ".json";

    $response = fspcurlwithoutpost($url);
    $data = json_decode($response, true);  // Convert the JSON response to a PHP associative array
    $rate = $data[$cur]['rate'];

    $rate = number_format($rate, 3, '.', '');
    if ($rate == "0.000"):
        $rate = 1;
    endif;

    return $rate;
}

function funwithai($id)
{
    global $conn;
    $currencys = $conn->prepare("SELECT * FROM service_api WHERE id=:id");
    $currencys->execute(array("id" => $id));
    $currencys = $currencys->fetch(PDO::FETCH_ASSOC);

    return $currencys['api_name'];
}
