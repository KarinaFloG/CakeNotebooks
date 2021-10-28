<!-- File: /src/Template/Articles/view.ctp -->
<link rel="stylesheet" href="/css/index.css" />
<h1><?= h($material->material) ?></h1>
<p class='p-style'><?= h($material->description) ?></p>
<p><small>Created: <?= $material->created->format(DATE_RFC850) ?></small></p>