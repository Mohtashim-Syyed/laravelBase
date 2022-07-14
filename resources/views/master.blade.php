<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home | SFTS</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="description" content="Page Titile">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/vendors.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/app.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/datagrid/datatables/datatables.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/datagrid/datatables/datatables.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/theme-demo.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/formplugins/select2/select2.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/statistics/chartjs/chartjs.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/fa-brands.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/fa-solid.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('font/font-awesome.min.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/miscellaneous/jqvmap/jqvmap.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/miscellaneous/fullcalendar/fullcalendar.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/statistics/chartist/chartist.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/statistics/c3/c3.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/formplugins/summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{URL::asset('css/notifications/toastr/toastr.css')}}">
    <script src="{{ URL::asset('js/jquery-3.6.0.min.js') }}"></script>
  
</head>
<body class="mod-bg-1 ">
<script>
        'use strict';

        var classHolder = document.getElementsByTagName("BODY")[0],
            /**
             * Load from localstorage
             **/
            themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {},
            themeURL = themeSettings.themeURL || '',
            themeOptions = themeSettings.themeOptions || '';
        /**
         * Load theme options
         **/
        if (themeSettings.themeOptions) {
            classHolder.className = themeSettings.themeOptions;
            console.log("%c✔ Theme settings loaded", "color: #148f32");
        } else {
            console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
        }
        if (themeSettings.themeURL && !document.getElementById('mytheme')) {
            var cssfile = document.createElement('link');
            cssfile.id = 'mytheme';
            cssfile.rel = 'stylesheet';
            cssfile.href = themeURL;
            document.getElementsByTagName('head')[0].appendChild(cssfile);
        }
        /**
         * Save to localstorage
         **/
        var saveSettings = function() {
            themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item) {
                return /^(nav|header|mod|display)-/i.test(item);
            }).join(' ');
            if (document.getElementById('mytheme')) {
                themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
            };
            localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
        }
        /**
         * Reset settings
         **/
        var resetSettings = function() {
            localStorage.setItem("themeSettings", "");
        }
    </script>
    <div class="page-wrapper">
        <div class="page-inner">
            <aside class="page-sidebar">
                <div class="page-logo">
                    <a href="#"
                        class="page-logo-link press-scale-down d-flex align-items-center position-relative"
                        data-toggle="modal" data-target="#modal-shortcut">
                        <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                        <span class="page-logo-text mr-1">SFTS</span>
                        <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                        <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                    </a>
                </div>
                <nav id="js-primary-nav" class="primary-nav" role="navigation">
                    <div class="nav-filter">
                        <div class="position-relative">
                            <input type="text" id="nav_filter_input" placeholder="Filter menu"
                                class="form-control" tabindex="0">
                            <a href="#" onclick="return false;"
                                class="btn-primary btn-search-close js-waves-off" data-action="toggle"
                                data-class="list-filter-active" data-target=".page-sidebar">
                                <i class="fal fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="info-card">
                        <img src="img/demo/avatars/avatar-admin.png" class="profile-image rounded-circle"
                            alt="Dr. Codex Lantern">
                        <div class="info-card-text">
                            <a href="#" class="d-flex align-items-center text-white">
                                <span class="text-truncate text-truncate-sm d-inline-block">
                                    MR. User Name
                                </span>
                            </a>
                        </div>
                        <img src="img/card-backgrounds/cover-2-lg.png" class="cover" alt="cover">
                        <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle"
                            data-class="list-filter-active" data-target=".page-sidebar"
                            data-focus="nav_filter_input">
                            <i class="fal fa-angle-down"></i>
                        </a>
                    </div>
                    <ul id="js-nav-menu" class="nav-menu">
                        <!-- dynamic side bar acc to role rights of user -->

                        <!-- this loop will show the dynamic tree for the menus which were assigned using CHECK ALL -->
                        @foreach ($rMenus as $ritem)
                            <li>
                                <!-- Creating Parent Menu -->
                                @if ($ritem->is_parent == 1 && $ritem->parent_id == 0 && $ritem->route == '0')
                                    <a>
                                        <i class="fal fa-map-marker-alt"></i>
                                        <span class="nav-link-text"
                                            data-i18n="nav.font_icons">{{ $ritem->title }}
                                        </span>
                                    </a>
                                @endif
                                <ul>
                                    @foreach ($rMenus as $rsub_item)
                                      <!--  Checking if menu has any child who himself is a parent -->
                                        @if ($rsub_item->is_parent == 1 && $rsub_item->parent_id == $ritem->menu_id && $rsub_item->route == '0')
                                            <li>
                                                <a href="javascript:void(0);" title="FontAwesome"
                                                    data-filter-tags="font icons fontawesome">
                                                    <span class="nav-link-text"
                                                        data-i18n="nav.font_icons_fontawesome">{{ $rsub_item->title }}
                                                    </span>
                                                </a>
                                                <ul>
                                                    @foreach ($rMenus as $rpage)
                                                     <!-- checking if sub_menu has any child -->
                                                        @if ($rpage->parent_id == $rsub_item->menu_id && $rpage->parent_id == $rsub_item->menu_id)
                                                            <li onclick="LoadPage('{{$rpage->route }}')" >
                                                                <a  title="Light"
                                                                    data-filter-tags="font icons fontawesome light">
                                                                    <span class="nav-link-text no-gutters"
                                                                        data-i18n="nav.font_icons_fontawesome_light">{{ $rpage->title }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                    @foreach ($rMenus as $rpage2)
                                     <!-- checking if menu has any child who himself is not a parent -->
                                        @if ($rpage2->parent_id == $ritem->menu_id && $rpage2->route != '0')
                                            <li onclick="LoadPage('{{$rpage2->route }}')">
                                                <a  title="Light" data-filter-tags="font icons fontawesome light">
                                                    <span class="nav-link-text no-gutters"
                                                        data-i18n="nav.font_icons_fontawesome_light">{{ $rpage2->title }}
                                                    </span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach

                        <!-- this loop will show the dynamic tree for the menus whose children were not assigned using CHECK ALL -->
                        @foreach ($rMenus1 as $ritem1)
                            <li>
                                  <!-- Creating Parent Menu -->
                                @if ($ritem1[0]->is_parent == 1 && $ritem1[0]->parent_id == 0 && $ritem1[0]->route == '0')
                                    <a>
                                        <i class="fal fa-map-marker-alt"></i>
                                        <span class="nav-link-text"
                                            data-i18n="nav.font_icons">{{ $ritem1[0]->title }}
                                        </span>
                                    </a>
                                @endif
                                <ul>
                                    @foreach ($rMenus1 as $rsub_item1)
                                      <!--  Checking if menu has any child who himself is a parent -->
                                        @if ($rsub_item1[0]->is_parent == 1 && $rsub_item1[0]->parent_id == $ritem1[0]->id && $rsub_item1[0]->route == '0')
                                            <li>
                                                <a href="javascript:void(0);" title="FontAwesome"
                                                    data-filter-tags="font icons fontawesome">
                                                    <span class="nav-link-text"
                                                        data-i18n="nav.font_icons_fontawesome">{{ $rsub_item1[0]->title }}
                                                    </span>
                                                </a>
                                                <ul>
                                                @foreach ($rMenus as $rpage)
                                                     <!-- checking if sub_menu has any child -->
                                                        @if ($rpage->parent_id == $rsub_item->menu_id && $rpage->parent_id == $rsub_item->menu_id)
                                                            <li onclick="LoadPage('{{$rpage->route }}')" >
                                                                <a  title="Light"
                                                                    data-filter-tags="font icons fontawesome light">
                                                                    <span class="nav-link-text no-gutters"
                                                                        data-i18n="nav.font_icons_fontawesome_light">{{ $rpage->title }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                    @foreach ($rMenus as $rsub_item)
                                      <!--  Checking if menu has any child who himself is a parent -->
                                        @if ($rsub_item->is_parent == 1 && $rsub_item->parent_id == $ritem->menu_id && $rsub_item->route == '0')
                                            <li>
                                                <a href="javascript:void(0);" title="FontAwesome"
                                                    data-filter-tags="font icons fontawesome">
                                                    <span class="nav-link-text"
                                                        data-i18n="nav.font_icons_fontawesome">{{ $rsub_item->title }}
                                                    </span>
                                                </a>
                                                <ul>
                                                    @foreach ($rMenus as $rpage)
                                                         <!-- checking if sub_menu has any child -->
                                                        @if ($rpage->parent_id == $rsub_item->menu_id && $rpage->parent_id == $rsub_item->menu_id)
                                                            <li onclick="LoadPage('{{$rpage->route }}')" >
                                                                <a  title="Light"
                                                                    data-filter-tags="font icons fontawesome light">
                                                                    <span class="nav-link-text no-gutters"
                                                                        data-i18n="nav.font_icons_fontawesome_light">{{ $rpage->title }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                    @foreach ($rMenus as $rpage2)
                                      <!-- checking if menu has any child who himself is not a parent -->
                                        @if ($rpage2->parent_id == $ritem1[0]->id && $rpage2->route != '0')
                                            <li onclick="LoadPage('{{$rpage2->route }}')">
                                                <a  title="Light" data-filter-tags="font icons fontawesome light">
                                                    <span class="nav-link-text no-gutters"
                                                        data-i18n="nav.font_icons_fontawesome_light">{{ $rpage2->title }}
                                                    </span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach

                        <!-- this loop will show the dynamic tree for the menus whose sub_menu(child) is also a parent and was assigned using CHECK ALL -->
                        @foreach ($rMenus2 as $ritem2)
                            <li>
                                  <!-- Creating Parent Menu -->
                                @if ($ritem2[0]->is_parent == 1 && $ritem2[0]->parent_id == 0 && $ritem2[0]->route == '0')
                                    <a>
                                        <i class="fal fa-map-marker-alt"></i>
                                        <span class="nav-link-text"
                                            data-i18n="nav.font_icons">{{ $ritem2[0]->title }}
                                        </span>
                                    </a>
                                @endif
                                <ul>
                                @foreach ($rMenus1 as $rsub_item1)   
                                      <!--  Checking if menu has any child who himself is a parent -->
                                @if ($rsub_item1[0]->is_parent == 1 && $rsub_item1[0]->parent_id == $ritem2[0]->id && $rsub_item1[0]->route == '0')
                                        <li>
                                            <a href="javascript:void(0);" title="FontAwesome"
                                                data-filter-tags="font icons fontawesome">
                                                <span class="nav-link-text"
                                                    data-i18n="nav.font_icons_fontawesome">{{ $rsub_item1[0]->title }}
                                                </span>
                                            </a>
                                            <ul>
                                            @foreach ($rMenus as $rpage)
                                           <!-- checking if sub_menu has any child -->
                                                    @if ($rpage->parent_id == $rsub_item1[0]->id && $rpage->parent_id == $rsub_item1[0]->id)
                                                        <li onclick="LoadPage('{{$rpage->route }}')" >
                                                            <a  title="Light"
                                                                data-filter-tags="font icons fontawesome light">
                                                                <span class="nav-link-text no-gutters"
                                                                    data-i18n="nav.font_icons_fontawesome_light">{{ $rpage->title }}
                                                                </span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                                @foreach ($rMenus as $rsub_item)
                                      <!--  Checking if menu has any child who himself is a parent -->
                                        @if ($rsub_item->is_parent == 1 && $rsub_item->parent_id == $ritem->menu_id && $rsub_item->route == '0')
                                            <li>
                                                <a href="javascript:void(0);" title="FontAwesome"
                                                    data-filter-tags="font icons fontawesome">
                                                    <span class="nav-link-text"
                                                        data-i18n="nav.font_icons_fontawesome">{{ $rsub_item->title }}
                                                    </span>
                                                </a>
                                                <ul>
                                                    @foreach ($rMenus as $rpage)
                                                         <!-- checking if sub_menu has any child -->
                                                        @if ($rpage->parent_id == $rsub_item->menu_id && $rpage->parent_id == $rsub_item->menu_id)
                                                            <li onclick="LoadPage('{{$rpage->route }}')" >
                                                                <a  title="Light"
                                                                    data-filter-tags="font icons fontawesome light">
                                                                    <span class="nav-link-text no-gutters"
                                                                        data-i18n="nav.font_icons_fontawesome_light">{{ $rpage->title }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                <!-- dynamic side bar acc to user rights -->

                <!-- this loop will show the dynamic tree for the menus which were assigned using CHECK ALL -->
                        @foreach ($menus as $item)
                            <li>
                                  <!-- Creating Parent Menu -->
                                @if ($item->is_parent == 1 && $item->parent_id == 0 && $item->route == '0')
                                    <a>
                                        <i class="fal fa-map-marker-alt"></i>
                                        <span class="nav-link-text"
                                            data-i18n="nav.font_icons">{{ $item->title }}
                                        </span>
                                    </a>
                                @endif
                                <ul>
                                    @foreach ($menus as $sub_item)
                                      <!--  Checking if menu has any child who himself is a parent -->
                                        @if ($sub_item->is_parent == 1 && $sub_item->parent_id == $item->menu_id && $sub_item->route == '0')
                                            <li>
                                                <a href="javascript:void(0);" title="FontAwesome"
                                                    data-filter-tags="font icons fontawesome">
                                                    <span class="nav-link-text"
                                                        data-i18n="nav.font_icons_fontawesome">{{ $sub_item->title }}
                                                    </span>
                                                </a>
                                                <ul>
                                                    @foreach ($menus as $page)
                                                         <!-- checking if sub_menu has any child -->
                                                        @if ($page->parent_id == $sub_item->menu_id && $page->parent_id == $sub_item->menu_id)
                                                            <li onclick="LoadPage('{{$page->route }}')" >
                                                                <a  title="Light"
                                                                    data-filter-tags="font icons fontawesome light">
                                                                    <span class="nav-link-text no-gutters"
                                                                        data-i18n="nav.font_icons_fontawesome_light">{{ $page->title }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                    @foreach ($menus as $page2)
                                      <!-- checking if menu has any child who himself is not a parent -->
                                        @if ($page2->parent_id == $item->menu_id && $page2->route != '0')
                                            <li onclick="LoadPage('{{$page2->route }}')">
                                                <a  title="Light" data-filter-tags="font icons fontawesome light">
                                                    <span class="nav-link-text no-gutters"
                                                        data-i18n="nav.font_icons_fontawesome_light">{{ $page2->title }}
                                                    </span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                        <!-- this loop will show the dynamic tree for the menus whose children were not assigned using CHECK ALL -->
                        @foreach ($menus1 as $item1)
                            <li>
                                  <!-- Creating Parent Menu -->
                                @if ($item1[0]->is_parent == 1 && $item1[0]->parent_id == 0 && $item1[0]->route == '0')
                                    <a>
                                        <i class="fal fa-map-marker-alt"></i>
                                        <span class="nav-link-text"
                                            data-i18n="nav.font_icons">{{ $item1[0]->title }}
                                        </span>
                                    </a>
                                @endif
                                <ul>
                                    @foreach ($menus1 as $sub_item1)
                                      <!--  Checking if menu has any child who himself is a parent -->
                                        @if ($sub_item1[0]->is_parent == 1 && $sub_item1[0]->parent_id == $item1[0]->id && $sub_item1[0]->route == '0')
                                            <li>
                                                <a href="javascript:void(0);" title="FontAwesome"
                                                    data-filter-tags="font icons fontawesome">
                                                    <span class="nav-link-text"
                                                        data-i18n="nav.font_icons_fontawesome">{{ $sub_item1[0]->title }}
                                                    </span>
                                                </a>
                                                <ul>
                                                    @foreach ($menus as $page)
                                                         <!-- checking if sub_menu has any child -->
                                                        @if ($page->parent_id == $sub_item1[0]->id && $page->parent_id == $sub_item1[0]->menu_id)
                                                            <li onclick="LoadPage('{{$page->route }}')" >
                                                                <a  title="Light"
                                                                    data-filter-tags="font icons fontawesome light">
                                                                    <span class="nav-link-text no-gutters"
                                                                        data-i18n="nav.font_icons_fontawesome_light">{{ $page->title }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                    @foreach ($menus as $sub_item)
                                      <!--  Checking if menu has any child who himself is a parent -->                          
                                        @if ($sub_item->is_parent == 1 && $sub_item->parent_id == $item1[0]->id && $sub_item->route == '0')
                                            <li>
                                                <a href="javascript:void(0);" title="FontAwesome"
                                                    data-filter-tags="font icons fontawesome">
                                                    <span class="nav-link-text"
                                                        data-i18n="nav.font_icons_fontawesome">{{ $sub_item->title }}
                                                    </span>
                                                </a>
                                                <ul>
                                                    @foreach ($menus as $page)
                                                         <!-- checking if sub_menu has any child -->
                                                        @if ($page->parent_id == $sub_item->menu_id && $page->parent_id == $sub_item->menu_id)
                                                            <li onclick="LoadPage('{{$page->route }}')" >
                                                                <a  title="Light"
                                                                    data-filter-tags="font icons fontawesome light">
                                                                    <span class="nav-link-text no-gutters"
                                                                        data-i18n="nav.font_icons_fontawesome_light">{{ $page->title }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                    @foreach ($menus as $page2)
                                      <!-- checking if menu has any child who himself is not a parent -->
                                        @if ($page2->parent_id == $item1[0]->id && $page2->route != '0')
                                            <li onclick="LoadPage('{{$page2->route }}')">
                                                <a  title="Light" data-filter-tags="font icons fontawesome light">
                                                    <span class="nav-link-text no-gutters"
                                                        data-i18n="nav.font_icons_fontawesome_light">{{ $page2->title }}
                                                    </span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                         <!-- this loop will show the dynamic tree for the menus whose sub_menu(child) is also a parent and was assigned using CHECK ALL -->
                        @foreach ($menus2 as $item2)
                            <li>
                                  <!-- Creating Parent Menu -->
                                @if ($item2[0]->is_parent == 1 && $item2[0]->parent_id == 0 && $item2[0]->route == '0')
                                    <a>
                                        <i class="fal fa-map-marker-alt"></i>
                                        <span class="nav-link-text"
                                            data-i18n="nav.font_icons">{{ $item2[0]->title }}
                                        </span>
                                    </a>
                                @endif
                                <ul>
                                    @foreach ($menus1 as $sub_item1)
                                      <!--  Checking if menu has any child who himself is a parent -->            
                                        @if ($sub_item1[0]->is_parent == 1 && $sub_item1[0]->parent_id == $item2[0]->id && $sub_item1[0]->route == '0')
                                            <li>
                                                <a href="javascript:void(0);" title="FontAwesome"
                                                    data-filter-tags="font icons fontawesome">
                                                    <span class="nav-link-text"
                                                        data-i18n="nav.font_icons_fontawesome">{{ $sub_item1[0]->title }}
                                                    </span>
                                                </a>
                                                <ul>
                                                    @foreach ($menus as $page)
                                                         <!-- checking if sub_menu has any child -->
                                                        @if ($page->parent_id == $sub_item1[0]->id && $page->parent_id == $sub_item1[0]->id)
                                                            <li onclick="LoadPage('{{$page->route }}')" >
                                                                <a  title="Light"
                                                                    data-filter-tags="font icons fontawesome light">
                                                                    <span class="nav-link-text no-gutters"
                                                                        data-i18n="nav.font_icons_fontawesome_light">{{ $page->title }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                    @foreach ($menus as $sub_item)
                                      <!--  Checking if menu has any child who himself is a parent -->
                                        @if ($sub_item->is_parent == 1 && $sub_item->parent_id == $item1[0]->id && $sub_item->route == '0')
                                            <li>
                                                <a href="javascript:void(0);" title="FontAwesome"
                                                    data-filter-tags="font icons fontawesome">
                                                    <span class="nav-link-text"
                                                        data-i18n="nav.font_icons_fontawesome">{{ $sub_item->title }}
                                                    </span>
                                                </a>
                                                <ul>
                                                    @foreach ($menus as $page)
                                                         <!-- checking if sub_menu has any child -->
                                                        @if ($page->parent_id == $sub_item->menu_id && $page->parent_id == $sub_item->menu_id)
                                                            <li onclick="LoadPage('{{$page->route }}')" >
                                                                <a  title="Light"
                                                                    data-filter-tags="font icons fontawesome light">
                                                                    <span class="nav-link-text no-gutters"
                                                                        data-i18n="nav.font_icons_fontawesome_light">{{ $page->title }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                    <div class="filter-message js-filter-message bg-success-600"></div>
                </nav>
            </aside>
            <div class="page-content-wrapper">
                <header class="page-header" role="banner">
                    <div class="page-logo">
                        <a href="#"
                            class="page-logo-link press-scale-down d-flex align-items-center position-relative"
                            data-toggle="modal" data-target="#modal-shortcut">
                            <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                            <span class="page-logo-text mr-1">SFTS</span>
                            <span
                                class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                        </a>
                    </div>
                    <!-- DOC: nav menu layout change shortcut -->
                    <div class="hidden-md-down dropdown-icon-menu position-relative">
                        <a href="#" class="header-btn btn js-waves-off" data-action="toggle"
                            data-class="nav-function-hidden" title="Hide Navigation">
                            <i class="ni ni-menu"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="#" class="btn js-waves-off" data-action="toggle"
                                    data-class="nav-function-minify" title="Minify Navigation">
                                    <i class="ni ni-minify-nav"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn js-waves-off" data-action="toggle"
                                    data-class="nav-function-fixed" title="Lock Navigation">
                                    <i class="ni ni-lock-nav"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- DOC: mobile button appears during mobile width -->
                    <div class="hidden-lg-up">
                        <a href="#" class="header-btn btn press-scale-down" data-action="toggle"
                            data-class="mobile-nav-on">
                            <i class="ni ni-menu"></i>
                        </a>
                    </div>
                    <div class="search">
                    </div>
                    <div class="ml-auto d-flex">
                        <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            class="btn header-btn waves-effect waves-themed" title="Logout"><span><i
                                    class="fal fa-sign-out"></i></span></a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </header>
                <main id="js-page-content" role="main" class="page-content">
                 
                </main>
                <!-- this overlay is activated only when mobile menu is triggered -->
                <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
                <!-- END Page Content -->
            </div>
        </div>
    </div>
    <script src="{{URL::asset('js/vendors.bundle.js')}}"></script>
    <script src="{{URL::asset('js/app.bundle.js')}}"></script>
    <script src="{{URL::asset('js/notifications/toastr/toastr.js')}}"></script>
    <script src="{{URL::asset('js/datagrid/datatables/datatables.bundle.js')}}"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
    {{-- <script type="application/javascript" src="{{URL::asset('js/secure-webstore.js')}}"></script> --}}
    {{-- <script type="module" src="{{URL::asset('js/devtommy.js')}}"></script> --}}
    <script>
        function LoadPage(courl) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                url: courl,
                success: function(result) {
                    $("#js-page-content").html(result);
                }
            });
        }
    </script>
</body>

</html>
