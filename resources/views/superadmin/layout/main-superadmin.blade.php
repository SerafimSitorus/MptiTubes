<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    
    @vite('resources/css/app.css')
    @vite('resources/css/output.css')
    <title>@yield('title')</title>
    <style>
        .input-field {
            padding: 0.5rem;
            border: 1px solid #1A2130;
            border-radius: 0.25rem;
            width: 100%;
        }

        .label {
            flex: 1;
            padding-right: 0.5rem;
        }

        .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .form-row div {
            flex: 1;
        }

        .form-container {
            background-color: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .flex-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    @include('superadmin/layout/header-superadmin')
    <div class="flex lg:gap-14">
        @include('superadmin/layout/sidebar-superadmin')
        <div class="w-full flex flex-col md:-ml-72 transition-all ease-in-out" id="main-content">
            @yield('content')
        </div>
    </div>
    @include('superadmin/layout/footer-superadmin')
    <script src="{{ asset('script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        window.onload = function() {
            const ctx = document.getElementById('activityChart').getContext('2d');
            const activityChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['FannyLightborn (Tutor)', 'Moskov (Tutor)', 'Cecilion (Tutor)', 'YuZhong (Tutor)'],
                    datasets: [{
                        label: 'Number of Classes Taught',
                        data: [10, 20, 15, 5], // Ganti dengan data dinamis jika perlu
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of Classes'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Tutors'
                            }
                        }
                    }
                }
            });
        };

        document.getElementById('nextPageBtn').addEventListener('click', function() {
            // Logika untuk berpindah ke halaman selanjutnya
            // Contoh: window.location.href = 'next-page.html';
            window.location.href = 'next-page.html'; // Ganti dengan URL halaman berikutnya
        });
    </script>
</body>

</html>
