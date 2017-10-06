<?php session_start();
if (!empty($_SESSION['connect']) && isset($_SESSION) || isset($_COOKIE['connexion']) && !empty($_COOKIE['connexion'])) {
    if (!empty($_SESSION)) {
        $user = $_SESSION['login'];
    } else {
        $userLog = explode('---', $_COOKIE['connexion']);
        $user = $userLog[0];
    }
}

if (isset($_POST['remember'])){
    setcookie('connexion', $_POST['loginname'] .'---' . sha1($_POST['loginname']) , time() + 3600 * 24 * 3);
}

if (isset($_POST['disconnect'])) {
    setcookie('panier','', time() -3600);
    unset($_COOKIE['panier']);

    setcookie('connexion','', time() -3600);
    unset($_COOKIE['connexion']);

    session_unset();
    session_destroy();

}

if (!empty($_GET['add_to_cart'])){
    if (isset($_COOKIE['panier'])){
        $arrayCart = unserialize($_COOKIE['panier']);
        $arrayCart[] = $_GET['add_to_cart'];
        $arrayCart = serialize($arrayCart);
        setcookie('panier',$arrayCart, time() + 3600 * 24 * 3);

    }else{
        $arrayCart = array($_GET['add_to_cart']);
        $arrayCart = serialize($arrayCart);
        setcookie('panier',$arrayCart, time() + 3600 * 24 * 3);
    }
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" dir="ltr">
<head>
  <title>The Cookie Factory</title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/styles.css" />

<body>
    <header>
        <!-- MENU ENTETE -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php" >
                        <img class="pull-left" src="assets/img/cookie_funny_clipart.png" alt="The Cookies Factory logo">
                        <h1>The Cookies Factory</h1>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Chocolates chips</a></li>
                        <li><a href="#">Nuts</a></li>
                        <li><a href="#">Gluten full</a></li>
                        <li><a><form action="login.php" method="post"><input type="submit" class="btn btn-danger navbar-btn" name="disconnect" value="LOGOUT"></form></a></li>
                        <li>
                            <a href="cart.php" class="btn btn-warning navbar-btn" type="submit" methods="post" name="cartAccess">
                                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                Cart
                            </a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid text-right">
            <strong>Hello <?php if (isset($user)){echo $user ;}else{echo 'Wilder' ;} ?></strong>
        </div>
    </header>

