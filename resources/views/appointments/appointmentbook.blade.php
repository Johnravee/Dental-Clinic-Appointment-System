<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <link rel="stylesheet" href="{{asset('css/book.css')}}">
    <script defer src="{{asset('js/bookappointment.js')}}"></script>
  </head>
  <body>
    <header class="header">
      <a class="back-button" href="{{route('dashboard')}}">
        <i class="bi bi-arrow-left"></i> Back
      </a>
      <h1 class="header-title">Book Appointment</h1>
    </header>

    <div class="content">
      <div class="holidays-list">
          <h2 class="holidays-title">HOLIDAYS</h2>
          <ul>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
          </ul>
      </div>

      <div class="calendar-list">
        <div id='calendar'></div>
      </div>
<div class="instructions">
  <div class="instruction-content">
    <h2 class="instructions-title">INSTRUCTIONS</h2>
    <ul>
      <li>
        <span style="display:inline-block; width:20px; height:20px; background-color:#DC2C2B; margin-right:5px;"></span>
         Indicates Past
      </li>
      <li>
        <span style="display:inline-block; width:20px; height:20px; background-color:#EA7227; margin-right:5px;"></span>
         Indicates Closed
      </li>
      <li>
        <span style="display:inline-block; width:20px; height:20px; background-color:#FEFADF; margin-right:5px;"></span>
       Indicates  Present
      </li>
      <li>
        <span style="display:inline-block; width:20px; height:20px; background-color:white; margin-right:5px; border:1px solid #ccc;"></span>
         Indicates Available
      </li>
    </ul>
  </div>
</div>



        <div class="right-side">
          <div class="appoinment-list">
          <h2 class="appointment-title">SCHEDULED</h2>
            <table class="appoinments-table">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Alfreds Futterkiste</td>
                  <td><button><i class="bi bi-pencil-square"></i></button></td>
                </tr>
                <tr>
                  <td>Berglunds snabbköp</td>
                  <td><button><i class="bi bi-pencil-square"></i></button></td>
                </tr>
                <tr>
                  <td>Centro comercial Moctezuma</td>
                  <td><button><i class="bi bi-pencil-square"></i></button></td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>


    <div class="book-modal">
    <div class="book-modal-con">
        <h2 class="modal-title">Book Your Appointment</h2>
        <form action="{{route('createappointment')}}" class="book-form" method="POST">
          @csrf
            <input type="hidden" name="user_id" value="{{Auth::id()}}"/>
            <div class="form-group">
                <label for="start-date">Date:</label>
                <input type="text" name="start-date" readonly class="form-control" id="start-date">
            </div>
            <div class="form-group">
                <label for="concern">Your Concern:</label>
                <textarea name="concern" cols="30" rows="5" class="form-control" id="concern" style="resize: none"></textarea>
            </div>
            <button type="submit" class="submit-button">Submit</button>
        </form>
        <button class="close-modal" onclick="toggler(false)">Close</button>
    </div>
</div>
</div>

<!-- Success Modal -->
<div id="successModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h5>Success!</h5>
        <p>Your appointment has been created successfully.</p>
        <button onclick="closeModal()">Close</button>
    </div>
</div>

  </body>

<script>
    function closeModal() {
        document.getElementById('successModal').style.display = 'none';
        location.reload();
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Check if there's a success message
        const successMessage = "{{ session('success') }}"; // Pass the session message

        if (successMessage) {
            document.getElementById('successModal').style.display = 'block';
            
        }
    });
</script>
  
</html>
