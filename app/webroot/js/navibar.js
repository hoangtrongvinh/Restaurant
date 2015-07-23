$(document).ready(function(){
    if(document.URL.indexOf("menu") != -1) {
        $("#a1").addClass("active");
}
    if(document.URL.indexOf("food") != -1) {
        $("#a2").addClass("active");
}
    if(document.URL.indexOf("trong_ngay") != -1) {
        $("#a3").addClass("active");
        $("#a2").removeClass("active");
}
    if(document.URL.indexOf("theo_mua") != -1) {
        $("#a4").addClass("active");
         $("#a2").removeClass("active");
}
    if(document.URL.indexOf("new") != -1) {
        $("#a6").addClass("active");
}
    if(document.URL.indexOf("contact") != -1) {
        $("#a5").addClass("active");
}
if(document.URL.indexOf("cart") != -1) {
        $("#a7").addClass("active");
}
});