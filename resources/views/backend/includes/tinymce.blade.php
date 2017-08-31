<script src="{{ url( 'packages/tinymce/tinymce.min.js' ) }}" type="text/javascript"></script>
<script>
    tinymce.init({
        // selector: ".tinymce",
        theme: "modern",
        mode : "exact",
        // added elements --yojan
        elements : ["content","short_desc", "short_desc2", "statcontent", "long_desc", "description", "content_it", "detail", "offer", "top_content", "bottom_content", "return_policy", "release_note"],
        // elements : ["content","short_desc","statcontent"],
        menubar : false,
        relative_urls: true,
        extended_valid_elements : "span,i[class],script[type|src|async],iframe[src|style|width|height|scrolling|marginwidth|marginheight|frameborder]",
        
        forced_root_block: false, // Start tinyMCE without any paragraph tag
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars media nonbreaking",
            "table contextmenu directionality paste textcolor code localautosave"
        ],
        toolbar1: "localautosave | bold italic underline hr | link unlink image media | styleselect forecolor backcolor paste | bullist numlist outdent indent | code preview ",
        entity_encoding: "raw",
        file_picker_callback : elFinderBrowser
    });

    function elFinderBrowser(callback, value, meta) {
        var request = "{{ route('elfinder.tinymce4') }}";
        tinymce.activeEditor.windowManager.open({
            title: '{{  trans('admin.elfinder') }}',
            url: request,
            width: 900,
            height: 450,
           path : '/public/files/',
            resizable: 'yes',
            
            uiOptions: {
                    toolbar : [
                        // toolbar configuration
                        ['open'],
                        ['back', 'forward'],
                        ['reload'],
                        ['home', 'up'],
                        ['mkdir', 'mkfile', 'upload'],
                        ['info'],
                        ['quicklook'],
                        ['copy', 'cut', 'paste'],
                        ['rm'],
                        ['duplicate', 'rename', 'edit'],
                        ['extract', 'archive'],
                        ['search'],
                        ['view'],
                        ['help']
                    ],
                    path : '/public/files/'
                },
                contextmenu : {
                    files  : [
                        'getfile', '|','open', '|', 'copy', 'cut', 'paste', 'duplicate', '|',
                        'rm', '|', 'edit', 'rename', '|', 'archive', 'extract', '|', 'info'
                    ]
                }
        }, {
            setUrl: function (url) {
                callback(url);
                //$('.mce-textbox').val(url.replace('files','public/files'));
               
            }
        });
        return false;
    }

// tinymce for selecting by class
    tinymce.init({
        selector: ".tinymce",
        theme: "modern",
        mode : "exact",
        // added elements --yojan
        // elements : ["content","short_desc","statcontent", "long_desc", "description", "content_it"],
        // elements : ["content","short_desc","statcontent"],
        menubar : false,
        relative_urls: true,
        extended_valid_elements : "span,i[class],script[type|src|async],iframe[src|style|width|height|scrolling|marginwidth|marginheight|frameborder]",
        
        forced_root_block: false, // Start tinyMCE without any paragraph tag
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars media nonbreaking",
            "table contextmenu directionality paste textcolor code localautosave"
        ],
        toolbar1: "localautosave | bold italic underline hr | link unlink image media | styleselect forecolor backcolor paste | bullist numlist outdent indent | code preview ",
        entity_encoding: "raw",
        file_picker_callback : elFinderBrowser
    });

    function elFinderBrowser(callback, value, meta) {
        var request = "{{ route('elfinder.tinymce4') }}";
        tinymce.activeEditor.windowManager.open({
            title: '{{  trans('admin.elfinder') }}',
            url: request,
            width: 900,
            height: 450,
           path : '/public/files/',
            resizable: 'yes',
            
            uiOptions: {
                    toolbar : [
                        // toolbar configuration
                        ['open'],
                        ['back', 'forward'],
                        ['reload'],
                        ['home', 'up'],
                        ['mkdir', 'mkfile', 'upload'],
                        ['info'],
                        ['quicklook'],
                        ['copy', 'cut', 'paste'],
                        ['rm'],
                        ['duplicate', 'rename', 'edit'],
                        ['extract', 'archive'],
                        ['search'],
                        ['view'],
                        ['help']
                    ],
                    path : '/public/files/'
                },
                contextmenu : {
                    files  : [
                        'getfile', '|','open', '|', 'copy', 'cut', 'paste', 'duplicate', '|',
                        'rm', '|', 'edit', 'rename', '|', 'archive', 'extract', '|', 'info'
                    ]
                }
        }, {
            setUrl: function (url) {
                callback(url);
                //$('.mce-textbox').val(url.replace('files','public/files'));
               
            }
        });
        return false;
    }
</script>
