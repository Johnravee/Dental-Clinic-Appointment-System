
          const startDate = document.querySelector('#start-date');
          const concern = document.querySelector('concern');
          const calendarEl = document.getElementById('calendar');
          const today = new Date();
          
          // Set time to midnight for comparison
          today.setHours(0, 0, 0, 0);
          
          let calendar = new FullCalendar.Calendar(calendarEl, {
              initialView: 'dayGridMonth',
              
              // Prevent navigation to past months
              validRange: {
                  start: today 
              },

            
            dayCellDidMount: (info) => {
                  const clickedDate = new Date(info.date);
                  
                  // Check if the day is in the past
                  if (clickedDate < today) {
                      info.el.classList.add('past-date'); 
                      info.el.style.pointerEvents = 'none'; 
                  } 
                  
                  // Disable Sundays
                  if (clickedDate.getDay() === 0) {
                      info.el.style.backgroundColor = '#f97316';
                      info.el.style.pointerEvents = 'none'; 
                  }  

                
              },
              
            

             dateClick: async (info) => { // Marked as async
    const clickedDate = new Date(info.dateStr);

    // Only allow clicks for non-past dates and non-Sundays
    if (clickedDate >= today && clickedDate.getDay() !== 0) {
        startDate.value = info.dateStr;
        toggler(true);

        try {
            // Fetch available slots from the API
            const response = await fetch(`api/show-slot/${encodeURIComponent(info.dateStr)}`);
            const data = await response.json();

            // Display available slots to the user
            if (data.availableSlots > 0) {
                alert(`Available slots: ${data.availableSlots}`);
            } else {
                alert('No available slots for this date.');
            }
        } catch (error) {
            console.error('Error fetching available slots:', error);
        }
    }
},


              events: async (fetchInfo, successCallback, failureCallback) => {
                  try {
                      const response = await fetch('/api/scheduled-dates');
                      const events = await response.json();
                      successCallback(events);
                  } catch (error) {
                      failureCallback(error);
                  }
              }

          });
          
          calendar.render();






      function toggler(state) {
          if(state){
                document.querySelector('.book-modal').style.display = 'flex';
              }else{ 
              document.querySelector('.book-modal').style.display = 'none'; 
                startDate.value = null;
                concern.value = null;
          }

      }



