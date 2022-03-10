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



