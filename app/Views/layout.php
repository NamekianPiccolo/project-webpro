<?= $this->include('partials/header') ?>

    <?= $this->include('partials/sidebar') ?>
    
    <div class="main-content d-flex flex-column">
        <div class="flex-grow-1">
            <?= $this->renderSection('content') ?>
        </div>
        
<?= $this->include('partials/footer') ?>