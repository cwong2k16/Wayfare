<div class="center-elements">
    <form onsubmit="signUp()">
        <div class="form-group">
            <h3 class="form-signup-heading">Please register for an account</h3>
        </div>
        <div class="form-group">
            <input id="firstName" class="form-control" placeholder="First Name" required>
        </div>
        <div class="form-group">
            <input id="lastName" class="form-control" placeholder="Last Name" required>
        </div>
        <div class="form-group">
            <select id = "gender" class="selectpicker" placeholder="Enter gender" data-live-search="true">
                <option value="" disabled selected> Select your gender... </option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>
        </div>
        <div style = "padding-bottom: 0px" class="form-group">
            <input class="form-control" id="birthdate" name="date" placeholder="Birthdate (MM/DD/YYYY)" type="text"/>
        </div>
        <div class="form-group">
            <input id="email" class="form-control" placeholder="Email address" required type="email">
        </div>
        <div class="form-group">
            <input id="street" class="form-control" placeholder="Street address" required>
        </div>
        <div class="form-group">
            <select id = "state" class="selectpicker" placeholder="State.." data-live-search="true">
                <option value="" disabled selected> Select your state... </option>
                <option>NY</option>
                <option>TX</option>
                <option>CA</option>
                <option>NJ</option>
                <option>FL</option>
            </select>
        </div>
        <div class="form-group">
            <input id="zipcode" class="form-control" placeholder="Zipcode" required>
        </div>
        <div class="form-group">
            <input id="password" class="form-control" placeholder="Password" required type="password">
        </div>
        <div class="form-group">
            <input id="password2" class="form-control" placeholder="Reenter password" required type="password">
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </div>
    </form>
    <?php
        include '/partials/dependencies.php';
    ?>
</div>