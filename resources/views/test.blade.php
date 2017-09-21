
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>A Simple Page with CKEditor</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    </head>


    <body>
        <form>
            <textarea name="body" id="body" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'body' );
            </script>
        </form>
    </body>
</html>
