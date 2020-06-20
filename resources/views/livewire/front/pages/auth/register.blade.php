<div>
    <div class="tab-content">
        <ul class="nav nav-pills nav-fill" role="tablist">
            <li class="nav-item">
                <a class="nav-link">Registation Page</a>
            </li>

        </ul>
        <form wire:submit.prevent="registaion_submit">

            <div class="form-group">
                <label><code>*</code><strong>Your name </strong>
                    @error('form.name')<code>{{ $message }}</code>
                    @enderror</label>

                <input type="text" wire:model="form.name" class="form-control form-control-sm">
            </div>

            <div class="form-group">
                <label><code>*</code><strong>Your email address</strong>
                   
                    @error('email')<code>{{ $message }}</code>
                    @enderror</label>

                <input type="text" wire:model.lazy="email" class="form-control form-control-sm">
            </div>
            <div class="form-group">
                <label><code>*</code><strong>Your Mobile Number</strong>
                    @error('phone')<code>{{ $message }}</code>
                    @enderror</label>

                <input type="text" wire:model.lazy="phone" class="form-control form-control-sm">
            </div>

            <div class="form-group">
                <label> <code>*</code><strong>Enter Password <code>Minimum 8 Char</code></strong>
                    @error('form.password')<code>{{ $message }}</code>
                    @enderror</label>

                <input type="password" wire:model="form.password" class="form-control form-control-sm">
            </div>
          

            <div class="form-footer">
                <input type="submit" class="btn btn-outline-primary-2" value="Registation">
                 <p wire:click="viewLoginPage"
                class="btn btn-outline-primary-2 addToCart-pointer">Log In</p>
                <a href="#" class="forgot-link">Forgot Your Password?</a>
            </div><!-- End .form-footer -->


        </form>
        <div class="form-choice">
            <p class="text-center">or sign in with</p>
            <div class="row">
                <div class="col-sm-6">
                    <a href="#" class="btn btn-login btn-g">
                        <i class="icon-google"></i>
                        Login With Google
                    </a>
                </div><!-- End .col-6 -->
                <div class="col-sm-6">
                    <a href="#" class="btn btn-login btn-f">
                        <i class="icon-facebook-f"></i>
                        Login With Facebook
                    </a>
                </div><!-- End .col-6 -->
            </div><!-- End .row -->
        </div><!-- End .form-choice -->
    </div><!-- .End .tab-pane -->
</div>
