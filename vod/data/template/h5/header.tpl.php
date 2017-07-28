<!DOCTYPE HTML>
<html>

<head>
    <base href="<?php echo $db_wwwurl;?>/" />
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $db_charset;?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $db_wwwname;?></title>
    <meta name="keywords" content="<?php echo $db_keywords;?>" />
    <meta name="description" content="<?php echo $db_description;?>" />
    <!-- Bootstrap core CSS -->
    <link href="image/h5/Bootstrap/bootstrap.css" rel="stylesheet">
    <link href="image/h5/Main.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="JS/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="JS/jquery.js"></script>
</head>

<body>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <h3>
                    <?php echo $db_wwwname;?>
                </h3>
                <ul class="nav nav-pills">
                    <?php include gettpl('panel_menu'); ?>                    <li class="dropdown pull-right">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><em class="glyphicon glyphicon-align-justify"></em></a>
                        <?php include gettpl('panel_nav'); ?>                    </li>
                </ul>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-3 column">
            </div>
            <div class="col-md-6 column">