document.addEventListener('DOMContentLoaded', () => {
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

       dayCellDidMount: function(info) {
            const clickedDate = new Date(info.date);
            
            // Check if the day is in the past
            if (clickedDate < today) {
                info.el.classList.add('past-date'); 
                info.el.style.pointerEvents = 'none'; 
            } 
            
            // Disable Sundays
            if (clickedDate.getDay() === 0) {
                info.el.style.backgroundColor = '#ee6d6d';
                info.el.style.pointerEvents = 'none'; 
            }   
        },

        dateClick: function(info) {
            const clickedDate = new Date(info.dateStr);
            
            // Only allow clicks for non-past dates and non-Sundays
            if (clickedDate >= today && clickedDate.getDay() !== 0) {
                alert('Date: ' + info.dateStr);
            }
        },

        events: async function(fetchInfo, successCallback, failureCallback) {
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
});
