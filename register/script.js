  // Toggle password visibility for both password fields
  document.querySelectorAll('.toggle-password').forEach(function(toggle) {
    toggle.addEventListener('click', function() {
      const input = this.parentElement.querySelector('input');
      const icon = this.querySelector('i');
      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });
  });

  // Registration form validation
  document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');
    const confirmPasswordError = document.getElementById('confirmPasswordError');
    let isValid = true;

    // Clear previous errors
    if (nameError) nameError.textContent = '';
    if (emailError) emailError.textContent = '';
    if (passwordError) passwordError.textContent = '';
    if (confirmPasswordError) confirmPasswordError.textContent = '';

    // Name validation
    if (!name) {
      if (nameError) nameError.textContent = 'Full name is required';
      nameError.classList.add('show');
      isValid = false;
    }
    // Email validation
    if (!email) {
      if (emailError) emailError.textContent = 'Email is required';
      emailError.classList.add('show');
      isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(email)) {
      if (emailError) emailError.textContent = 'Please enter a valid email address';
      emailError.classList.add('show');
      isValid = false;
    }
    // Password validation
    if (!password) {
      if (passwordError) passwordError.textContent = 'Password is required';
      passwordError.classList.add('show');
      isValid = false;
    } else if (password.length < 6) {
      if (passwordError) passwordError.textContent = 'Password must be at least 6 characters';
      passwordError.classList.add('show');
      isValid = false;
    }
    // Confirm password validation
    if (!confirmPassword) {
      if (confirmPasswordError) confirmPasswordError.textContent = 'Please confirm your password';
      confirmPasswordError.classList.add('show');
      isValid = false;
    } else if (password !== confirmPassword) {
      if (confirmPasswordError) confirmPasswordError.textContent = 'Passwords do not match';
      confirmPasswordError.classList.add('show');
      isValid = false;
    }
    if (isValid) {
      // Show loading state
      const submitBtn = document.querySelector('.submit-btn');
      submitBtn.classList.add('loading');
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Registering...';

      // Simulate form submission (remove this in production)
      setTimeout(() => {
        this.submit();
      }, 1500);
            submitBtn.classList.remove('loading');
    }
  });

  // Add floating animation to input focus
  document.querySelectorAll('input').forEach(input => {
    input.addEventListener('focus', function() {
      this.parentElement.classList.add('focused');
    });
    input.addEventListener('blur', function() {
      this.parentElement.classList.remove('focused');
    });
  });

  // Add ripple effect to button
  document.querySelectorAll('.submit-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      if (this.disabled) return;
      const ripple = document.createElement('span');
      const rect = this.getBoundingClientRect();
      const size = Math.max(rect.width, rect.height);
      const x = e.clientX - rect.left - size / 2;
      const y = e.clientY - rect.top - size / 2;
      ripple.style.width = ripple.style.height = size + 'px';
      ripple.style.left = x + 'px';
      ripple.style.top = y + 'px';
      ripple.classList.add('ripple');
      this.appendChild(ripple);
      setTimeout(() => {
        ripple.remove();
      }, 600);
    });
  });