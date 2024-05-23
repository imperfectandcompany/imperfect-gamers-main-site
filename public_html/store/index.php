<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Join the Pro VIP Store and gain access to exclusive membership tiers with special benefits.">
    <meta name="keywords" content="Pro VIP Store, membership, exclusive, benefits, gaming, community, VIP, PRO">
    <title>Membership Club - Imperfect Gamers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
            height: calc(var(--vh, 1vh) * 100);
        }

        /* Custom scrollbar styles */
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: #111;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #a83232;
            border-radius: 20px;
            border: 3px solid #111;
        }

        body {
            font-family: 'Roboto', sans-serif;
            color: #fff;
            height: 100%;
            min-height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .bg-grid-pattern {
            background-image: url('data:image/svg+xml,%3Csvg width="100" height="100" xmlns="http://www.w3.org/2000/svg"%3E%3Cg%3E%3Cline stroke="%23ffffff" stroke-width="0.5" y2="100" x2="100" y1="100" x1="0" stroke-dasharray="4, 4"/%3E%3Cline stroke="%23ffffff" stroke-width="0.5" y2="100" x2="0" y1="0" x1="0" stroke-dasharray="4, 4"/%3E%3C/g%3E%3C/svg%3E') !important;
            background-size: 100px 100px;
        }


        .background-svg {
            background-image: url('https://imperfectgamers.org/assets/store/bg.svg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeOutDown {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(20px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        @keyframes fadeOutIn {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
                transform: scale(0.95);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }


        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .title {
            font-size: 3rem;
            color: #fff;
            margin-bottom: 2rem;
            text-transform: uppercase;
            letter-spacing: 5px;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
            animation: fadeInDown 1s ease-in-out;
        }

        .subtitle {
            font-size: 1.25rem;
            color: #aaa;
            margin-bottom: 3rem;
            animation: fadeInUp 1s ease-in-out;
        }


        .tooltip-content {
            position: absolute;
            bottom: 105px;
            /* Increased to create more separation from the card */
            left: 20%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.85);
            /* Semi-transparent dark background for contrast */
            color: #fff;
            /* White text for readability */
            padding: 8px 16px;
            /* A bit more padding for a roomier feel */
            border-radius: 8px;
            /* Rounded corners for a modern look */
            font-size: 15px;
            /* Slightly larger font for clarity */
            font-weight: 500;
            /* Medium font weight for a touch of boldness */
            white-space: nowrap;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            /* More pronounced shadow for depth */
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s ease, transform 0.5s ease;
            /* Smooth transition for both opacity and a slight movement */
            transform: translate(-50%, 10px);
            /* Initial transform state for animation */
        }

        .membership-card:hover .tooltip-content {
            opacity: 1;
            visibility: visible;
        }

        .membership-card {
            width: 384px;
            height: 224px;
            background: #000;
            border-radius: 20px;
            color: #fff;
            padding: 20px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 0 100px rgba(255, 255, 255, 0.3);
            transform: perspective(1000px) rotateY(10deg);
            transition: transform 0.5s, box-shadow 0.5s, background 0.5s, background-color 1s ease-in-out;
            background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.1));
            background-size: 200% 200%;
            animation: shimmer-effect 8s ease infinite;
        }

        .membership-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0) 100%);
            animation: shimmer 2s infinite;
            background-repeat: no-repeat;
            background-size: 200% 100%;
            z-index: 1;
            border-radius: 20px;
        }

        .membership-card:hover {
            transform: perspective(1000px) rotateY(0deg);
            background: linear-gradient(145deg, #640000, #ae0000);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }



        @keyframes shimmer-effect {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }



        .membership-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 1;
            transition: opacity 0.5s, transform 0.5s;
            border-radius: 20px;
        }

        .membership-card:hover::after {
            opacity: 0;
        }

        .spinback-effect {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.1));
            border-radius: 50%;
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background-blend-mode: overlay;
            backdrop-filter: blur(5px);
        }

        .spinback-effect::before,
        .spinback-effect::after {
            content: '';
            position: absolute;
            top: 10%;
            left: 10%;
            right: 10%;
            bottom: 10%;
            border-radius: 50%;
        }

        .spinback-effect::before {
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0));
        }

        .spinback-effect::after {
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(0deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: spin-disk 5s linear infinite;
        }

        @keyframes spin-disk {
            100% {
                transform: rotate(1turn);
            }
        }

        .logo-image {
            width: 60px;
            height: 60px;
        }

        .membership-tier {
            position: absolute;
            top: 72.5%;
            left: 13.75%;
            transform: translate(-50%, -50%);
            width: 150px;
        }

        #showMask {
            transition: opacity 300ms;
        }

        .membership-tier:hover #showMask {
            opacity: 0.5;
        }

        .card-price {
            font-size: 0.725rem;
            color: #aaa;
        }

        .card-price-change {
            animation: fadeOutIn 0.8s ease forwards;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
            margin: 20px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);

        }

        input:checked+.slider {
            background-color: #7f1d1d;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #7f1d1d;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .price-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 1s ease-in-out;
        }

        .price-label {
            color: #fff;
            font-size: 0.9rem;
            margin: 0 10px;
        }


        @keyframes heartbeat {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.7;
            }

            25%,
            75% {
                transform: scale(1.1);
                opacity: 1;
            }
        }

        @keyframes hoverInEffect {
            from {
                transform: scale(1);
                opacity: 0.7;
            }

            to {
                transform: scale(1.2);
                opacity: 1;
            }
        }

        @keyframes hoverOutEffect {
            from {
                transform: scale(1.2);
                opacity: 1;
            }

            to {
                transform: scale(1);
                opacity: 0.7;
            }
        }

        .animate-heartbeat {
            transition: transform 0.5s ease, opacity 0.5s ease;
        }

        .heart:hover {
            animation: hoverInEffect 0.5s forwards;
        }

        .button {
            background: linear-gradient(145deg, #640000, #ae0000);
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            letter-spacing: 1px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
            cursor: pointer;
            margin-top: 20px;
            position: relative;
            overflow: hidden;
        }

        .button:hover {
            background: linear-gradient(145deg, #ae0000, #640000);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            transform: translateY(-2px);
        }

        .button:active {
            transform: translateY(0);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        }

        .button:focus {
            outline: none;
            box-shadow: 0 0 0 2px #fff, 0 0 0 4px #ae0000;
        }

        .button i {
            margin-right: 8px;
        }

        .button span {
            position: relative;
            top: 1px;
        }

        .button:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0.1) 70%, rgba(255, 255, 255, 0) 100%);
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.5s;
            border-radius: 50%;
            z-index: 0;
            pointer-events: none;
        }

        .button:hover:before {
            transform: translate(-50%, -50%) scale(1);
        }

        .button:after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .button:hover:after {
            opacity: 1;
        }

        .button span {
            position: relative;
            z-index: 1;
        }

        .background-animation {
            position: fixed;
            top: 0;
            opacity: 5%;
            left: 0;
            width: 100%;
            height: 100vh;
            background: linear-gradient(45deg, #640000, #ae0000, #640000, #ae0000);
            background-size: 400% 400%;
            animation: moveBackground 10s ease infinite;
            z-index: -1;
        }

        @keyframes moveBackground {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* FAQ Section Styles */
        .faq-section {
            width: 100%;
            max-width: 800px;
            margin-top: 4rem;
            margin-bottom: 4rem;
        }

        .faq-title {
            font-size: 2rem;
            color: #fff;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .faq-item {
            background: #202020;
            border-radius: 10px;
            margin-bottom: 1rem;
            padding: 1rem;
            transition: background 0.3s ease;
        }

        .faq-item:hover {
            background: #333333;
        }

        .faq-question {
            font-size: 1.25rem;
            color: #fff;
            cursor: pointer;
            position: relative;
            padding-right: 2rem;
        }

        .faq-question:hover {
            color: #ccc;
            /* Slight color shift to indicate interactivity */
        }

        .faq-question::after {
            content: '\f107';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            transition: transform 0.3s ease;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
            color: #aaa;
            margin-top: 0.5rem;
            padding: 0 1rem;
            transition: max-height 0.5s ease, padding 0.5s ease, opacity 0.5s ease;
            opacity: 0;
            /* Start with the answer fully transparent */
        }

        .faq-item.active .faq-answer {
            max-height: 1000px;
            /* Arbitrary large height for smooth animation */
            padding: 1rem;
            opacity: 1;
            /* Fade in the answer text */
        }

        .faq-item.active .faq-question::after {
            transform: translateY(-50%) rotate(180deg);
        }

        .contact-form-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 20px;
            margin-top: 40px;
            width: 384px;
            box-shadow: 0 0 100px rgba(255, 255, 255, 0.3);
            transition: all 0.5s ease-in-out;
            overflow: hidden;
        }

        .contact-section-transition {
            transition: all 0.5s ease-in-out;
        }

        .luxury-input:focus {
            background-color: #1a202c;
            color: #f3d9e0;
        }

        .luxury-input:invalid:hover,
        .luxury-input:invalid:focus {
            border-color: #e3342f;
        }

        .luxury-input:valid:hover,
        .luxury-input:valid:focus {
            border-color: #38c172;
        }

        .luxury-input::placeholder {
            color: #cbd5e0;
        }

        .luxury-label {
            letter-spacing: 0.05em;
            color: #f3d9e0;
        }

        .luxury-title {
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #f7fafc;
        }

        .luxury-label.focused {
            color: #f6ad55;
        }

        .contact-section {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 20px;
            margin-top: 40px;
            width: 384px;
            box-shadow: 0 0 100px rgba(255, 255, 255, 0.3);
        }

        .contact-section h2 {
            color: #fff;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .contact-section p {
            color: #aaa;
            margin-bottom: 20px;
        }

        .contact-section button {
            background: linear-gradient(145deg, #640000, #ae0000);
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .contact-section button:hover {
            background: linear-gradient(145deg, #ae0000, #640000);
        }

        .hidden {
            display: none;
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            .faq-section {
                padding: 0 1rem;
            }

            .faq-title {
                font-size: 1.5rem;
            }

            .faq-question {
                font-size: 1rem;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .faq-section {
                padding: 0 1rem;
            }

            .faq-title {
                font-size: 1.5rem;
            }

            .faq-question {
                font-size: 1rem;
            }

            .button {
                padding: 8px 16px;
            }

            .main {
                padding: 0 4px;
            }

            .nav {
                display: block;
            }

            .nav a {
                display: block;
                margin: 5px 0;
            }

            .container {
                padding: 0 4px;
            }

            .price-toggle {
                flex-direction: column;
                padding-top: 12px;
                align-items: center;
            }

            .price-toggle .price-label {
                margin: 0;
            }

            .switch {
                margin: 10px 0;
            }

            .faq-section {
                width: 100%;
                padding: 0;
            }

            .faq-item {
                padding: 0.5rem;
            }

            .faq-question {
                padding-right: 1rem;
            }

            .membership-card .spinback-effect {
                display: none;
            }

            .testimonial {
                grid-template-columns: 1fr;
            }

            .testimonial-item {
                width: 100%;
                padding: 1rem;
            }

            .event {
                grid-template-columns: 1fr;
            }

            .event-item {
                width: 100%;
                padding: 1rem;
            }

            .footer {
                flex-direction: column;
                text-align: center;
            }

            .footer .footer-section {
                margin-bottom: 1rem;
            }

            .footer .footer-section a {
                margin: 0 0.5rem;
            }
        }
    </style>
</head>

<body class="bg-black text-white relative flex flex-col background-svg px-4 sm:px-8 md:px-12">
    <div class="background-animation"></div>
    <header class="text-center mt-8">
        <nav class="flex space-x-4 text-sm mb-6 items-center" aria-label="Main navigation">
            <a href="https://imperfectgamers.org" class="cursor-pointer">
                <div class="mx-auto text-center ig_logo animate__animated animate__slideInDown ">
                    <object data="https://cdn.imperfectgamers.org/inc/assets/img/logo.svg" class="pointer-events-none"
                        type="image/svg+xml" height="48" width="48"></object>
                </div>
            </a>
            <a class="text-gray-400 hover:text-white" href="#" aria-label="Home">HOME</a>
            <a class="text-gray-400 hover:text-white" href="#" aria-label="Store">CLUB</a>
            <a class="text-gray-400 hover:text-white" href="#" aria-label="Community">COMMUNITY</a>
        </nav>
    </header>
    <main class="md:mx-72 space-y-24 md:space-y-12">
        <section class="hidden">
            <div>
                <div class="flex justify-between items-center flex-col md:flex-row">
                    <div class="mb-4">
                        <img src="https://imperfectgamers.org/assets/store/pageheader.svg" class="hidden"
                            alt="PRO VIP Store logo">
                    </div>
                    <div class="flex flex-wrap justify-between">
                        <div class="text-left mr-8 mb-4">
                            <p class="text-4xl font-bold">
                                20%
                            </p>
                            <p>
                                MEMBERSHIP IN
                                <br>
                                GLOBAL RECORDS
                            </p>
                        </div>
                        <div class="text-left mr-8 mb-4">
                            <p class="text-4xl font-bold">
                                100
                            </p>
                            <p>
                                NEW MEMBERS IN
                                <br>
                                THE PAST WEEK
                            </p>
                        </div>
                        <div class="text-left mr-8 mb-4">
                            <p class="text-4xl font-bold">
                                13.5 K
                            </p>
                            <p>
                                VISITORS IN THE
                                <br>
                                LAST MONTH
                            </p>
                        </div>
                        <div class="text-left mb-4">
                            <p class="text-4xl font-bold">
                                100K
                            </p>
                            <p>
                                USERS OVER IN
                                <br>
                                THE PAST MONTH
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div>
                <div class="container">
                    <h1 class="title">Imperfect Gamers Club</h1>
                    <p class="subtitle">Join now through the exclusive access member pass</p>
                    <div class="membership-card mx-auto hover:cursor-pointer">
                        <div class="tooltip-content">Click to view membership rewards</div>
                        <div class="flex flex-col items-start justify-between h-full">
                            <img class="logo-image"
                                src="https://cdn.imperfectgamers.org/inc/assets/logo/isometric-mark-text.png"
                                alt="Membership Logo">
                            <div>
                                <h1 class="text-2xl font-bold">
                                    <svg viewBox="0 0 100 10" class="membership-tier">
                                        <filter id="gooey" x="-50%" y="-50%" width="200%" height="200%">
                                            <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur" />
                                            <feColorMatrix in="blur" mode="matrix" values="
                                            1 0 0 0 0
                                            0 1 0 0 0
                                            0 0 1 0 0
                                            0 0 0 18 -7" result="gooey" />
                                            <feBlend in="SourceGraphic" in2="gooey" />
                                        </filter>
                                        <mask id="m" filter="url(#gooey)">
                                        </mask>
                                        <g mask="url(#m)">
                                            <rect id="showMask" height="100" width="100" fill="#919895" opacity="0" />
                                            <text x="50" y="6" fill="rgba(255,255,255,0.5)" text-anchor="middle"
                                                dominant-baseline="middle" font-size="10" font-family="monospace">
                                                PREMIUM
                                            </text>
                                        </g>
                                    </svg>
                                </h1>
                                <p class="card-price mt-2">$20/month</p>
                            </div>
                        </div>
                        <div class="spinback-effect"></div>
                    </div>
                    <div class="price-toggle">
                        <span class="price-label">Monthly</span>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                        <span class="price-label">Annually</span>
                    </div>
                    <div class="flex justify-center fade-down">
                        <button class="button outline-none">
                            <span>Join Now</span>
                        </button>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <section>
            <div>
                <div class="flex justify-end">
                    <div class="flex justify-end">
                        <div class="flex-col text-white">
                            <div>
                                <p class="text-red-400 text-2xl mb-2 text-right">
                                    20% OFF ON FIRST MONTH
                                </p>
                            </div>
                            <div class="flex sm:items-center">
                                <div class="mr-8 mb-4">
                                    <img src="https://imperfectgamers.org/assets/store/heart.png"
                                        class="animate-heartbeat heart" alt="Heart">
                                </div>
                                <div>
                                    <h2 class="text-4xl font-bold mb-4 text-right">
                                        Special Perks you'd really love
                                    </h2>
                                    <p class="text-right text-gray-400">
                                        With the highest consideration of a matrix between an enhanced surfing and
                                        musical
                                        experience.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="membershipTiers" class="relative">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                    class="absolute left-4 top-4 z-0 h-36 w-36 -translate-x-1/2 -translate-y-1/2 text-white/[0.085]">
                    <path
                        d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"
                        fill="currentColor"></path>
                </svg>
                <div class="mb-6 flex flex-col gap-2 lg:mb-12">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl"> Available <span
                            class="text-red-400">Membership</span> Tiers </h2>
                    <p class="block font-display text-white/60">Premium is currently in <span
                            class="text-white/65">BETA</span></p>
                </div>

                <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0 justify-center">
                    <div class="w-full max-w-md py-10 px-8 bg-black bg-opacity-50 rounded-md border border-gray-700/50
                    flex flex-col">
                        <div class="mb-3">
                            <span class="text-xs p-1.5 bg-gray-400 bg-opacity-35 white rounded">Free plan with
                                limitations</span>
                        </div>
                        <h3
                            class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-br from-gray-200 via-gray-200 to-gray-300">
                            Basic
                        </h3>
                        <div class="flex-1 mt-6 flex flex-col justify-between">
                            <div class="space-y-4">
                                <div
                                    class="flex items-center gap-2 group cursor-pointer transition duration-150 ease-in-out">
                                    <i
                                        class="fas fa-check text-gray-400 transition filter group-hover:brightness-150 group-hover:drop-shadow-[0_0_4px_rgba(255,255,255,0.5)]"></i>
                                    <span class="text-white group-hover:text-gray-400">Access to all public
                                        servers</span>
                                </div>

                            </div>
                            <div class="mt-10 text-xs text-gray-500">
                                Imperfect Basic membership offers limited access to community servers. Upgrade to
                                Premium
                                for
                                full benefits.
                            </div>
                        </div>
                    </div>

                    <div>
                        <div
                            class="relative -mb-px h-px w-full bg-gradient-to-r from-transparent via-rose-300 to-transparent">
                        </div>
                        <div
                            class="w-full max-w-md py-10 px-8 bg-black bg-opacity-50 rounded-md border border-gray-700/50 flex flex-col">
                            <div class="mb-3">
                                <span class="text-xs p-1.5 bg-red-200 bg-opacity-20 text-red-400 rounded">Free trial
                                    for
                                    7
                                    days</span>
                            </div>
                            <h3
                                class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-br from-gray-200 via-red-200 to-red-300">
                                Premium
                            </h3>
                            <div class="flex-1 mt-6 flex flex-col justify-between">
                                <div class="space-y-4">
                                    <div
                                        class="flex items-center gap-2 group cursor-pointer transition duration-150 ease-in-out">
                                        <i
                                            class="fas fa-check text-red-400 transition filter group-hover:brightness-150 group-hover:drop-shadow-[0_0_4px_rgba(255,255,255,0.5)]"></i>
                                        <span class="text-white group-hover:text-red-400">Access to all public
                                            servers</span>
                                    </div>
                                    <div
                                        class="flex items-center gap-2 group cursor-pointer transition duration-150 ease-in-out">
                                        <i
                                            class="fas fa-check text-red-400 transition filter group-hover:brightness-150 group-hover:drop-shadow-[0_0_4px_rgba(255,255,255,0.5)]"></i>
                                        <span class="text-white group-hover:text-red-400">Access to Premium
                                            Servers</span>
                                    </div>
                                    <div
                                        class="flex items-center gap-2 group cursor-pointer transition duration-150 ease-in-out">
                                        <i
                                            class="fas fa-check text-red-400 transition filter group-hover:brightness-150 group-hover:drop-shadow-[0_0_4px_rgba(255,255,255,0.5)]"></i>
                                        <span class="text-white group-hover:text-red-400">Slot Reservation</span>
                                    </div>
                                    <div
                                        class="flex items-center gap-2 group cursor-pointer transition duration-150 ease-in-out">
                                        <i
                                            class="fas fa-check text-red-400 transition filter group-hover:brightness-150 group-hover:drop-shadow-[0_0_4px_rgba(255,255,255,0.5)]"></i>
                                        <span class="text-white group-hover:text-red-400">Custom HUD</span>
                                    </div>
                                    <div
                                        class="flex items-center gap-2 group cursor-pointer transition duration-150 ease-in-out">
                                        <i
                                            class="fas fa-check text-red-400 transition filter group-hover:brightness-150 group-hover:drop-shadow-[0_0_4px_rgba(255,255,255,0.5)]"></i>
                                        <span class="text-white group-hover:text-red-400">Custom Premium Tag</span>
                                    </div>
                                    <div
                                        class="flex items-center gap-2 group cursor-pointer transition duration-150 ease-in-out">
                                        <i
                                            class="fas fa-check text-red-400 transition filter group-hover:brightness-150 group-hover:drop-shadow-[0_0_4px_rgba(255,255,255,0.5)]"></i>
                                        <span class="text-white group-hover:text-red-400">Custom Text/Name
                                            Color</span>
                                    </div>
                                    <div
                                        class="flex items-center gap-2 group cursor-pointer transition duration-150 ease-in-out">
                                        <i class="fas fa-times text-red-400"></i>
                                        <span class="flex-1 flex items-center gap-1.5">
                                            Personal IG Server
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                                data-tooltip-id="description" data-tooltip-content="Your Summoner Page">
                                                <path fill="#758592" fill-rule="evenodd"
                                                    d="M1.667 10a8.333 8.333 0 1 0 16.666 0 8.333 8.333 0 0 0-16.666 0Zm15.416 0a7.083 7.083 0 1 1-14.166 0 7.083 7.083 0 0 1 14.166 0Zm-6.25 1.667V5.833H9.167v5.834h1.666Zm0 .833v1.667H9.167V12.5h1.666Z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-10 text-xs text-gray-500">
                                    Enjoy a elegant experience with Premium membership. Full access to all servers and
                                    additional
                                    perks.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- New Section: Testimonials -->
        <section class="py-12">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-8">What Our Members Say</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div
                        class="bg-gradient-to-br from-black/50 to-red-900/20 p-6 rounded-lg shadow-xl transform transition duration-500 hover:scale-105">
                        <div class="flex items-center mb-4">
                            <img src="https://placehold.co/100x100" alt="Portrait of John Doe"
                                class="w-16 h-16 rounded-full mr-4 border-2 border-red-500">
                            <div>
                                <p class="font-bold">John Doe</p>
                                <p class="text-sm text-gray-400">Skill Surfer</p>
                            </div>
                        </div>
                        <blockquote class="text-gray-400">
                            "Joining the club through premium has been a game-changer. The exclusive servers and
                            community events have made my gaming experience so much better!"
                        </blockquote>
                    </div>
                    <!-- Testimonial 2 -->
                    <div
                        class="bg-gradient-to-br from-red-900/50 to-black/20 p-6 rounded-lg shadow-xl transform transition duration-500 hover:scale-105">
                        <div class="flex items-center mb-4">
                            <img src="https://placehold.co/100x100" alt="Portrait of John Doe"
                                class="w-16 h-16 rounded-full mr-4 border-2 border-red-500">
                            <div>
                                <p class="font-bold">Joe Mama</p>
                                <p class="text-sm text-gray-400">Freestyle Listener</p>
                            </div>
                        </div>
                        <blockquote class="text-gray-400">
                            "The premium membership perks are incredible. I love the custom HUD and the priority
                            support. It's worth every penny!"
                        </blockquote>
                    </div>
                    <!-- Testimonial 3 -->
                    <div
                        class="bg-gradient-to-br from-black/50 to-red-900/20 p-6 rounded-lg shadow-xl transform transition duration-500 hover:scale-105">
                        <div class="flex items-center mb-4">
                            <img src="https://placehold.co/100x100" alt="Portrait of John Doe"
                                class="w-16 h-16 rounded-full mr-4 border-2 border-red-500">
                            <div>
                                <p class="font-bold">Granny Apple</p>
                                <p class="text-sm text-gray-400">Rapper</p>
                            </div>
                        </div>
                        <blockquote class="text-gray-400">
                            "I've been a member for over a year now, and the community has been incredibly welcoming.
                            The slot reservation feature is a lifesaver during peak hours."
                        </blockquote>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <!-- FAQ Section -->
            <div class="faq-section">
                <h2 class="faq-title">Frequently Asked Questions</h2>
                <div class="faq-item">
                    <div class="faq-question">What does the Premium membership include?</div>
                    <div class="faq-answer">
                        <p>You may view above to take a look at the rewards offered for being a premium member on
                            Imperfect Gamers, but if you'd like to speak to someone, you can do so on our <a
                                href="https://imperfectgamers.org/discord" target="_blank"><span
                                    class="text-red-400 hover:underline font-medium">Discord</span></a>.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">How can I cancel my membership?</div>
                    <div class="faq-answer">
                        <p>You can cancel your membership at any time through your account settings or by contacting
                            customer support.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Are there any hidden fees?</div>
                    <div class="faq-answer">
                        <p>There are no hidden fees. The price you see is the price you pay.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Are there any discounts for long-term subscriptions?</div>
                    <div class="faq-answer">
                        <p>Yes, we offer discounts for annual subscriptions. Please contact us for more details.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Can I get a refund if I'm not satisfied?</div>
                    <div class="faq-answer">
                        <p>We offer a satisfaction guarantee. If you're not happy with your membership, contact us
                            within the first 30 days for a full refund.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- New Section: Exclusive Events -->
        <section class="py-12 bg-black bg-opacity-50">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-8 text-white/90">
                    <span
                        class="inline-block p-2 bg-black bg-opacity-50 rounded-full transform transition duration-500 hover:scale-110">
                        Exclusive Events
                    </span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Event 1 -->
                    <div
                        class="bg-gradient-to-br from-white/40 to-black/30 p-6 rounded-lg shadow-xl transform transition duration-500 hover:scale-105">
                        <h3 class="text-xl font-bold mb-3">Premium Surfing and Rap Battle Tournaments</h3>
                        <p class="text-gray-400 mb-4">Join our monthly Premium-only surfing and rap battle tournaments
                            with big prizes and bragging rights.</p>
                        <a href="#" class="text-rose-600 hover:text-rose-400">Learn More</a>
                    </div>
                    <!-- Event 2 -->
                    <div
                        class="bg-gradient-to-br from-black/40 to-white/30 p-6 rounded-lg shadow-xl transform transition duration-500 hover:scale-105">
                        <h3 class="text-xl font-bold mb-3">Members-Only Livestream</h3>
                        <p class="text-gray-400 mb-4">Get exclusive access to our members-only livestreams with special
                            guests and Q&A sessions.</p>
                        <a href="#" class="text-rose-600 hover:text-rose-400">Learn More</a>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div>
                <div class="flex flex-col lg:flex-row items-center justify-between">
                    <div class="lg:w-1/2 flex justify-center lg:justify-start mb-8 lg:mb-0">
                        <img src="https://imperfectgamers.org/assets/store/tebex_logo.svg" alt="Tebex logo"
                            class="h-32 lg:h-32 xl:h-48">
                    </div>
                    <div class="lg:w-1/2 text-center lg:text-right">
                        <h3 class="text-3xl font-bold mb-4">
                            We are trusted
                        </h3>
                        <p class="text-gray-400 text-sm">
                            Proud partners of Tebex, we were the first to launch with them in CS:GO. Piloting their
                            initial
                            launch in the new CS2 space. You can read more about it
                            <a class="text-red-600" href="#">
                                here
                            </a>.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-12">
            <div>
                <div class="flex justify-center md:justify-end">
                    <div class="contact-section contact-section-transition" id="contactSection">
                        <h2>Contact Us or Sign In</h2>
                        <p>For exclusive access to premium membership inquiries, please sign in to create a ticket or
                            contact us for assistance from email.</p>
                        <button id="signInBtn" onclick="location.href='/login';">Sign In</button>
                        <button id="contactUsBtn">Contact Us</button>
                    </div>
                </div>


                <div id="contactFormSection" class="py-12 bg-black bg-opacity-50 hidden">
                    <div class="container mx-auto px-4">
                        <h2 class="text-3xl font-bold text-center mb-8 font-playfair-display luxury-title">Contact Us
                        </h2>
                        <div class="max-w-xl mx-auto">
                            <form id="contactForm" class="flex flex-col space-y-4">
                                <div class="group">
                                    <label for="name" class="text-sm luxury-label" id="nameLabel">Name</label>
                                    <input type="text" id="name" name="name" placeholder="Your Name"
                                        class="w-full p-2 rounded bg-white/5 text-white border border-white/30 focus:outline-none transition-all duration-300 ease-in-out luxury-input"
                                        required />
                                    <p class="hidden text-red-500 text-xs mt-1" id="nameError">
                                        Please enter your name.
                                    </p>
                                </div>
                                <div class="group">
                                    <label for="email" class="text-sm luxury-label" id="emailLabel">Email</label>
                                    <input type="email" id="email" name="email" placeholder="Your Email"
                                        class="w-full p-2 rounded bg-white/5 text-white border border-white/30 focus:outline-none transition-all duration-300 ease-in-out luxury-input"
                                        required />
                                    <p class="hidden text-red-500 text-xs mt-1" id="emailError">
                                        Please enter a valid email.
                                    </p>
                                </div>
                                <div class="group">
                                    <label for="message" class="text-sm luxury-label" id="messageLabel">Message</label>
                                    <textarea id="message" name="message" rows="4" placeholder="Your Message"
                                        class="w-full p-2 rounded bg-white/5 text-white border border-white/30 focus:outline-none transition-all duration-300 ease-in-out luxury-input"
                                        required></textarea>
                                    <p class="hidden text-red-500 text-xs mt-1" id="messageError">
                                        Please enter a message.
                                    </p>
                                </div>
                                <div class="text-center">
                                <button type="submit" class="button px-6 py-2 rounded focus:outline-none focus:ring-2 focus:ring-opacity-50 transition-all duration-300 ease-in-out">
                                        Send Message
                                    </button>
                                </div>
                            </form>
                            <div class="mt-8 text-center">
                                <p class="text-gray-400">Alternatively, you can</p>
                                <button onclick="location.href='/login';"
                                class="mt-2 px-6 py-2 bg-white/5 rounded focus:outline-none focus:ring-2 focus:ring-opacity-50 transition-all duration-300 ease-in-out">
                                    Sign In & Create a Ticket
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </main>
    <footer class="text-sm mt-24">
        <div class="max-w-screen-xl mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-center md:text-left text-gray-400">
                    <p>2024 © Imperfect Gamers - All rights Reserved</p>
                    <p class="mt-2 md:mt-0">We are not affiliated with Valve</p>
                </div>
                <div class="flex justify-center mt-4 md:mt-0">
                    <a href="https://imperfectgamers.org/discord/" target="_blank"
                        class="text-gray-400 hover:text-white">
                        <i class="fab fa-discord"></i>
                    </a>
                </div>
                <div class="text-center md:text-right md:flex md:items-center mt-4 md:mt-0">
                    <p class="text-gray-400">Imperfect and Company</p>
                    <a href="https://imperfectandcompany.com" target="_blank" class="md:ml-4 hover:text-white">
                        <img src="https://imperfectdesignsystem.com/assets/img/imperfectandcompany/umbrella.png"
                            alt="parent company logo" class="h-5 inline md:block">
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <div class="px-4 py-4 border-t border-gray-700">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <a href="#" class="text-gray-400 hover:text-white mr-4">
                <img src="https://example.tebex.io/assets/img/tebex.png" alt="Tebex logo" class="h-5 hidden md:block">
            </a>
            <p class="text-gray-400 text-xs text-center md:text-left">This website and its checkout process is owned &
                operated by Tebex Limited, who handle product fulfilment, billing support and refunds.</p>
            <div class="flex flex-col text-sm md:flex-row items-center mt-4 md:mt-0">
                <a href="https://imperfectgamers.org/imprint"
                    class="text-gray-400 hover:text-white underline mb-2 md:mb-0 md:mr-4">Impressum</a>
                <a href="https://imperfectgamers.org/terms-of-service"
                    class="text-gray-400 hover:text-white underline mb-2 md:mb-0 md:mr-4">Terms & Conditions</a>
                <a href="https://imperfectgamers.org/privacy-policy"
                    class="text-gray-400 hover:text-white underline">Privacy Policy</a>
            </div>
        </div>
    </div>
    <script>
        const randInt = (min, max) => {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }
        for (let i = 0; i < 150; i++) {
            let beg = randInt(-15000, 0);
            let dur = randInt(7500, 15000);
            document.querySelector('#m').innerHTML += `<circle cx="${randInt(20, 80)}" cy="40" r="${randInt(10, 30) / 10}" fill="#fff">
            <animate attributeName="opacity" values="1;0" dur="${dur}ms" begin="${beg}ms" repeatCount="indefinite" />
            <animate attributeName="cy" values="20; -10" dur="${dur}ms" begin="${beg}ms" repeatCount="indefinite" />
        </circle>`;
        }
    </script>
    <script>
        // Toggle the pricing on switch
        const priceToggle = document.querySelector('.switch input');
        const priceLabel = document.querySelector('.card-price');
        priceToggle.addEventListener('change', function () {
            if (this.checked) {
                priceLabel.textContent = '$200/year';
            } else {
                priceLabel.textContent = '$20/month';
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Assuming your membership card has the class 'membership-card'
            const membershipCard = document.querySelector('.membership-card');

            membershipCard.addEventListener('click', function () {
                // Scroll to the membership tiers section
                document.getElementById('membershipTiers').scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
    <script>
        document.querySelector('.heart').addEventListener('mouseenter', function () {
            this.style.animation = 'hoverInEffect 0.5s forwards';
        });

        document.querySelector('.heart').addEventListener('mouseleave', function () {
            this.style.animation = 'hoverOutEffect 0.5s forwards, heartbeat 2s infinite 0.5s';
        });
    </script>
    <script>
        // FAQ Accordion Interaction
        const faqQuestions = document.querySelectorAll('.faq-question');
        faqQuestions.forEach(question => {
            question.addEventListener('click', () => {
                const wasActive = question.parentElement.classList.contains('active');

                // Close all FAQ items
                faqQuestions.forEach(q => q.parentElement.classList.remove('active'));

                // Toggle the clicked FAQ item based on previous state
                if (!wasActive) {
                    question.parentElement.classList.add('active');
                }
            });
        });
    </script>
    <script>
        document.querySelector('.switch input').addEventListener('change', function () {
            const priceLabel = document.querySelector('.card-price');
            // Determine the new price based on whether the switch is checked
            const newPriceText = this.checked ? '$200/year' : '$20/month';

            // Apply the fade-out-in animation
            priceLabel.classList.add('card-price-change');

            // Listen for the end of the animation to update the text
            priceLabel.addEventListener('animationend', () => {
                priceLabel.textContent = newPriceText;
                // Remove the animation class so it can be reapplied if the price changes again
                priceLabel.classList.remove('card-price-change');
            }, { once: true }); // Ensure the listener is removed after firing
        });
    </script>
    <script>
        /* add a class for animating the switch */
        document.querySelector('.switch input').addEventListener('change', function () {
            this.nextSibling.classList.add('flip');
            setTimeout(() => this.nextSibling.classList.remove('flip'), 450);
        });
    </script>
    <script>
        /* subtle heart beat on scroll */
        window.addEventListener('scroll', function () {
            const tiersSection = document.getElementById('membershipTiers');
            const cards = document.querySelectorAll('.membership-card');
            if (window.scrollY + window.innerHeight > tiersSection.offsetTop) {
                cards.forEach(card => card.classList.add('animate-heartbeat'));
            } else {
                cards.forEach(card => card.classList.remove('animate-heartbeat'));
            }
        });
    </script>
    <script>
        // Toggle contact form visibility
        document.getElementById('contactUsBtn').addEventListener('click', function () {
            const contactSection = document.getElementById('contactSection');
            const contactFormSection = document.getElementById('contactFormSection');

            if (contactFormSection.classList.contains('hidden')) {
                contactSection.style.height = `${contactSection.offsetHeight}px`;
                contactSection.style.overflow = 'hidden';

                contactSection.style.animation = 'fadeOutDown 0.5s ease forwards';

                setTimeout(() => {
                    contactSection.classList.add('hidden');
                    contactFormSection.style.display = 'block';
                    contactFormSection.style.animation = 'fadeInUp 0.5s ease forwards';
                    contactFormSection.style.height = '0';
                    contactFormSection.style.overflow = 'hidden';

                    setTimeout(() => {
                        contactFormSection.style.height = `${contactSection.offsetHeight}px`;
                    }, 10);

                    setTimeout(() => {
                        contactFormSection.style.height = 'auto';
                        contactFormSection.style.overflow = 'visible';
                    }, 500);
                }, 500);
            }
        });
    </script>
</body>