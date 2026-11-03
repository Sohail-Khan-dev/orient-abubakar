// Home page only: section reveal, header tint, side drawer and particle background.
(function () {
  document.documentElement.classList.add('js');

  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Header turns solid grey once the video hero has scrolled away (as on the reference page)
  function tintHeader() {
    document.body.classList.toggle('is-scrolled', window.scrollY > window.innerHeight * 0.6);
  }
  tintHeader();
  window.addEventListener('scroll', tintHeader, { passive: true });

  // A section gets .is-active once it is on screen, which starts its CSS animations
  var sections = document.querySelectorAll('.hm-section');

  if ('IntersectionObserver' in window) {
    var reveal = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-active');
        reveal.unobserve(entry.target);
      });
    }, { threshold: 0.2 });

    sections.forEach(function (section) { reveal.observe(section); });
  } else {
    sections.forEach(function (section) { section.classList.add('is-active'); });
  }

  // Side drawer: the header menu button opens it, the cover or Esc closes it
  var toggle = document.getElementById('navToggle');
  var drawer = document.getElementById('hmDrawer');
  var cover = document.getElementById('hmCover');

  function setDrawer(open) {
    drawer.classList.toggle('open', open);
    cover.classList.toggle('show', open);
  }

  if (toggle && drawer && cover) {
    toggle.addEventListener('click', function () { setDrawer(true); });
    cover.addEventListener('click', function () { setDrawer(false); });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') setDrawer(false);
    });
  }

  // Particle network behind the strategy section (desktop with a mouse only, as on the reference)
  var canvas = document.querySelector('.hm-canvas');
  if (canvas && canvas.getContext && !reduceMotion && window.matchMedia('(pointer: fine)').matches) {
    initParticles(canvas);
  }

  function initParticles(canvas) {
    var ctx = canvas.getContext('2d');
    var dots = [];
    var count = 110;
    var linkDistance = 110;
    var visible = false;
    var looping = false;

    function resize() {
      canvas.width = canvas.offsetWidth;
      canvas.height = canvas.offsetHeight;
    }

    function makeDot() {
      return {
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        vx: Math.random() - 0.5,
        vy: Math.random() - 0.5,
        r: Math.random() * 2 + 0.5
      };
    }

    function frame() {
      if (!visible) {
        looping = false;
        return;
      }

      ctx.clearRect(0, 0, canvas.width, canvas.height);

      for (var i = 0; i < dots.length; i++) {
        var d = dots[i];
        if (d.x < 0 || d.x > canvas.width) d.vx = -d.vx;
        if (d.y < 0 || d.y > canvas.height) d.vy = -d.vy;
        d.x += d.vx;
        d.y += d.vy;
      }

      ctx.lineWidth = 0.6;
      for (var a = 0; a < dots.length; a++) {
        for (var b = a + 1; b < dots.length; b++) {
          var dx = dots[a].x - dots[b].x;
          var dy = dots[a].y - dots[b].y;
          var dist = Math.sqrt(dx * dx + dy * dy);
          if (dist < linkDistance) {
            ctx.strokeStyle = 'rgba(0, 92, 170, ' + (1 - dist / linkDistance) * 0.35 + ')';
            ctx.beginPath();
            ctx.moveTo(dots[a].x, dots[a].y);
            ctx.lineTo(dots[b].x, dots[b].y);
            ctx.stroke();
          }
        }
      }

      ctx.fillStyle = 'rgba(0, 92, 170, 0.6)';
      for (var k = 0; k < dots.length; k++) {
        ctx.beginPath();
        ctx.arc(dots[k].x, dots[k].y, dots[k].r, 0, Math.PI * 2);
        ctx.fill();
      }

      requestAnimationFrame(frame);
    }

    resize();
    for (var i = 0; i < count; i++) dots.push(makeDot());
    window.addEventListener('resize', resize);

    // Only animate while the canvas is on screen
    if ('IntersectionObserver' in window) {
      new IntersectionObserver(function (entries) {
        visible = entries[0].isIntersecting;
        if (visible && !looping) {
          looping = true;
          requestAnimationFrame(frame);
        }
      }).observe(canvas);
    } else {
      visible = true;
      looping = true;
      requestAnimationFrame(frame);
    }
  }
})();
