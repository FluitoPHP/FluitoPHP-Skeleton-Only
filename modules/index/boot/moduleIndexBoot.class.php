<?php

class moduleIndexBoot extends \FluitoPHP\Boot\Boot {

    public function Run() {

        indexBoot::Tinymce();
        indexBoot::FileManagerButtonModal();
    }

}
