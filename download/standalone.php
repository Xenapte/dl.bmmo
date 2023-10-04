<?php
function generate_package($filename, $version) {
  if (file_exists("../packages/BallanceMMO_$version.zip")){
    return true;
  } else if (file_exists("../files/$filename")) {
    if (!preg_match('/^([0-9]+)\.([0-9]+)\.([0-9]+)(?:-(alpha|beta|rc)([0-9])+)?$/', $version, $matches))
      return false;
    $dep_version = "v1";
    if (intval(sprintf("%s%03s%03s", $matches[1], $matches[2], $matches[3])) >= 3005002)
      $dep_version = "v2";
    shell_exec('bash ../temp/package.sh ' . escapeshellarg($filename) . ' ' . escapeshellarg($version) . ' ' . $dep_version);
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