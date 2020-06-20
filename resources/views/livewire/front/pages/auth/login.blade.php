<div>
    <livewire:front.partials.header-two />
    <main class="main">
        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
            style="background-image: url('{{ asset('user/assets/images/backgrounds/login-bg.jpg') }}')">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">
                       
                        @if ($loginComponentIsActive == true)
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link">Log In</a>
                            </li>
                           
                        </ul>
                        <div class="tab-content">

                            <form wire:submit.prevent="submit">

                                <div class="form-group">
                                    <label><code>*</code><strong>User Phone Number</strong>
                                        @error('form.phone')<code>{{ $message }}</code>
                                        @enderror</label>

                                    <input type="text" wire:model="form.phone" class="form-control form-control-sm">
                                </div>

                                <div class="form-group">
                                    <label><code>*</code><strong>User Password</strong>
                                        @error('form.password')<code>{{ $message }}</code>
                                        @enderror</label>

                                    <input type="password" wire:model="form.password" class="form-control form-control-sm">
                                </div>

                                 <div class="form-footer">
                                      <input type="submit" class="btn btn-outline-primary-2" value="Login">


                                        <p wire:click="viewRegisterPage"
                                         class="btn btn-outline-primary-2 addToCart-pointer">Sign Up</p>


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

                        @else 
                         @livewire('front.pages.auth.register');
                        @endif

                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
</div><!-- End .login-page section-bg -->
</main>
</div>
