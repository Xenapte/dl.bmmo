<?php
include 'scan_dir.php';
// $filename = scandir('../files/', SCANDIR_SORT_DESCENDING)[0];

function generate_data() {
  $data = array("generation_time" => time(), "files" => array());
  $files = scan_dir('../files');
  foreach ($files as $file) {
    if (preg_match('/^(.+)_((?:[0-9\.]+)?(?:-(?:alpha|beta|rc)[0-9]+)?)\.bmod$/', $file, $matches)) {
      $data["files"][] = array(
        "version" => $matches[2],
        "time" => filemtime("../files/$file"),
        "filename" => $file,
      );
    };
  };
  file_put_contents("../files/data.json", json_encode($data));
};

if (@$_GET["forced"] = "true")
  generate_data();
?>