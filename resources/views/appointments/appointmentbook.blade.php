<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <link rel="stylesheet" href="{{asset('css/book.css')}}">
    <script defer src="{{asset('js/bookappointment.js')}}"></script>

    </script>
  </head>
  <body>
    {{-- <div id='calendar'></div> --}}

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
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
              </ul>
          </div>

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
  </body>
</html>