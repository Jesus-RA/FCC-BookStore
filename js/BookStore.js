// Función para validar el captcha
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

// Función para el login
function loginF(){
    $('#emailWrong').html(' ');
    $('#passWrong').html(' ');
    var form = $('#loginForm');
    $.ajax({
        url: 'login.php',
        type: 'POST',
        data: form.serialize(),
        success: function(response){
            console.log(response);
            let res = response
            if(response == 1){
                location.href = "index.php";
            }else if(response == 2){
                console.log('Entre user wrong');
                $('#emailWrong').html('Usuario incorrecto');
            }else if(response == 3){
                console.log('Entre pass wrong');
                $('#passWrong').html('Contraseña incorrecta');
            }
        }
    });
}

// Código para obtenr los libros por area
$(function(){
    $('#area').change(function(){
        let area = $('#area').val();
        $.ajax({
            url: 'libros_x_area.php',
            type: 'POST',
            data: {area},
            success: function(response){
                console.log(response);
                let libros = JSON.parse(response);
                let template = '';
                let cont = 0;
                libros.forEach(libro => {
                    template += `
                        <div class="card-deck col-lg-4" id="books">
                            <div class="card" idLibro="${libro.idLibro}">
                                <img src="img/${libro.foto}" class="card-img-top" alt="${libro.foto}">
                                <div class="card-body">
                                    <h5 class="card-title">${libro.titulo}</h5>
                                    <p class="card-text"><b>Area:</b> ${libro.Area}</p>
                                    <p class="card-text"><b>Estado:</b> ${libro.Estado}</p>
                                    <p class="card-text"><b>Descripción:</b> ${libro.descripcion}</p>
                                    <p class="card-text"><b>Precio:</b> $ ${libro.precio} MXN</p>
                                    
                                </div>
                                <div class="card-footer">
                                    <form action="realizarCompra.php" method="POST">
                                        <input type="hidden" class="libroElegido" name="libroAComprar">
                                        <button type="submit" class="form-control btn-dark libro">Comprar</button>
                                    </form>           
                                </div>
                            </div>
                        </div>
                    
                    
                                `;
                    cont = cont+1;
                });
                if(cont>0){
                    $('#libros').html(template);
                }else{
                    template = `
                        <div class="alert alert-danger col-lg-6 text-center mx-auto">Lo sentimos, no se encontraron resultados.</div>
                    `;
                    $('#libros').html(template);
                }
                
            }
        });
    })
})

// Código para mandar id del libro que quiero comprar
$(document).on('click', '.libro', function(){
    let element = $(this)[0].parentElement.parentElement.parentElement;
    console.log(element);
    let idLibro = $(element).attr('idLibro');
    console.log(idLibro);
    $('.libroElegido').val(idLibro);
})

// Con éste código voy a mandar el libro que quiero editar
$(document).on('click', '.editar', function(){
    let element = $(this)[0].parentElement.parentElement.parentElement;
    console.log(element);
    let idLibro = $(element).attr('idLibro');
    console.log(idLibro);
    $('.libroElegido').val(idLibro);
    $.ajax({
        url: 'realizarCompra.php',
        type: 'POST',
        data: {idLibro},
        cache: true,
        success: function(){
            // location.href = "realizarCompra.php";
        }
    })
})