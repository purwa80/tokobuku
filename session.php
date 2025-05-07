<?php
session_start();

function sudah_login()
{
  return isset($_SESSION['username']);
}
