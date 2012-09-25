<?=$HTML->getPublicHeader()?>

    <div class="container">

        <div class="row">

            <div class="span6">
                <p></p>
                <p class="lead"><?=$CONTENT->getHomePage()['title']?></p>
            </div>

            <div class="span6">
                <?=$MENU->getPublic_0()?>
            </div>
            
        </div>

        <hr />

        <div class="row">
            
            <div class="span8">                    
                <?=$CONTENT->getPublic()?>
            </div>

            <div class="span4">
                
                <?=$CONTENT->getHomePage()['body']?>                    
                <?=$MENU->getPublic_1()?>
                
            </div>
            
        </div>
        
        <hr />
            
        <div class="row">

            <div class="span4">
            <small>&copy; 2012 <a href="http://totstar.ru" target="_blank">totstar</a> projects group</small>
            </div>

            <div class="span8">
            <small class="pull-right"><a href="https://github.com/VikkyShostak/t-CMS" target="_blank"><i class="icon-github"></i> t-CMS GitHub page</a></small>

            </div>
        </div>

    </div>

    <br />

<?=$HTML->getPublicFooter()?>