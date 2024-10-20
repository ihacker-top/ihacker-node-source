document.addEventListener('keydown', function(e) {
    if (e.keyCode === 123) e.preventDefault();
});
setInterval(function four () {
    var time = performance.now();
    debugger;
    if (time + 100 < performance.now()) {
        window.location.href = 'about:blank';
    }
}, 1000);