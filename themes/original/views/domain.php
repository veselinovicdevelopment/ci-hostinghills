<?php $page = $this->template->content;?>

<div class="front-page">

    <div class="row">
        <!-- <?php blocks('full_width_top', get_slug());?> -->
        <div class="col-md-12">

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"
                style="margin-bottom: 5vh; box-shadow: 0px 20px 19px 19px #313960">

                <div class="carousel-inner" style="height:100%;">
                    <div class="item active" style="height:100%;">
                        <img src="<?=base_url()?>resource/images/domainbackground.svg"
                            style="height:100%; width: 100%; object-fit: cover;">
                        <div style="width: 50%; position: absolute; left: 25%; top: 55%;">
                            <div class="column">
                                <form action="#" class="search_form" method="post" id="search_form"
                                    style="display: flex; width: 100%; height: 60px; border: 0.5px solid gray; border-radius: 5px;">
                                    <input style="width: 60%; height: 100%; border:none;" id="searchBar" type="email"
                                        name="email" placeholder="Find your new domain name">

                                    <button type="button" class="btn-default"
                                        style="width: 20%; height: 100%; color: green">Best Mode</button>
                                    <button type="button" class="btn-success"
                                        style="width:20%; height: 100%;">Search</button>
                                    <img id="checking" src="<?=base_url()?>/resource/images/checking.gif">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <section class="whitesmoke-wrapper">
        <div style="display: flex; justify-content: center; padding-top: 5%;">
            <div class="row pricing-row" id="style-one">

                <div class="col-lg-3 col-md-6 pricing-col">
                    <div class="pricing pricing-one domain-pricing premium"
                        style="min-height: 300px; min-width: 220px;">
                        <div class="bg-element"></div>
                        <p class="pricing-title">.net</p>
                        <div class="price">
                            <div class="num" style="font-size: 20px; top: 10px;">15% off</div>
                        </div>
                        <ul class="specs">
                            <li>
                                <span class="font-weight-bold">Registration</span>
                            </li>
                            <li>
                                <h3 class="font-weight-bold">$10.98/yr</h3>
                            </li>
                            <li>
                                <span class="font-weight-bold" style="text-decoration:line-through;">$12.98/yr</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 pricing-col">
                    <div class="pricing pricing-one domain-pricing starter"
                        style="min-height: 300px; min-width: 220px;">
                        <div class="bg-element"></div>
                        <p class="pricing-title">.com</p>
                        <div class="price">
                            <div class="num" style="font-size: 20px; top: 10px;"></div>
                        </div>
                        <ul class="specs">
                            <li>
                                <span class="font-weight-bold">Registration</span>
                            </li>
                            <li>
                                <h3 class="font-weight-bold">$9.48/yr</h3>
                            </li>
                            <li>
                                <!-- <span class="font-weight-bold" style="text-decoration:line-through;">$12.98/yr</span> -->
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 pricing-col">
                    <div class="pricing pricing-one domain-pricing premium"
                        style="min-height: 300px; min-width: 220px;">
                        <div class="bg-element"></div>
                        <p class="pricing-title">.org</p>
                        <div class="price">
                            <div class="num" style="font-size: 20px; top: 10px;">29% off</div>
                        </div>
                        <ul class="specs">
                            <li>
                                <span class="font-weight-bold">Registration</span>
                            </li>
                            <li>
                                <h3 class="font-weight-bold">$10.98/yr</h3>
                            </li>
                            <li>
                                <span class="font-weight-bold" style="text-decoration:line-through;">$9.81/yr</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 pricing-col">
                    <div class="pricing pricing-one domain-pricing starter"
                        style="min-height: 300px; min-width: 220px;">
                        <div class="bg-element"></div>
                        <p class="pricing-title">.com</p>
                        <div class="price">
                            <div class="num" style="font-size: 20px; top: 10px;">18% off</div>
                        </div>
                        <ul class="specs">
                            <li>
                                <span class="font-weight-bold">Registration</span>
                            </li>
                            <li>
                                <h3 class="font-weight-bold">$32.98/yr</h3>
                            </li>
                            <li>
                                <span class="font-weight-bold" style="text-decoration:line-through;">$12.98/yr</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div>
            <div style="padding: 64px 0 48px; line-height: 1.33; text-align: center;">
                <h2 style="font-size:3rem; margin-bottom: 5px;">What You’ll Get</h2>
                <p style="font-size: 1.125rem;" class="orange-color">3 reasons to choose Namecheap.</p>
            </div>
        </div>

        <div style="display:flex; justify-content:center; padding-bottom: 5%;">
            <div class="domain-card-wrap">
                <a href="#table-data">
                    <div class="domain-card">
                        <picture class="domain-card-picture">
                            <img src="<?=base_url()?>resource/images/domain-card.svg">
                        </picture>
                        <div class="domain-card-content">
                            <p class="domain-card-contents">
                                <span>Popular domains<br>at competitive prices</span>
                            </p>
                            <p>Use our domain price search tool and save money.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="domain-card-wrap">
                <a href="#FreeProducts">
                    <div class="domain-card">
                        <picture class="domain-card-picture">
                            <img src="<?=base_url()?>resource/images/domain-box.svg">
                        </picture>
                        <div class="domain-card-content">
                            <p class="domain-card-contents">
                                <span>Free products and services<br>when you register</span>
                            </p>
                            <p>Free Privacy Protection for life and so much more.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="domain-card-wrap">
                <a href="#easy">
                    <div class="domain-card">
                        <picture class="domain-card-picture">
                            <img src="<?=base_url()?>resource/images/domain-conatact.svg">
                        </picture>
                        <div class="domain-card-content">
                            <p class="domain-card-contents">
                                <span>Easy set-up<br>and helpful guidance</span>
                            </p>
                            <p>Expert help and advice, whenever you need it.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="whitesmoke-wrapper background-color-secondary">
        <div class="container inner">
            <div class="row">

                <div class="col-md-12" id="table-data">
                    <div class="row p-40">
                        <h2 style="text-align:center; margin-bottom:10px" class="white-color">Hundreds Of Domains At
                            Great Prices</h2>
                        <h3 style="text-align:center" class="orange-color">Use our domain price search tool below to
                            find the cost of popular domains for up to 10 years.</h3>
                    </div>

                    <div class="table-header-wrap">
                        <div class="table-header">
                            <div class="search-box">
                                <input type="text" value="" class="gb-form-control" placeholder="Search TLDs">
                            </div>
                            <div style="height: 100%;">
                                <label>Best prices for</label>
                                <select class="set-year">
                                    <option>1 Year</option>
                                    <option>2 Years</option>
                                    <option>3 Years</option>
                                    <option>4 Years</option>
                                    <option>5 Years</option>
                                    <option>6 Years</option>
                                    <option>7 Years</option>
                                    <option>8 Years</option>
                                    <option>9 Years</option>
                                    <option>10 Years</option>
                                </select>

                                <label>Choose from</label>
                                <select class="set-year">
                                    <option>Popular</option>
                                    <option>Deals</option>
                                    <option>All</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="gb-container">
                        <table class="gb-table gb-table--responsive">
                            <thead>
                                <tr>
                                    <th> <span>TLD</span> </th>
                                    <th> <a href="#hero">Register</a> </th>
                                    <th> <span><a href="/domains/domain-renewal-how-to-renew-domain-name/"
                                                target="_blank">Renew</a></span> </th>
                                    <th> <span><a href="/domains/transfer/" target="_blank">Transfer</a></span> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/com/" class="gb-tld-name">.
                                                <!-- -->com
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span><span>$</span>8.88</span></td>
                                    <td data-table-title="Renew"><span><span>$</span>13.48</span></td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>9.18</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>10.48</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/net/" class="gb-tld-name">.
                                                <!-- -->net
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>10.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>12.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>14.98</span></td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>10.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>11.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/org/" class="gb-tld-name">.
                                                <!-- -->org
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>9.18</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>12.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>14.98</span></td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>11.48</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>12.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/cctld/io/" class="gb-tld-name">.
                                                <!-- -->io
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>32.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>39.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span
                                            class="gb-price gb-price--sale"><span>$</span>34.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>41.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>32.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>39.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/cctld/co/" class="gb-tld-name">.
                                                <!-- -->co
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>4.98</span>
                                        <div class="gb-price gb-price--special">UP to 79% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>23.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>25.98</span></td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>21.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>23.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/cctld/ai/" class="gb-tld-name">.
                                                <!-- -->ai
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register">
                                        <div class="gb-price gb-price--sale"><span><span>$</span>69.98</span></div><span
                                            class="gb-price gb-price--special gb-text--through"><span>$</span>79.98</span>
                                    </td>
                                    <td data-table-title="Renew">
                                        <div class="gb-price gb-price--sale"><span><span>$</span>69.98</span></div><span
                                            class="gb-price gb-price--special gb-text--through"><span>$</span>79.98</span>
                                    </td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>189.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>209.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/cctld/co-uk/" class="gb-tld-name">.
                                                <!-- -->co.uk
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-bolt"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>This TLD may require additional registration <a
                                                                    href="/support/knowledgebase/subcategory/36/domains-with-extended-attributes">information</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>6.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>7.48</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>9.48</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>0.00</span></td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/cctld/ca/" class="gb-tld-name">.
                                                <!-- -->ca
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-bolt"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>This TLD may require additional registration <a
                                                                    href="/support/knowledgebase/subcategory/36/domains-with-extended-attributes">information</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span><span>$</span>11.98</span></td>
                                    <td data-table-title="Renew"><span><span>$</span>13.98</span></td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>9.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>11.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <div class="gb-relative-wrapper"><a href="/domains/registration/gtld/dev/"
                                                class="gb-tld-name">.
                                                <!-- -->dev
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span><span>$</span>14.98</span></td>
                                    <td data-table-title="Renew"><span><span>$</span>16.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>14.98</span></td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/cctld/me/" class="gb-tld-name">.
                                                <!-- -->me
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>5.88</span>
                                        <div class="gb-price gb-price--special">UP to 69% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>18.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>18.98</span></td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>14.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>18.48</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper"><a href="/domains/registration/cctld/de/"
                                                class="gb-tld-name">.
                                                <!-- -->de
                                            </a>
                                            <div class="gb-notification-group"></div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span><span>$</span>6.98</span></td>
                                    <td data-table-title="Renew"><span><span>$</span>8.98</span></td>
                                    <td data-table-title="Transfer"><span class="gb-big-dash"></span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/app/" class="gb-tld-name">.
                                                <!-- -->app
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span><span>$</span>14.98</span></td>
                                    <td data-table-title="Renew"><span><span>$</span>16.98</span></td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>14.48</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>14.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/cctld/in/" class="gb-tld-name">.
                                                <!-- -->in
                                            </a>
                                            <div class="gb-notification-group"></div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>6.78</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>7.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>9.98</span></td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>6.78</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>7.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper"><a href="/domains/registration/cctld/is/"
                                                class="gb-tld-name">.
                                                <!-- -->is
                                            </a>
                                            <div class="gb-notification-group"></div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span><span>$</span>33.98</span></td>
                                    <td data-table-title="Renew"><span><span>$</span>33.98</span></td>
                                    <td data-table-title="Transfer"><span class="gb-big-dash"></span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/cctld/eu/" class="gb-tld-name">.
                                                <!-- -->eu
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-bolt"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>This TLD may require additional registration <a
                                                                    href="/support/knowledgebase/subcategory/36/domains-with-extended-attributes">information</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>4.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>6.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>8.98</span></td>
                                    <td data-table-title="Transfer"><span class="gb-big-dash"></span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/cctld/gg/" class="gb-tld-name">.
                                                <!-- -->gg
                                            </a>
                                            <div class="gb-notification-group"></div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span><span>$</span>68.98</span></td>
                                    <td data-table-title="Renew"><span
                                            class="gb-price gb-price--sale"><span>$</span>68.88</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>70.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Transfer"><span><span>$</span>68.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper"><a href="/domains/registration/cctld/to/"
                                                class="gb-tld-name">.
                                                <!-- -->to
                                            </a>
                                            <div class="gb-notification-group"></div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span><span>$</span>39.98</span></td>
                                    <td data-table-title="Renew"><span><span>$</span>41.98</span></td>
                                    <td data-table-title="Transfer"><span class="gb-big-dash"></span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper"><a href="/domains/registration/cctld/ph/"
                                                class="gb-tld-name">.
                                                <!-- -->ph
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span><span>$</span>52.98</span></td>
                                    <td data-table-title="Renew"><span><span>$</span>52.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>58.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper"><a href="/domains/registration/cctld/nl/"
                                                class="gb-tld-name">.
                                                <!-- -->nl
                                            </a>
                                            <div class="gb-notification-group"></div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span><span>$</span>7.98</span></td>
                                    <td data-table-title="Renew"><span><span>$</span>7.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>7.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper"><a href="/domains/registration/cctld/id/"
                                                class="gb-tld-name">.
                                                <!-- -->id
                                            </a>
                                            <div class="gb-notification-group"></div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span><span>$</span>19.98</span></td>
                                    <td data-table-title="Renew"><span><span>$</span>20.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>19.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/inc/" class="gb-tld-name">.
                                                <!-- -->inc
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>1,098.00</span>
                                        <div class="gb-price gb-price--special">UP to 48% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>2,098.00</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>2,198.00</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>2,098.00</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/website/" class="gb-tld-name">.
                                                <!-- -->website
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>1.99</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>19.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span
                                            class="gb-price gb-price--sale"><span>$</span>9.88</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>21.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>16.88</span>
                                        <div class="gb-price gb-price--special">HURRY &amp; TRANSFER
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>19.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/xyz/" class="gb-tld-name">.
                                                <!-- -->xyz
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>1.00</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>10.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>12.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>10.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/club/" class="gb-tld-name">.
                                                <!-- -->club
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>2.98</span>
                                        <div class="gb-price gb-price--special">UP to 77% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>12.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>13.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>12.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/online/" class="gb-tld-name">.
                                                <!-- -->online
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>2.19</span>
                                        <div class="gb-price gb-price--special">93% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>32.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span
                                            class="gb-price gb-price--sale"><span>$</span>21.88</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>34.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>26.88</span>
                                        <div class="gb-price gb-price--special">HURRY &amp; TRANSFER
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>32.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/info/" class="gb-tld-name">.
                                                <!-- -->info
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>3.98</span>
                                        <div class="gb-price gb-price--special">UP to 75% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>15.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>16.98</span></td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>14.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>15.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/store/" class="gb-tld-name">.
                                                <!-- -->store
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>1.79</span>
                                        <div class="gb-price gb-price--special">96% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>48.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span
                                            class="gb-price gb-price--sale"><span>$</span>25.88</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>50.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>42.88</span>
                                        <div class="gb-price gb-price--special">HURRY &amp; TRANSFER
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>48.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/best/" class="gb-tld-name">.
                                                <!-- -->best
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>2.98</span>
                                        <div class="gb-price gb-price--special">85% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>19.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>21.98</span></td>
                                    <td data-table-title="Transfer"><span class="gb-big-dash"></span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/live/" class="gb-tld-name">.
                                                <!-- -->live
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>2.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>20.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>22.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>20.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/cctld/us/" class="gb-tld-name">.
                                                <!-- -->us
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-bolt"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>This TLD may require additional registration <a
                                                                    href="/support/knowledgebase/subcategory/36/domains-with-extended-attributes">information</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>3.88</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>8.48</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>10.48</span></td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>7.48</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>8.48</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/tech/" class="gb-tld-name">.
                                                <!-- -->tech
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>11.88</span>
                                        <div class="gb-price gb-price--special">74% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>45.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span
                                            class="gb-price gb-price--sale"><span>$</span>34.88</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>47.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>37.88</span>
                                        <div class="gb-price gb-price--special">HURRY &amp; TRANSFER
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>45.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/cctld/pw/" class="gb-tld-name">.
                                                <!-- -->pw
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>6.88</span>
                                        <div class="gb-price gb-price--special">65% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>19.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span
                                            class="gb-price gb-price--sale"><span>$</span>9.88</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>19.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>16.88</span>
                                        <div class="gb-price gb-price--special">HURRY &amp; TRANSFER
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>19.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/pro/" class="gb-tld-name">.
                                                <!-- -->pro
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>3.98</span>
                                        <div class="gb-price gb-price--special">UP to 73% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>15.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>16.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>15.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/cctld/uk/" class="gb-tld-name">.
                                                <!-- -->uk
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-bolt"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>This TLD may require additional registration <a
                                                                    href="/support/knowledgebase/subcategory/36/domains-with-extended-attributes">information</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>6.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>7.48</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>9.48</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>0.00</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper"><a href="/domains/registration/cctld/tv/"
                                                class="gb-tld-name">.
                                                <!-- -->tv
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span><span>$</span>29.98</span></td>
                                    <td data-table-title="Renew"><span><span>$</span>31.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>28.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper"><a href="/domains/registration/cctld/cx/"
                                                class="gb-tld-name">.
                                                <!-- -->cx
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span><span>$</span>19.98</span></td>
                                    <td data-table-title="Renew"><span><span>$</span>19.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>19.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/cctld/mx/" class="gb-tld-name">.
                                                <!-- -->mx
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>10.98</span>
                                        <div class="gb-price gb-price--special">71% off
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>37.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>37.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>36.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/cctld/fm/" class="gb-tld-name">.
                                                <!-- -->fm
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>78.88</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>99.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>99.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>99.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/cctld/cc/" class="gb-tld-name">.
                                                <!-- -->cc
                                            </a>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>5.88</span>
                                        <div class="gb-price gb-price--special">LIMITED TIME
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>10.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>12.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>10.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/world/" class="gb-tld-name">.
                                                <!-- -->world
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>2.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>26.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>28.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>26.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/space/" class="gb-tld-name">.
                                                <!-- -->space
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>1.88</span>
                                        <div class="gb-price gb-price--special">91% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>19.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span
                                            class="gb-price gb-price--sale"><span>$</span>14.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>17.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>16.88</span>
                                        <div class="gb-price gb-price--special">HURRY &amp; TRANSFER
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>19.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><span
                                                class="gb-tld-name">.
                                                <!-- -->vip
                                            </span><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>4.18</span>
                                        <div class="gb-price gb-price--special">UP to 72% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>14.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span
                                            class="gb-price gb-price--sale"><span>$</span>14.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>15.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Transfer"><span><span>$</span>14.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/life/" class="gb-tld-name">.
                                                <!-- -->life
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>2.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>26.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>28.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>26.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/shop/" class="gb-tld-name">.
                                                <!-- -->shop
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>1.80</span>
                                        <div class="gb-price gb-price--special">UP to 94% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>30.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>36.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>30.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/host/" class="gb-tld-name">.
                                                <!-- -->host
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>6.98</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>84.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span
                                            class="gb-price gb-price--sale"><span>$</span>19.88</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>86.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>69.88</span>
                                        <div class="gb-price gb-price--special">HURRY &amp; TRANSFER
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>84.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/fun/" class="gb-tld-name">.
                                                <!-- -->fun
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>1.68</span>
                                        <div class="gb-price gb-price--special">92% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>19.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span
                                            class="gb-price gb-price--sale"><span>$</span>19.88</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>21.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>16.88</span>
                                        <div class="gb-price gb-price--special">HURRY &amp; TRANSFER
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>19.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/biz/" class="gb-tld-name">.
                                                <!-- -->biz
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>4.88</span>
                                        <div class="gb-price gb-price--special">UP to 69% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>15.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>16.98</span></td>
                                    <td data-table-title="Transfer"><span
                                            class="gb-price gb-price--sale"><span>$</span>14.48</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>15.98</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/icu/" class="gb-tld-name">.
                                                <!-- -->icu
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>2.05</span>
                                        <div class="gb-price gb-price--special">74% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>7.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>7.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>7.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/design/" class="gb-tld-name">.
                                                <!-- -->design
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>5.98</span>
                                        <div class="gb-price gb-price--special">UP to 86% OFF
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>42.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>44.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>42.98</span></td>
                                </tr>
                                <tr class="gb-d-none">
                                    <td>
                                        <div class="gb-relative-wrapper">
                                            <div class="gb-label--sale"><span>sale</span></div><a
                                                href="/domains/registration/gtld/art/" class="gb-tld-name">.
                                                <!-- -->art
                                            </a><sup class="gb-sub--color">&nbsp;*</sup>
                                            <div class="gb-notification-group">
                                                <div class="gb-tooltip" data-gb-tooltip-placement="right-start"><span
                                                        class="gb-target gb-tooltip__toggle"><i
                                                            class="fa fa-shield"></i></span>
                                                    <div class="gb-tooltip__wrap">
                                                        <div class="gb-tooltip__arrow"></div>
                                                        <div class="gb-tooltip__content">
                                                            <p>Personal ‘Whois’ data kept safe with Domain Privacy –
                                                                FREE for life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-table-title="Register"><span
                                            class="gb-price gb-price--sale"><span>$</span>5.88</span>
                                        <div class="gb-price gb-price--special">SPECIAL
                                            <!-- -->&nbsp;<span class="gb-text--through"><span>$</span>10.98</span>
                                        </div>
                                    </td>
                                    <td data-table-title="Renew"><span><span>$</span>12.98</span></td>
                                    <td data-table-title="Transfer"><span><span>$</span>10.98</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="gb-row gb-row--center gb-text-center" style="margin-top:20px;">
                            <div class="gb-col-12"><button class="btn btn-danger">+ Show More</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="whitesmoke-wrapper background-color-secondary" style="display: flex; flex-direction: column;">
        <div style="padding: 64px 0 48px; line-height: 1.33; text-align: center;">
            <h2 style="font-size:3rem; margin-bottom: 5px; color: white;">Pick up an exciting deal today</h2>
            <p style="font-size: 1.125rem;" class="orange-color">Check out our current offers.</p>
        </div>

        <div class="deal-wrap col-md-12">
            <div class="col-md-3 deal-wraps">
                <picture class="deal-pic"><i class="fa fa-server"></i></picture>
                <div class="deal-content">
                    <p class="deal-title">Free domain with hosting</p>
                    <p>Get a free domain with an all-in-one package deal.</p>
                    <p>
                        <a href="/hosting/domain-and-hosting-bundle/">Get your Package Deal →</a>
                    </p>
                </div>
            </div>

            <div class="col-md-3 deal-wraps">
                <picture class="deal-pic"><i class="fa fa-lightbulb-o"></i></picture>
                <div class="deal-content">
                    <p class="deal-title">Monthly coupons</p>
                    <p>Discover exciting coupon codes for domains and more.</p>
                    <p>
                        <a href="/hosting/domain-and-hosting-bundle/">Get your Monthly Coupons →</a>
                    </p>
                </div>
            </div>

            <div class="col-md-3 deal-wraps">
                <picture class="deal-pic"><i class="fa fa-certificate"></i></picture>
                <div class="deal-content">
                    <p class="deal-title">Join the VIP Rewards Club</p>
                    <p>Buy more domains, save more money.</p>
                    <p>
                        <a href="/hosting/domain-and-hosting-bundle/">Learn more →</a>
                    </p>
                </div>
            </div>

            <div class="col-md-3 deal-wraps">
                <picture class="deal-pic"><i class="fa fa-server"></i></picture>
                <div class="deal-content">
                    <p class="deal-title">$0.99 domains</p>
                    <p>Find a popular domain at a bargain price.</p>
                    <p>
                        <a href="/hosting/domain-and-hosting-bundle/">Get a $0.99 domain →</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="whitesmoke-wrapper" id="FreeProducts">
        <div style="padding: 64px 0 48px; line-height: 1.33; text-align: center;">
            <h2 style="font-size:3rem; margin-bottom: 5px;">Free Products And Services</h2>
            <p style="font-size: 1.125rem;" class="orange-color">Everybody loves free stuff!</p>
        </div>
        <div style="display:flex; justify-content: space-around; padding-bottom:50px;">
            <div style="width:40%;">
                <div class="col-md-12">
                    <ul class="list-ticked">
                        <li>
                            <a href="/security/whoisguard/">
                                <i class="fa fa-check"></i>
                                <div>
                                    <p>Free privacy protection for life →</p>
                                    <p>Keep your data safe with domain privacy protection.</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/hosting/email/">
                                <i class="fa fa-check"></i>
                                <div>
                                    <p>Free email address →</p>
                                    <p>Enjoy a 2-month free trial, ready for use when you sign up.</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/support/knowledgebase/article.aspx/9717/2232/what-is-dnssec" target="_blank">
                                <i class="fa fa-check"></i>
                                <div>
                                    <p>Free DNSSEC security →</p>
                                    <p>Protect your website visitors from fraudulent activity.</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div style="width:40%;">
                <div class="col-md-12" style="height:80%">
                    <div class="slideshow-container">

                        <div class="mySlides fade">
                            <div>
                                <p class="gb-h2 gb-mb-0">“Privacy guards included by default...”</p>
                                <p class="gb-mb-2 gb-mb-md-6">Very straightforward and appreciated that there are
                                    privacy guards included by default. Useful additional extras available.</p><a
                                    href="#" class="gb-color-base"><strong>Anonymous Customer</strong></a>
                            </div>
                        </div>

                        <div class="mySlides fade">
                            <div>
                                <p class="gb-h2 gb-mb-0">“Five stars from me.”</p>
                                <p class="gb-mb-2 gb-mb-md-6">Great prices. Many carts to choose from and the best
                                    online-tech support by text that I have ever dealt with. Five stars from me.</p><a
                                    href="https://www.facebook.com/violetbead/posts/10214542009935833"
                                    class="gb-color-base"><strong>Pamela W.</strong></a>
                            </div>
                        </div>

                        <div class="mySlides fade">
                            <div>
                                <p class="gb-h2 gb-mb-0">“Good and reliable hosting...”</p>
                                <p class="gb-mb-2 gb-mb-md-6">Cheap domain registration, good and reliable hosting plus
                                    classic customer support services!</p><a
                                    href="https://www.facebook.com/Negromoore/posts/10220537335891213"
                                    class="gb-color-base"><strong>Emmanuel S.</strong></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </div>
    </section>

    <section class="whitesmoke-wrapper background-color-secondary" id="easy">
        <div style="padding: 64px 0 48px; line-height: 1.33; text-align: center;">
            <h2 style="font-size:3rem; margin-bottom: 5px; color: white;">Guidance With Every Step</h2>
            <p style="font-size: 1.125rem;" class="orange-color">We’re here to help you grow.</p>
        </div>
        <div class="container">
            <div class="row p-20 m-20 change-order d-flex align-item-center">
                <div class="col-sm-5 wow fadeInUp">
                    <div style="text-align: center;">
                        <img loading="lazy" src="<?=base_url()?>resource/images/domain-camera.svg"
                            data-nsfw-filter-status="sfw" style="visibility: visible;">
                    </div>

                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-5 wow fadeInUp">
                    <h2 class="text-align-center mb-10 white-color">Easy Domain Management</h2>
                    <h3 data-nsfw-filter-status="swf" class="light-grey">After purchase, you can head straight to your
                        Namecheap account panel and start using your domain. The account panel is uncluttered and easy
                        to use, so you can quickly concentrate on the things that matter.</h3>
                </div>
            </div>
            <div class="row p-20 m-20 change-order d-flex align-item-center">
                <div class="col-sm-5 order-one">
                    <h2 style="text-align: center; " class="white-color">Easy Set-Up</h2>
                    <h3 data-nsfw-filter-status="swf" class="light-grey">Your free email address is ready and waiting
                        for you. Got a thriving social media or ecommerce page already set up? Use URL forwarding to
                        direct your visitors to your Instagram, Weebly or Shopify page of your choice.</h3>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-5 order-two">
                    <div style="text-align: center;">
                        <img loading="lazy" src="<?=base_url()?>resource/images/domain-tablet.svg"
                            data-nsfw-filter-status="sfw" style="visibility: visible;">
                    </div>

                </div>
            </div>
            <div class="row p-20 m-20 change-order d-flex align-item-center">
                <div class="col-sm-5 wow fadeInUp">
                    <div style="text-align: center;">
                        <img loading="lazy" src="<?=base_url()?>resource/images/domain-device.svg"
                            data-nsfw-filter-status="sfw" style="visibility: visible;">
                    </div>

                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-5 wow fadeInUp">
                    <h2 style="text-align: center;" class="white-color">We Are Here To Help</h2>
                    <h3 data-nsfw-filter-status="swf" class="light-grey">Your domain carries your brand, public image,
                        and professional reputation. As well as 24/7 customer support, we provide everything you need to
                        develop your personal or business site, including answers to questions like:<br>
                        <a>What is a domain and why do I need one? →</a><br>
                        <a>What makes a good domain name? →</a><br>
                        <a>How do I choose the right Top-level Domain? →</a>
                    </h3>
                </div>
            </div>
        </div>
</div>
</section>

<section>
    <div style="padding: 64px 0 48px; line-height: 1.33; text-align: center;">
        <h2 style="font-size:3rem; margin-bottom: 5px;">Why Namecheap</h2>

    </div>
    <div class="thumbnail-wrap">
        <div class="thumbnail">
            <div class="thumbnail__body">
                <p class="thumbnail__title">Privacy and Security</p>
                <p>Your <a href="/security/">website security</a> and privacy comes first at Namecheap, and we will
                    always support the rights of individuals and consumers online. It’s our mission to keep the Internet
                    open, free, and safe for everyone.</p>
            </div>
        </div>
        <div class="thumbnail">
            <div class="thumbnail__body">
                <p class="thumbnail__title">Privacy and Security</p>
                <p>Your <a href="/security/">website security</a> and privacy comes first at Namecheap, and we will
                    always support the rights of individuals and consumers online. It’s our mission to keep the Internet
                    open, free, and safe for everyone.</p>
            </div>
        </div>
        <div class="thumbnail">
            <div class="thumbnail__body">
                <p class="thumbnail__title">Privacy and Security</p>
                <p>Your <a href="/security/">website security</a> and privacy comes first at Namecheap, and we will
                    always support the rights of individuals and consumers online. It’s our mission to keep the Internet
                    open, free, and safe for everyone.</p>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="white-wrapper">
    <div class="container inner">
        <div class="row">
            <div class="col-md-12">
                <section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
                    <div class="container">
                        <h1 class="black-color mb-30">Frequently asked questions</h1>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading p-3" role="tab" id="heading1">
                                    <h3 class="panel-title">
                                        <a class="collapsed" role="button" title="" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapse1" aria-expanded="true"
                                            aria-controls="collapse1">
                                            Why buy a domain name from HostingHills?
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="heading1">
                                    <div class="panel-body pl-30" style="border:none;">
                                        <h5 class="card-text">Above all else, we strive to deliver outstanding customer
                                            experiences. When you buy a domain name from HostingHills, we guarantee it
                                            will be handed over to you with superior standards of service and support.
                                            Our primary goal is to build a customer-focused atmosphere filled with the
                                            happiest customers in the galaxy. The HostingHills guarantee is our mark of
                                            excellence.</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading p-3" role="tab" id="heading2">
                                    <h3 class="panel-title">
                                        <a class="collapsed" role="button" title="" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapse2" aria-expanded="true"
                                            aria-controls="collapse2">
                                            Why is domain name registration required?
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="heading2">
                                    <div class="panel-body pl-30" style="border:none;">
                                        <h5 class="card-text">When you build a website, you want visitors to come and
                                            see what you've done. To get them there, you need a unique domain name that
                                            connects to your site's servers. Domain name registration is required to
                                            ensure that no one else in the world can claim ownership of your site's
                                            address and to make finding your website simple. </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading p-3" role="tab" id="heading3">
                                    <h3 class="panel-title">
                                        <a class="collapsed" role="button" title="" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapse3" aria-expanded="true"
                                            aria-controls="collapse3">
                                            How does domain registration work?
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="heading3">
                                    <div class="panel-body pl-30" style="border:none;">
                                        <h5 class="card-text">Think of the name you want to register. The answer is
                                            typically your company or website name. It is best to keep your domain name
                                            short and easy to understand. Say it out loud, and make sure it sounds
                                            great. Next, search to see if it is available. If the name you desire is
                                            taken with the .com top-level domain, there are hundreds of others
                                            available. Finally, add the top choices to your cart and complete the domain
                                            registration.</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading p-3" role="tab" id="heading4">
                                    <h3 class="panel-title">
                                        <a class="collapsed " role="button" title="" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapse4" aria-expanded="true"
                                            aria-controls="collapse4">
                                            What domains are available from HostingHills?
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="heading4">
                                    <div class="panel-body pl-30" style="border:none;">
                                        <h5 class="card-text">At HostingHills, you can register brand new domain names
                                            using hundreds of popular TLDs. In our Marketplace, you will find thousands
                                            of domain names that have already been registered but are now for sale.
                                            While .com domains are available, of course, you'll also see options using
                                            .net, .us, and many more.</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading p-3" role="tab" id="heading5">
                                    <h3 class="panel-title">
                                        <a class="collapsed" role="button" title="" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapse5" aria-expanded="true"
                                            aria-controls="collapse5">
                                            Can you buy domain names and sell them?
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="heading5">
                                    <div class="panel-body pl-30" style="border:none;">
                                        <h5 class="card-text">If you have purchased domain names that you no longer
                                            need, you can sell them through HostingHills. When you are ready to sell,
                                            you can list your domain in our </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading p-3" role="tab" id="heading5">
                                    <h3 class="panel-title">
                                        <a class="collapsed" role="button" title="" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapse5" aria-expanded="true"
                                            aria-controls="collapse5">
                                            What’s the best way to find a cheap domain?
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="heading5">
                                    <div class="panel-body pl-30" style="border:none;">
                                        <h5 class="card-text">It’s all about knowing where to look. We’ve gathered
                                            together our most popular </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading p-3" role="tab" id="heading6">
                                    <h3 class="panel-title">
                                        <a class="collapsed" role="button" title="" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapse6" aria-expanded="true"
                                            aria-controls="collapse6">
                                            What’s the best way to find a cheap domain?
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapse6" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="heading6">
                                    <div class="panel-body pl-30" style="border:none;">
                                        <h5 class="card-text">It’s all about knowing where to look. We’ve gathered
                                            together our most popular </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading p-3" role="tab" id="heading7">
                                    <h3 class="panel-title">
                                        <a class="collapsed" role="button" title="" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapse7" aria-expanded="true"
                                            aria-controls="collapse7">
                                            How do I choose the right domain registrar?
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapse7" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="heading6">
                                    <div class="panel-body pl-30" style="border:none;">
                                        <h5 class="card-text">While price is a big factor, there are also other areas to
                                            consider when choosing the right domain registrar. These include customer
                                            support, security, and effortless account management. All of which come as
                                            standard with HostingHills — alongside a great price, of course.</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading p-3" role="tab" id="heading8">
                                    <h3 class="panel-title">
                                        <a class="collapsed" role="button" title="" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapse8" aria-expanded="true"
                                            aria-controls="collapse8">
                                            How do I pick the right domain name?
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapse8" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="heading8">
                                    <div class="panel-body pl-30" style="border:none;">
                                        <h5 class="card-text">So you’ve discovered that simply Googling ‘register
                                            website domain’ and finding a great provider isn’t the whole story. You also
                                            need to consider which domain extension to pick, and which name to register.
                                            So check out our simple guide to choosing the best domain.</h5>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
</div>