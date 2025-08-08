<?php
http_response_code(404);
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ballance Massively Multiplayer Online - 404 Not Found</title>
<link rel="stylesheet" href="/styles/common.css">
</head>
<body>
<h2>Ballance Massively Multiplayer Online - 404 Not Found</h2>
<p>The link you are trying to visit does not exist:<br>
<code><?PHP
echo htmlspecialchars("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", ENT_QUOTES, 'UTF-8');
?></code>
</p>
<p>This is pretty self-explanatory unless you don't know how to read.</p>
<footer>
<p><a href="../">Return to Home Page</a></p>
<p><cite>Page created by BallanceBug on 2025-08-08.</cite></p>
</footer>
</body>
</html>
