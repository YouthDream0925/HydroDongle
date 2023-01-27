var FileLoader = function () {
    //Cannot be called from outside this function
    var  FileLoad = function(selector, container) {
        $('#' + selector).on("change", function () {
            // the files is a new property from the new File API, if if it is not supported assign an empty array as the value of files
            var files = !! this.files ? this.files : [];
    
            //if there are no files and FileReader is not supported return
            if (!files.length || !window.FileReader) return;
    
            var file_name = files[0].name;
    
            if (/^image/.test(files[0].type)) {
                var reader = new FileReader();
                reader.readAsDataURL(files[0]);
                reader.onloadend = function (event) {
                    $('#' + container).prop('src', event.target.result);
                    $('#' + container).prop('title', file_name);
                }
            } else {
                new bs5.Toast({
                    body: lang.selectError,
                    className: 'border-0 bg-danger text-white',
                    btnCloseWhite: true,
                }).show();
            }
        });
    }
 
    //Return only what must be publicly accessible, in this
    //case only the show() method
    return {
        init: function(selector, container) {
            FileLoad(selector, container);
        }
    }
 }();