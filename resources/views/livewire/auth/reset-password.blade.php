<div class="Authentication">
    <div class="container ResetPassword">
        <div class="custom_form">
            <form wire:submit="resetPassword">
                <div class="inputs">
                    <label for="email">Email Address</label>
                    <input type="email" wire:model="email" id="email" autocomplete="username">
                    <x-form-input-error field="email" />
                </div>

                <div class="inputs">
                    <label for="password">Password</label>
                    <input type="password" wire:model="password" id="password" autocomplete="new-password">
                    <x-form-input-error field="password" />
                </div>

                <div class="inputs">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" wire:model="password_confirmation" id="password_confirmation" autocomplete="new-password">
                    <x-form-input-error field="password_confirmation" />
                </div>

                <button type="submit">Reset Password</button>
            </form>
        </div>
    </div>
</div>
