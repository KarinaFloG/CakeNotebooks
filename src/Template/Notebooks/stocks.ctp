<h1>
    Notebooks in Stocks
    <?= $this->Text->toList(h($stocks)) ?>
</h1>

<section>
<?php foreach ($stocks as $stock): ?>
    <article>
        <!-- Use the HtmlHelper to create a link -->
        <h4><?= $this->Html->link($stock->name, $stock->quantity) ?></h4>
        <small><?= h($stock->name) ?></small>

        <!-- Use the TextHelper to format text -->
        
    </article>
<?php endforeach; ?>
</section>
