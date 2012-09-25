<?=$header->getAdmin()?>
    
    <div class="container">

        <div class="row">

            <div class="span2">
                <p><img id="t-cms-logo" src="<?=THEME?>/img/t-cms-logo.png" alt="t-CMS logo" /></p>
            </div>                        
            <div class="span10">
                <p><?=$menu->getAdmin_0()?></p>
            </div>	

        </div>

        <div class="row">

            <div class="span12">
                <?=$breadcrumb->getAdmin()?>			
            </div>

            <div class="span3">
                <?=$menu->getAdmin_1()?>
            </div>

            <div class="span9">
                <?=$admin->getList()?>
            </div>

        </div>

<?=$footer->getAdmin()?>