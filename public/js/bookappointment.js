document.addEventListener('DOMContentLoaded', function() {
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
        },

        dateClick: function(info) {
            const clickedDate = new Date(info.dateStr);
            
            // Only allow clicks for non-past dates
            if (clickedDate >= today) {
                alert('Date: ' + info.dateStr);
            }
        },
    });
    
    calendar.render();
});
