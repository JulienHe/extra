<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="A cool thing made with Glitch" />

  <title>EXTRA-ORDINAIRE Wheel</title>

  <link id="favicon" rel="icon" href="https://glitch.com/edit/favicon-app.ico" type="image/x-icon" />
  <!-- import the webpage's stylesheet -->
  <link rel="stylesheet" href="./style.css" />
</head>

<body>
  <?php

include_once 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['order'])) {
    $number = $_GET['order'];
    $sql = "SELECT id FROM orders WHERE ordernumber = $number";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $sql = "SELECT prize FROM winner WHERE ordernumber = $number";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            ?>
        <div id="wrapper" class="wheely">
          <h1>
            <img src="/logo.jpg" alt="" width="360">
          </h1>
          <p>You already won your prize! <br />If you have any issue, contact us +32.460 96 41 99</p>
        </div>
        <?php
} else {
            ?>

        <div id="wrapper" class="wheely">
          <h1>
            <img src="/logo.jpg" alt="" width="360">
          </h1>
          <div class="the__wheel">
            <div id="wheel">
              <div id="inner-wheel">
                <div class="sec"><span>BABY SCARF</span></div>
                <div class="sec"><span>TOTE BAG</span></div>
                <div class="sec"><span>St Perpette soap</span></div>
                <div class="sec"><span>Golden WAFFLE</span></div>
                <div class="sec"><span>300€ Voucher</span></div>
                <div class="sec"><span>50€ Voucher</span></div>
              </div>
            </div>

            <div id="spin">
              <div id="inner-spin"></div>
            </div>
          </div>
          <p>Ton text a 2 balles fdp</p>
        </div>
        <input type="hidden" value="1">
        <div id="txt"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- import the webpage's client-side javascript file -->
        <script src="js/script.js" defer></script>

  <?php
}
    } else {
        ?>
        <div id="wrapper" class="wheely">
          <h1>
            <img src="/logo.jpg" alt="" width="360">
          </h1>
          <p>Oups, this code doesn't exist!</p>
        </div>
        <?php
    }
    $conn->close();
}
?>
</body>

</html>