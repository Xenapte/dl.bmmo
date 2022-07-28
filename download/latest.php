<?php
// $filename = scandir('../files/', SCANDIR_SORT_DESCENDING)[0];
include 'scan_dir.php';

$files = scan_dir('../files');
foreach ($files as $filename) {
  if (preg_match('/^(.+)_((?:[0-9\.]+)?(?:-(?:alpha|beta|rc)[0-9]+)?)\.bmod$/', $filename, $matches)) {
    if (@$_GET['version-only'] == "true") {
      header("Content-Type: application/json; charset=utf-8");
      echo json_encode(array("version" => $matches[2], "time" => filemtime("../files/$filename")));
    } else {
      header("Location: ../files/$filename");
    };
    exit();
  };
};
echo "Error finding latest version";
?>