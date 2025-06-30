<?php

// ตั้งค่าธีมถ้า theme ถูกส่งมาและเป็น 1 หรือ 2
if (isset($_GET["theme"]) && ($_GET["theme"] == 1 || $_GET["theme"] == 2)) {
    $updateTheme = $conn->prepare('UPDATE clients SET admin_theme=:admin_theme WHERE client_id=:id');
    $updateTheme->execute(array(
        'admin_theme' => $_GET['theme'],
        'id' => $user["client_id"]
    ));

    if (!empty($_GET["refer"])) {
        header("Location:" . site_url('admin/' . $_GET["refer"]));
        exit;
    }
}

// ถ้าไม่มี refer ให้ redirect ตามสิทธิ์
if (empty($_GET["refer"])) {
    if (!empty($user["access"]["users"])) {
        header("Location:" . site_url("admin/clients"));
        exit;
    } elseif (!empty($user["access"]["orders"])) {
        header("Location:" . site_url("admin/orders"));
        exit;
    } elseif (!empty($user["access"]["dashboard"])) {
        header("Location:" . site_url("admin/dashboard"));
        exit;
    } elseif (!empty($user["access"]["subscriptions"])) {
        header("Location:" . site_url("admin/subscriptions"));
        exit;
    } elseif (!empty($user["access"]["dripfeed"])) {
        header("Location:" . site_url("admin/dripfeed"));
        exit;
    } elseif (!empty($user["access"]["services"])) {
        header("Location:" . site_url("admin/services"));
        exit;
    } elseif (!empty($user["access"]["payments"])) {
        header("Location:" . site_url("admin/payments"));
        exit;
    } elseif (!empty($user["access"]["tickets"])) {
        header("Location:" . site_url("admin/tickets"));
        exit;
    } elseif (!empty($user["access"]["reports"])) {
        header("Location:" . site_url("admin/reports"));
        exit;
    } elseif (
        !empty($user["access"]["logs"])
    ) {
        header("Location:" . site_url("admin/logs"));
        exit;
    } elseif (
        !empty($user["access"]["general_settings"]) ||
        !empty($user["access"]["payments_settings"]) ||
        !empty($user["access"]["providers"]) ||
        !empty($user["access"]["payments_bonus"]) ||
        !empty($user["access"]["alert_settings"]) ||
        !empty($user["access"]["modules"])
    ) {
        header("Location:" . site_url("admin/settings"));
        exit;
    } elseif (
        !empty($user["access"]["pages"]) ||
        !empty($user["access"]["blog"]) ||
        !empty($user["access"]["menu"]) ||
        !empty($user["access"]["themes"]) ||
        !empty($user["access"]["language"])
    ) {
        header("Location:" . site_url("admin/appearance"));
        exit;
    }
}

// แสดงหน้าหลักถ้าไม่มีการ redirect
require admin_view('index');
