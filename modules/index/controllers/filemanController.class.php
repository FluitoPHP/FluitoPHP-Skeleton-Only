<?php

class filemanController extends \FluitoPHP\Controller\Controller {

    private $fileman = null;

    public function __construct() {

        parent::__construct();

        $thumbURLPrefix = substr($this->
                                Request()->
                                URL('fileman', 'thumb'), strlen($this->
                                        Request()->
                                        URL())) . "?img=";

        $this->
                fileman = new \FluitoPHP\FileManager\FileManager(array(
            'thumbURLPrefix' => $thumbURLPrefix
        ));
    }

    public function indexAction() {
        $this->
                View()->
                Title("FluitoPHP FileManager");

        $this->
                View()->
                SetHeader('filemanHeader');

        $this->
                Request()->
                Get('tmce');

        $this->
                Events()->
                Add('Head', function() {
                    ?>
                    <link rel="stylesheet" href="<?php echo $this->URL("resources/css/FluitoPHP/FluitoPHP.css"); ?>">
                    <script src="<?php echo $this->URL("resources/js/FluitoPHP/FileManager/FileManager.js"); ?>"></script>
                    <script>
                        $(function () {
                            $.FluitoPHP.FileManager({
                                selector: '#FluitoPHP-filemanager',
                                multiSelect: false,
                                baseURL: '<?php echo $this->URL(); ?>',
                                selectCallback: function (selections, filemanager) {
                    <?php if ($this->Request()->Get('callback')): ?>top.window.<?php echo $this->Request()->Get('callback'); ?>.select(selections, filemanager);<?php endif; ?>
                                },
                                cancelCallback: function (filemanager) {
                    <?php if ($this->Request()->Get('callback')): ?>top.window.<?php echo $this->Request()->Get('callback'); ?>.close(filemanager);<?php endif; ?>
                                }
                            });
                        }
                        );
                    </script>
                    <?php
                });
    }

    public function thumbAction() {

        $imgPath = $this->
                        fileman->
                        GetBasePath() . $this->
                        Request()->
                        Get('img');

        $img = new \FluitoPHP\ImageFile\ImageFile($imgPath);

        $img->
                Render("");

        $this->
                Set('response', "Image do not exists.");

        $this->
                View()->
                SetHeader('');
        $this->
                View()->
                SetFooter('');
        $this->
                View()->
                SetView("filemanResponse");
    }

    public function listAction() {

        $return = array(
            'list' => [],
            'breadcrumbs' => []
        );

        if ($this->
                        Request()->
                        IsPost()) {

            $path = $this->
                    Request()->
                    Post('path');

            $return['list'] = $this->
                    fileman->
                    ListPath($path);

            $return['breadcrumbs'] = $this->
                    fileman->
                    GetBreadcrumbInfo($path);
        }

        $this->
                Set('response', json_encode($return));

        $this->
                View()->
                SetHeader('');
        $this->
                View()->
                SetFooter('');
        $this->
                View()->
                SetView("filemanResponse");

        $this->
                Response()->
                SetHeader("Expires: 0");
    }

    public function uploadAction() {

        $return = array('response' => array());

        if ($this->
                        Request()->
                        IsPost()) {

            $path = $this->
                    Request()->
                    Post('path');

            $return['response'] = $this->
                    fileman->
                    Upload('upload', '', $path);
        }

        $this->
                Set('response', json_encode($return));

        $this->
                View()->
                SetHeader('');
        $this->
                View()->
                SetFooter('');
        $this->
                View()->
                SetView("filemanResponse");

        $this->
                Response()->
                SetHeader("Expires: 0");
    }

    public function newdirectoryAction() {

        $return = false;

        if ($this->
                        Request()->
                        IsPost()) {

            $path = $this->
                    Request()->
                    Post('path');

            $directoryname = $this->
                    Request()->
                    Post('directoryname');

            $return = $this->
                    fileman->
                    CreateDirectory($directoryname, $path);
        }

        $this->
                Set('response', json_encode($return));


        $this->
                View()->
                SetHeader('');
        $this->
                View()->
                SetFooter('');
        $this->
                View()->
                SetView("filemanResponse");

        $this->
                Response()->
                SetHeader("Expires: 0");
    }

    public function cutAction() {

        $return = false;

        if ($this->
                        Request()->
                        IsPost()) {

            $path = $this->
                    Request()->
                    Post('path');

            $filePath = $this->
                    Request()->
                    Post('filepath');

            $return = $this->
                    fileman->
                    Move($filePath, $path);
        }

        $this->
                Set('response', json_encode($return));

        $this->
                View()->
                SetHeader('');
        $this->
                View()->
                SetFooter('');
        $this->
                View()->
                SetView("filemanResponse");

        $this->
                Response()->
                SetHeader("Expires: 0");
    }

    public function copyAction() {

        $return = false;

        if ($this->
                        Request()->
                        IsPost()) {

            $path = $this->
                    Request()->
                    Post('path');

            $filePath = $this->
                    Request()->
                    Post('filepath');

            $return = $this->
                    fileman->
                    Copy($filePath, $path);
        }

        $this->
                Set('response', json_encode($return));

        $this->
                View()->
                SetHeader('');
        $this->
                View()->
                SetFooter('');
        $this->
                View()->
                SetView("filemanResponse");

        $this->
                Response()->
                SetHeader("Expires: 0");
    }

    public function renameAction() {

        $return = false;

        if ($this->
                        Request()->
                        IsPost()) {

            $filePath = $this->
                    Request()->
                    Post('filepath');

            $newName = $this->
                    Request()->
                    Post('newname');

            $return = $this->
                    fileman->
                    Rename($filePath, $newName);
        }

        $this->
                Set('response', json_encode($return));

        $this->
                View()->
                SetHeader('');
        $this->
                View()->
                SetFooter('');
        $this->
                View()->
                SetView("filemanResponse");

        $this->
                Response()->
                SetHeader("Expires: 0");
    }

    public function deleteAction() {

        $return = false;

        if ($this->
                        Request()->
                        IsPost()) {

            $filePath = $this->
                    Request()->
                    Post('filepath');

            $return = $this->
                    fileman->
                    Delete($filePath);
        }

        $this->
                Set('response', json_encode($return));

        $this->
                View()->
                SetHeader('');
        $this->
                View()->
                SetFooter('');
        $this->
                View()->
                SetView("filemanResponse");

        $this->
                Response()->
                SetHeader("Expires: 0");
    }

}
