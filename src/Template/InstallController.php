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
    <script src="js/Install.js"></script>
</head>
<body>
<script>
    BX24.ready(function()
    {
        BX24.init(function()
        {
            let installer = new Install();
            installer.add("automatically_checklist", "<?=$parameters["handler"]?>", "Checklist", "Чек-лист необходимых действий");
            BX24.installFinish();
        })
    });
</script>
</body>
</html>
