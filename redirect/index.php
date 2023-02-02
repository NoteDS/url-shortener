<?php
require_once('config.php');

  $new_url = "";
if (isset($_GET)) {
  foreach ($_GET as $key => $val) {
    $u = mysqli_real_escape_string($conn, $key);
    $new_url = str_replace('/', '', $u);
  }
  $sql = mysqli_query($conn, "SELECT * FROM url WHERE shorten_url = '{$new_url}'");
  if (mysqli_num_rows($sql) > 0) {
    $sql2 = mysqli_query($conn, "UPDATE url SET clicks = clicks + 1 WHERE shorten_url = '{$new_url}'");
    if ($sql2) {
      $get_row = mysqli_fetch_assoc($sql);

      if ($get_row['status'] == 'REMOVED') {
        Header('Location: ' + $config['domain'] + '/removed.php');
        die();
      } elseif ($get_row['status'] != 'ACTIVE') {
        Header('Location: ' + $config['domain'] + '/suspended.php');
        die();
      } else {
        Header('Location: ' . $get_row['full_url']);
        die();
      }
    }
  }
}
Header('location: ' . $config['domain']);
$conn->close();