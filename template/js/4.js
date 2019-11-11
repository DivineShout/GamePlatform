



var win_game = function(mvc) {
    var names = ['Червоний',
            'Жовтий',
            'Синій',
            'Зелений',
            'Фіолетовий'
        ],

        colours_click = ['rgb(236, 122, 132)',
            'rgb(255, 229, 123)',
            'rgb(76, 188, 231)',
            'rgb(169, 240, 98)',
            'rgb(167, 111, 236)'
        ],

        timeoff,
        timer;



    var content_html = {
        gameoverTab: document.getElementById('gameover-container'),
        restart: document.getElementById('restart'),
        option: document.getElementById('options'),
        outscore: document.getElementById('score'),
        pbs: document.getElementById('score'),
        worder: document.getElementById('word'),
        pbz: document.getElementById('pb-container'),
        game_start: document.getElementById('start'),
        timer: document.getElementById('timer')
    };







         function score() {
            var fret = document.cookie.replace(/(?:(?:^|.*;\s*)wg-pb\s*\=\s*([^;]*).*$)|^.*$/, "$1");
            if (!fret) {
                content_html.pbs.textContent = 0;
            } else {
                content_html.pbs.textContent = fret;
                content_html.pbz.style.display = 'block';

            }

            return fret;
        }




         function color_r() {
            var re = (Math.round(Math.random() * (names.length - 1)));

            return re;
        }

        function color_p(ar) {
            var tuch = ar[color_r()];

            return tuch;
        }

        function copy_w() {
            content_html.worder.textContent = color_p(names);
            content_html.worder.style.color = color_p(colours_click);
        }

        function tim_color() {
            clearTimeout(timeoff);

            timeoff = setTimeout(function() {
                gameOver();
            }, mvc);
        }

        function t_color() {
            clearInterval(timer);
            var wid = 100;

            timer = window.setInterval(function() {
                content_html.timer.style.width = ((wid - 1) - 1) + '%';
                wid--;
            }, (mvc / 100));
        }

        function opt() {
            for (var p = 0; p < names.length; p++) {
                content_html.option.innerHTML += '<li><button class="option" data-colour="' + colours_click[p] + '">' + names[p] + '</button></li>';
            }
        }

         function g_opt() {
            var param = document.querySelectorAll('.option');

            return param;
        }

         function go_close() {
            for (var j = 0; j < names.length; j++) {
                g_opt()[j].addEventListener('click', function(e) {
                    aaa(e);
                });
            }
        }


        function aaa(e) {
            var aa = e.target.getAttribute('data-colour');

            if (aa != content_html.worder.style.color) {
                gameOver();
            } else {
                up_s();
                copy_w();
                t_color();
                tim_color();
            }
        }

        function gameOver() {
            parent.incomingValue(document.getElementById("score").textContent);
            content_html.gameoverTab.style.display = 'block';
            content_html.restart.style.display = 'block';
            restart();

        }

        function restart() {
            content_html.restart.addEventListener('click', function() {
                document.cookie = 'wg-pb=0';
                content_html.gameoverTab.style.display = 'none';
                content_html.restart.style.display = 'none';
                up_s(0);
                copy_w();
                t_color();
                tim_color();
            });
        }

         function clear_r() {
            content_html.outscore.textContent = 0;
        }

        function up_s(sc) {
            if (sc == false) {
                content_html.outscore.textContent = 0;
            }



            else {

                var save_zon = parseInt(content_html.outscore.textContent);
                var recScore = save_zon + 1;
                content_html.outscore.textContent = recScore;

                if (recScore > score() && recScore <= 5) {
                    var bag = recScore;
                    document.cookie = 'wg-pb=' + recScore;
                }
                else if (recScore > score() && recScore <= 11 && recScore > 5) {
                    var bag = recScore + 1;
                    document.cookie = 'wg-pb='+bag;
                }
                else if (recScore > score() && recScore <= 50 && recScore > 11) {
                    var bag2 = recScore + 2;
                    document.cookie = 'wg-pb=' + bag2;
                }
                else if (recScore > score() && recScore > 50) {
                    var bag3 = recScore + 3;
                    document.cookie = 'wg-pb=' + bag3;
                }


                content_html.pbs.textContent = score();
            }
        }

        function start() {

            content_html.game_start.addEventListener('click', function() {
                document.cookie = 'wg-pb=0';
                copy_w();
                opt();
                t_color();
                tim_color();
                go_close();
                content_html.game_start.style.display = 'none';
            });
        }


     function allTime() {
        document.cookie = 'wg-pb=0';
         clear_r();
         score();
         start();
    }

    return {
        init: allTime()
    }
}

win_game(1811);

