function validation() {
    var title = document.forms["gameForm"]["title"].value;
    var body = document.forms["gameForm"]["body"].value;
    if (title == null || title == "" || body == null || body == "") {
        document.querySelector('notify').textContent = "You must complete all required fields.";
        return false;
    }
}