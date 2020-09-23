<div class="row">
    
    <?php if(!empty($_SESSION['mensagem'])): ?>
        <div class="alert alert-<?= $_SESSION['tipo_mensagem'];?>">
            <?=$_SESSION['mensagem'];?>
        </div>
    <?php endif; ?>
    
    <?php unset($_SESSION['mensagem'], $_SESSION['tipo_mensagem']);?>
</div>