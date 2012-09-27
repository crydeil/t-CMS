<?=$html->getPublicPageHeader()?>

    <div class="container">

        <div class="row">

            <div class="span6">
                <p></p>
                <p class="lead"><?=$public_page->getHomeTitle()?></p>
            </div>

            <div class="span6">
                <?=$menu->getPublicPageTech()?>
            </div>
            
        </div>

        <hr />

        <div class="row">
            
            <div class="span8">                    
                <?=$public_page->getContent()?>
            </div>

            <div class="span4">
                
                <?=$public_page->getHomeBody()?>                    
                <?=$menu->getPublicPage1()?>
                
            </div>
            
        </div>
        
        <hr />
            
        <div class="row">

            <div class="span4">
            <small>&copy; 2012 <a href="http://totstar.ru" target="_blank">totstar</a> projects group</small>
            </div>

            <div class="span8">
            <small class="pull-right"><a href="<?=BASE_URL?>/rss" target="_blank"><i class="icon-rss"></i> RSS feed</a><br /><a href="https://github.com/VikkyShostak/t-CMS" target="_blank"><i class="icon-github"></i> t-CMS GitHub page</a></small>

            </div>
        </div>

    </div>

    <br />

<?=$html->getPublicPageFooter()?>