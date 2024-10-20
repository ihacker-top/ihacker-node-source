<?php /*a:3:{s:61:"G:\WWWROOT\hackgame\application\hackgame\view\start\five.html";i:1729364470;s:71:"G:\WWWROOT\hackgame\application\hackgame\view\start\include\header.html";i:1729363989;s:71:"G:\WWWROOT\hackgame\application\hackgame\view\start\include\footer.html";i:1729362600;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>HackGame</title>
    <link href="<?php echo htmlentities(MY_ROOT_URL); ?>/public/static/hackgame/start/css/style.css" rel="stylesheet">
</head>
    

<body ondragstart="window.event.returnValue=false" oncontextmenu="window.event.returnValue=false" onselectstart="event.returnValue=false">
    <div class="app">
        <h1 class="title">第5关</h1>
        <p class="message">Flag已经给你了，看不看得到看你的本事了</p>
        <div class="content">
            <form method="post">
                <span>Flag：</span>
                <span><input name="flag" type="text" /></span>
                <span><button>提交</button></span>
                <p style="color: red;"><?php echo htmlentities($msg); ?></p>
            </form>
        </div>
    </div>
    <script src="<?php echo htmlentities(MY_ROOT_URL); ?>/public/static/hackgame/start/hg/five.js"></script>
</body>


<!-- 这里的内容与题目无关 -->

<!-- 这里的内容与题目无关 -->
</html>