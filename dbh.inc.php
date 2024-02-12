<?php

$conn = mysqli_connect('localhost', 'root', '', 'estilara_comments');

if (!$conn) {
    die("connection failed: ".mysqli_connect_error());
}