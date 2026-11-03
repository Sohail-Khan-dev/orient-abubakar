// Mobile navigation toggle
var navToggle = document.getElementById('navToggle');
var mainNav = document.getElementById('mainNav');

if (navToggle && mainNav) {
  navToggle.addEventListener('click', function () {
    mainNav.classList.toggle('open');
  });
}

// Animate stat numbers when they scroll into view
var nums = document.querySelectorAll('.stat .num[data-value]');

if ('IntersectionObserver' in window && nums.length) {
  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;
      observer.unobserve(entry.target);

      var el = entry.target;
      var target = parseFloat(el.getAttribute('data-value'));
      var suffix = el.querySelector('i');
      var decimals = target % 1 === 0 ? 0 : 1;
      var start = null;

      function step(ts) {
        if (!start) start = ts;
        var progress = Math.min((ts - start) / 1200, 1);
        var value = (target * progress).toFixed(decimals);
        el.childNodes[0].nodeValue = value;
        if (progress < 1) requestAnimationFrame(step);
      }
      requestAnimationFrame(step);
    });
  }, { threshold: 0.4 });

  nums.forEach(function (el) { observer.observe(el); });
}
