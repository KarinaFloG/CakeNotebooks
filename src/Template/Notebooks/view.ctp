<!-- File: /src/Template/Articles/view.ctp -->
<h1><?= h($notebook->type) ?></h1>
<p><?= h($notebook->description) ?></p>
<p><small>Created: <?= $notebook->created->format(DATE_RFC850) ?></small></p>