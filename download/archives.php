<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ballance Massively Multiplayer Online - Archives</title>
  <link rel="stylesheet" href="../styles/common.css">
  <style>
  </style>
</head>
<body>
  <h2>Ballance Massively Multiplayer Online - Release Archives</h2>
  <h3>About</h3>
  <p>This page provides older releases of BMMO client mods. They are here purely for archival purposes; only the latest version is supported. For older server executables, please refer to <a href="https://github.com/Swung0x48/BallanceMMO/actions">builds at GitHub Actions</a>.</p>
  <p>For versions <b>3.5.1 or below</b> you must also use the <a href="../files/BMMO-dependencies-2022.zip">2022 dependency package</a> if you wish to download the mod and its dependencies separately.</p>
  <h3>List</h3>
  <table id="version-list" class="colored">
    <tr><th>Version</th><th>Time</th><th>Downloads</th></tr>
    <?php
      include 'rescan.php';

      $data = json_decode(file_get_contents('../files/data.json'), true);
      if (time() - @$data['generation_time'] > 14400) {
        generate_data();
        $data = json_decode(file_get_contents('../files/data.json'), true);
      };
      date_default_timezone_set("UTC");
      foreach ($data["files"] as $file) {
        echo "<tr><td>${file['version']}</td><td>${file['time']}</td><td><a href='../files/${file['filename']}'>Mod only</a> &#160;<b>·</b>&#160; <a href='./standalone?file=${file['filename']}'>Standalone Package</a></td></tr>";
      };
    ?>
  </table>
  <footer>
    <p><a href="../">Return to Home Page</a></p>
  </footer>
  <script>
    function init() {
      document.getElementById("version-list")
        .querySelectorAll("tr").forEach(tr => {
          let td = tr.getElementsByTagName("td");
          if (td.length > 2)
            td[1].innerHTML = (new Date(1000 * td[1].innerHTML)).toLocaleString([], {hour12: false});
        });
    };

    init();
  </script>
</body>
</html>