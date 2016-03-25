<?php

$txt = $_POST['txt'];
$text_arr = array("text"=>$txt);
		$cmd='C:\curl\curl -u "ba654a3b-34d9-4264-9985-043b07e6cf8b":"l9bttme7O5Wm" -H "Content-Type: application/json" -d "'.addcslashes(json_encode($text_arr), '"'). '" "https://gateway.watsonplatform.net/tone-analyzer-beta/api/v3/tone?version=2016-02-11"';
		exec($cmd,$result);
		$retrieve_data=json_decode($result[0]);
		$tone_categories=$retrieve_data->document_tone->tone_categories;
		$emotion_tones=$tone_categories[0]->tones;
		$writing_tones=$tone_categories[1]->tones;
		$social_tones=$tone_categories[2]->tones;
		echo "<h3>Emotion Summary</h3>";
		foreach ($emotion_tones as $item) {
			echo $item->tone_name." Score : ".($item->score*100)."Percent<br/>";
		}
		echo "<h3>Writing Summary</h3>";
		foreach ($writing_tones as $item) {
			echo $item->tone_name." Score : ".($item->score*100)."Percent<br/>";
		}
		echo "<h3>Social Summary</h3>";
		foreach ($social_tones as $item) {
			echo $item->tone_name." Score : ".($item->score*100)."Percent<br/>";
		}
	?>