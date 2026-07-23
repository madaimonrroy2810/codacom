/* ===================================================
   CodaCom — Demo de login (100% front-end, sin BDD)
   Los usuarios se guardan en localStorage del navegador.
=================================================== */

const STORAGE_USERS = 'codacom_users';
const STORAGE_SESSION = 'codacom_session';

/* ---------- Semilla: cuenta demo ---------- */
function seedDemoUser(){
  const users = getUsers();
  const exists = users.some(u => u.email === 'demo@codacom.bo');
  if (!exists){
    users.push({
      name: 'Ana Pérez',
      business: 'Dulces Ana',
      email: 'demo@codacom.bo',
      whatsapp: '+591 700 00000',
      password: 'demo1234'
    });
    saveUsers(users);
  }
}

function getUsers(){
  try{ return JSON.parse(localStorage.getItem(STORAGE_USERS)) || []; }
  catch(e){ return []; }
}
function saveUsers(users){
  localStorage.setItem(STORAGE_USERS, JSON.stringify(users));
}

/* ---------- Utilidades UI ---------- */
function showToast(msg, type='success'){
  const toast = document.getElementById('toast');
  toast.textContent = msg;
  toast.className = `toast is-visible is-${type}`;
  clearTimeout(showToast._t);
  showToast._t = setTimeout(() => toast.classList.remove('is-visible'), 4000);
}

function setFieldError(fieldId, message){
  const input = document.getElementById(fieldId);
  const field = input.closest('.field');
  const err = document.getElementById(`err-${fieldId}`);
  if (message){
    field.classList.add('has-error');
    err.textContent = message;
  } else {
    field.classList.remove('has-error');
    err.textContent = '';
  }
}

function clearErrors(ids){
  ids.forEach(id => setFieldError(id, ''));
}

function setLoading(button, loading){
  button.classList.toggle('is-loading', loading);
  button.disabled = loading;
}

/* ---------- Tabs ---------- */
const tabLogin = document.getElementById('tab-login');
const tabRegister = document.getElementById('tab-register');
const formLogin = document.getElementById('form-login');
const formRegister = document.getElementById('form-register');
const tabsIndicator = document.getElementById('tabs-indicator');

function positionIndicator(tabEl){
  tabsIndicator.style.width = tabEl.offsetWidth + 'px';
  tabsIndicator.style.transform = `translateX(${tabEl.offsetLeft}px)`;
}

function activateTab(which){
  const isLogin = which === 'login';
  tabLogin.classList.toggle('is-active', isLogin);
  tabRegister.classList.toggle('is-active', !isLogin);
  tabLogin.setAttribute('aria-selected', isLogin);
  tabRegister.setAttribute('aria-selected', !isLogin);
  formLogin.classList.toggle('is-active', isLogin);
  formRegister.classList.toggle('is-active', !isLogin);
  document.getElementById('toast').classList.remove('is-visible');
  positionIndicator(isLogin ? tabLogin : tabRegister);
}
tabLogin.addEventListener('click', () => activateTab('login'));
tabRegister.addEventListener('click', () => activateTab('register'));
window.addEventListener('resize', () => positionIndicator(tabLogin.classList.contains('is-active') ? tabLogin : tabRegister));
positionIndicator(tabLogin);

/* ---------- Mostrar / ocultar contraseña ---------- */
document.querySelectorAll('.pass-toggle').forEach(btn => {
  btn.addEventListener('click', () => {
    const input = document.getElementById(btn.dataset.target);
    input.type = input.type === 'password' ? 'text' : 'password';
  });
});

/* ---------- Medidor de fuerza de contraseña ---------- */
const regPassword = document.getElementById('reg-password');
const strengthBar = document.querySelector('#strength span');
regPassword.addEventListener('input', () => {
  const v = regPassword.value;
  let score = 0;
  if (v.length >= 8) score++;
  if (/[A-Z]/.test(v)) score++;
  if (/[0-9]/.test(v)) score++;
  if (/[^A-Za-z0-9]/.test(v)) score++;
  const pct = (score / 4) * 100;
  const colors = ['#A3402F', '#A3402F', '#A3A69C', '#3E5C4A', '#3E5C4A'];
  strengthBar.style.width = pct + '%';
  strengthBar.style.background = colors[score];
});

/* ---------- Validación ---------- */
const EMAIL_RE = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

/* ---------- Envío: LOGIN ---------- */
formLogin.addEventListener('submit', (e) => {
  e.preventDefault();
  clearErrors(['login-identifier', 'login-password']);

  const identifier = document.getElementById('login-identifier').value.trim();
  const password = document.getElementById('login-password').value;
  let valid = true;

  if (!identifier){
    setFieldError('login-identifier', 'Ingresa tu correo o WhatsApp.');
    valid = false;
  }
  if (!password){
    setFieldError('login-password', 'Ingresa tu contraseña.');
    valid = false;
  }
  if (!valid) return;

  const button = formLogin.querySelector('.btn-primary');
  setLoading(button, true);

  setTimeout(() => {
    setLoading(button, false);
    const users = getUsers();
    const user = users.find(u =>
      (u.email.toLowerCase() === identifier.toLowerCase() || u.whatsapp === identifier) &&
      u.password === password
    );

    if (!user){
      showToast('Correo/WhatsApp o contraseña incorrectos.', 'error');
      return;
    }

    if (document.getElementById('login-remember').checked){
      localStorage.setItem(STORAGE_SESSION, JSON.stringify({ email: user.email }));
    }
    showWelcome(user);
  }, 700); // pequeña espera simulada, sensación de red real
});

/* ---------- Autocompletar cuenta demo ---------- */
document.getElementById('btn-fill-demo').addEventListener('click', () => {
  document.getElementById('login-identifier').value = 'demo@codacom.bo';
  document.getElementById('login-password').value = 'demo1234';
  showToast('Datos de la cuenta demo cargados. Presiona «Ingresar».', 'success');
});

/* ---------- "Olvidé mi contraseña" (solo demo) ---------- */
document.getElementById('btn-forgot').addEventListener('click', () => {
  showToast('Esta es una demo sin backend: usa demo@codacom.bo / demo1234.', 'success');
});

/* ---------- Envío: REGISTRO ---------- */
formRegister.addEventListener('submit', (e) => {
  e.preventDefault();
  const ids = ['reg-name','reg-business','reg-email','reg-whatsapp','reg-password','reg-password2'];
  clearErrors(ids);
  setFieldError('reg-terms', '');

  const name = document.getElementById('reg-name').value.trim();
  const business = document.getElementById('reg-business').value.trim();
  const email = document.getElementById('reg-email').value.trim();
  const whatsapp = document.getElementById('reg-whatsapp').value.trim();
  const password = document.getElementById('reg-password').value;
  const password2 = document.getElementById('reg-password2').value;
  const terms = document.getElementById('reg-terms').checked;

  let valid = true;
  if (!name){ setFieldError('reg-name', 'Ingresa tu nombre.'); valid = false; }
  if (!business){ setFieldError('reg-business', 'Ingresa el nombre de tu negocio.'); valid = false; }
  if (!EMAIL_RE.test(email)){ setFieldError('reg-email', 'Ingresa un correo válido.'); valid = false; }
  if (!whatsapp || whatsapp.length < 7){ setFieldError('reg-whatsapp', 'Ingresa un número válido.'); valid = false; }
  if (password.length < 8){ setFieldError('reg-password', 'Mínimo 8 caracteres.'); valid = false; }
  if (password2 !== password || !password2){ setFieldError('reg-password2', 'Las contraseñas no coinciden.'); valid = false; }
  if (!terms){
    document.getElementById('err-reg-terms').textContent = 'Debes aceptar los términos.';
    document.getElementById('err-reg-terms').style.display = 'block';
    valid = false;
  }

  const users = getUsers();
  if (valid && users.some(u => u.email.toLowerCase() === email.toLowerCase())){
    setFieldError('reg-email', 'Ya existe una cuenta con este correo.');
    valid = false;
  }

  if (!valid) return;

  const button = formRegister.querySelector('.btn-primary');
  setLoading(button, true);

  setTimeout(() => {
    setLoading(button, false);
    users.push({ name, business, email, whatsapp, password });
    saveUsers(users);
    formRegister.reset();
    strengthBar.style.width = '0%';
    activateTab('login');
    showToast('Cuenta creada. Ahora inicia sesión.', 'success');
    document.getElementById('login-identifier').value = email;
  }, 700);
});

/* ---------- Pantalla de bienvenida ---------- */
const welcome = document.getElementById('welcome');
function showWelcome(user){
  document.getElementById('welcome-name').textContent = `Hola, ${user.name.split(' ')[0]} 👋`;
  welcome.classList.add('is-visible');
  welcome.setAttribute('aria-hidden', 'false');
}
document.getElementById('btn-logout').addEventListener('click', () => {
  localStorage.removeItem(STORAGE_SESSION);
  welcome.classList.remove('is-visible');
  welcome.setAttribute('aria-hidden', 'true');
  formLogin.reset();
});

/* ---------- Sesión recordada al cargar ---------- */
(function initSession(){
  seedDemoUser();
  try{
    const session = JSON.parse(localStorage.getItem(STORAGE_SESSION));
    if (session){
      const user = getUsers().find(u => u.email === session.email);
      if (user) showWelcome(user);
    }
  }catch(e){ /* no-op */ }
})();