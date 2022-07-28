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

include 'scan_dir.php';

if (isset($_GET['file'])) {
  $files = array($_GET['file']);
} else {
  $files = scan_dir('../files/');
};

foreach ($files as $filename) {
  if (preg_match('/^(.+)_((?:[0-9\.]+)?(?:-(?:alpha|beta|rc)[0-9]+)?)\.bmod$/', $filename, $matches)) {
    if (generate_package($filename, $matches[2])) {
      header("Location: ../packages/BallanceMMO_$matches[2].zip");
      exit();
    } else {
      break;
    };
  };
};

echo "Error generating package.";
?>