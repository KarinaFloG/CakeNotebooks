<!-- File: /src/Template/Articles/view.ctp -->
<<<<<<< HEAD
<h1><?= h($notebook->type) ?></h1>
<p><?= h($notebook->description) ?></p>
<p><small>Created: <?= $notebook->created->format(DATE_RFC850) ?></small></p>
=======
<?php
//dump($notebook);
foreach ($notebook as $key => $value){
    //dump($value);

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

>>>>>>> ca57cb4 (Se agrega vista para la relación entre Notebooks y Materials)
