<?=$header->getAdmin()?>

    <div class="container">

        <div class="row">

            <div class="span4">
                <h1>Привет, <?=$header->getAdminLogin()?>!</h1>
            </div>
            <div class="span8">
                <?=$menu->getAdmin_0()?>
            </div>	

        </div>

        <hr />

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