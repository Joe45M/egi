<?php


/**
 * Template Name: About
 */

get_header();

?>
    <main class="site-main relative text-white" x-data="{easterEgg: 0}">
        <div x-cloak x-show="easterEgg >= 5"
             class="fixed left-0 top-0 z-50 w-full h-screen bg-nd-500 flex items-center justify-center text-white font-bold">
            <div>
                UWU. We love you too, random stranger.
            </div>
            <button class="ml-5 bg-zinc-900 p-2 rounded-md text-nd" @click="easterEgg = 0">OK</button>
        </div>
        <div class="">
            <div class="about-header bg-zinc-900 relative">
                <div class="container mx-auto">
                    <div class="h-[40vh] grid lg:grid-cols-2">
                        <div class="pt-56">
                            <p class="font-bold text-nd tracking-widest text-sm uppercase">About Elitegamerinsights</p>
                            <h1 class="text-4xl font-display font-bold">GAMES. NEWS. TUTORIALS.</h1>
                        </div>
                        <div class="self-start justify-end font-bold relative text-gray-200">
                            <div class="absolute right-0 top-32">
                                <div class="flex gap-3 lg:text-[800%]  right-0">
                                    <p id="counter" class="text-gray-100/10">
                                        0
                                    </p>
                                    <p class=" text-gray-100/10">+</p>
                                </div>
                                <p class="lg:text-[500%] text-gray-100/10 -mt-[40px]">ARTICLES</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="container mx-auto about-second mb-20">
                    <div class=" py-20 lg:text-4xl font-bold  capitalize mt-10">
                        We create Compelling content which fuels gamers.
                    </div>
                    <div class="grid md:grid-cols-3 gap-10">
                        <div class="text-nd">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" class="w-6 h-6 mb-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>
                            </svg>
                            <p class="font-bold text-black uppercase text-lg tracking-wider mb-3 text-white">Gaming culture
                                coverage</p>
                            <p class="text-black md:pr-10 text-gray-500">Gaming is more than just picking up a
                                controller. We understand that gaming is a lifestyle, a hobby, a job, and a world to
                                escape mundane life. We report on the latest news, gossip and culutre news. </p>
                        </div>
                        <div class="text-nd">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" class="w-6 h-6 mb-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z"/>
                            </svg>

                            <p class="font-bold text-black uppercase text-lg tracking-wider mb-3 text-white">Complete gaming
                                tutorials</p>
                            <p class="text-black lg:pr-10 text-gray-500">Elitegamerinsights write what we call Ultimate
                                Guides. Tutorials which include everything you will ever need to complete that confusing
                                quest, get that new gun, or boost that KD.</p>
                        </div>
                        <div class="text-nd">

                            <button @click="easterEgg += 1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" class="w-6 h-6 mb-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                                </svg>
                            </button>


                            <p class="font-bold text-black uppercase text-lg tracking-wider mb-3 text-white">We love what we do</p>
                            <p class="text-black lg:pr-10 text-gray-500">Really, we do. EGI was founded in April 2023,
                                and since then we've created over 145 guides, 20+ short-form videos, and countless
                                interactions online. We love helping gamers.</p>
                        </div>
                    </div>
                </div>
                <div class="pb-20" style="background-image: url('/wp-content/themes/gaming/img/newsletter.webp');">
                    <div class="container mx-auto">
                        <div class="grid lg:grid-cols-2 gap-5">
                            <div>
                                <img src="https://elitegamerinsights.com/wp-content/uploads/2023/06/egi.png"
                                     alt="EGI team">
                            </div>
                            <div>
                                <div class="pt-20 mt-5 mb-5 lg:text-4xl font-bold  capitalize">
                                    Who are we?
                                </div>
                                <p class="text-lg leading-relaxed">
                                    EliteGamerInsights (EGI) is your digital home for all things gaming. Established in
                                    April 2023 by a dynamic duo of gaming enthusiasts, EGI stands as a testament to our
                                    passion for interactive entertainment and our commitment to empowering gamers
                                    everywhere. We're much more than a typical gaming website – we're a friendly
                                    community, a virtual classroom, and your go-to news hub, all rolled into one
                                    engaging platform.
                                    <br><br>
                                    Our founders, once just two gamers with a dream, poured their love for video games
                                    into the creation of EGI. They understood the hurdles every gamer encounters - the
                                    strategy uncertainties, the tough bosses, the elusive Easter eggs - and with that
                                    understanding, EliteGamerInsights was born. We're driven by the belief that gaming
                                    is an art form to be shared, a puzzle to be solved, and a story to be told, so we're
                                    here to ensure that no gamer ever has to face their virtual challenges alone.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-zinc-900">
                    <div class="container mx-auto">
                        <div class=" pt-20 mb-5 lg:text-4xl font-bold capitalize">
                            Work with us
                        </div>
                        <p class="text-xl font-bold uppercase text-nd">Nothing gets us excited like a new project.</p>
                        <p class="text-gray-400 text-xl mb-10">From early access, to reviews and guest posting, lets
                            work together.</p>
                        <a href="mailto:contact@elitegamerinsights.com" class="lg:text-3xl uppercase font-bold tracking-wide">contact@elitegamerinsights.com</a>
                    </div>
                </div>
            </div>

        </div>

    </main>
    <script src="
https://cdn.jsdelivr.net/npm/countup@1.8.2/dist/countUp.min.js
"></script>


    <script defer>
        let demo = new CountUp('counter', 0, 145);
        if (!demo.error) {
            setTimeout(() => {
                demo.start();
            }, 1000)
        } else {
            console.error(demo.error);
        }
    </script>
<?php
get_footer();
