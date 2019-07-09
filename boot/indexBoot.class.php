<?php

class indexBoot extends \FluitoPHP\Boot\Boot {

    public function Run() {

    }

    static public function Tinymce() {

        \FluitoPHP\FluitoPHP::GetInstance()->Events()->Add('Head', function () {
            ?><script src="<?php echo \FluitoPHP\FluitoPHP::GetInstance()->Request()->URL("resources/tinymce/tinymce.min.js"); ?>"></script>
            <script>
                tinymce.init({
                    selector: '.wysiwyg',
                    plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                        'insertdatetime media nonbreaking save table contextmenu directionality',
                        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc code codemirror help'
                    ],
                    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample | code | forecolor backcolor | help',
                    relative_urls: false,
                    browser_spellcheck: true,
                    image_advtab: true,
                    branding: false,
                    height: 300,
                    init_instance_callback: function (editor) {
                        editor.on('change', function (e) {
                            $(e.target.targetElm).val(e.target.getContent());
                        });
                    },
                    codemirror: {
                        indentOnInit: true,
                        path: 'codemirror'
                    },
                    file_picker_callback: function (callback, value, meta) {
                        tinymce.activeEditor.windowManager.open({
                            title: "File Manager",
                            url: '<?php echo \FluitoPHP\FluitoPHP::GetInstance()->Request()->URL("fileman", "index", "index", null, array('callback' => 'tmce')); ?>',
                            width: (function () {
                                return $(window).width();
                            })(),
                            height: (function () {
                                return $(window).height() - 42;
                            })()
                        }, {
                            callback: callback,
                            value: value,
                            meta: meta
                        });
                    }
                });

                window.tmce = {
                    select: function (selections, filemanager) {
                        var parms = top.tinymce.activeEditor.windowManager.getParams();
                        if (parms.meta.filetype == 'file') {

                            parms.callback(selections[0].url, {
                                text: selections[0].basename
                            });
                        } else if (parms.meta.filetype == 'image') {

                            parms.callback(selections[0].url, {
                                alt: selections[0].basename,
                                width: selections[0].imagesizex,
                                height: selections[0].imagesizey
                            });
                        } else if (parms.meta.filetype == 'media') {

                            parms.callback(selections[0].url, {});
                        }

                        top.tinymce.activeEditor.windowManager.close();
                    },
                    close: function (filemanager) {
                        top.tinymce.activeEditor.windowManager.close();
                    }
                };
            </script><?php
        });
    }

    static public function FileManagerButtonModal() {

        \FluitoPHP\FluitoPHP::GetInstance()->Events()->Add('Footer', function () {
            ?><div class="modal fade" id="FileManagerModal" tabindex="-1" role="dialog" aria-labelledby="FileManagerModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="FileManagerModalLongTitle">File Manager</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"></div>
                    </div>
                </div>
            </div><?php
        });

        \FluitoPHP\FluitoPHP::GetInstance()->Events()->Add('Head', function () {
            ?>
            <script>
                (function ($) {
                    $(function () {
                        $('.FileManagerButton').on('click.FluitoPHP', function () {
                            window.FileManagerButtonModal.element = this;

                            $('#FileManagerModal').modal('show');

                            var height = $(window).height() - 160;

                            $('#FileManagerModal .modal-body').html($('<iframe src="<?php echo \FluitoPHP\FluitoPHP::GetInstance()->Request()->URL("fileman", "index", "index", null, array('callback' => 'FileManagerButtonModal')); ?>" style="width: 100%; border: 0; height: ' + height + 'px;"></iframe>'));
                        });

                        $('#FileManagerModal').on('hide.bs.modal', function (event) {
                            $('#FileManagerModal .modal-body').html('');
                        });
                    });

                    window.FileManagerButtonModal = {
                        element: {},
                        select: function (selections, filemanager) {
                            var target = $(window.FileManagerButtonModal.element).attr('data-target');

                            if ($(target).is('input') || $(target).is('textarea')) {

                                $(target).val(selections[0].url).trigger('change');
                            } else {

                                $(target).html(selections[0].url);
                            }

                            $('#FileManagerModal').modal('hide');
                        },
                        close: function (filemanager) {
                            $('#FileManagerModal').modal('hide');
                        }
                    };
                })(jQuery);
            </script>
            <?php
        });
    }

}
