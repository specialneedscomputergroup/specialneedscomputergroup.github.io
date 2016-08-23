$('input#Send').click(function () {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
    $.post('assets/php/sendEmail.php', {name: name, email: email, message: message},function(data) {
            alert(data);    
    });
});