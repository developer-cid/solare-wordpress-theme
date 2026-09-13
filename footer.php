<footer class="border-t border-slate-200 bg-slate-50">
    <div class="mx-auto max-w-7xl px-6 py-14 lg:px-8">
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-5">

            <div class="lg:col-span-2">
                <a
                    href="<?php echo esc_url(home_url('/')); ?>"
                    class="inline-flex items-center"
                    aria-label="SOL.ARE SOLUTIONS home"
                >
                    <img
                        src="<?php echo esc_url(
                            get_template_directory_uri() .
                            '/assets/images/solare-logo.webp'
                        ); ?>"
                        alt="SOL.ARE SOLUTIONS"
                        class="h-16 w-auto sm:h-20 lg:h-24"
                    >
                </a>

                <p class="mt-4 max-w-sm text-sm leading-6 text-slate-500">
                    Empowering a sustainable tomorrow through premium solar solutions
                    for homes and businesses in the Philippines.
                </p>
            </div>

            <div>
                <h3 class="text-sm font-bold text-slate-900">Solutions</h3>

                <ul class="mt-4 space-y-3 text-sm text-slate-500">
                    <li>
                        <a
                            href="<?php echo esc_url(home_url('/#services')); ?>"
                            class="transition-colors hover:text-slate-900"
                        >
                            Solar PV Installation
                        </a>
                    </li>

                    <li>
                        <a
                            href="<?php echo esc_url(home_url('/#services')); ?>"
                            class="transition-colors hover:text-slate-900"
                        >
                            Grid-Tied Systems
                        </a>
                    </li>

                    <li>
                        <a
                            href="<?php echo esc_url(home_url('/#services')); ?>"
                            class="transition-colors hover:text-slate-900"
                        >
                            Hybrid Systems
                        </a>
                    </li>

                    <li>
                        <a
                            href="<?php echo esc_url(home_url('/#services')); ?>"
                            class="transition-colors hover:text-slate-900"
                        >
                            Maintenance
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-bold text-slate-900">Company</h3>

                <ul class="mt-4 space-y-3 text-sm text-slate-500">
                    <li>
                        <a
                            href="<?php echo esc_url(home_url('/#about')); ?>"
                            class="transition-colors hover:text-slate-900"
                        >
                            About Us
                        </a>
                    </li>

                    <li>
                        <a
                            href="<?php echo esc_url(home_url('/#projects')); ?>"
                            class="transition-colors hover:text-slate-900"
                        >
                            Projects
                        </a>
                    </li>

                    <li>
                        <a
                            href="<?php echo esc_url(home_url('/#testimonials')); ?>"
                            class="transition-colors hover:text-slate-900"
                        >
                            Testimonials
                        </a>
                    </li>

                    <li>
                        <a
                            href="<?php echo esc_url(home_url('/#contact')); ?>"
                            class="transition-colors hover:text-slate-900"
                        >
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-bold text-slate-900">Contact</h3>

                <ul class="mt-4 space-y-3 text-sm text-slate-500">
                    <li>
                        <a
                            href="tel:+639171797201"
                            class="transition-colors hover:text-slate-900"
                        >
                            0917 179 7201
                        </a>
                    </li>

                    <li>
                        <a
                            href="mailto:hello@solaresolutions.ph"
                            class="transition-colors hover:text-slate-900"
                        >
                            hello@solaresolutions.ph
                        </a>
                    </li>

                    <li>
                        Las Piñas City, Metro Manila
                    </li>
                </ul>
            </div>
        </div>

        <div
            class="mt-12 flex flex-col gap-4 border-t border-slate-200 pt-7 text-xs text-slate-400 sm:flex-row sm:items-center sm:justify-between"
        >
            <p>
                © <?php echo esc_html(wp_date('Y')); ?> SOL.ARE SOLUTIONS.
                All rights reserved.
            </p>

            <div class="flex gap-5">
                <a
                    href="#"
                    class="transition-colors hover:text-slate-700"
                >
                    Privacy
                </a>

                <a
                    href="#"
                    class="transition-colors hover:text-slate-700"
                >
                    Terms
                </a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>