<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="//api.bitrix24.com/api/v1/dev/"></script>
    <script src="js/View.js"></script>
</head>
<body>
    <div class="workarea" style="width: 90%; ">
            <span>
                <div id = "checklist">

                </div>
            </span>
    </div>
    <script>
        BX24.ready(function()
        {
            BX24.init(function()
            {
                BX24.resizeWindow(document.body.clientWidth,
                    document.getElementsByClassName("workarea")[0].clientHeight);
                let view = new View('<?=$parameters["placement"]->getValue()?>', '<?=$parameters["placement"]->getDealId()?>');
                view.run();
            })
        })
    </script>
</body>
</html>
