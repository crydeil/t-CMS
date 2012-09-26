<?=$html->getAdminHeader()?>  

    <div class="container">

        <div class="row">

            <div class="span2">
                <p><img id="t-cms-logo" src="<?=THEME?>/img/t-cms-logo.png" alt="t-CMS logo" /></p>
            </div>                        
            <div class="span10">
                <p><?=$menu->getAdminTech()?></p>
            </div>	

        </div>

        <div class="row">

            <div class="span12">
                <?=$breadcrumbs->getAdmin()?>			
            </div>

            <div class="span3">
                <?=$menu->getAdmin()?>
            </div>

            <div class="span9">
                <?=$admin->getDashboard()?>
            </div>

        </div>
        
<?=$html->getAdminFooter()?>