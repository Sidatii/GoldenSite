<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="<?php echo SITENAME; ?>">
                    <img src="<?php echo URLROOT; ?>Public/images/Dhayby_logo.svg" height="" alt="Logo">
                    <span>
                        Dhayby
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                        <ul class="navbar-nav  ">
                            <?php if (isset($_SESSION['user_id'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/gallery"> Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT; ?>Admins/products/1">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT; ?>/Admins/categories">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-light" style="color: black" href="<?php echo URLROOT; ?>Admins/logout"> Log out</a>
                            </li>
                            <?php else : ?>
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about"> About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/gallery"> Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/contact"> Contact us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-light" style="color: black" href="<?php echo URLROOT; ?>/admins/login"> Log in</a>
                            </li>
                            <?php endif; ?>
                        </ul>

                    </div>
                </div>
            </nav>
        </div>