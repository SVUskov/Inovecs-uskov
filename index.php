<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inovecs test task</title>
    <meta charset="UTF-8"/>

    <!--  jQuery v2.2.4  -->
    <script type="text/javascript" src="vendors/components/jquery/jquery.min.js"></script>

    <!--  Bootstrap v3.3.6  -->
    <link rel="stylesheet" href="vendors/twbs/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="vendors/twbs/bootstrap/dist/css/bootstrap-theme.min.css"/>
    <script type="text/javascript" src="vendors/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php include 'templates/search_block.php'; ?>
        </div>
        <div class="col-md-8">
            <?php include 'templates/results_block.php'; ?>
        </div>
    </div>
</div>

</body>
</html>