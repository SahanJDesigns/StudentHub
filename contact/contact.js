// Rating system
const stars = document.querySelectorAll('.star');
const ratingInput = document.getElementById('rating');
let currentRating = 0;



stars.forEach((star, index) => {
  star.addEventListener('click', () => {
    currentRating = index + 1;
    ratingInput.value = currentRating;
    updateStars();

  });

  star.addEventListener('mouseover', () => {
    highlightStars(index + 1);
  });
});

document.getElementById('stars').addEventListener('mouseleave', () => {
  updateStars();
});

function highlightStars(rating) {
  stars.forEach((star, index) => {
    if (index < rating) {
      star.classList.add('active');
    } else {
      star.classList.remove('active');
    }
  });
}

function updateStars() {
  stars.forEach((star, index) => {
    if (index < currentRating) {
      star.classList.add('active');
    } else {
      star.classList.remove('active');
    }
  });
}

// Form submission
document.getElementById('contactForm').addEventListener('submit', function(e) {
  e.preventDefault();
  
  const submitBtn = this.querySelector('.submit-btn');
  const response = document.getElementById('response');
  const formData = new FormData(this);
  
  // Disable submit button
  submitBtn.disabled = true;
  submitBtn.textContent = 'Sending...';
  
  // AJAX form submission
  fetch('process.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.text())
  .then(text => {
    response.className = 'response';
    if (text.toLowerCase().includes('success')) {
      response.classList.add('success');
    } else {
      response.classList.add('error');
    }
    response.textContent = text;
    response.style.display = 'block';
    if (response.classList.contains('success')) {
      // Reset form only on success
      document.getElementById('contactForm').reset();
      currentRating = 0;
      ratingInput.value = 0;
      updateStars();
    }
    // Re-enable submit button
    submitBtn.disabled = false;
    submitBtn.textContent = 'Send Message';
    // Hide response after 5 seconds
    setTimeout(() => {
      response.style.display = 'none';
    }, 5000);
  })
  .catch(() => {
    response.className = 'response error';
    response.textContent = 'An error occurred. Please try again.';
    response.style.display = 'block';
    submitBtn.disabled = false;
    submitBtn.textContent = 'Send Message';
  });
});

// Add focus animations
document.querySelectorAll('input, textarea').forEach(input => {
  input.addEventListener('focus', function() {
    this.parentElement.style.transform = 'scale(1.02)';
    this.parentElement.style.transition = 'transform 0.3s ease';
  });
  
  input.addEventListener('blur', function() {
    this.parentElement.style.transform = 'scale(1)';
  });
});

// Page load animation
document.addEventListener('DOMContentLoaded', function() {
  const container = document.querySelector('.contact-container');
  const infoCards = document.querySelectorAll('.info-card');
  
  container.style.opacity = '0';
  container.style.transform = 'translateY(20px)';
  
  setTimeout(() => {
    container.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    container.style.opacity = '1';
    container.style.transform = 'translateY(0)';
  }, 300);
  
  infoCards.forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    
    setTimeout(() => {
      card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      card.style.opacity = '1';
      card.style.transform = 'translateY(0)';
    }, 600 + (index * 100));
  });
});