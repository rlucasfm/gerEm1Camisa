<?php $pager->setSurroundCount(1) ?>

<nav aria-label="Page navigation">
    <ul class="pagination">
    <?php if ($pager->hasPrevious()) : ?>
        <li>
            <a href="<?= $pager->getFirst() ?>" aria-label="Primeiro">
                <button type="button" class="btn btn-outline-primary ml-1">Primeiro</button>
            </a>
        </li>
        <li>
            <a href="<?= $pager->getPrevious() ?>" aria-label="<<">
                <button type="button" class="btn btn-outline-success ml-1"><</button>
            </a>
        </li>
    <?php endif ?>

    <?php foreach ($pager->links() as $link) : ?>
        <li class="ml-2" <?= $link['active'] ? 'class="active"' : '' ?>>
            <a href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        </li>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
        <li>
            <a href="<?= $pager->getNext() ?>" aria-label=">>">
                <button type="button" class="btn btn-outline-success ml-2">></button>
            </a>
        </li>
        <li>
            <a href="<?= $pager->getLast() ?>" aria-label="Último">
            <button type="button" class="btn btn-outline-primary ml-1">Último</button>
            </a>
        </li>
    <?php endif ?>
    </ul>
</nav>