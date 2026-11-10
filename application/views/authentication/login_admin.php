<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('authentication/includes/head.php'); ?>

<body class="tw-bg-neutral-100 login_admin">

    <div class="tw-max-w-md tw-mx-auto tw-pt-14 sm:tw-pt-20 authentication-form-wrapper tw-relative tw-z-20">
        <div class="company-logo text-center tw-mb-3">
            <?php get_dark_company_logo(); ?>
        </div>

        <div class="text-center tw-mb-6">
            <span class="tw-inline-flex tw-items-center tw-gap-1.5 tw-px-3 tw-py-1 tw-rounded-full tw-text-xs tw-font-semibold tw-bg-primary-50 tw-text-primary-700 tw-border tw-border-primary-200/60 tw-mb-3">
                <span class="tw-w-1.5 tw-h-1.5 tw-rounded-full tw-bg-primary-600 tw-animate-pulse"></span>
                Secure Portal
            </span>
            <h1 class="tw-text-neutral-900 tw-text-2xl sm:tw-text-3xl tw-font-bold tw-tracking-tight tw-mb-1.5">
                <?= _l('admin_auth_login_heading'); ?>
            </h1>
            <p class="tw-text-neutral-500 tw-text-sm">
                <?= _l('welcome_back_sign_in'); ?>
            </p>
        </div>

        <div
            class="login-card tw-bg-white/95 tw-backdrop-blur-xl tw-mx-3 sm:tw-mx-0 tw-py-8 tw-px-6 sm:tw-px-8 tw-shadow-xl tw-rounded-2xl tw-border tw-border-solid tw-border-neutral-200/80">

            <?php $this->load->view('authentication/includes/alerts'); ?>

            <?= form_open($this->uri->uri_string()); ?>

            <?= validation_errors('<div class="alert alert-danger text-center">', '</div>'); ?>

            <?php hooks()->do_action('after_admin_login_form_start'); ?>

            <div class="form-group">
                <label for="email" class="control-label !tw-mb-2 tw-text-xs tw-font-semibold tw-text-neutral-700 tw-uppercase tw-tracking-wider">
                    <?= _l('admin_auth_login_email'); ?>
                </label>
                <input type="email" id="email" name="email" class="form-control" autofocus="1" placeholder="name@company.com">
            </div>

            <div class="form-group tw-mt-5">
                <span class="tw-inline-flex tw-justify-between tw-items-center tw-w-full tw-mb-2">
                    <label for="password" class="control-label !tw-m-0 tw-text-xs tw-font-semibold tw-text-neutral-700 tw-uppercase tw-tracking-wider">
                        <?= _l('admin_auth_login_password'); ?>
                    </label>
                    <a href="<?= admin_url('authentication/forgot_password'); ?>"
                        class="tw-text-xs tw-font-medium tw-text-primary-600 hover:tw-text-primary-700 hover:tw-underline">
                        <?= _l('admin_auth_login_fp'); ?>
                    </a>
                </span>

                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••">
            </div>

            <?php if (show_recaptcha()) { ?>
            <div class="g-recaptcha tw-mb-4"
                data-sitekey="<?= get_option('recaptcha_site_key'); ?>">
            </div>
            <?php } ?>

            <div class="form-group tw-mt-4">
                <div class="checkbox checkbox-inline tw-flex tw-items-center">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember" class="tw-text-sm tw-text-neutral-600 !tw-pl-2">
                        <?= _l('admin_auth_login_remember_me'); ?></label>
                </div>
            </div>

            <div class="tw-mt-6">
                <button type="submit" class="btn btn-primary btn-block tw-font-semibold tw-py-2.5 tw-text-sm tw-rounded-xl">
                    <?= _l('admin_auth_login_button'); ?>
                </button>
            </div>

            <?php hooks()->do_action('before_admin_login_form_close'); ?>

            <?= form_close(); ?>
        </div>

        <?php $this->load->view('authentication/includes/footer.php'); ?>
    </div>

</body>

</html>
