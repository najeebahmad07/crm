<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('authentication/includes/head.php'); ?>

<body class="tw-bg-neutral-100 authentication set-password">
    <div class="tw-max-w-md tw-mx-auto tw-pt-16 sm:tw-pt-20 authentication-form-wrapper tw-relative tw-z-20">
        <div class="company-logo text-center tw-mb-3">
            <?= get_dark_company_logo(); ?>
        </div>

        <div class="text-center tw-mb-6">
            <h1 class="tw-text-2xl sm:tw-text-3xl tw-text-neutral-900 tw-font-bold tw-tracking-tight tw-mb-2">
                <?= _l('admin_auth_set_password_heading'); ?>
            </h1>
            <p class="tw-text-neutral-500 tw-text-sm">
                Set a secure password for your account
            </p>
        </div>

        <div
            class="login-card tw-bg-white/95 tw-backdrop-blur-xl tw-mx-3 sm:tw-mx-0 tw-py-8 tw-px-6 sm:tw-px-8 tw-shadow-xl tw-rounded-2xl tw-border tw-border-solid tw-border-neutral-200/80">
            <?= form_open($this->uri->uri_string()); ?>
            <?= validation_errors('<div class="alert alert-danger text-center">', '</div>'); ?>
            <?php $this->load->view('authentication/includes/alerts'); ?>
            <?= render_input('password', 'admin_auth_set_password', '', 'password'); ?>
            <?= render_input('passwordr', 'admin_auth_set_password_repeat', '', 'password'); ?>
            <button type="submit" class="btn btn-primary btn-block tw-font-semibold tw-py-2.5 tw-text-sm tw-rounded-xl tw-mt-4">
                <?= _l('admin_auth_set_password_heading'); ?>
            </button>
            <div class="tw-text-center tw-mt-4">
                <a href="<?= admin_url('authentication'); ?>" class="tw-text-xs tw-font-medium tw-text-neutral-500 hover:tw-text-primary-600">
                    &larr; <?= _l('back_to_login'); ?>
                </a>
            </div>
            <?= form_close(); ?>
        </div>

        <?php $this->load->view('authentication/includes/footer.php'); ?>
    </div>
</body>

</html>
