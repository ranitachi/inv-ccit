<header class="main-header dark-header fs-header sticky">
                <div class="header-inner">
                    <div class="logo-holder">
                        <a href="{{ route('beranda') }}"><img src="{{ asset('images') }}/lambang.png" alt="" class="f-left"><span class="logo-title">{{ config('app.name') }}</span></a>
                    </div>
                   <div class="nav-button-wrap color-bg">
                        <div class="nav-button">
                            <span></span><span></span><span></span>
                        </div>
                    </div>
                    <!--  navigation --> 
                    @php
                        $url=Request::path();
                    @endphp
                    @if (Auth::check())
                        <div class="header-user-menu">
                            <div class="header-user-name">
                                Welcome, {{ Auth::user()->name }}
                            </div>
                            <ul>
                                <li><a href="{{ url('user-profil') }}"> My Profile</a></li>
                                <li><a href="{{ url('user-logout') }}">Log Out</a></li>
                            </ul>
                        </div>
                    @endif
                    <div class="nav-holder main-menu">
                        <nav>
                            <ul>
                                {{-- <li>
                                    <a href="{{ route('beranda') }}" class="{{ $url=='/' ? "act-link" : ''}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ url('training') }}" class="{{ $url=='training' ? "act-link" : ''}}">Training</a>
                                </li>
                                <li>
                                    <a href="{{ url('schedule') }}" class="{{ $url=='schedule' ? "act-link" : ''}}">Schedule</a>
                                </li>
                                <li>
                                    <a href="{{ url('about-us') }}" class="{{ $url=='about-us' ? "act-link" : ''}}">About Us</a>
                                </li> --}}
                               
                                {{-- <li>
                                    @if (!Auth::check())
                                        <a href="{{ url('user-login') }}" class="{{ strpos( $url, 'user-login')!==false ? 'act-link' : '' }}">Login/Register</a>                           
                                    @endif
                                </li> --}}
                            </ul>
                        </nav>
                    </div>
                    <!-- navigation  end -->
                </div>
            </header>