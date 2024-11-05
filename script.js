// Smooth scrolling for navigation and buttons
document.querySelectorAll('.scroll').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });
  
  // Optional: Testimonial Carousel (if you want to rotate testimonials)
  let currentTestimonial = 0;
  const testimonials = document.querySelectorAll('.testimonial');
  const testimonialInterval = 5000; // Time in ms (5 seconds)
  
  function showTestimonial(index) {
    testimonials.forEach((testimonial, i) => {
      testimonial.style.display = i === index ? 'block' : 'none';
    });
  }
  
  setInterval(() => {
    currentTestimonial = (currentTestimonial + 1) % testimonials.length;
    showTestimonial(currentTestimonial);
  }, testimonialInterval);
  
  // Basic form validation (if you add forms, can be extended)
  function validateForm() {
    const form = document.querySelector('form');
    form.addEventListener('submit', (e) => {
      const emailInput = document.querySelector('input[type="email"]');
      if (!emailInput.value.includes('@')) {
        alert('Please enter a valid email address.');
        e.preventDefault(); // Prevent form from submitting
      }
    });
  }
  // Handle sign-up form submission
const signupForm = document.getElementById('signupForm');
if (signupForm) {
  signupForm.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const userType = document.getElementById('userType').value;

    // Redirect based on user type
    if (userType === 'customer') {
      window.location.href = 'customer-dashboard.html';
    } else if (userType === 'employee') {
      window.location.href = 'employee-dashboard.html';
    } else {
      alert('Please select a valid user type.');
    }
  });
}

// Handle login form submission

  // Call validation if needed
  // validateForm();
  
  