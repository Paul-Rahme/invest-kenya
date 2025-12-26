<?php ?>
<script>
(function() {
    var root = document.getElementById('<?php echo esc_js( $uid ); ?>');
    if (!root) return;

    var tabs = root.querySelectorAll('.incentives-tabs-nav li');
    var panels = root.querySelectorAll('.incentives-tab-panel');
    var indicator = root.querySelector('.incentives-tabs-indicator');
    var nav = root.querySelector('.incentives-tabs-nav');

    if (!tabs.length || !panels.length || !indicator || !nav) return;

    function moveIndicator(tab) {
        var tabRect = tab.getBoundingClientRect();
        var navRect = nav.getBoundingClientRect();

        indicator.style.width = tabRect.width + 'px';
        indicator.style.transform =
            'translateX(' + (tabRect.left - navRect.left + nav.scrollLeft) + 'px)';
    }

    // Initial position
    var activeTab = root.querySelector('.incentives-tabs-nav li.active');
    if (activeTab) moveIndicator(activeTab);

    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            var target = tab.getAttribute('data-tab');
            if (!target) return;

            tabs.forEach(t => t.classList.remove('active'));
            panels.forEach(p => {
                p.classList.toggle('active', p.getAttribute('data-tab') === target);
            });

            tab.classList.add('active');
            moveIndicator(tab);
        });
    });

    // 🔑 Keep indicator aligned on horizontal scroll (mobile)
    nav.addEventListener('scroll', function() {
        var active = root.querySelector('.incentives-tabs-nav li.active');
        if (active) moveIndicator(active);
    });

    // 🔑 Keep aligned on resize
    window.addEventListener('resize', function() {
        var active = root.querySelector('.incentives-tabs-nav li.active');
        if (active) moveIndicator(active);
    });
})();
</script>

