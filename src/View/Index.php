<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form method="post">
    <label>
        <input name="content">
    </label>
    <button>登録</button>
</form>
<table>
    <tbody>
    <?php foreach ($contents as $row) { ?>
        <tr>
            <?php foreach ($row as $value) { ?>
                <td><?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?></td>
            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
