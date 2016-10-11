jQuery(document).ready(function($) {
    $('.button-video').fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        helpers: {
            media: {}
        }
    });

    $('.resource-button.video').fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        helpers: {
            media: {}
        }
    });

    $('.resource-button.pdf').fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        iframe: {
            preload: true,
        },
    });

    $('.resource-button.graphic').fancybox({
        openEffect: 'none',
        closeEffect: 'none',
    });

    $('.btn-alliance').fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        maxWidth: 800,
        maxHeight: 600,
    });
});
