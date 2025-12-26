<?php ?>
<script>
(function() {
    var root = document.getElementById('<?php echo esc_js( $uid ); ?>');
    if (!root) return;

    var tabs   = root.querySelectorAll('.laws-tabs-nav li');
    var panels = root.querySelectorAll('.laws-tab-panel');
    var activeLine = root.querySelector('.laws-tabs-divider-active');

    if (!tabs.length || !panels.length || !activeLine) return;

    function moveActiveLine(tab) {
        var tabRect  = tab.getBoundingClientRect();
        var navRect  = tab.parentElement.getBoundingClientRect();

        activeLine.style.width = tabRect.width + 'px';
        activeLine.style.left  = (tabRect.left - navRect.left) + 'px';
    }

    // Init on first active tab
    var initialTab = root.querySelector('.laws-tabs-nav li.active');
    if (initialTab) {
        requestAnimationFrame(function() {
            moveActiveLine(initialTab);
        });
    }

    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            var target = tab.getAttribute('data-tab');
            if (!target) return;

            tabs.forEach(function(t) { t.classList.remove('active'); });
            panels.forEach(function(p) {
                p.classList.toggle('active', p.getAttribute('data-tab') === target);
            });

            tab.classList.add('active');
            moveActiveLine(tab);
        });
    });
})();
</script>

