<html>
    <head>
        <meta charset="utf-8" />
        <title>Все новости</title>
    </head>
    <body>
        <form action="" method="post">
            <label>Название:<br/>
            <input type="text" name="title" value="<?php
            if (isset($val['title'])) {
                echo $val['title'];
            }?>">
            </label><br/>
            <label>Текст:<br/>
            <textarea name="text"><?php if (isset($val['text'])) { echo $val['text']; } ?></textarea><br/>
            </label>
            <input type="submit"/>
        </form>
    </body>
</html>