<div class="center-elements">
    <form onsubmit="book()">
        <div class="form-group">
            <input id="groupid_b" class="form-control" placeholder="Group ID (email receipt)" required>
        </div>
        <div class="form-group">
            <input id="transid_b" class="form-control" placeholder="Transportation ID" required>
        </div>
        <div style = "padding-bottom: 0px" class="form-group">
            <input class="form-control" id="start_b" name="date" placeholder="On-board Date (MM/DD/YYYY)" type="text"/>
        </div>
        <div style = "padding-bottom: 0px" class="form-group">
            <input class="form-control" id="end_b" name="date" placeholder="Departure Date (MM/DD/YYYY)" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type = "button" onclick = "book()">Book Now</button>
        </div>
        <div id = "book_status">
            
        </div>
    </form>
    <?php
        include '/partials/dependencies.php';
    ?>
</div>