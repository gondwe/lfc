
<li class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
    <?php foreach($menus as $group=>$list): ?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" style='color:#aaa' href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?=rxx($group,2)?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php foreach($list as $k=>$items): ?>
        <?php if(is_array($items)): $url=current($items); ?>
            <a class="dropdown-item" href="<?=base_url($url)?>"><?=ucwords(strtolower($k))?></a>
        <?php else: ?>
            <a class="dropdown-item" href="<?=base_url($items)?>"><?=ucwords(strtolower($items))?></a>
        <?php endif ?>
        <?php endforeach; ?>
        </div>
        </li>
    <?php endforeach; ?>
    </ul>
</li>