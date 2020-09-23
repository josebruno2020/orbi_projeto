<ul class="pagination-sm">
    <?php for($q=1;$q<=$total_paginas;$q++): ?>
        <li class="<?= ($p==$q)?'active':''; ?>">
            <a href="<?=$base;?>?<?php
                $w = $_GET;
                $w['p'] = $q;
                echo http_build_query($w);
                ?>"><?= $q; ?>
            </a>
        </li>
    <?php endfor; ?>
</ul>