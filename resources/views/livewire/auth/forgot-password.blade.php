<div class="Authentication">
    <div class="container ForgotPassword">
        <div class="custom_form">
            <p>Enter your email address to request the reset link for your password.</p>

            <form wire:submit="sendPasswordResetLink">
                <div class="inputs">
                    <label for="email">Email Address</label>
                    <input type="email" wire:model="email" name="email" id="email" autocomplete="username" autofocus>
                    <x-form-input-error field="email" />
                </div>

                <button type="submit">Email Password Reset Link</button>
            </form>
        </div>
    </div>
</div>
