 // Add smooth animations on page load
    document.addEventListener('DOMContentLoaded', function() {
      const cards = document.querySelectorAll('.card, .profile-card');
      cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
          card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
          card.style.opacity = '1';
          card.style.transform = 'translateY(0)';
        }, index * 100);
      });
    });

    // Add click effect to cards
    document.querySelectorAll('.card, .profile-card').forEach(card => {
      card.addEventListener('click', function() {
        this.style.transform = 'scale(0.98)';
        setTimeout(() => {
          this.style.transform = 'translateY(-5px)';
        }, 100);
      });
    });

    // Animate progress bar on load
    setTimeout(() => {
      const progressBar = document.querySelector('.progress-bar');
      if (progressBar) {
        progressBar.style.width = '0%';
        setTimeout(() => {
          progressBar.style.width = '100%';
        }, 500);
      }
    }, 1000);