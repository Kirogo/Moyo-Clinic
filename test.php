<?php

require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.

use Orhanerday\OpenAi\OpenAi;

$open_ai_key = "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";
$open_ai = new OpenAi($open_ai_key);

$complete = $open_ai->completion([
    'model' => 'davinci',
    'prompt' => 'WHAT IS GOOGLE?',
    'temperature' => 0.9,
    'max_tokens' => 150,
    'frequency_penalty' => 0,
    'presence_penalty' => 0.6,
]);
$data = json_decode($complete, true);
echo $data['id'];
echo "<br>";
echo $data['object'];
echo "<br>";
echo $data['created'];
echo "<br>";
echo $data['model'];
echo "<br>";
echo $response = $data['choices'][0]['text'];

echo "<br>";

