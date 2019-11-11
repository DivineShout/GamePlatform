var collection = [];
var compare = [];
var point = 0;
var score = 0;



function start() {
    collection = [];
    compare = [];
    point = 0;
    add();
    score = 0;
    scoreboard();
    scorestat(true);
    invis();

}

function add() {

    var num = Math.floor(Math.random() * 4) + 1;
    collection.push(num);

}

/* Это функция, которая выполняется каждый раз при нажатии цветной фигуры.
 Соответствующее числовое значение помещается в массив с надписью «compare».
 Если функция «check» имеет значение true, последовательность продолжается. */
function press(position) {

    switch (position) {

        case 'tl':
            compare.push(1);
            blink('tl',100);
            break;

        case 'tr':
            compare.push(2);
            blink('tr',100);
            break;

        case 'bl':
            compare.push(3);
            blink('bl',100);
            break;

        case 'br':
            compare.push(4);
            blink('br',100);
            break;
    }
    var value = check();
    if (value) {
        compare = [];
        point = 0;
        add();
        result();
        score += 1;
        scoreboard();
        setTimeout(invis, 2300);
    }
    if (value === false) {
        wrong();
    }

}


/* Циклы через массив с именем «коллекция» и временно скрывают форму */
function invis() {
    var state = collection[point];

    if (state === 1) {

        blink('tl', 500);
        point += 1;
        setTimeout(invis, 1000);

    }

    if (state === 2) {
        blink('tr', 500);
        point += 1;
        setTimeout(invis, 1000);
    }

    if (state === 3) {
        blink('bl', 500);
        point += 1;
        setTimeout(invis, 1000);
    }

    if (state === 4) {
        blink('br', 500);
        point += 1;
        setTimeout(invis, 1000);
    } else {

    }

}


// Создает эффект временного обращения в нуль.
function blink(str, seconds) {

    document.getElementById(str).style.display = 'none';
    setTimeout(function() {
        document.getElementById(str).style.display = 'block';

    }, seconds);

}


// Функция, которая проходит через каждый массив и проверяет, соответствуют ли значения.
function check() {

    if (collection.length === compare.length) {

        for (i = 0; i < collection.length; i++) {
            if (collection[i] !== compare[i]) {
                return false;
            }

        }
        return true;
    }
}

// Отображает «правильный» на экране.
function result() {
    document.getElementById('ro').innerHTML = "Ваш рахунок:" + score;
    document.getElementById('ro').style.color = '#05a112';
    setTimeout(function() {
        document.getElementById('ro').innerHTML = "Ваш рахунок:" + score;
        document.getElementById('ro').style.color = '#666666';

    }, 750);

}


// Отображает «неправильный» на экране, за которым следует оценка.
function wrong() {
    document.getElementById('ro').innerHTML = "Не правильна послідовність!";
    document.getElementById('ro').style.color = '#bd2e27';
    setTimeout(function() {
        document.getElementById('ro').innerHTML = "Гра закінчена!";
        document.getElementById('ro').style.color = '#666666';

    }, 1500);
    setTimeout(scorestat, 2000);
}


// переключает цвет css на белый, если состояние истинно. В противном случае оценка отображается черным цветом.
function scorestat(state) {
    if (state === true) {
        document.getElementById('ro').innerHTML = "Ваш рахунок:" + score ;
        document.getElementById('ro').style.color = '#666666';
    } else {
        document.getElementById('ro').style.color = '#666666';
        document.getElementById('ro').innerHTML = "Ваш кінцевий рахунок: " + score + "!";
        parent.incomingValue(document.getElementById("score").value);
    }
}

// отображает номер раунда.
function scoreboard() {
    document.getElementById("ro").innerHTML = "Ваш рахунок:" + score;
    document.getElementById("score").value = score ;

}
