<?php
  include($_SERVER['DOCUMENT_ROOT']."/bin/session.php");
  if(session_destroy()) {
    header("Location: login");
  }
?>