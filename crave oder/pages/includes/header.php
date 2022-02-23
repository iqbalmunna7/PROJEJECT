
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css" />

</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <a href="action.php?pages=home" class="navbar-brand">CRAVE ORDER</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="action.php?pages=home" class="nav-link">FOOD</a></li>

                <li class="nav-item"><a href="action.php?pages=login" class="nav-link">Log in</a></li>

                <?php if (isset($_SESSION['id'])) { ?>
                    <li class="nav-item"><a href="action.php?pages=file-upload" class="nav-link">Food Upload</a></li>
                    <li class="nav-item"><a href="action.php?pages=logout" class="nav-link">Logout</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>

