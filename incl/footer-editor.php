</div><!-- /container -->   
    <footer id="mainfooter">
        <p>Projekt - DT093G, Webbutveckling II. <br> Natalie Salomons Frick. nasa2014</p>
    </footer><!-- /mainfooter -->
    

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