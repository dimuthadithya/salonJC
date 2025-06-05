document.addEventListener('DOMContentLoaded', function() {
    // Sidebar Toggle
    document.getElementById('sidebarCollapse').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('collapsed');
    });

    // Initialize Charts
    initializeCharts();

    // Initialize Recent Activity Table
    initializeDataTables();

    // Handle Navigation
    initializeNavigation();

    // Initialize Notifications
    initializeNotifications();
});

// Charts Initialization
function initializeCharts() {
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Revenue',
                data: [12000, 19000, 15000, 25000, 22000, 30000],
                borderColor: '#ff4f81',
                tension: 0.1,
                fill: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + value;
                        }
                    }
                }
            }
        }
    });

    // Services Chart
    const servicesCtx = document.getElementById('servicesChart').getContext('2d');
    new Chart(servicesCtx, {
        type: 'doughnut',
        data: {
            labels: ['Bridal', 'Hair', 'Makeup', 'Beauty'],
            datasets: [{
                data: [30, 25, 25, 20],
                backgroundColor: ['#ff4f81', '#ff6b6b', '#4ecdc4', '#45b7d1']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}

// DataTables Initialization
function initializeDataTables() {
    $('.table').DataTable({
        pageLength: 5,
        lengthMenu: [[5, 10, 25, 50], [5, 10, 25, 50]],
        responsive: true
    });
}

// Navigation Handling
function initializeNavigation() {
    // Handle sidebar navigation
    document.querySelectorAll('.sidebar a[data-section]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const sectionId = this.dataset.section;
            showSection(sectionId);
            
            // Update active state
            document.querySelectorAll('.sidebar li').forEach(li => li.classList.remove('active'));
            this.closest('li').classList.add('active');
        });
    });

    // Handle logout
    document.querySelectorAll('#logoutBtn, #navLogoutBtn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            handleLogout();
        });
    });
}

// Section Display
function showSection(sectionId) {
    // Hide all sections
    document.querySelectorAll('.content-section').forEach(section => {
        section.classList.remove('active');
    });

    // Show selected section
    const section = document.getElementById(sectionId);
    if (section) {
        section.classList.add('active');
    }

    // Load section specific content
    loadSectionContent(sectionId);
}

// Section Content Loading
function loadSectionContent(sectionId) {
    switch(sectionId) {
        case 'bookingCalendar':
            loadBookingCalendar();
            break;
        case 'customerDatabase':
            loadCustomerDatabase();
            break;
        case 'reports':
            loadReports();
            break;
        // Add more section handlers as needed
    }
}

// Booking Calendar
function loadBookingCalendar() {
    // Initialize FullCalendar if not already initialized
    if (!document.querySelector('.calendar-initialized')) {
        const calendarEl = document.createElement('div');
        calendarEl.id = 'bookingCalendar';
        document.querySelector('#bookingCalendar').appendChild(calendarEl);

        new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                // Sample events - replace with actual booking data
                {
                    title: 'Bridal Makeup',
                    start: '2023-06-07T10:00:00',
                    end: '2023-06-07T12:00:00'
                }
                // Add more events
            ],
            eventClick: function(info) {
                showBookingDetails(info.event);
            }
        }).render();

        calendarEl.classList.add('calendar-initialized');
    }
}

// Customer Database
function loadCustomerDatabase() {
    // Initialize customer database table if not already initialized
    if (!document.querySelector('.customer-table-initialized')) {
        const table = document.querySelector('#customerTable');
        if (table) {
            $(table).DataTable({
                ajax: '/api/customers', // Replace with actual API endpoint
                columns: [
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'phone' },
                    { data: 'lastVisit' },
                    { data: 'totalSpent' },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `<button class="btn btn-sm btn-primary">View Details</button>`;
                        }
                    }
                ]
            });
            table.classList.add('customer-table-initialized');
        }
    }
}

// Reports
function loadReports() {
    // Load and initialize reports data
    // This would typically involve fetching data from your backend
    // and updating various charts and statistics
}

// Notifications
function initializeNotifications() {
    // Sample notification data - replace with actual notifications
    const notifications = [
        {
            id: 1,
            type: 'booking',
            message: 'New booking request from Sarah Johnson',
            time: '5 minutes ago'
        },
        {
            id: 2,
            type: 'review',
            message: 'New review received - 5 stars',
            time: '1 hour ago'
        }
    ];

    // Update notification badge
    const badge = document.querySelector('.notifications .badge');
    if (badge) {
        badge.textContent = notifications.length;
    }

    // Initialize notification dropdown
    const notificationBtn = document.querySelector('.notifications .btn');
    if (notificationBtn) {
        notificationBtn.addEventListener('click', function() {
            showNotifications(notifications);
        });
    }
}

// Show Notifications
function showNotifications(notifications) {
    // Create and show notifications dropdown
    const dropdown = document.createElement('div');
    dropdown.className = 'notification-dropdown';
    dropdown.innerHTML = notifications.map(notification => `
        <div class="notification-item">
            <div class="notification-icon">
                <i class="fas fa-${notification.type === 'booking' ? 'calendar-check' : 'star'}"></i>
            </div>
            <div class="notification-content">
                <p>${notification.message}</p>
                <small>${notification.time}</small>
            </div>
        </div>
    `).join('');

    // Position and show dropdown
    const notificationBtn = document.querySelector('.notifications .btn');
    dropdown.style.position = 'absolute';
    dropdown.style.top = '100%';
    dropdown.style.right = '0';
    notificationBtn.parentElement.appendChild(dropdown);

    // Close dropdown when clicking outside
    document.addEventListener('click', function closeDropdown(e) {
        if (!dropdown.contains(e.target) && !notificationBtn.contains(e.target)) {
            dropdown.remove();
            document.removeEventListener('click', closeDropdown);
        }
    });
}

// Logout Handler
function handleLogout() {
    // Implement logout logic here
    // For example:
    // 1. Clear session/local storage
    // 2. Make API call to logout
    // 3. Redirect to login page
    window.location.href = '../login.html';
}

// Error Handler
function handleError(error) {
    console.error('Error:', error);
    // Implement error notification system
}
