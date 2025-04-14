<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header res_logo d-lg-none py-4">
        <div class="logo">
            <img class="max-width-200" width="80%"
                src="{{ asset('storage/logo/dark/' . get_settings('system_dark_logo')) }}" alt="">
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">x</button>
    </div>
    <div class="offcanvas-body s_offcanvas">
        <div class="timeline-navigation">
            <nav class="menu-wrap">
                <ul>
                    <li class="@if (Route::currentRouteName() == 'timeline' || Route::currentRouteName() == 'single.post') active @endif"><a href="{{ route('timeline') }}"><img
                                src="{{ asset('storage/images/timeline-2.svg') }}"
                                alt="Timeline">{{ get_phrase('Timeline') }}</a></li>
                    <li class="@if (Route::currentRouteName() == 'memories') active @endif"><a href="{{ route('memories') }}"><img
                                src="{{ asset('storage/images/memories.svg') }}"
                                alt="memories">{{ get_phrase('Memories') }}</a></li>
                    <li class="@if (Route::currentRouteName() == 'badge') active @endif"><a href="{{ route('badge') }}"><img
                                src="{{ asset('storage/images/badge.svg') }}"
                                alt="Badge">{{ get_phrase('Badge') }}</a></li>
                    <li class="@if (Route::currentRouteName() == 'profile' ||
                            Route::currentRouteName() == 'profile.friends' ||
                            Route::currentRouteName() == 'profile.photos' ||
                            Route::currentRouteName() == 'profile.album' ||
                            Route::currentRouteName() == 'profile.videos') active @endif"><a href="{{ route('profile') }}"><img
                                src="{{ asset('storage/images/man-2.svg') }}"
                                alt="Profile">{{ get_phrase('Profile') }}</a></li>
                    <li class="@if (Route::currentRouteName() == 'groups' ||
                            Route::currentRouteName() == 'single.group' ||
                            Route::currentRouteName() == 'group.people.info' ||
                            Route::currentRouteName() == 'group.event.view' ||
                            Route::currentRouteName() == 'single.group.photos') active @endif"><a href="{{ route('groups') }}"><img
                                src="{{ asset('storage/images/group-2.svg') }}"
                                alt="Group">{{ get_phrase('Group') }}</a></li>
                    <li class="@if (Route::currentRouteName() == 'pages' ||
                            Route::currentRouteName() == 'single.page' ||
                            Route::currentRouteName() == 'single.page.photos' ||
                            Route::currentRouteName() == 'page.videos') active @endif"><a href="{{ route('pages') }}"><img
                                src="{{ asset('storage/images/page-2.svg') }}"
                                alt="Page">{{ get_phrase('Page') }}</a></li>
                    <li class="@if (Route::currentRouteName() == 'allproducts' ||
                            Route::currentRouteName() == 'userproduct' ||
                            Route::currentRouteName() == 'single.product' ||
                            Route::currentRouteName() == 'filter.product' ||
                            Route::currentRouteName() == 'product.saved') active @endif"><a
                            href="{{ route('allproducts') }}"><img
                                src="{{ asset('storage/images/marketplace-2.svg') }}"
                                alt="Marketplace">{{ get_phrase('Marketplace') }}</a>
                    </li>
                    <li class="@if (Route::currentRouteName() == 'videos' ||
                            Route::currentRouteName() == 'video.detail.info' ||
                            Route::currentRouteName() == 'shorts' ||
                            Route::currentRouteName() == 'save.all.view') active @endif"><a href="{{ route('videos') }}"><img
                                src="{{ asset('storage/images/video-2.svg') }}"
                                alt="Video and Shorts">{{ get_phrase('Video and Shorts') }}</a></li>
                    <li class="@if (Route::currentRouteName() == 'event' ||
                            Route::currentRouteName() == 'userevent' ||
                            Route::currentRouteName() == 'single.event') active @endif"><a href="{{ route('event') }}"><img
                                src="{{ asset('storage/images/events-2.svg') }}"
                                alt="Event">{{ get_phrase('Event') }}</a></li>
                    <li class="@if (Route::currentRouteName() == 'blogs' ||
                            Route::currentRouteName() == 'create.blog' ||
                            Route::currentRouteName() == 'myblog' ||
                            Route::currentRouteName() == 'blog.edit' ||
                            Route::currentRouteName() == 'single.blog' ||
                            Route::currentRouteName() == 'category.blog') active @endif"><a href="{{ route('blogs') }}"><img
                                src="{{ asset('storage/images/blogging-2.svg') }}"
                                alt="Blog">{{ get_phrase('Blog') }}</a></li>
                       {{-- Job Addon  --}}
                     @if (addon_status('job') == 1)          
                        <li class="@if (Route::currentRouteName() == 'jobs') active @endif"><a href="{{ route('jobs') }}"><img
                            src="{{ asset('storage/images/jobs.svg') }}"
                            alt="Jobs">{{ get_phrase('Jobs') }}</a>
                        </li>
                    @endif
                    {{-- Job Addon  --}}
                    @if (addon_status('fundraiser') == 1)
                        <li class="@if (Route::currentRouteName() == 'fundraiser.index') active @endif"><a
                                href="{{ route('fundraiser.index') }}"><img
                                    src="{{ asset('assets/frontend/css/fundraiser/images/fundraiser/explore.svg') }}"
                                    alt="Fundraiser">{{ get_phrase('Fundraiser') }}</a></li>
                    @endif

                    {{-- paid content --}}
                    @if (addon_status('paid_content') == 1)
                        <li class="@if (Route::currentRouteName() == 'paid.content' ||
                                Route::currentRouteName() == 'creator.timeline' ||
                                Route::currentRouteName() == 'creator' ||
                                Route::currentRouteName() == 'settings' ||
                                Route::currentRouteName() == 'general.timeline') active @endif">
                            <a href="{{ route('paid.content') }}">
                                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    version="1.1" viewBox="0 0 512 512">
                                    <g id="surface1">
                                        <path
                                            d="M 512 256 C 512 324.378906 485.371094 388.671875 437.019531 437.019531 C 388.671875 485.371094 324.378906 512 256 512 C 187.621094 512 123.328125 485.371094 74.980469 437.019531 C 26.628906 388.671875 0 324.378906 0 256 C 0 187.621094 26.628906 123.328125 74.980469 74.980469 C 123.328125 26.628906 187.621094 0 256 0 C 324.378906 0 388.671875 26.628906 437.019531 74.980469 C 485.371094 123.328125 512 187.621094 512 256 Z M 512 256 "
                                            style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,66.666667%,12.54902%);fill-opacity:1;" />
                                        <path
                                            d="M 512 256 C 512 324.378906 485.371094 388.671875 437.019531 437.019531 C 388.671875 485.371094 324.378906 512 256 512 L 256 0 C 324.378906 0 388.671875 26.628906 437.019531 74.980469 C 485.371094 123.328125 512 187.621094 512 256 Z M 512 256 "
                                            style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,53.72549%,0%);fill-opacity:1;" />
                                        <path
                                            d="M 458 256 C 458 367.378906 367.378906 458 256 458 C 144.621094 458 54 367.378906 54 256 C 54 144.621094 144.621094 54 256 54 C 367.378906 54 458 144.621094 458 256 Z M 458 256 "
                                            style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,92.54902%,59.215686%);fill-opacity:1;" />
                                        <path
                                            d="M 458 256 C 458 367.378906 367.378906 458 256 458 L 256 54 C 367.378906 54 458 144.621094 458 256 Z M 458 256 "
                                            style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,85.882353%,17.647059%);fill-opacity:1;" />
                                        <path
                                            d="M 325.988281 292.609375 C 325.988281 302.261719 324.171875 310.511719 320.53125 317.371094 C 316.890625 324.230469 311.980469 329.78125 305.800781 334.011719 C 299.621094 338.238281 292.5 341.328125 284.460938 343.28125 C 280.058594 344.339844 275.539062 345.109375 270.910156 345.589844 L 270.910156 380.550781 L 240.910156 380.550781 L 240.910156 344.929688 C 233.570312 343.921875 226.289062 342.328125 219.058594 340.101562 C 205.851562 336.039062 194 330.28125 183.5 322.828125 L 198.988281 292.609375 C 200.519531 294.128906 203.269531 296.121094 207.25 298.570312 C 211.21875 301.03125 215.921875 303.488281 221.339844 305.941406 C 226.761719 308.398438 232.769531 310.46875 239.378906 312.160156 C 244.800781 313.558594 250.339844 314.371094 256 314.609375 C 257.230469 314.671875 258.460938 314.699219 259.699219 314.699219 C 279 314.699219 288.648438 308.519531 288.648438 296.160156 C 288.648438 292.269531 287.550781 288.96875 285.351562 286.261719 C 283.148438 283.550781 280.019531 281.179688 275.949219 279.140625 C 271.890625 277.109375 266.980469 275.25 261.21875 273.558594 C 259.539062 273.058594 257.800781 272.550781 256 272.03125 C 251.648438 270.761719 246.949219 269.410156 241.921875 267.96875 C 233.28125 265.601562 225.789062 263.011719 219.441406 260.21875 C 213.089844 257.429688 207.789062 254.121094 203.558594 250.308594 C 199.328125 246.5 196.148438 242.101562 194.039062 237.109375 C 191.921875 232.109375 190.859375 226.148438 190.859375 219.199219 C 190.859375 210.058594 192.550781 201.929688 195.941406 194.820312 C 199.328125 187.699219 204.03125 181.78125 210.039062 177.039062 C 216.050781 172.300781 223.03125 168.699219 231 166.238281 C 234.199219 165.25 237.511719 164.46875 240.910156 163.878906 L 240.910156 131.199219 L 270.910156 131.199219 L 270.910156 163.460938 C 278.21875 164.398438 285.148438 166.089844 291.699219 168.53125 C 302.371094 172.511719 311.679688 177.210938 319.640625 182.621094 L 304.148438 211.070312 C 302.960938 209.890625 300.800781 208.28125 297.671875 206.25 C 294.539062 204.210938 290.71875 202.230469 286.238281 200.28125 C 281.75 198.328125 276.878906 196.679688 271.640625 195.320312 C 266.5 194 261.289062 193.320312 256 193.300781 C 255.878906 193.289062 255.75 193.289062 255.628906 193.289062 C 245.980469 193.289062 238.78125 195.070312 234.039062 198.628906 C 229.300781 202.179688 226.929688 207.179688 226.929688 213.609375 C 226.929688 217.339844 227.820312 220.429688 229.601562 222.878906 C 231.378906 225.339844 233.960938 227.5 237.351562 229.359375 C 240.730469 231.230469 245 232.921875 250.171875 234.441406 C 252.011719 234.980469 253.949219 235.539062 256 236.101562 C 259.691406 237.121094 263.710938 238.179688 268.078125 239.269531 C 276.878906 241.640625 284.878906 244.179688 292.078125 246.890625 C 299.28125 249.601562 305.371094 252.980469 310.371094 257.050781 C 315.359375 261.109375 319.21875 265.980469 321.929688 271.648438 C 324.628906 277.328125 325.988281 284.308594 325.988281 292.609375 Z M 325.988281 292.609375 "
                                            style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,66.666667%,12.54902%);fill-opacity:1;" />
                                        <path
                                            d="M 271.640625 195.320312 C 266.5 194 261.289062 193.320312 256 193.300781 L 256 131.199219 L 270.910156 131.199219 L 270.910156 163.460938 C 278.21875 164.398438 285.148438 166.089844 291.699219 168.53125 C 302.371094 172.511719 311.679688 177.210938 319.640625 182.621094 L 304.148438 211.070312 C 302.960938 209.890625 300.800781 208.28125 297.671875 206.25 C 294.539062 204.210938 290.71875 202.230469 286.238281 200.28125 C 281.75 198.328125 276.878906 196.679688 271.640625 195.320312 Z M 271.640625 195.320312 "
                                            style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,53.72549%,0%);fill-opacity:1;" />
                                        <path
                                            d="M 325.988281 292.609375 C 325.988281 302.261719 324.171875 310.511719 320.53125 317.371094 C 316.890625 324.230469 311.980469 329.78125 305.800781 334.011719 C 299.621094 338.238281 292.5 341.328125 284.460938 343.28125 C 280.058594 344.339844 275.539062 345.109375 270.910156 345.589844 L 270.910156 380.550781 L 256 380.550781 L 256 314.609375 C 257.230469 314.671875 258.460938 314.699219 259.699219 314.699219 C 279 314.699219 288.648438 308.519531 288.648438 296.160156 C 288.648438 292.269531 287.550781 288.96875 285.351562 286.261719 C 283.148438 283.550781 280.019531 281.179688 275.949219 279.140625 C 271.890625 277.109375 266.980469 275.25 261.21875 273.558594 C 259.539062 273.058594 257.800781 272.550781 256 272.03125 L 256 236.101562 C 259.691406 237.121094 263.710938 238.179688 268.078125 239.269531 C 276.878906 241.640625 284.878906 244.179688 292.078125 246.890625 C 299.28125 249.601562 305.371094 252.980469 310.371094 257.050781 C 315.359375 261.109375 319.21875 265.980469 321.929688 271.648438 C 324.628906 277.328125 325.988281 284.308594 325.988281 292.609375 Z M 325.988281 292.609375 "
                                            style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,53.72549%,0%);fill-opacity:1;" />
                                    </g>
                                </svg>
                                {{ get_phrase('Paid content') }}</a>
                        </li>
                    @endif
                </ul>
            </nav>
            <div class="footer-nav">
                <div class="footer-menu">
                    <ul>
                        <li><a href="{{ route('about.view') }}">{{ get_phrase('About') }}</a></li>
                        <li><a href="{{ route('policy.view') }}">{{ get_phrase('Privacy Policy') }}</a></li>
                    </ul>
                </div>
                <div class="copy-rights text-muted">
                    @php
                        $sitename = \App\Models\Setting::where('type', 'system_name')->value('description');
                    @endphp
                    <p>© {{ date('Y') }} {{ $sitename }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
