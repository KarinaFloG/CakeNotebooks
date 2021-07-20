<h1>
    Notebooks in Stocks
    <?= $this->Text->toList(h($stocks)) ?>
</h1>

<section>
<?php foreach ($notebooks as $notebook): ?>
    <article>
        <!-- Use the HtmlHelper to create a link -->
        <h4><?= $this->Html->link($notebook->type, $notebook->description) ?></h4>
        <small><?= h($notebook->price) ?></small>

        <!-- Use the TextHelper to format text -->
        
    </article>
<?php endforeach; ?>
</section>
