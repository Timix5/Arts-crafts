const form = document.getElementById('contactForm');
const checkbox = document.getElementById('terms');
const submitBtn = document.getElementById('submitBtn');

const email = document.getElementById('email');
const nameInput = document.getElementById('name');
const message = document.getElementById('message');

const STORAGE_KEY = 'narocilo_form';

// enable/disable submit
checkbox.addEventListener('change', () => {
  submitBtn.disabled = !checkbox.checked;
});


// save/load (OK del)
function saveForm() {
  localStorage.setItem(STORAGE_KEY, JSON.stringify({
    email: email.value,
    name: nameInput.value,
    message: message.value,
    terms: checkbox.checked
  }));
}

form.addEventListener('submit', (e) => {
  let valid = true;

  document.querySelectorAll('.error-msg').forEach(el => el.textContent = '');

  if (!email.checkValidity()) {
    document.getElementById('emailError').textContent = 'Vnesite veljaven e-mail';
    valid = false;
  }

  if (nameInput.value.trim() === '') {
    document.getElementById('nameError').textContent = 'Ime je obvezno';
    valid = false;
  }

  if (message.value.trim() === '') {
    document.getElementById('messageError').textContent = 'Sporočilo je obvezno';
    valid = false;
  }

  if (!valid) {
    e.preventDefault();

    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });

    return;
  }
});

function loadForm() {
  const saved = localStorage.getItem(STORAGE_KEY);
  if (!saved) return;

  const data = JSON.parse(saved);

  email.value = data.email || '';
  nameInput.value = data.name || '';
  message.value = data.message || '';
  checkbox.checked = data.terms || false;

  submitBtn.disabled = !checkbox.checked;
}

email.addEventListener('input', saveForm);
nameInput.addEventListener('input', saveForm);
message.addEventListener('input', saveForm);
checkbox.addEventListener('change', saveForm);

loadForm();