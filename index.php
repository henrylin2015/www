<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>我的主页</title>
</head>
<body>
<h3>项目根目录：<?php echo $_SERVER['DOCUMENT_ROOT']?></h3>
<h3>本机IP:<?php echo $_SERVER['REMOTE_ADDR'];?></h3>
<h3>端口号：<?php echo $_SERVER['SERVER_PORT'];?></h3>
<h3>浏览器：<?php echo $_SERVER['HTTP_USER_AGENT'];?></h3>
<h3>HTTP_HOST:<?php echo $_SERVER['HTTP_HOST'];?></h3>
</body>
<html>
