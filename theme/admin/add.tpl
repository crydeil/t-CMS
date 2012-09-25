<?=$HTML->getAdminHeader()?>
                    
    <div class="container">

        <div class="row">

            <div class="span2">
                <p><img id="t-cms-logo" src="<?=THEME?>/img/t-cms-logo.png" alt="t-CMS logo" /></p>
            </div>                        
            <div class="span10">
                <p><?=$MENU->getAdmin_0()?></p>
            </div>	

        </div>

        <div class="row">

            <div class="span12">
                <?=$BREADCRUMBS->getAdmin()?>			
            </div>

            <div class="span3">
                <?=$MENU->getAdmin_1()?>
            </div>

            <div class="span9">
                <?=$admin->getAdd()?>
            </div>

        </div>

<?=$HTML->getAdminFooter()?>