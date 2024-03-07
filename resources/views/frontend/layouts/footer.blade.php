<footer style="background-image: url(assets/img/footer.png);background-color: #f5f8fd;">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="logo-white">
                    <a href="index.html"><img alt="logo-white" src="{{ $setting->logo2 }}"
                            style="height: 100px;width:150px"></a>
                    <p>{{ $setting->quatation }}
                        {{-- <span>Closed on Sunday</span></p> --}}
                </div>
            </div>
            <div class="col-xl-4  col-lg-4 col-md-6">
                <div class="link-about">

                    <h3>Useful Links</h3>
                    @foreach ($menus as $item)
                        <ul>
                            @if ($item->header_footer == 2 || $item->header_footer == 3)
                                @if ($item->external_link)
                                    <li><i class="fa-solid fa-angle-right"></i><a
                                            href="{{ url($item->external_link) }}">{{ $item->name }}</a></li>
                                @else
                                    <li><i class="fa-solid fa-angle-right"></i><a
                                            href="{{ url('general', $item->slug) }}">{{ $item->name }}</a></li>
                                @endif
                        </ul>
                    @endif
                    @endforeach

                </div>
            </div>
            {{-- <div class="col-xl-2 col-lg-3 col-md-6">
                <div class="link-about">
                    <h3>menu</h3>
                    <ul>
                        <li><i class="fa-solid fa-angle-right"></i><a href="$">Desserts</a></li>
                    </ul>
                </div>
            </div> --}}
            <div class="col-xl-4 col-lg-6">
                <div class="link-about">
                    <h3>Newsletter</h3>
                    <p>Get recent news and updates.</p>
                    <form class="footer-form">
                        <input type="text" name="Enter Your Email Address" placeholder="Enter Your Email Address...">
                        <button class="button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-bootem">
            <h6><span>{{ $setting->copyright }}</span></h6>
            <div class="header-social-media">
                <a href="{{ $setting->fb_link }}">Facebook</a>
                <a href="{{ $setting->twitter_link }}">Twitter</a>
                <a href="{{ $setting->insta_link }}">Instagram</a>
            </div>
        </div>
    </div>
</footer>
