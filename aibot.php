<?php
include 'includes/dbh.inc.php';
require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.

use Orhanerday\OpenAi\OpenAi;
if($conn){
$user_messages = mysqli_real_escape_string($conn, $_POST['messageValue']);
$open_ai_key = "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";
$open_ai = new OpenAi($open_ai_key);

$complete = $open_ai->completion([
    'model' => 'davinci:ft-personal:hearttrial-6-2023-03-02-01-23-17',
    'prompt' => $user_messages,
    'temperature' => 0.9,
    'max_tokens' => 150,
    'frequency_penalty' => 0,
    'presence_penalty' => 0.6,
]);
$data = json_decode($complete, true);
echo $response = $data['choices'][0]['text'];
}else{
  echo "connection Failed " . mysqli_connect_errno();
}

