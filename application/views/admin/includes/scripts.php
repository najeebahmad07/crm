<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php include_once APPPATH . 'views/admin/includes/helpers_bottom.php'; ?>

<?php hooks()->do_action('before_js_scripts_render'); ?>

<?= app_compile_scripts();

/**
 * Global function for custom field of type hyperlink
 */
echo get_custom_fields_hyperlink_js_function(); ?>
<?php
/**
 * Check for any alerts stored in session
 */
app_js_alerts();
?>
<?php
/**
 * Check pusher real time notifications
 */
if (get_option('pusher_realtime_notifications') == 1) { ?>
<script type="text/javascript">
    $(function() {
        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;
        <?php $pusher_options = hooks()->apply_filters('pusher_options', [['disableStats' => true]]);
    if (! isset($pusher_options['cluster']) && get_option('pusher_cluster') != '') {
        $pusher_options['cluster'] = get_option('pusher_cluster');
    }
    ?>
        var
            pusher_options = <?= json_encode($pusher_options); ?> ;
        var pusher = new Pusher(
            "<?= get_option('pusher_app_key'); ?>",
            pusher_options);
        var channel = pusher.subscribe(
            'notifications-channel-<?= get_staff_user_id(); ?>'
        );
        channel.bind('notification', function(data) {
            fetch_notifications();
        });
    });
</script>
<?php } ?>
<?php app_admin_footer(); ?>

<footer class="admin-footer tw-mt-auto tw-py-4 tw-px-6 tw-text-xs tw-text-neutral-500 tw-border-t tw-border-neutral-200/80 tw-bg-white/80 tw-backdrop-blur">
    <div class="tw-flex tw-flex-col sm:tw-flex-row tw-items-center tw-justify-between tw-gap-2">
        <div class="tw-text-neutral-500">
            &copy; <?= date('Y'); ?> <?= e(get_option('companyname')); ?>. All rights reserved.
        </div>
        <div class="tw-flex tw-items-center tw-gap-2">
            <span>Developed By <strong class="tw-text-primary-600 tw-font-semibold">Najeeb</strong></span>
            <span class="tw-text-neutral-300">•</span>
            <span class="tw-inline-flex tw-items-center tw-px-2.5 tw-py-0.5 tw-rounded-full tw-text-[11px] tw-font-semibold tw-bg-primary-50 tw-text-primary-700 tw-border tw-border-primary-200/60">Version 1.0</span>
        </div>
    </div>
</footer>
<script>
    $(function() {
        if ($('#wrapper').length && $('.admin-footer').length) {
            $('#wrapper').append($('.admin-footer'));
        }
    });
</script>
