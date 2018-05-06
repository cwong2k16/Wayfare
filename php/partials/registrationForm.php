<div class="center-elements">
    <form>
        <div class="form-group">
            <h3 class="form-signup-heading">Please register for an account</h3>
        </div>
        <div class="form-group">
            <input id="firstName" class="form-control" placeholder="First Name" required type="password">
        </div>
        <div class="form-group">
            <input id="lastName" class="form-control" placeholder="Last Name" required type="password">
        </div>
        <div style = "padding-bottom: 10px" class="form-group">
            <select id = "gender" class="selectpicker" placeholder="Enter gender" data-live-search="true">
                <option value="" disabled selected> Select your gender... </option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>
            <input class="form-control" id="date" name="date" placeholder="Birthdate (MM/DD/YYYY)" type="text"/>
        </div>
        <div class="form-group">
            <input id="signupEmail" class="form-control" placeholder="Email address" required type="email">
        </div>
        <div class="form-group">
            <input id="signupStreet" class="form-control" placeholder="Street address" required type="email">
        </div>
        <div class="form-group">
            <input id="signupEmail" class="form-control" placeholder="Email address" required type="email">
        </div>
        <div class="form-group">
            <input id="signupPassword" class="form-control" placeholder="Password" required type="password">
        </div>
        <div class="form-group">
            <input id="signupPassword2" class="form-control" placeholder="Reenter password" required type="password">
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </div>
    </form>
    <?php
        include '/partials/dependencies.php';
    ?>
</div>