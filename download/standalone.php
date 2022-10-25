<?php
function generate_package($filename, $version) {
  if (file_exists("../packages/BallanceMMO_$version.zip")){
    return true;
  } else if (file_exists("../files/$filename")) {
    shell_exec('bash ../temp/package.sh ' . escapeshellarg($filename) . ' ' . escapeshellarg($version));
    return true;
  };
  return false;
};

include 'rescan.php';

if (isset($_GET['file'])) {
  $filename = $_GET['file'];
} else {
  $data = json_decode(file_get_contents('../files/data.json'), true);
  if (time() - @$data['generation_time'] > 14400) {
    generate_data();
    $data = json_decode(file_get_contents('../files/data.json'), true);
  };
  if (count($data['files']) < 1) {
    echo "Error generating package.";
    exit();
  };
  $filename = $data['files'][0]['filename'];
};

if (preg_match('/^(.+)_((?:[0-9\.]+)?(?:-(?:alpha|beta|rc)[0-9]+)?)\.bmod$/', $filename, $matches)) {
  if (generate_package($filename, $matches[2])) {
    header("Location: ../packages/BallanceMMO_$matches[2].zip");
    exit();
  };
};

echo "Error generating package.";
?>