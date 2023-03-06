<?php
include 'includes/dbh.inc.php';
require __DIR__ . '/vendor/autoload.php';

use Orhanerday\OpenAi\OpenAi;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $inputData = $_POST["inputData"];
  $open_ai_key = "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";
  $open_ai = new OpenAi($open_ai_key);
  $complete = $open_ai->completion([
    'model' => 'davinci',
    'prompt' =>  'heart disease indicated by the following signs and symptoms '. $inputData. 'list other symptoms',
    'temperature' => 0.9,
    'max_tokens' => 150,
    'frequency_penalty' => 0,
    'presence_penalty' => 0.6,
  ]);
  $data = json_decode($complete, true);
  $response = $data['choices'][0]['text'];
  echo "Input data: " . $response;
}
