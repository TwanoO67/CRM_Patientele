<!DOCTYPE html>
<html>
    <head>
        <title>Editeur de contenu HTML</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script src="/js/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <form>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
        </form>
    </body>
</html>