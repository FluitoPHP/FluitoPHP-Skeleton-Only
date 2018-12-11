<?php

class indexController extends \FluitoPHP\Controller\Controller {

    public function indexAction() {

        $examples = array(
            'tinymce' => array(
                'title' => 'TinyMCE with FileManager',
                'URL' => $this->URL("index", "tinymce", "index")
            ),
            'filemanager' => array(
                'title' => 'Standalone FileManager',
                'URL' => $this->URL("fileman", "index", "index")
            )
        );

        $this->
                Set('examples', $examples);
    }

    public function robotsAction() {

        $this->
                View()->
                SetHeader('');
        $this->
                View()->
                SetFooter('');
        $this->
                Response()->
                SetContentType('text/plain');
    }

    public function tinymceAction() {

        $this->
                View()->
                Title("FluitoPHP TinyMCE Example");
    }

}
