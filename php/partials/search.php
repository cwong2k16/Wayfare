<div id = "booking" style="text-align:center">
    <div style="padding:5px">
        <form id = "travelTypes" style = "padding-bottom: 15px" action="">
            <input type="radio" name="travelType" value="flight"> Flight </input>
            <input type="radio" name="travelType" value="bus"> Bus </input>
            <input type="radio" name="travelType" value="car"> Car </input>
            <input type="radio" name="travelType" value="cruise"> Cruise </input>
        </form>

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
    <form id = "dateSource" style="width:10%" class="center-elements" method="post">
    <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">Source Date</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
    </div>
    </form>
    <form id = "dateDestination" style="width:10%" class="center-elements" method="post">
    <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">Destination Date</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
    </div>
    </form>
    <button class = "find-flight-btn" type = "submit">
            Search
    </button>
</div>