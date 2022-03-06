function confirmDelete(id){
    var response = confirm("Delete recipe " + id + "?");
    // return true;
    if (response==true) {
        window.location = ("delete-recipe.php?id="+id); 
    } else { window.location = ("admin.php"); }
};

function signup() {
    var response = confirm("By signing for our email list you agree to us saving your information according to GDPR and that you want to recieve updates from us.");

    // return true;
    if (response==true) {
        alert("You are not really signed up for anything yet. We are not ready to send out email updates yet."); 
    } else { 
        alert("Thats ok, it was a dummy form anyway ;) .");  
    }
};

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}

