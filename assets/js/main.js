// Mobile navigation toggle (the home page uses its own side drawer, see home.js)
var navToggle = document.getElementById('navToggle');
var mainNav = document.getElementById('mainNav');

if (navToggle && mainNav && !document.getElementById('hmDrawer')) {
  navToggle.addEventListener('click', function () {
    mainNav.classList.toggle('open');
  });
}

// Animate stat numbers when they scroll into view
var nums = document.querySelectorAll('.stat .num[data-value], .hm-stat-value .num[data-value], .hm-overseas-item .num[data-value]');

// The final value is rendered server side. Write into the first child, which is
// a text node normally, or a <font> wrapper once the browser translates the page.
function setNum(el, value) {
  var first = el.firstChild;
  if (!first) el.textContent = value;
  else if (first.nodeType === 3) first.nodeValue = value;
  else if (first.nodeName !== 'I') first.textContent = value;
}

if ('IntersectionObserver' in window && nums.length) {
  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;
      observer.unobserve(entry.target);

      var el = entry.target;
      var target = parseFloat(el.getAttribute('data-value'));
      var decimals = target % 1 === 0 ? 0 : 1;
      var start = null;

      function step(ts) {
        if (!start) start = ts;
        var progress = Math.min((ts - start) / 1200, 1);
        var value = (target * progress).toFixed(decimals);
        setNum(el, value);
        if (progress < 1) requestAnimationFrame(step);
      }
      requestAnimationFrame(step);
    });
  }, { threshold: 0.4 });

  nums.forEach(function (el) {
    setNum(el, '0');
    observer.observe(el);
  });
}
