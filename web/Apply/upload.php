<?php

$image = $_FILES["image"];


move_uploaded_file($file["temp_name"], "uploads/" . $file["name"]);

header("location: form.php");




















