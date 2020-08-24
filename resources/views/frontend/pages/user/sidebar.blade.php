
    <div class="user-profile-menu-wrap fl-wrap">
        <!-- user-profile-menu-->
        <div class="user-profile-menu">
            <h3>Main</h3>
            <ul>
                @php
                    $url=Request::path();
                @endphp
                <li><a href="{{ url('user-profil') }}" class="{{ strpos( $url, 'user-profil')!==false ? 'user-profile-act' : '' }}"><i class="fa fa-user-o"></i> Profile</a></li>
                <li><a href="{{ url('user-change-pass') }}" class="{{ strpos( $url, 'user-change-pass')!==false ? 'user-profile-act' : '' }}"><i class="fa fa-unlock-alt"></i> Change Password</a></li>
            </ul>
        </div>
       
        <!-- user-profile-menu end-->
        <a href="{{ url('user-logout') }}" class="btn  color-bg flat-btn">Log Out</a>
    </div>