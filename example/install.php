<!DOCTYPE html>
<html>
<head>
	<script src="//api.bitrix24.com/api/v1/dev/"></script>
    <script src="install.js"></script>
</head>
<body>
    <pre id="debug" style="border: solid 1px #aaa; padding: 10px; background-color: #eee">&nbsp;</pre>
    <?$handler = ($_SERVER['SERVER_PORT'] === '443' ? 'https' : 'http').'://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/';?>
    <script>
        BX24.ready(function()
        {
            BX24.init(function()
            {
                test.add("checklist_auto", "<?=$handler."auto/"?>", "Checklist", "Чек-лист необходимых действий");
                test.add("checklist_manual", "<?=$handler."manual/view/"?>", "Checklist manual", "Чек-лист, заполняемый вручную");
                test.add("checklist_manual_fields", "<?=$handler."manual/list/"?>", "Checklist manual fields", "Поля заполняемого вручную чек-листа");
                BX24.installFinish();
            })
        });
    </script>
</body>