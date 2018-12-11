<div class="text-center mt-4 mb-2">
    <h1>
        <img src="<?php echo $this->URL('resources/img/logo-sq-100.png'); ?>"/>
        FluitoPHP Framework
    </h1>
</div>
<div>
    <div class="card mb-2">
        <h3 class="card-header">Cheers...</h3>
        <div class="card-body">
            <p class="card-text">
                You have successfully downloaded FluitoPHP Framework.<br/>
                And is now up and running.<br/>
                Please start creating your web application.
            </p>
            <h5 class="card-subtitle mb-2 text-muted">Examples</h5>
            <?php
            $examples = $this->
                    Get('examples');
            ?>
            <ol>
                <?php foreach ($examples as $example): ?>
                    <li><a href="<?php echo $example['URL']; ?>" title="<?php echo $example['title']; ?>"><?php echo $example['title']; ?></a></li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
</div>