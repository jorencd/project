function toggleForms() {
  const signUpForm = document.getElementById('signUpForm');
  const signInForm = document.getElementById('signInForm');
  if (signUpForm.style.display === 'none') {
      signUpForm.style.display = 'block';
      signInForm.style.display = 'none';
  } else {
      signUpForm.style.display = 'none';
      signInForm.style.display = 'block';
  }
}
