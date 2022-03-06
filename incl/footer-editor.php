</div><!-- /container -->   
<footer>
<div id="footer-toolbar">
        <p>Projekt - DT093G, Webbutveckling II  |  Natalie Salomons Frick. nasa2014</p>
    </div>
</footer>
    

<script src="js/ckeditor/ckeditor.js"></script>
<script src="js/script.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor-story' ) )
    .catch( error => {
        console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector( '#editor-ingredients' ) )
    .catch( error => {
        console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector( '#editor-directions' ) )
    .catch( error => {
        console.error( error );
    } );
</script>

</body>
</html>