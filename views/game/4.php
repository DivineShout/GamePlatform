<?php;?>


<link rel="stylesheet" href="/template/css/4.css">


<body translate="no" >

<div class="timer__container">
    <div id="timer" class="timer"></div>
</div>
<div class="scores__container wrap clearfix">
    <div class="score__container">
        <h3><p>Рахунок:  <span id="score" class="score"></span></p></h3>
    </div>
    <div id="pb-container" class="pb__container">
        <p><span id="pb" class="score"></span></p>
    </div>
</div>
<div class="wrap">
    <h1 class="title">Впізнай колір</h1>

        <br><button class="start" id="start">Старт!</button>
    <p class="word" id="word"></p>
    <ul id="options" class="options__container"></ul>
    <div id="gameover-container" class="modal__container">
        <div class="modal">
            <p style="color:black">Кінець гри!</p>
            <p style="color:black">У вас закінчився час або ви обрали не той колір.</p>
            <button id="restart">Спробувати ще раз?</button>
        </div>
    </div>
</div>


<script src="/template/js/4.js"></script>