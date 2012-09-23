<?=$header->getPublic()?>

    <div class="container">

        <div class="row">

            <div class="span9">                    
                <a href="<?=BASE_URL?>">На главную</a>
            </div>

            <div class="span3">
                <?=$menu->getPublic_0()?>
            </div>
            
        </div>

        <hr />

        <div class="row">
            
            <div class="span8">                    
                <?=$public->getList()?>
            </div>

            <div class="span4">
                
                <?=$public->getSettings()['body']?>                    
                <?=$menu->getPublic_1()?>
                
            </div>
            
        </div>

        <hr />

    </div>

<?=$footer->getPublic()?>