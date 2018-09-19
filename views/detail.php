<!DOCTYPE html>
<html lang="it-IT" prefix="og: http://ogp.me/ns#">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex,nofollow">
    <title>MK Dealer - <?php echo $carDetail->attrs->make.' '.$carDetail->attrs->model; ?></title>
    <link rel="stylesheet" href="../../web/assets/tab.css" type="text/css" media="all">
    <link rel="stylesheet" href="../../web/assets/multimodel.style.css" type="text/css" media="all">
    
</head>

<body>
<main role="main" class="multimodel step-first">
    <header class="multimodel__masthead">
        <div class="multimodel__header">
            <h1>MK Cars</h1>
        </div>
    </header>
    <!-- <div id="multimodel__wrapper" class="multimodel__wrapper">
        <section class="multimodel__slider">
            <div class="grid">
                <div class="grid__item u-6/12--medium u-6/12--large u-6/12--large-x .u-padding-bottom--flush">
                    
                </div>
            </div>
        </section>
    </div>  -->  
    <div id="multimodel__wrapper" class="multimodel__wrapper">
        <section class="multimodel__slider">
            <div class="grid">
                <div class="grid__item u-6/12--medium u-6/12--large u-4/12--large-x">
                    <article class="card">
                        <figure class="card__picture">
                            <div class="card__image">
                                <img src="<?php echo $carDetail->attrs->img; ?>">
                            </div>
                        </figure>
                        <footer class="card__info"><span
                                    class="make u-text--center"><?php echo $carDetail->attrs->make; ?></span>
                            <span class="model u-text--center"><?php echo $carDetail->attrs->model; ?></span>
                        </footer>
                    </article>
                </div>
                <div class="grid__item u-6/12--medium u-6/12--large u-4/12--large-x">
                    <article class="card">
                        <figure class="card__info">
                            <span class="make u-text--left"><b>Submodel:</b> <?php echo $carDetail->attrs->submodel; ?></span>
                            <span class="make u-text--left"><b>Year:</b> <?php echo $carDetail->attrs->year; ?></span>
                            <span class="make u-text--left"><b>Internal space:</b> <?php echo $carDetail->tags->{'Internal space'}; ?></span>
                            <span class="make u-text--left"><b>Roof:</b> <?php echo $carDetail->tags->Roof; ?></span>
                            <span class="make u-text--left"><b>Fuel type:</b> <?php echo $carDetail->tags->{'Fuel type'}; ?></span>
                            <span class="make u-text--left"><b>Look:</b> <?php echo $carDetail->tags->Look; ?></span>
                        </figure>
                    </article>
                </div>
            </div>
        </section>

        <section class="multimodel__content">
            <?php if(isset($_SESSION['msg'])) { echo $_SESSION['msg']; } unset($_SESSION['msg']); ?>
            <div class="dk-forms">
                <form action="http://localhost/motork/web/process/" method="post">
                    <div class="landing-form-fields">
                        <span class="field field__name">
                            <label for="name" class="gui-label">Nome</label>
                            <input type="text" id="name"
                                   name="name"
                                   required="required" class="gui-input">
                        </span>
                        <span class="field field__surname">
                            <label for="surname" class="gui-label">Cognome</label>
                            <input type="text" id="surname"
                                   name="surname"
                                   required="required" class="gui-input">
                        </span>
                        <span class="field field__email">
                            <label for="email" class="gui-label">Email</label>
                            <input type="email" id="email"
                                   name="email"
                                   required="required"
                                   class="gui-input">
                        </span>
                        <div class="input-group-tel-zipcode">
                            <span class="field field__telephone">
                                <label for="phone" class="gui-label">Telefono</label>
                                <input
                                        type="tel" id="phone" placeholder="Telefono"
                                        name="phone"
                                        inputmode="numeric"
                                        required="required" class="gui-input">
                            </span>

                            <span class="field field__cap">
                                <label for="zip" class="gui-label">CAP</label>
                                <input type="tel" id="zip"
                                       name="zip"
                                       required="required" class="gui-input">
                            </span>
                        </div>
                    </div>
                    <div class="option-group field field__privacy">
                        <input type="checkbox"
                               name="privacy"
                               id="privacy"
                               value="Y"
                               required="required"
                               class="gui-checkbox">

                        <label for="privacy" class="option gui-label">
                            <span class="gui-label-text">
                                Ho letto e accetto <a href="#" target="_blank"> la privacy policy</a>
                            </span>
                        </label>
                    </div>
                    <footer class="multimodel__leadform-cta">
                        <input type="hidden" name="carId" id="carId" value="<?php echo $carDetail->attrs->carId; ?>">
                        <input type="submit" name="submit" class="leadform__submit cta-primary cta--wide has-transform-active" value="Request quote">
                    </footer>
                </form>
            </div>
        </section>
    </div>
    <?php if(!empty((array) $similarCars)): ?>
    <hr/>
    <h3 class="u-padding-bottom--xs u-padding-left--l">Similar Cars:</h3>
    <div id="multimodel__wrapper" class="multimodel__wrapper">
        <section class="multimodel__editorial">
            <div class="grid">
                <?php foreach ($similarCars as $key => $car) { ?>
                <div class="grid__item u-12/12--medium u-6/12--large u-3/12--large-x u-padding-bottom--xs">
                    <a href="/motork/web/detail/<?php echo $car->attrs->carId; ?>" target="_blank">
                    <article class="card">
                        <figure class="card__picture">
                            <div class="card__image">
                                <img src="<?php echo $car->attrs->img; ?>">
                            </div>
                        </figure>
                        <footer class="card__info"><span
                                    class="make u-text--center"><?php echo $car->attrs->make; ?></span>
                            <span class="model u-text--center"><?php echo $car->attrs->model; ?></span>
                        </footer>
                    </article>
                    </a>
                </div>
                <?php } ?>
            </div>
        </section>
    </div>
    <?php endif; ?>
</main>
</html>