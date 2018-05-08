$(document).ready(function(){
    $("#banner").fadeIn(1000);
});

/* Registration related (addpassenger.php stuff) */
function signUp() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./server_code/addpassenger.php", true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                    var json = JSON.parse(xhr.responseText);
                    if (json.status == "OK") {
                            console.log("great");
                    } else {
                            alert("Status failed.");
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
    var city = getValue('city');
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
                               "zipcode":zipcode, "city":city, "street_address": address, "password":password, "password2":password2,
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
    xhr.open("POST", "./server_code/traveloptions.php", true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var json = JSON.parse(xhr.responseText);
                var opt = document.querySelector('input[name = "travelType"]:checked').value;
                var append = "";
		for(var i = 0; i < json.items.length; i++){
			if(json.items[i]['type'] === opt){
               	           for(var key in json.items[i]){
                                if(key !== "companyid"){
                                   append += "<div>"+ key.toUpperCase() + ": <strong>" + json.items[i][key] + "</strong></div>";
                                }
			   }
		         }
                }
                console.log("hello world");
                if (json.status == "OK") {
		    if(append.length === 0){
			document.getElementById("displayAccomodations").innerHTML = "Nothing came up in the query.";
		    }
		    else{
                        document.getElementById("displayAccomodations").innerHTML = append;
		   }
                } else {
                    document.getElementById("displayAccomodations").innerHTML = "Nothing came up in the query.";
                }
	}
    }
    var s = document.getElementById("source");
    var source = s.options[s.selectedIndex].value;
    var d = document.getElementById("destination");
    var destination = d.options[d.selectedIndex].value;
    var travOps = document.querySelector('input[name = "travelType"]:checked').value;
    var data = JSON.stringify({"source": source, "dest": destination, "option":travOps});
    xhr.send(data);
}
/* traveloptions.js stuff ends here */

/* Display accomodations (accomodation.js stuff starts here) */
function displayAccomodations(){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../php/server_code/accomodation.php", true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                        var json = JSON.parse(xhr.responseText);
                        console.log(json);
			var dejson = "";
			for(var i = 0; i < json.items.length; i++){
				for(var key in json.items[i]){
					dejson += '<div>' + key.toUpperCase() + ": <strong>" + json.items[i][key] + '</strong></div>';
				}
				dejson += "<br/>";
			}
                        if (json.status == "OK") {
                           document.getElementById('display_accomo').innerHTML = dejson;
                        } else {
                           document.getElementById('display_accomo').innerHTML = "Query not found in database";
                        }
                }
        }
        var s = document.getElementById("acc_loc");
        var location = s.options[s.selectedIndex].value;
        var data = JSON.stringify({"location":location});
        console.log(data);
        xhr.send(data);
}

/* end accomodation.js here */

/* Display travel prices (travelprice.php) */
function displayTravelPrice(){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../php/server_code/travelprice.php", true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                        var json = JSON.parse(xhr.responseText);
			var dejson = "";
			for(var key in json){
			    dejson += key.toUpperCase() + ": <strong>" + json[key] + "</strong>"; 
			    dejson += "<br/>";
			}
                        if (json.status == "OK") {
                           document.getElementById('display_price').innerHTML = dejson;
                        } else {
                           document.getElementById('display_price').innerHTML = "Query not found in database";
                        }
                }
        }
        var trans_id = getValue("trans_id");
        var group_id = getValue("group_id");
        var data = JSON.stringify({"transportation_id":trans_id, "groupid":group_id});
        xhr.send(data);
}
/* */

/* Let consumer book a travel option (book.php) */ 
function book(){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../php/server_code/book.php", true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                        var json = JSON.parse(xhr.responseText);
			var dejson = "";
			for(var key in json){
			    dejson += key.toUpperCase() + ": <strong>" + json[key] + "</strong>"; 
			    dejson += "<br/>";
			}
                        if (json.status == "OK") {
                        //    document.getElementById('display_price').innerHTML = dejson;
                           document.getElementById('b_entire').innerHTML = "<div style='text-align:center'> <strong> <h1 style='color:green'>Submitted!</h1> </strong> </div>";
                        } else {
                           document.getElementById('book_status').innerHTML = "Error!";
                        }
                }
        }
        var trans_id = getValue("transid_b");
        var group_id = getValue("groupid_b");
        var start = getValue('start_b');
        start = toUnix(start);
        var end = getValue('end_b');
        end = toUnix(end);
        var data = JSON.stringify({"transportation_id":trans_id, "groupid":group_id, "start":start, "end":end});
        xhr.send(data);
}
/* */

/* Helper Functions */
function getValue(attr){
    return document.getElementById(attr).value;
}
