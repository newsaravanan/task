<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="{$ASSESTPATH}/css/bootstrap.min.css" rel="stylesheet">
    {block name=cssfiles}{/block}
</head>
<body>
    <div class="container">
        {block name=body}{/block}
    </div>
</body>
    <script src="{$ASSESTPATH}/js/jquery-2.1.3.min.js"></script>
    <script src="{$ASSESTPATH}/js/bootstrap.min.js"></script>
    {block name=jsfiles}{/block}
    <script type="text/javascript">
    var baseUrl = '{$site_url}';
    </script>
</html>