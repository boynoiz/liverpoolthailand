<div class="container clearfix">
    <div class="col_half nobottommargin">
        <!-- ==================Top Links=========================== -->
        <div class="top-links">
            <ul>
                @if(Auth::guest())
                    <li><a href="#">Login</a>
                        <div class="top-link-section">
                            {{ Form::open(array('url' => url('/auth/login'), 'method' => 'post', 'files'=> true, 'id' => 'top-login')) }}
                            <div class="input-group" id="top-login-username">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email Address')) }}
                            </div>
                            <div class="input-group" id="top-login-password">
                                <span class="input-group-addon"><i class="icon-key"></i></span>
                                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
                            </div>
                            <label class="checkbox">
                                <input type="checkbox" name="remember"> Remember me
                            </label>
                            <button class="btn btn-danger btn-block" type="submit">Sign in</button>
                            {{ Form::close() }}
                        </div>
                    </li>
                @else
                    <li><a href="#">{{ Auth::user()->name }}</a>
                        <div class="top-link-section">
                            @if(Auth::check())
                                @if(Auth::user()->id==1)
                                    <div><a href="{{ url('/admin') }}" target="_blank"><i class="fa fa-tachometer"></i> Admin Dashboard</a></div>
                                @endif
                                    <div><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i> Logout</a></div>
                            @endif
                        </div>
                    </li>
                @endif
            </ul>
        </div>
        <!-- .top-links end -->
    </div>
    <div class="col_half fright col_last nobottommargin">
        <!-- ==================Top Social=========================== -->
        <div id="top-social">
            <ul>
                <li>
                    <a href="https://www.facebook.com/LiverpoolThailand" class="si-facebook">
                        <span class="ts-icon">
                            <i class="icon-facebook"></i>
                        </span>
                        <span class="ts-text">
                            Facebook
                        </span>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/liverpoolthai" class="si-twitter">
                        <span class="ts-icon">
                            <i class="icon-twitter"></i>
                        </span>
                        <span class="ts-text">
                            Twitter
                        </span>
                    </a>
                </li>
                {{--<li><a href="#" class="si-dribbble"><span class="ts-icon"><i class="icon-dribbble"></i></span><span class="ts-text">Dribbble</span></a></li>--}}
                {{--<li><a href="#" class="si-github"><span class="ts-icon"><i class="icon-github-circled"></i></span><span class="ts-text">Github</span></a></li>--}}
                {{--<li><a href="#" class="si-pinterest"><span class="ts-icon"><i class="icon-pinterest"></i></span><span class="ts-text">Pinterest</span></a></li>--}}
                {{--<li><a href="#" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>--}}
                <li>
                    <a href="tel:025838466" class="si-call">
                        <span class="ts-icon">
                            <i class="icon-call"></i>
                        </span>
                        <span class="ts-text">
                            (66)02-5838466
                        </span>
                    </a>
                </li>
                <li>
                    <a href="mailto:info@liverpoolthailand.com" class="si-email3">
                        <span class="ts-icon">
                            <i class="icon-email3"></i>
                        </span>
                        <span class="ts-text">
                            info@liverpoolthailand.com
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #top-social end -->
    </div>
</div>