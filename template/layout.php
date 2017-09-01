<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title><?= Theme::$pageTitle ?></title>
        <style>
            .main{
                width: 800px;
                margin: 0px auto;
            }

            .header{
                height: 80px;
                background-color: #ddd;
            }

            .content-body{
                min-height: 400px;
                background-color: #BBB;
                width: 800px;
            }
            .menu{
                float:  right;
                width: 200px;
                min-height: 400px;
                background-color: #888;
            }
            .content{
                float:  right;
                width: 600px;
                min-height: 400px;
                background-color: #999;
            }
            .footer{
                height: 80px;
                background-color: #ccc;
            }
        </style>
    </head>
    <body>
        <div class="main">
            <div class="header"></div>
            <div class="content-body">
                <div class="menu">
                    <ul>
                </div>
                <div class="content">
                    <?= $content ?>
                </div>
            </div>
            <div class="footer">
                <?= Theme::$footer ?>
            </div>
        </div>
    </body>
</html>
