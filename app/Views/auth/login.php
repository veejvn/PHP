<?php $this->layout(config('view.layout')); ?>
<?php $this->start('page'); ?>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Login</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li>
                            <a href="/home"><i class="lni lni-home"></i> Home</a>
                        </li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <form class="card login-form" method="post" action="/login">
                        <div class="card-body">
                            <div class="title">
                                <h3>Login Now</h3>
                                <p>
                                    You can login using your social media account or email
                                    address.
                                </p>
                            </div>
                            <div class="social-login">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <a class="btn facebook-btn" href="javascript:void(0)"><i class="lni lni-facebook-filled"></i> Facebook
                                            login</a>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <a class="btn twitter-btn" href="javascript:void(0)"><i class="lni lni-twitter-original"></i> Twitter
                                            login</a>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <a class="btn google-btn" href="javascript:void(0)"><i class="lni lni-google"></i> Google login</a>
                                    </div>
                                </div>
                            </div>
                            <div class="alt-option">
                                <span>Or</span>
                            </div>
                            <?php if (!empty($errors)) : ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php
                                        foreach ($errors as $err) {
                                            echo "<li>$err</li>";
                                        }
                                        ?>
                                    </ul>

                                </div>
                            <?php endif; ?>
                            <div class="form-group input-group">
                                <label for="username">Username</label>
                                <input class="form-control" type="text" name="username" id="username" required />
                            </div>
                            <div class="form-group input-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password" required />
                            </div>
                            <div class="d-flex flex-wrap justify-content-between  bottom-content">
                                <div class="form-check">
                                    <input type="checkbox" name="remember_me" value="remember_password" class="form-check-input width-auto" id="remember_me" />
                                    <label class="form-check-label" for="remember_me">Remember me</label>
                                </div>
                                <a class="lost-pass" href="account-password-recovery.html">Forgot password?</a>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Login</button>
                            </div>
                            <p class="outer-link">
                                Don't have an account?
                                <a href="register.html">Register here </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $this->stop(); ?>