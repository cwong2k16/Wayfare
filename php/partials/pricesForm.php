<div class="container-fluid">
    <div class="jumbotron">
        <div class="center-elements">
            <h1>Prices</h1>
            <p> View an expansive list of accomodations according to your travel location and group. </p>
        </div>
    </div>
</div>

<div class="center-elements">
    <form onsubmit="displayTravelPrice()">
        <div class="form-group">
            <input id="trans_id" class="form-control" placeholder="Password" required type="password">
        </div>
        <div class="form-group">
            <input id="group_id" class="form-control" placeholder="Password" required type="password">
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type = "button" onclick = "displayTravelPrice()">Find</button>
        </div>
        <div id = "display_accomo">

        </div>
    </form>
</div>