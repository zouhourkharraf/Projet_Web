<?php
session_start();
session_destroy();

header('Location:login_back_office.php'); 