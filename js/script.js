function confirmDelete(id){
    var response = confirm("Delete recipe " + id + "?");
    // return true;
    if (response==true) {
        window.location = ("delete-recipe.php?id="+id); 
    } else { window.location = ("admin.php"); }
};


