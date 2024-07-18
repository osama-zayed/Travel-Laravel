<?php


$messages = [

    // general messages
    'process_success_message' => 'process_success_message',
    'successful_process_message' => 'successful_process_message',
    'store_success_message' => 'store_success_message',
    'update_success_message' => 'update_success_message',
    'destroy_success_message' => 'destroy_success_message',

];

// Entity Name => Display Text
$entities = [
    'article' => 'المقال',
    'category' => 'القسم',
    'contact' => 'طلب التواصل',
];

foreach ($entities as $entity_name => $display_text) {
    $messages[$entity_name . '_store_success_message'] = 'تم إضافة ' . $display_text . ' successful';
    $messages[$entity_name . '_update_success_message'] = 'تم تحديث ' . $display_text . ' successful';
    $messages[$entity_name . '_destroy_success_message'] = 'تم حذف ' . $display_text . ' successful';
}


return $messages;
