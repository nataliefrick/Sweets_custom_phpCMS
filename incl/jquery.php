
<button class="button" onclick="toogle()">Toggle</button>

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script>
$(".class").click(function() {
    $(this).slideUp();
});

function toggle() {
    $(".class").toggle("slow");
}



</script>