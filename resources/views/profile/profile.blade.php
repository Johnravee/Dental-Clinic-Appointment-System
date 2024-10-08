<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | Dental Clinis</title>
    <link rel="shortcut icon" href="" type="image/x-icon">

    <!-- JS -->
    {{-- <script defer src="../src/javascript/userProfile.js"></script> --}}

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">

    <!-- CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

</head>

<body>
    <header>
        <div class="logoPageTitle">

            <img src="{{asset('images/logo.png')}}" alt="DentalClinicLogo" readonly />


            <h1>My Profile</h1>

        </div>
        <div class="backBtn">
            <a href="userDashboard.php"><button type="button"><i class="bi bi-arrow-left-circle"></i></button></a>
        </div>
    </header>

    <main>
        <form action="/DentalClinicAppointmentSystem/database/controllers/updateProfileController.php"
            enctype="multipart/form-data" method="post">
            <aside>
                <div class="profileImg">
                   <img src="{{asset('image/logo.png')}}" alt="userProfilePic" readonly />
                </div>
            </aside>


            <section>
                <div class="formContent">
                    <div class="formContainer">
                        <h1 id="editModeIndicator">YOU ARE IN EDIT MODE <i class="bi bi-pencil-square"></i></h1>
                        <div class="formGroup">
                            <label for="firstName">FIRSTNAME</label>
                            <input id="firstName" type="text" name="firstName" class="input"
                                value="" readonly />
                        </div>


                        <div class="formGroup">
                            <label for="middleName">MIDDLENAME</label>
                            <input id="middleName" type="text" name="middleName" class="input"
                                value="" readonly />
                        </div>

                        <div class="formGroup">
                            <label for="surName">LASTNAME</label>
                            <input id="surName" type="text" name="surName" class="input"
                                value="" readonly />
                        </div>

                        <div class="formGroup">
                            <label for="contact">CONTACT</label>
                            <input id="contact" type="text" name="contact" class="input"
                                value="" readonly />
                        </div>

                        <div class="formGroup">
                            <label for="birthDate">BIRTH DATE</label>
                            <input id="birthDate" type="date" name="birthDate" class="input"
                                value="" readonly />
                        </div>

                        <div class="formGroup">
                            <label for="address">ADDRESS</label>
                            <input id="address" type="text" name="address" class="input"
                                value="" readonly />
                        </div>


                        <div class="formBtns">
                            <button type="button" id="editMode">EDIT</button>
                            <button type="submit">SAVE</button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </main>
</body>

</html>