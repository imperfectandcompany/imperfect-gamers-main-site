var backgrounds = 0;

function shuffle(a) {
    var j, x, i;
    for (i = a.length; i; i--) {
        j = Math.floor(Math.random() * i);
        x = a[i - 1];
        a[i - 1] = a[j];
        a[j] = x;
    }
}

$(document).ready(function() {
    if (typeof backgrounds != 'undefined') {
        $('body').append('<div class="overlay"></div>');
        if (backgrounds.random == 1) {
            shuffle(backgrounds.list);
        }
        if (backgrounds.list.length > 0 && backgrounds.list[0] != '') {
            $.backstretch(backgrounds.list[0], {
                fade: backgrounds.fade
            });
            var cnt = 1;
            setInterval(function() {
                $.backstretch(backgrounds.list[cnt], {
                    fade: backgrounds.fade
                });
                cnt++;
                if (cnt >= backgrounds.list.length) {
                    cnt = 0;
                }
            }, backgrounds.duration);
        }
    }
});