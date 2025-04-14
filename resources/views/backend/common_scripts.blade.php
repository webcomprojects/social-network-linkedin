<!-- NEW THME START FROM HERE -->

<!-- Google analytics -->
<?php if(!empty(get_settings('google_analytics_id'))): ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo get_settings('google_analytics_id'); ?>"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', '<?php echo get_settings('google_analytics_id'); ?>');
</script>
<?php endif; ?>
<!-- Ended Google analytics -->

<!-- Meta pixel -->
<?php if(!empty(get_settings('meta_pixel_id'))): ?>
<script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '<?php echo get_settings('meta_pixel_id'); ?>');
    fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=<?php echo get_settings('meta_pixel_id'); ?>&ev=PageView&noscript=1" />
</noscript>
<?php endif; ?>
<!-- Ended Meta pixel -->



<script type="text/javascript">
    $(function() {
        $('.select2').select2();
    });
</script>
