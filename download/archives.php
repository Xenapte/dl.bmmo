<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ballance Massive Multiplayer Online - Archives</title>
  <link rel="stylesheet" href="../styles/common.css">
  <style>
  </style>
</head>
<body>
  <h2>Ballance Massive Multiplayer Online - Release Archives</h2>
  <h3>About</h3>
  <p>This page provides older releases of BMMO client mods. They are here for purely archival purposes; only the latest version is supported. For older server executables, please refer to <a href="https://github.com/Swung0x48/BallanceMMO/actions">GitHub Actions</a>.</p>
  <h3>List</h3>
  <table id="version-list" class="colored">
    <tr><th>Version</th><th>Time</th><th>Downloads</th></tr>
    <?php
      include 'scan_dir.php';

      $files = scan_dir('../files');
      date_default_timezone_set("UTC");
      foreach ($files as $file) {
        if (preg_match('/^(.+)_((?:[0-9\.]+)?(?:-(?:alpha|beta|rc)[0-9]+)?)\.bmod$/', $file, $matches)) {
          echo "<tr><td>$matches[2]</td><td>" . filemtime("../files/$file") . "</td><td><a href='../files/$file'>Mod only</a> &#160;<b>·</b>&#160; <a href='./standalone?file=$file'>Standalone Package</a></td></tr>";
        };
      };
    ?>
  </table>
  <footer>
    <p><a href="../">Return to Home Page</a></p>
  </footer>
  <script>
    function getTime(timeExp) {
      let time, month, date, hour, minute, second,
          fullDate, fullTime;
      time = new Date(timeExp);
      month = time.getMonth() + 1;
      date = time.getDate();
      hour = time.getHours();
      minute = time.getMinutes();
      second = time.getSeconds();
      if (month < 10) {month = "0" + month};
      if (date < 10) {date = "0" + date};
      if (hour < 10) {hour = "0" + hour};
      if (minute < 10) {minute = "0" + minute};
      if (second < 10) {second = "0" + second};
    
      fullDate = time.getFullYear() + "-" + month + "-" + date;
      fullTime = hour + ":" + minute + ":" + second;
      return fullDate + " " + fullTime;
    };

    function init() {
      document.getElementById("version-list")
        .querySelectorAll("tr").forEach(tr => {
          let td = tr.getElementsByTagName("td");
          if (td.length > 2)
            td[1].innerHTML = getTime(1000 * td[1].innerHTML);
        });
    };

    init();
  </script>
</body>
</html>