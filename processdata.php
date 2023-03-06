<?php
include 'includes/dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $inputData = $_POST["inputData"];
  $json_data = file_get_contents('diagnosis.json');
  $data = json_decode($json_data, true);

  $matching_prompt = null;
  foreach ($data as $prompt) {
    if ($prompt['prompt'] === $inputData) {
      $matching_prompt = $prompt;
      break;
    }
  }
  $completion_text = $matching_prompt ? $matching_prompt['completion'] : null;
  echo "Possible Heart Disease: " . $completion_text;
}
