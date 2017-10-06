<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
        <?php
        if (isset($_COOKIE['panier']) && !empty($_COOKIE['panier'])) {
            $myCart = unserialize($_COOKIE['panier']);

            foreach ($myCart as $item) {
                switch ($item) {
                    case 46:
                        echo '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <figure class="thumbnail text-center">
                                    <img src="assets/img/product-46.jpeg" alt="cookies choclate chips" class="img-responsive">
                                    <figcaption class="caption">
                                        <h3>Pecan nuts</h3>
                                        <p>Cooked by Penny !</p>
                                    </figcaption>
                                </figure>
                            </div>';
                        break;

                    case 36:
                        echo '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <figure class="thumbnail text-center">
                                    <img src="assets/img/product-36.jpeg" alt="cookies choclate chips" class="img-responsive">
                                    <figcaption class="caption">
                                        <h3>Chocolate chips</h3>
                                        <p>Cooked by Bernadette !</p>
                                    </figcaption>
                                </figure>
                            </div>';
                        break;
                    case 58:
                        echo '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <figure class="thumbnail text-center">
                                    <img src="assets/img/product-58.jpeg" alt="cookies choclate chips" class="img-responsive">
                                    <figcaption class="caption">
                                        <h3>Chocolate cookie</h3>
                                        <p>Cooked by Bernadette !</p>
                                    </figcaption>
                                </figure>
                            </div>';
                        break;
                    case 32:
                        echo '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <figure class="thumbnail text-center">
                                    <img src="assets/img/product-32.jpeg" alt="cookies choclate chips" class="img-responsive">
                                    <figcaption class="caption">
                                        <h3>M&M\'s&copy; cookies</h3>
                                        <p>Cooked by Penny !</p>
                                    </figcaption>
                                </figure>
                            </div>';
                        break;
                }
            }
        }



        ?>

    </div>
</section>
<?php require 'inc/foot.php'; ?>
