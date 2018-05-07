
<form onsubmit = "displayTravelOptions" id = "booking" style="text-align:center">
    <div style="padding:5px">
        <div id = "travelTypes" style = "padding-bottom: 15px">
            <input type="radio" name="travelType" value="flight"> Flight </input>
            <input type="radio" name="travelType" value="bus"> Bus </input>
            <input type="radio" name="travelType" value="car"> Car </input>
            <input type="radio" name="travelType" value="cruise"> Cruise </input>
        </div>
        <select id = "source" class="selectpicker" placeholder="Source.." data-live-search="true">
            <option value="" disabled selected> Select your source... </option>
            <option>Boston, MA</option>
            <option>Dallas, TX</option>
            <option>Los Angeles, CA</option>
            <option>Newark, NJ</option>
            <option>Orlando, FL</option>
            <option>Queens, NY</option>
            <option>Stony Brook, NY</option>
        </select>
        <select id = "destination" class="selectpicker" placeholder="Destination.." data-live-search="true">
            <option value="" disabled selected> Select your destination... </option>
            <option>Boston, MA</option>
            <option>Dallas, TX</option>
            <option>Los Angeles, CA</option>
            <option>Newark, NJ</option>
            <option>Orlando, FL</option>
            <option>Queens, NY</option>
            <option>Stony Brook, NY</option>
        </select>
    </div>
    <!-- Date picker for source and destination-->
    <button class = "find-flight-btn" type = "submit">
            Search
    </button>
</form>