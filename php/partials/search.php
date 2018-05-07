
<form onsubmit = "displayTravelOptions()" action = "" id = "booking" style="text-align:center">
    <div style="padding:5px">
        <div id = "travelTypes" style = "padding-bottom: 15px">
            <input type="radio" name="travelType" value="flight"> Flight </input>
            <input type="radio" name="travelType" value="bus"> Bus </input>
            <input type="radio" name="travelType" value="car"> Car </input>
            <input type="radio" name="travelType" value="cruise"> Cruise </input>
        </div>
        <select id = "source" class="selectpicker" placeholder="Source.." data-live-search="true">
            <option value="" disabled selected> Select your source... </option>
            <option value="200007">Boston, MA</option>
            <option value="200006">Dallas, TX</option>
            <option value="200004">Los Angeles, CA</option>
            <option value="200005">Newark, NJ</option>
            <option value="200003">Orlando, FL</option>
            <option value="200001">Queens, NY</option>
            <option value="200002">Stony Brook, NY</option>
        </select>
        <select id = "destination" class="selectpicker" placeholder="Destination.." data-live-search="true">
            <option value="" disabled selected> Select your destination... </option>
            <option value="200007">Boston, MA</option>
            <option value="200006">Dallas, TX</option>
            <option value="200004">Los Angeles, CA</option>
            <option value="200005">Newark, NJ</option>
            <option value="200003">Orlando, FL</option>
            <option value="200001">Queens, NY</option>
            <option value="200002">Stony Brook, NY</option>
        </select>
    </div>
    <!-- Date picker for source and destination-->
    <button class = "find-flight-btn" type = "button" onclick = "displayTravelOptions()">
            Search
    </button>
    <div id="displayAccomodations">
    </div>
</form>
