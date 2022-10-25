<?php
include 'rescan.php';

$data = json_decode(file_get_contents('../files/data.json'), true);
if (time() - @$data['generation_time'] > 14400) {
  generate_data();
  $data = json_decode(file_get_contents('../files/data.json'), true);
};

if (count($data['files']) < 1) {
  echo 'Error finding latest version';
} else {
  if (@$_GET['version-only'] == 'true') {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(array('version' => $data['files'][0]['version'], 'time' => $data['files'][0]['time']));
  } else {
    header('Location: ../files/' . $data['files'][0]['filename']);
  };
};
?>