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
    <link rel="stylesheet" href="./bulma.css" />
    <link rel="stylesheet" href="./style.css" />
</head>

<?php

include_once 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM winner WHERE ordernumber != 0 AND updated = 0";
$result = $conn->query($sql);
?>


<body>
    <div id="wrapper">
        <h1>
            <img src="/logo.jpg" alt="" width="360">
        </h1>
        <div class="table-container">
            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Prize</th>
                        <th>Order updated?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0) : ?>
                    <tr>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                        <td><?php echo $row["ordernumber"] ?></td>
                        <td>
                            <?php
                                    switch ($row["prize"]):
                                        case 2:
                                            echo "Golden Waffle";
                                            break;
                                        case 3:
                                            echo "St Perpette Soap";
                                            break;
                                        case 4:
                                            echo "Tote Bag";
                                            break;
                                        case 5:
                                            echo "Baby Foulard";
                                            break;
                                        case 6:
                                            echo "50e voucher";
                                            break;
                                        case 7:
                                            echo "300e voucher";
                                            break;
                                        default:
                                            echo "This is not working";
                                    endswitch;
                                    ?>
                        </td>
                        <td><button class="button is-small is-info"
                                data-order="<?php echo $row["ordernumber"] ?>">Done</button></td>
                        <?php endwhile; ?>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<?php

$conn->close();

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- import the webpage's client-side javascript file -->
<script src="js/doneorder.js"></script>

</html>