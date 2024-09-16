function show() {
    var x = document.querySelector(".corenav");
    if (x.className === "corenav") {
        x.className += " show";
    } else {
        x.className = "corenav";
    }
}
function showdropdown() {
    var x = document.querySelector(".dropdowncontent");
    if (x.className === "dropdowncontent") {
        x.className += " show";
    } else {
        x.className = "dropdowncontent";
    }
}