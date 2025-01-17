function toggleDarkMode() {
    const body = document.querySelector('body');
    body.classList.toggle('dark-mode');
    if (body.classList.contains('dark-mode')) {
      localStorage.setItem('darkMode', 'enabled');
  } else {
      localStorage.setItem('darkMode', 'disabled');
  }
  
  
  }
  function loadDarkMode() {
      const darkMode = localStorage.getItem('darkMode');
      if (darkMode === 'enabled') {
          document.querySelector('body').classList.add('dark-mode');
      }
  }
  

const menuButton = document.getElementById('menu-button');
const dropdownMenuProfile = document.querySelector('.dropdown-menu-profile');

menuButton.addEventListener('click', function() {
  const isOpen = dropdownMenuProfile.classList.contains('hidden');
  dropdownMenuProfile.classList.toggle('hidden');
});

// const sidebarToggle = document.getElementById('sidebar-toggle');
//   const sidebar = document.querySelector('.sidebar');

//   sidebarToggle.addEventListener('click', function() {
//     sidebar.classList.toggle('hidden');
//   }
// );

document.addEventListener('DOMContentLoaded', () => {
    const sidebarToggleParent = document.getElementById('sidebar-toggle-parent');
    const sidebarParent = document.getElementById('sidebar-parent');
    const mainContentParent = document.getElementById('main-content');
    const navbarBurger = document.getElementById('navbar-burger');
    const navbarBurgerclose = document.getElementById('navbar-burger-close');
    const navbarMenu = document.getElementById('navbar-menu');

    if (navbarBurger && navbarMenu) {
        console.log('Navbar burger found');
        navbarBurger.addEventListener('click', () => {
            console.log('Navbar burger clicked');
            navbarMenu.classList.toggle('-translate-y-full');
        });
    }

    if (navbarBurgerclose && navbarMenu) {
        console.log('Navbar burger close found');
        navbarBurgerclose.addEventListener('click', () => {
            console.log('Navbar burger close clicked');
            navbarMenu.classList.toggle('-translate-y-full');
        });
    }

    if (sidebarToggleParent && sidebarParent && mainContentParent) {
        console.log('Sidebar toggle parent found');
        sidebarToggleParent.addEventListener('click', () => {
            console.log('Sidebar toggle parent clicked');
            sidebarToggleParent.classList.toggle('-translate-x-64');
            sidebarParent.classList.toggle('-translate-x-full'); 
            mainContentParent.classList.toggle('md:-ml-72');
            sidebarToggleParent.classList.toggle('-ml-4');
        });
    }

    const dropdownToggle = document.querySelector('.dropdown-toggle');
    const dropdownMenu = document.querySelector('.dropdown-menu');
    const tutorButtonParent = document.getElementById('tutor-button-parent');
    const tutorMenuParent = document.getElementById('tutor-menu-parent');
    const paymentMenuButtonparent = document.getElementById('payment-button-parent');
    const paymentMenuparent = document.getElementById('payment-menu-parent');
    const profileMenuButtonparent = document.getElementById('profile-button-parent');
    const profileMenuparent = document.getElementById('profile-menu-parent');

    if (tutorButtonParent && tutorMenuParent) {
        console.log('Tutor button parent found');
        tutorButtonParent.addEventListener('click', () => {
            console.log('Tutor button parent clicked');
            tutorMenuParent.classList.toggle('hidden');
        });

        if (window.location.pathname.includes('parents/tutor-applicants-parents') 
            || window.location.pathname.includes('parents/find-tutor-parent') 
            || window.location.pathname.includes('parents/tutor-review')
            ) {
            console.log('URL includes specific tutor paths');
            tutorMenuParent.classList.remove('hidden');
        }
    }

    if (paymentMenuButtonparent && paymentMenuparent) {
        console.log('Tutor button parent found');
        paymentMenuButtonparent.addEventListener('click', () => {
            console.log('Tutor button parent clicked');
            paymentMenuparent.classList.toggle('hidden');
        });

        if (window.location.pathname.includes('parentspayment') || window.location.pathname.includes('paymenthistory')) {
            console.log('URL includes specific tutor paths');
            paymentMenuparent.classList.remove('hidden');
        }
    }

    if (profileMenuButtonparent && profileMenuparent) {
        console.log('Tutor button parent found');
        profileMenuButtonparent.addEventListener('click', () => {
            console.log('Tutor button parent clicked');
            profileMenuparent.classList.toggle('hidden');
        });

        if (window.location.pathname.includes('parentsedit') || window.location.pathname.includes('parentspassword')) {
            console.log('URL includes specific tutor paths');
            profileMenuparent.classList.remove('hidden');
        }
    }


    if (dropdownToggle && dropdownMenu) {
        console.log('Dropdown toggle found');
        dropdownToggle.addEventListener('click', () => {
            console.log('Dropdown toggle clicked');
            dropdownMenu.classList.toggle('show');
            dropdownToggle.querySelector('svg').classList.toggle('rotate-180');
        });
    }

    const operatorTutorManagementButton = document.getElementById('operator-button-tutormanagement');
    const operatorTutorManagement = document.getElementById('operator-tutormanagement-menu');
    const operatorButtonPayment = document.getElementById('operator-button-payment');
    const operatorPaymentmenu = document.getElementById('operator-payment-menu');

    if (operatorTutorManagementButton && operatorTutorManagement) {
        console.log('Operator tutor management button found');
        operatorTutorManagementButton.addEventListener('click', () => {
            console.log('Operator tutor management button clicked');
            operatorTutorManagement.classList.toggle('hidden');
        });
    }

    if (operatorButtonPayment && operatorPaymentmenu) {
        console.log('Operator button payment found');
        operatorButtonPayment.addEventListener('click', () => {
            console.log('Operator button payment clicked');
            operatorPaymentmenu.classList.toggle('hidden');
        });
    }

    const superadminUserManagementButton = document.getElementById('superadmin-button-usermanagement');
    const superadminUserManagementmenu = document.getElementById('superadmin-menu-usermanagement');

    if (superadminUserManagementButton && superadminUserManagementmenu) {
        console.log('Superadmin user management button found');
        superadminUserManagementButton.addEventListener('click', () => {
            console.log('Superadmin user management button clicked');
            superadminUserManagementmenu.classList.toggle('hidden');
        });

        if (window.location.pathname.includes('addoperator') || window.location.pathname.includes('tutorcriteriainbox') || window.location.pathname.includes('statusallrole')) {
            console.log('URL includes specific tutor paths');
            superadminUserManagementmenu.classList.remove('hidden');
        }
    }

    const superadminTutorManagementButton = document.getElementById('superadmin-button-tutormanagement');
    const superadminTutorManagementmenu = document.getElementById('superadmin-menu-tutormanagement');

    if (superadminTutorManagementButton && superadminTutorManagementmenu) {
        console.log('Superadmin user management button found');
        superadminTutorManagementButton.addEventListener('click', () => {
            console.log('Superadmin user management button clicked');
            superadminTutorManagementmenu.classList.toggle('hidden');
        });
    }

    const superadminPaymentButton = document.getElementById('superadmin-button-payment');
    const superadminPaymentmenu = document.getElementById('superadmin-menu-payment');

    if (superadminPaymentButton && superadminPaymentmenu) {
        console.log('Superadmin user management button found');
        superadminPaymentButton.addEventListener('click', () => {
            console.log('Superadmin user management button clicked');
            superadminPaymentmenu.classList.toggle('hidden');
        });
    }
    
});

document.getElementById('file-upload').addEventListener('change', function() {
    if (this.files && this.files[0]) {
        const fileNameElement = document.getElementById('file-name');
        const uploadIcon = document.getElementById('upload-icon');

        // Mengubah teks dalam elemen span untuk menampilkan nama file
        fileNameElement.textContent = this.files[0].name;
        fileNameElement.classList.remove('opacity-0');
        fileNameElement.classList.add('text-gray-500'); // Tambahkan kelas untuk membuat teks terlihat
        fileNameElement.classList.add('relative'); // Posisi relatif agar terlihat di atas input

        // Menghilangkan ikon upload (+)
        uploadIcon.classList.add('hidden');
    }
});

     // Function to generate the calendar for a specific month and year
function generateCalendar(year, month) {
    const calendarElement = document.getElementById('calendar');
    const currentMonthElement = document.getElementById('currentMonth');

    // Create a date object for the first day of the specified month
    const firstDayOfMonth = new Date(year, month, 1);
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    // Clear the calendar
    calendarElement.innerHTML = '';

    // Set the current month text
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    currentMonthElement.innerText = `${monthNames[month]} ${year}`;

    // Calculate the day of the week for the first day of the month (0 - Sunday, 1 - Monday, ..., 6 - Saturday)
    const firstDayOfWeek = firstDayOfMonth.getDay();

    // Create headers for the days of the week
    const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    daysOfWeek.forEach(day => {
        const dayElement = document.createElement('div');
        dayElement.className = 'text-center font-semibold';
        dayElement.innerText = day;
        calendarElement.appendChild(dayElement);
    });

    // Create empty boxes for days before the first day of the month
    for (let i = 0; i < firstDayOfWeek; i++) {
        const emptyDayElement = document.createElement('div');
        calendarElement.appendChild(emptyDayElement);
    }

    // Create boxes for each day of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const dayElement = document.createElement('div');
        dayElement.className = 'text-center py-4 lg:py-12 border cursor-pointer';
        dayElement.innerText = day;

        // Check if this date is the current date
        const currentDate = new Date();
        if (year === currentDate.getFullYear() && month === currentDate.getMonth() && day === currentDate.getDate()) {
            dayElement.classList.add('bg-blue-500', 'text-white'); // Add classes for the indicator
        }

        calendarElement.appendChild(dayElement);
    }
}

// Initialize the calendar with the current month and year
const currentDate = new Date();
let currentYear = currentDate.getFullYear();
let currentMonth = currentDate.getMonth();
generateCalendar(currentYear, currentMonth);

// Event listeners for previous and next month buttons
document.getElementById('prevMonth').addEventListener('click', () => {
    currentMonth--;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    generateCalendar(currentYear, currentMonth);
});

document.getElementById('nextMonth').addEventListener('click', () => {
    currentMonth++;
    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    generateCalendar(currentYear, currentMonth);
});

// Function to show the modal with the selected date
function showModal(selectedDate) {
    const modal = document.getElementById('myModal');
    const modalDateElement = document.getElementById('modalDate');
    modalDateElement.innerText = selectedDate;
    modal.classList.remove('hidden');
}

// Function to hide the modal
function hideModal() {
    const modal = document.getElementById('myModal');
    modal.classList.add('hidden');
}

// Event listener for date click events
const dayElements = document.querySelectorAll('.cursor-pointer');
dayElements.forEach(dayElement => {
    dayElement.addEventListener('click', () => {
        const day = parseInt(dayElement.innerText);
        const selectedDate = new Date(currentYear, currentMonth, day);
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const formattedDate = selectedDate.toLocaleDateString(undefined, options);
        showModal(formattedDate);
    });
});

// Event listener for closing the modal
document.getElementById('closeModal').addEventListener('click', () => {
    hideModal();
});


