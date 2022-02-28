<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body  style="min-height:90vh;">
    <div id="app">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light"><a href="{{ route('home')}}" class="brand">BloodNet</a></div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('donors') }}">Verify Donors</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('announcements') }}">Announcement</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="profile">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                </div>
            </div>

            <!-- Page content wrapper-->
            <div id="page-content-wrapper">

                    <!-- Top navigation-->
                    <div class="container-fluid py-2">
                        <button class="btn btn-primary" id="sidebarToggle"><i class="icon-reorder"></i></button>
                    </div>
                    <!-- Page content-->
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
        </div>
    </div>

    <footer id="sticky-footer" class="flex-shrink-0 py-4 text-dark-50">
      <div class="container text-center">
        <small>BloodNet &copy; 2022</small>
      </div>
    </footer>
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
    <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
         // Initialize Firebase
        // var config = {
        //     apiKey: "{{ config('services.firebase.api_key') }}",
        //     authDomain: "{{ config('services.firebase.auth_domain') }}",
        //     databaseURL: "{{ config('services.firebase.database_url') }}",
        //     projectId: "{{ config('services.firebase.project_id') }}",
        //     storageBucket: "{{ config('services.firebase.messaging_sender_id') }}",
        // };
        // firebase.initializeApp(config);
        // const database = firebase.firestore();
        // const form = document.querySelector('#addAnnouncement');
        // database.settings({ timestampsInSnapshots: true})

        // form.addEventListener('submit', (e) => {
        //     e.preventDefault();
        //     database.collection('feed').add({
        //         title: form.title.value,
        //         content: form.content.value
        //     });
        //     console.log('clicked!');
        // })
    </script>
</body>
</html>
