<div>
    <div class="field email">
        <input type="text" name="email" placeholder="Email" required id="email" wire:model="email">
        <div class="validation-message">
            {{ $errors->first('email') }}
        </div>
    </div>
    <div class="field password">
        <input type="password" name="password" autocomplete="off" placeholder="Password" required id="password"
            wire:model="password">
        <div class="validation-message">
            {{ $errors->first('password') }}
        </div>
    </div>
    <button type="submit" value="Login" class="button button-orange" wire:click='authenticate'>Login</button>
    <a href="#">Forget password?</a>
</div>
