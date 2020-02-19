var validarCookie = localStorage.getItem("validarCookie");;
if(validarCookie == 'habilitada'){
    $("#divcookies").css({'visibility':'hidden'});
}



$("#btncookies").click(function(){
    localStorage.setItem("validarCookie", "habilitada");
});
