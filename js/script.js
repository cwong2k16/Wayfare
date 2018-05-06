$(document).ready(function(){
    $("#banner").fadeIn(1000);
});

function signUp() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/server_code/addpassenger.php", true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                    var json = JSON.parse(xhr.responseText);
                    console.log(json);
                    if (json.status == OK) {
                            alert("success");
                    } else {
                            alert("failure");
                    }
            }
    }
    var firstName = getValue('firstName');
    var lastName = getValue('lastName');
    var email = getValue('email');
    var zipcode = getValue('zipcode');
    var street = getValue('street');
    var password = getValue('password');
    var password2 = getValue('password2');
    var birthdate = getValue('birthdate');
    birthdate = toUnix(birthdate);

    var data = JSON.stringify({"firstName": firstName, "lastName": lastName,  "email": email,
                               "zipcode":zipcode, "street": street, "password":password, "password2":password2,
                               "birthdate": birthdate});
    xhr.send(data);
}

function getValue(attr){
    return document.getElementById(attr).value();
}

function toUnix(birthdate){
    var array = birthdate.split("/");
    
}