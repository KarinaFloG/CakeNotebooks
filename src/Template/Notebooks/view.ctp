<?php
foreach ($notebook as $key => $value){

}
?>

<h1><?= h($value['notebooks']['type']) ?></h1>
<p><?= h($value['notebooks']['description']) ?></p>
<h4>MATERIALS</h4>

<table>
<tr>
        <td>Material</td>
        <td>Description</td>
</tr>
<?php foreach ($notebook as $key => $value): ?>
    
    <tr>
        <td><?= $value['m']['material'] ?></td>
        <td><?= $value['m']['description'] ?></td>
    </tr>
<?php endforeach; ?>

</table>

