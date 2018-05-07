$(document).ready(function(){
    $("#banner").fadeIn(1000);
});

/* Registration related (addpassenger.php stuff) */
function signUp() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "130.245.171.91/php/server_code/addpassenger.php", true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                    var json = JSON.parse(xhr.responseText);
                    if (json.status == OK) {
                            alert("success");
                    } else {
                            alert("failure");
                    }
            }
            else{
                console.log("error " + xhr.status);
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
                               "zip_code":zipcode, "street_address": address, "password":password, "password2":password2,
                               "birthday": birthdate, "gender":gender, "state":state});
    console.log(data);
    xhr.send(data);
}

function toUnix(birthdate){
    var bd = birthdate + " 12:00";
    var ts = moment(bd, "MM/DD/YYYY HH:mm").valueOf();
    return ts;
}
/* addpassenger.js stuff ends here */

/* After pressing search (traveloptions.js stuff starts here) */
function displayTravelOptions(){
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "130.245.171.91/php/server_code/traveloptions.php", true);
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
    var s = document.getElementById("source");
    var source = s.options[s.selectedIndex].value;
    var d = document.getElementById("destination");
    var destination = d.options[d.selectedIndex].value;
    var travOps = document.querySelector('input[name = "travelType"]:checked').value;
    var data = JSON.stringify({"source": source, "dest": destination, "option":travOps});
    console.log(data);
    xhr.send(data);
}
/* */

/* Helper Functions */
function getValue(attr){
    return document.getElementById(attr).value;
}