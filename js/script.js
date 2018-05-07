$(document).ready(function(){
    $("#banner").fadeIn(1000);
});

function signUp() {
    console.log(getValue('firstName'));
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/server_code/addpassenger.php", true);
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
    var address = getValue('street');
    var password = getValue('password');
    var password2 = getValue('password2');
    var birthdate = getValue('birthdate');
    birthdate = toUnix(birthdate);
    var g = document.getElementById("gender");
    var gender = g.options[g.selectedIndex].value;
    var s = document.getElementById("state");
    var state = s.options[s.selectedIndex].value;

    var data = JSON.stringify({"firstname": firstName, "lastname": lastName,  "email": email,
                               "zipcode":zipcode, "address": address, "password":password, "password2":password2,
                               "birthday": birthdate, "gender":gender, "state":state});
    console.log(data);
    xhr.send(data);
}

function getValue(attr){
    return document.getElementById(attr).value;
}

function toUnix(birthdate){
    var bd = birthdate + " 12:00";
    var ts = moment(bd, "MM/DD/YYYY HH:mm").valueOf();
    return ts;
}
