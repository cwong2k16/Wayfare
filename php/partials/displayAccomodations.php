<div class="container-fluid">
    <div class="jumbotron">
        <div class="center-elements">
            <h1>Accomodations</h1>
            <p> View an expansive list of accomodations according to your travel location and group. </p>
        </div>
    </div>
</div>

<div class="center-elements">
    <form onsubmit="displayAccomodations()">
        <div class="form-group">
            <select id = "acc_group" class="selectpicker" data-live-search="true">
                <option value="" disabled selected> Group # (in email receipt) </option>
                <option value="300001">300001</option>
                <option value="300002">300002</option>
            </select>

            <select id = "acc_loc" class="selectpicker" data-live-search="true">
                <option value="" disabled selected> Destination </option>
                <option value="200007">Boston, MA</option>
                <option value="200006">Dallas, TX</option>
                <option value="200004">Los Angeles, CA</option>
                <option value="200005">Newark, NJ</option>
                <option value="200003">Orlando, FL</option>
                <option value="200001">Queens, NY</option>
                <option value="200002">Stony Brook, NY</option>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Find</button>
        </div>
    </form>
</div>