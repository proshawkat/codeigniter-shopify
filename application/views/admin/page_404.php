<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Page not found</title>
    <style>
        .page-wrap {
            min-height: 100vh;
        }
        .reason-explanation {
            background: #ce59b5;
            color: #FFF;
            max-width: 768px;
            margin: 0 auto;
            padding: 10px;
            border-radius: 2px;
            box-shadow: 0 2px 4px #555;
            font-size: 14px;
            letter-spacing: 2px;
            font-family: arial, sans-serif;
        }
    </style>
</head>
<body>
<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <span class="display-1 d-block">404</span>
                <div class="mb-4 lead">The page you are looking for was not found.</div>
                <?php if(isset($reason)){ ?>
                    <div class="reason-explanation">
                        <?php echo $reason;?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>