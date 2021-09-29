<?php
//dump($notebook['id'])
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


<table class="table table-striped table-hover">
    <tr>
        <th>Action</th>
        <th>Id</th>
        <th>Type</th>
        <th>Created</th>
        
    </tr>
    <?php foreach ($notebooks as $notebook): ?>
        <tr>
            <td>
                <button style="margin: 8px" type="button" class="btn btn-danger fas fa-trash btn-delete-notebook">
                </button> 
                <button type="button" class="btn btn-warning fas fa-edit btn-edit-notebook">
                </button>
            </td>
            <td><?= $notebook['id'] ?></td>
            <td><?= $notebook['type'] ?></td>
            <td><?= $notebook['created'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
