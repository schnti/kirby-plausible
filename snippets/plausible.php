<?php
if (!option('debug') && !kirby()->user()) :
    $cfg = option('schnti.plausible', []);
    $src = $cfg['script'] ?? null;

    if (is_string($src) && str_starts_with($src, 'https://')): ?>
        <script async src="<?= esc($src) ?>"></script>
        <script>
            window.plausible = window.plausible || function() {
                (plausible.q = plausible.q || []).push(arguments)
            }, plausible.init = plausible.init || function(i) {
                plausible.o = i || {}
            };
            plausible.init()
        </script>
<?php
    endif;
endif;
?>