<?=$header->getPublic()?>

    <div class="container">

        <div class="row">

            <div class="span6">
                <p></p>
                <p class="lead"><?=$settings->getMainTitle()?></p>
            </div>

            <div class="span6">
                <?=$menu->getPublic_0()?>
            </div>
            
        </div>

        <hr />

        <div class="row">
            
            <div class="span8">                    
                <?=$public->getList()?>
            </div>

            <div class="span4">
                
                <?=$settings->getMainBody()?>                    
                <?=$menu->getPublic_1()?>
                
            </div>
            
        </div>

<?=$footer->getPublic()?>