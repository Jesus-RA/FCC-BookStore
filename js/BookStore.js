function vCaptcha(){
    var form = $('#registerForm');
    $.ajax({
        url: 'recaptcha.php',
        type: 'POST',
        data : form.serialize(),
        success: function(response){
            console.log(response);
            
            if(response ==='1'){
                location.href = "login.html";
            }else{
                $('#resCaptcha').html(response);
            }
        }
    });
}

function loginF() {
    $('#emailWrong').html(' ');
    $('#passlWrong').html(' ');
    var form = $('#loginForm');
    $.ajax({
        url: 'login.php',
        type: 'POST',
        data: form.serialize(),
        success: function (response) {
            console.log(response);
            if(response === '1'){
                location.href = "index.php";
            }else if(response === 'Usuario incorrecto'){
                $('#emailWrong').html(response);
            }else if(response === 'Contraseña incorrecta'){
                $('#passWrong').html(response);
            }
        }
    });
}

function addBook(){
    var form = $('#sellForm');
    var datos = new FormData;
    datos.append("foto", $('#foto')[0].files[0]);
    $.ajax({
        url: 'addBook.php',
        type: 'POST',
        data: (datos),
        success: function(response){
            console.log(response);
        }
    });
}