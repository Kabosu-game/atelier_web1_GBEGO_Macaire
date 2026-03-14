const form = document.querySelector('.form');

form.addEventListener('submit', (e) => {
  if (!form.checkValidity()) {
    e.preventDefault();
    form.reportValidity();
  }
});

form.querySelectorAll('input').forEach((input) => {
  input.addEventListener('input', () => input.setCustomValidity(''));
});
