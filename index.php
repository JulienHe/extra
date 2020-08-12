<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="A cool thing made with Glitch" />

    <title>EXTRA-ORDINAIRE Wheel</title>

    <link id="favicon" rel="icon" href="./wheel.jpg" type="image/x-icon" />
    <!-- import the webpage's stylesheet -->
    <link rel="stylesheet" href="./bulma.css" />
    <link rel="stylesheet" href="./style.css" />
</head>

<body>
    <div id="wrapper">
        <h1>
            <img src="/logo.jpg" alt="" width="360">
        </h1>
        <form action="checkOrder.php" id="orderform">
            <h2>Please type the code we sent you by email</h2>
            <div class="field">
                <div class="control">
                    <input class="input" id="orderNumber" name="orderNumber" type="text" placeholder="Your code"
                        required>
                </div>
            </div>
            <button type="submit" class="button is-primary">Submit</button>
        </form>
    </div>

    <div class="notif">
        <div class="notification is-danger">
            The code you entered is not valid.
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- import the webpage's client-side javascript file -->
    <script src="js/index.js" defer></script>
</body>

</html>
