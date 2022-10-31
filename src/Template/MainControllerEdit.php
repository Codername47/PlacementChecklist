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
    <script src="js/Edit.js"></script>
</head>
<body>
<select size = 11 style="width:90%;" id="fields" multiple="multiple">
</select>
<script>
    var edit = new Edit('<?=$parameters["placement"]->getValue()?>', '<?=$parameters["placement"]->getCurrentField()?>');
    edit.run();
</script>
</body>
</html>
