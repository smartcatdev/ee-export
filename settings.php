<div id="welcome-panel">
    
    <h2>Click here to run the import script</h2>
    <div>
        <a href="<?php echo admin_url('?page=ee_import&confirm=yes'); ?>" class="button button-primary button-hero">Do Import</a>
    </div>
    
    <?php if( isset( $_GET['confirm'] ) ) : ?>
        
        <?php EEImport::do_import(); ?>
        
        <h3 style="color: green">Import successfully completed!</h3>
    
    <?php endif; ?>
</div>