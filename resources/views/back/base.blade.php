<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Yelema - Admin</title>
    <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/htmx.org@2.0.1"></script>
</head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>
            </form>

            <ul class="navbar-nav navbar-right">
                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                        <div class="dropdown-header">Notifications</div>
                        <div class="dropdown-list-content dropdown-list-icons">
                            <a href="#" class="dropdown-item dropdown-item-unread">
                                <div class="dropdown-item-icon bg-primary text-white">
                                    <i class="fas fa-code"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    <div class="time text-primary">2 Min Ago</div>
                                </div>
                            </a>

                        </div>
                        <div class="dropdown-footer text-center">
                            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name ?? 'David' }}</div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Se deconnecter
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        @include('back.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>{{ $page_title ?? 'Blank Page' }}</h1>
                </div>

                <div class="section-body">
                    @yield('content')
                </div>
            </section>
        </div>
    </div>
</div>
<div class="modal fade show" tabindex="-1" role="dialog"  id="add-item-modal">
    <div class="modal-dialog"  role="document">
                <form action="{{ route("admin.items.store") }}" enctype="multipart/form-data" method="post">
        <div class="modal-content">
            <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for=""><b>Nom de l'article</b></label>
                        <input type="text" name="name" class="form-control">
                    </div>
            </div>
            <div class="modal-footer text-right">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
                </form>
    </div>
</div>
<div class="modal fade show" tabindex="-1" role="dialog"  id="add-pack-modal">
    <div class="modal-dialog"  role="document">
        <form action="{{ route("admin.settings.store_pack") }}" x-data="{ns:[0,0]}" enctype="multipart/form-data" method="post">
            <div class="modal-content">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for=""><b>Nom du pack</b></label>
                        <input type="text" required name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for=""><b>Description</b></label>
                        <textarea  required name="description" rows="5" class="form-control"></textarea>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <b>Spécifications</b>
                    </div>
                    <template x-for="(n, index) in ns.length">
                        <div  class="d-flex mb-3 mx-0 px-0 justify-content-between align-items-center">
                            <div class="col-6">
                                <input required type="text" placeholder="Nom" name="specs[labels][]" class="form-control">
                            </div>
                            <div class="col-5">
                                <input type="text" placeholder="Valeur" name="specs[values][]" class="form-control">
                            </div>
                            <div class="col-1">
                                <a href="#" @click="ns = ns.filter((n,i)=> i != index)"><span class="fa fa-times"></span></a>
                            </div>
                        </div>
                    </template>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary btn-sm" @click="ns.push(0)">+ Ajouter</button>
                    </div>

                </div>
                <div class="modal-footer text-right">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</div>

@yield('modal')
<script src="/assets/modules/izitoast/js/iziToast.min.js"></script>
<!-- General JS Scripts -->
<script src="/assets/modules/jquery.min.js"></script>
<script src="/assets/modules/popper.js"></script>
<script src="/assets/modules/tooltip.js"></script>
<script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="/assets/modules/moment.min.js"></script>
<script src="/assets/js/stisla.js"></script>
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/custom.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js'></script>

<script>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}');
        @endforeach
    @endif
    @if(session()->has('success'))
        iziToast.success({
            title: 'Succès',
            message: '{{ session()->get('success') }}',
            position: 'topRight'
        });
    toastr.success('{{ session()->get('success') }}');
    @endif
</script>
@stack('scripts')
</body>
</html>
