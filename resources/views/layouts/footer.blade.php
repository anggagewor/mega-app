<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
        <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item"><a href="#" class="link-secondary">License</a></li>
                </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        Copyright &copy; {{ date('Y') }}
                        <a href="#" class="link-secondary">{{ config('app.name') }}</a>.
                        All rights reserved.
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="link-secondary" rel="noopener">
                            v{{ \Illuminate\Support\Facades\App::version() }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
