<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Dental Clinic</title>
    <link rel="shortcut icon" href="../src/images/logo.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

    <!-- JS -->
    <script defer src="{{asset('js/dashboard.js')}}"></script>

    <!-- CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <main>
        <aside class="sideBar">
            <div class="profile">
                
                <h3 id="profileName"> </h3>
            </div>

            <div class="navBtn">
                <a href="{{route('profile')}}">
                    <button type="button">
                        <i class="bi bi-person-lines-fill"></i>
                        <span>My profile</span>
                    </button>
                </a>

                <a href="homepage.php">
                    <button type="button">
                        <i class="bi bi-house-door-fill"></i>
                        <span>Homepage</span>
                    </button>
                </a>

                <a href="{{route('logout')}}">
                    <button type="button">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </a>
        </aside>

        <section class="contentContainer">
            <div class="logo">
                <a href="homepage.php">
                    <img src="{{asset('images/logo.png')}}" alt="Dental Clinic Logo" />
                </a>
            </div>

            <div class="content">
                <div class="btns">
                    <a href="{{ route('book') }}">
                        <button id="startBtn">
                            <i class="bi bi-plus"></i>
                            <span>Book appointment</span>
                        </button>
                    </a>

                    <a href="{{route('pending')}}">
                        <button id="midBtn">
                            <i class="bi bi-arrow-clockwise"></i>
                            <span>Pending appointments</span>
                        </button>
                    </a>

                    <a href="userAppointmentHistory.php">
                        <button id="endBtn">
                            <i class="bi bi-clipboard2"></i>
                            <span>History</span>
                        </button>
                    </a>
                </div>

                <div class="tag">
                    <small>
                        Welcome to the Dental Clinic
                    </small>
                    <h2>
                        We Care for Your
                        Family’s Dental Need
                    </h2>
                </div>


                <div class="footer">
                    <div class="description">
                        <h3>
                            Schedule your first visit
                        </h3>
                        <small>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio dolore laborum fugit odit
                            dolorum magni earum accusantium! Rem, dolores sint?
                        </small>
                    </div>

                    <div class="appoinmentBtn">
                        <a href="{{ route('book') }}">
                            <button>
                                Schedule Your Visit
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>
</body>

</html>