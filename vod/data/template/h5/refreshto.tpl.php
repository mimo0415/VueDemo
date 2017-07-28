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
    <link href="/vod/image/h5/Bootstrap/bootstrap.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="JS/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/vod/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="alert alert-success alert-dismissable">
                    <h4>
                        注意!
                    </h4><?php echo $content;?><br><br><a href="<?php echo $url;?>" class="alert-link">如果您的浏览器没有自动跳转,请点击这里</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="JS/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>