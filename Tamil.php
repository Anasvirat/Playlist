<?php
$input = "https://anasvirat.github.io/PHP/513.m3u8"; // your stream URL
$outputFolder = "output_hls";
$duration = "00:15:00";

if (!file_exists($outputFolder)) {
    mkdir($outputFolder, 0777, true);
}

$cmd = "ffmpeg -y -i \"$input\" -t $duration -c copy -f hls ".
       "-hls_time 10 -hls_list_size 0 -hls_segment_filename \"$outputFolder/segment_%03d.ts\" ".
       "\"$outputFolder/playlist.m3u8\"";

exec($cmd . " 2>&1", $log, $status);

echo "<pre>";
echo "Command: $cmd\n\n";
echo implode("\n", $log);
echo "\nExit code: $status";
echo "</pre>";
?>
