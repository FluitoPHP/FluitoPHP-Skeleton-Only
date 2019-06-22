<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $this->Title(); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta content="#c83737" name="theme-color">
        <meta content="#c83737" name="msapplication-navbutton-color">
        <meta content="#c83737" name="apple-mobile-web-app-status-bar-style">
        <link href="<?php echo $this->URL('resources/img/logo-57.png'); ?>" rel="apple-touch-icon-precomposed">
        <link href="<?php echo $this->URL('resources/img/logo-72.png'); ?>" sizes="72x72" rel="apple-touch-icon-precomposed">
        <link href="<?php echo $this->URL('resources/img/logo-114.png'); ?>" sizes="114x114" rel="apple-touch-icon-precomposed">
        <link href="<?php echo $this->URL('resources/img/logo-144.png'); ?>" sizes="144x144" rel="apple-touch-icon-precomposed">
        <link rel="Shortcut Icon" href="<?php echo $this->URL('resources/img/favicon.png'); ?>" type="image/png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="<?php echo $this->URL('resources/html5shiv.min.js'); ?>" async></script>
        <script src="<?php echo $this->URL('resources/respond.min.js'); ?>"  async></script>
        <?php $this->Events()->Run('Head'); ?>
    </head>
    <body class="container FluitoPHP">
        <div>
            <?php $this->Events()->Run('Header'); ?>