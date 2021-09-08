<!-- File: /src/Template/Articles/view.ctp -->
<h1><?= h($material->material) ?></h1>
<p><?= h($material->description) ?></p>
<p><small>Created: <?= $material->created->format(DATE_RFC850) ?></small></p>