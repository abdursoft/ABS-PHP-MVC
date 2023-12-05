<?php

use System\Auth;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $meta; ?> <!-- Loading meta data here -->
    <link rel="shortcut icon" href="<?= $favicon ?>" type="image/x-icon">
    <!-- Loading Favicon -->
    <link rel="canonical" href="<?= BASE_URL ?>" />
    <!-- Site base url -->
    <title><?= $page_title ?? 'crickbd live' ?></title>
    <!-- Loading page title -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/dashboard.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/publisher_index.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/publisher.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/Bootstrap/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" integrity="sha512-/VYneElp5u4puMaIp/4ibGxlTd2MV3kuUIroR3NSQjS2h9XKQNebRQiyyoQKeiGE9mRdjSCIZf9pb7AVJ8DhCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
    <?= $style ?> <!-- Loading imported style here -->
    <?= $flash ?> <!-- Loading flash message script here -->
    <?= $script ?> <!-- Loading imported script here -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-219NC55T1W"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-219NC55T1W');
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg abs_<?= $menu_active == true ? '' : 'Hide' ?>" style="background:#fff">
        <div class="container-fluid">
            <a class="navbar-brand" href="/publisher/dashboard/"><img src="<?= BASE_URL ?>assets/images/logo.png" width="80px" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM17 17.25H7C6.59 17.25 6.25 16.91 6.25 16.5C6.25 16.09 6.59 15.75 7 15.75H17C17.41 15.75 17.75 16.09 17.75 16.5C17.75 16.91 17.41 17.25 17 17.25ZM17 12.75H7C6.59 12.75 6.25 12.41 6.25 12C6.25 11.59 6.59 11.25 7 11.25H17C17.41 11.25 17.75 11.59 17.75 12C17.75 12.41 17.41 12.75 17 12.75ZM17 8.25H7C6.59 8.25 6.25 7.91 6.25 7.5C6.25 7.09 6.59 6.75 7 6.75H17C17.41 6.75 17.75 7.09 17.75 7.5C17.75 7.91 17.41 8.25 17 8.25Z" fill="#292D32"></path>
                        </g>
                    </svg></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2  mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/publisher/dashboard/">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/publisher/ads" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ads
                        </a>
                        <ul class="dropdown-menu p-2">
                            <li class="mb-2"><a class="dropdown-item" href="/publisher/dashboard/ads">All Ads</a></li>
                            <li class="mb-2"><a class="dropdown-item" href="/publisher/dashboard/ads/create">Add Ad</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/videos">Videos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/matches" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Matches
                        </a>
                        <ul class="dropdown-menu p-2">
                            <li class="mb-2"><a class="dropdown-item" href="/matches/live">Live</a></li>
                            <li class="mb-2"><a class="dropdown-item" href="/matches/up-coming">Upcoming</a></li>
                            <li class="mb-2"><a class="dropdown-item" href="/matches/recent">Recent</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ranking
                        </a>
                        <ul class="dropdown-menu p-2">
                            <li class="mb-2"><a class="dropdown-item" href="/ranking/player">Player</a></li>
                            <li class="mb-2"><a class="dropdown-item" href="/ranking/team">Team</a></li>
                            <li class="mb-2"><a class="dropdown-item" href="/ranking/wwc">World cup</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/seriese">Seriese</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-4">
                    <div>
                        <span class="credits"><?= Auth::get('publisher')['credits'] ?? 0 ?></span> ৳
                    </div>
                    <div class="dropdown ">
                        <i class="ri-notification-3-line" style="font-size:20px;" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li>
                                <h6 class="dropdown-header">Notifications</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">No Notifications Here</a></li>
                        </ul>
                    </div>
                    <div class="user-details dropdown d-flex align-items-center">
                        <img src="<?= BASE_URL ?>assets/svg/user.svg" class="dropdown-toggle" width="40px" data-bs-toggle="dropdown" aria-expanded="false" />
                        <i class="ri-arrow-drop-down-line" style="font-size:25px"></i>
                        <ul class="dropdown-menu dropdown-menu-small dropdown-menu-lg-end p-3">
                            <li>
                                <h6 class="dropdown-header"><?= Auth::get('publisher')['email'] ?></h6>
                            </li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#premiumModel">Credit Funds</a></li>
                            <li><a class="dropdown-item" href="/password/retrieve?type=publisher">Change Password</a></li>
                            <li>
                                <h6 class="dropdown-header">Need Help</h6>
                            </li>
                            <li><a class="dropdown-item" href="/ticket/open">Open a support ticket</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item " href="/logout"><i class="ri-logout-box-r-line"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div>
        <div class="bodyLoader">
            <div class="loader"></div>
        </div>
        <script>
            /* Preloader Effect */
            var $window = $(window);
            $(".loader").css({
                display: 'inline-block'
            });
            $window.on("load", function() {
                $(".bodyLoader").fadeOut(600);
                $(".bodyLoader").html('')
            });
        </script>