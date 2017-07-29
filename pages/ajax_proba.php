<?php
header("Cache-Control","no-store");
echo"<br>Данные пришли";
if (isset($_POST[name])){echo"<br>name = $_POST[name]";}
if (isset($_POST[email])){echo"<br>email = $_POST[email]";}
if (isset($_POST[phone])){echo"<br>phone = $_POST[phone]";}