<?php;?>
<section>
    <script src="/template/js/14.js"></script>
    <link rel="stylesheet" href="/template/css/14.css">
    <center><h2> У тебе 30 секунд! </h2></center>



    <center> <input type="button" id="startstop" name="startstop" value="Старт / Стоп" onClick="play()"></center>

    <form id="223" name="display" method="post" >

        <center>
            <table cellspacing=3>
                <tr>



                    <td><pre>  </pre></td>
                    <td align=right>Час:</td>
                    <td><input type="text" class="value" id="timeleft" name="time" value="30" size="1" onFocus="this.blur()"></td>
                    <td align=right>Рахунок:</td>
                    <td><input id="scoree" type="text" class="value" name="score" size="1" value="0" onFocus="this.blur()"></td>

                    <td><input type="text" id="state" name="state" size="15" value="Натисни старт!" onFocus="this.blur()"></td>
                </tr>
            </table>
        </center>

    </form>
    <form name="tuch">
        <center>
            <table class="game-board" cellspacing=3>
                <tr>
                    <td align="center" valign="center"><input id="dot-0" type="radio" onClick="score_display(0)"><label for="dot-0"></label> </td>
                    <td align="center" valign="center"><input id="dot-1" type="radio" onClick="score_display(1)"><label for="dot-1"></label> </td>
                    <td align="center" valign="center"><input id="dot-2" type="radio" onClick="score_display(2)"><label for="dot-2"></label> </td>
                    <td align="center" valign="center"><input id="dot-3" type="radio" onClick="score_display(3)"><label for="dot-3"></label> </td>
                    <td align="center" valign="center"><input id="dot-4" type="radio" onClick="score_display(4)"><label for="dot-4"></label> </td>
                    <td align="center" valign="center"><input id="dot-5" type="radio" onClick="score_display(5)"><label for="dot-5"></label> </td>
                    <td align="center" valign="center"><input id="dot-6" type="radio" onClick="score_display(6)"><label for="dot-6"></label> </td>
                    <td align="center" valign="center"><input id="dot-7" type="radio" onClick="score_display(7)"><label for="dot-7"></label> </td>
                    <td align="center" valign="center"><input id="dot-8" type="radio" onClick="score_display(8)"><label for="dot-8"></label> </td>
                    <td align="center" valign="center"><input id="dot-9" type="radio" onClick="score_display(9)"><label for="dot-9"></label> </td>
                </tr>
                <tr>
                    <td align="center" valign="center"><input id="dot-10" type="radio" onClick="score_display(10)"><label for="dot-10"></label></td>
                    <td align="center" valign="center"><input id="dot-11" type="radio" onClick="score_display(11)"><label for="dot-11"></label></td>
                    <td align="center" valign="center"><input id="dot-12" type="radio" onClick="score_display(12)"><label for="dot-12"></label></td>
                    <td align="center" valign="center"><input id="dot-13" type="radio" onClick="score_display(13)"><label for="dot-13"></label></td>
                    <td align="center" valign="center"><input id="dot-14" type="radio" onClick="score_display(14)"><label for="dot-14"></label></td>
                    <td align="center" valign="center"><input id="dot-15" type="radio" onClick="score_display(15)"><label for="dot-15"></label></td>
                    <td align="center" valign="center"><input id="dot-16" type="radio" onClick="score_display(16)"><label for="dot-16"></label> </td>
                    <td align="center" valign="center"><input id="dot-17" type="radio" onClick="score_display(17)"><label for="dot-17"></label> </td>
                    <td align="center" valign="center"><input id="dot-18" type="radio" onClick="score_display(18)"><label for="dot-18"></label> </td>
                    <td align="center" valign="center"><input id="dot-19" type="radio" onClick="score_display(19)"><label for="dot-19"></label> </td>
                </tr>
                <tr>
                    <td align="center" valign="center"><input id="dot-20" type="radio" onClick="score_display(20)"><label for="dot-20"></label></td>
                    <td align="center" valign="center"><input id="dot-21" type="radio" onClick="score_display(21)"><label for="dot-21"></label></td>
                    <td align="center" valign="center"><input id="dot-22" type="radio" onClick="score_display(22)"><label for="dot-22"></label></td>
                    <td align="center" valign="center"><input id="dot-23" type="radio" onClick="score_display(23)"><label for="dot-23"></label></td>
                    <td align="center" valign="center"><input id="dot-24" type="radio" onClick="score_display(24)"><label for="dot-24"></label></td>
                    <td align="center" valign="center"><input id="dot-25" type="radio" onClick="score_display(25)"><label for="dot-25"></label></td>
                    <td align="center" valign="center"><input id="dot-26" type="radio" onClick="score_display(26)"><label for="dot-26"></label> </td>
                    <td align="center" valign="center"><input id="dot-27" type="radio" onClick="score_display(27)"><label for="dot-27"></label> </td>
                    <td align="center" valign="center"><input id="dot-28" type="radio" onClick="score_display(28)"><label for="dot-28"></label> </td>
                    <td align="center" valign="center"><input id="dot-29" type="radio" onClick="score_display(29)"><label for="dot-29"></label> </td>
                </tr>
                <tr>
                    <td align="center" valign="center"><input id="dot-30" type="radio" onClick="score_display(30)"><label for="dot-30"></label></td>
                    <td align="center" valign="center"><input id="dot-31" type="radio" onClick="score_display(31)"><label for="dot-31"></label></td>
                    <td align="center" valign="center"><input id="dot-32" type="radio" onClick="score_display(32)"><label for="dot-32"></label></td>
                    <td align="center" valign="center"><input id="dot-33" type="radio" onClick="score_display(33)"><label for="dot-33"></label></td>
                    <td align="center" valign="center"><input id="dot-34" type="radio" onClick="score_display(34)"><label for="dot-34"></label></td>
                    <td align="center" valign="center"><input id="dot-35" type="radio" onClick="score_display(35)"><label for="dot-35"></label></td>
                    <td align="center" valign="center"><input id="dot-36" type="radio" onClick="score_display(36)"><label for="dot-36"></label> </td>
                    <td align="center" valign="center"><input id="dot-37" type="radio" onClick="score_display(37)"><label for="dot-37"></label> </td>
                    <td align="center" valign="center"><input id="dot-38" type="radio" onClick="score_display(38)"><label for="dot-38"></label> </td>
                    <td align="center" valign="center"><input id="dot-39" type="radio" onClick="score_display(39)"><label for="dot-39"></label> </td>
                </tr>
                <tr>
                    <td align="center" valign="center"><input id="dot-40" type="radio" onClick="score_display(40)"><label for="dot-40"></label></td>
                    <td align="center" valign="center"><input id="dot-41" type="radio" onClick="score_display(41)"><label for="dot-41"></label></td>
                    <td align="center" valign="center"><input id="dot-42" type="radio" onClick="score_display(42)"><label for="dot-42"></label></td>
                    <td align="center" valign="center"><input id="dot-43" type="radio" onClick="score_display(43)"><label for="dot-43"></label></td>
                    <td align="center" valign="center"><input id="dot-44" type="radio" onClick="score_display(44)"><label for="dot-44"></label></td>
                    <td align="center" valign="center"><input id="dot-45" type="radio" onClick="score_display(45)"><label for="dot-45"></label></td>
                    <td align="center" valign="center"><input id="dot-46" type="radio" onClick="score_display(46)"><label for="dot-46"></label> </td>
                    <td align="center" valign="center"><input id="dot-47" type="radio" onClick="score_display(47)"><label for="dot-47"></label> </td>
                    <td align="center" valign="center"><input id="dot-48" type="radio" onClick="score_display(48)"><label for="dot-48"></label> </td>
                    <td align="center" valign="center"><input id="dot-49" type="radio" onClick="score_display(49)"><label for="dot-49"></label> </td>
                </tr>
                <tr>
                    <td align="center" valign="center"><input id="dot-50" type="radio" onClick="score_display(50)"><label for="dot-50"></label></td>
                    <td align="center" valign="center"><input id="dot-51" type="radio" onClick="score_display(51)"><label for="dot-51"></label></td>
                    <td align="center" valign="center"><input id="dot-52" type="radio" onClick="score_display(52)"><label for="dot-52"></label></td>
                    <td align="center" valign="center"><input id="dot-53" type="radio" onClick="score_display(53)"><label for="dot-53"></label></td>
                    <td align="center" valign="center"><input id="dot-54" type="radio" onClick="score_display(54)"><label for="dot-54"></label></td>
                    <td align="center" valign="center"><input id="dot-55" type="radio" onClick="score_display(55)"><label for="dot-55"></label></td>
                    <td align="center" valign="center"><input id="dot-56" type="radio" onClick="score_display(56)"><label for="dot-56"></label> </td>
                    <td align="center" valign="center"><input id="dot-57" type="radio" onClick="score_display(57)"><label for="dot-57"></label> </td>
                    <td align="center" valign="center"><input id="dot-58" type="radio" onClick="score_display(58)"><label for="dot-58"></label> </td>
                    <td align="center" valign="center"><input id="dot-59" type="radio" onClick="score_display(59)"><label for="dot-59"></label> </td>
                </tr></table></center></form>
</section>