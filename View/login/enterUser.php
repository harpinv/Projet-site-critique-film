<div class="new">
    <h1>New user</h1>
    <form method="post" action="/recordUser">
        <div class="criterion">
            <input type="text" name="name" class="info" placeholder="Name" required>
        </div>
        <div class="criterion">
            <input type="text" name="firstName" class="info" placeholder="First-name" required>
        </div>
        <div class="criterion">
            <input type="text" name="email" class="info" placeholder="Email" required>
        </div>
        <div class="criterion">
            <input type="text" name="identify" class="info" placeholder="Identify" required>
        </div>
        <div class="criterion">
            <input type="password" name="password" class="info" id="password" minlength="6" maxlength="24" placeholder="Password" required>
        </div>
        <div class="criterion">
            <input type="password" name="password-repeat" class="info" id="password-repeat" placeholder="Password-repeat" required>
        </div>
        <div class="criterion">
            <input type="text" name="role" class="number" value="User">
            <input type="text" name="confirm" class="number" value="0">
            <input type="submit" name="submit" class="validate" value="record">
        </div>
    </form>
</div>

