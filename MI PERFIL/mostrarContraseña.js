function mostrarContraseña() {
    const passwordField = document.getElementById("password_field");
    const toggleIcon = document.getElementById("togglePasswordIcon");

    if (passwordField.type === "password") {
      passwordField.type = "text";
      // Cambia el SVG al icono de ojo tachado
      toggleIcon.innerHTML = `
        <path d="M17.94 17.94A10.43 10.43 0 0 1 12 20c-7 0-11-8-11-8a14.11 14.11 0 0 1 5-5.94"></path>
        <path d="M1 1l22 22"></path>
      `;
    } else {
      passwordField.type = "password";
      // Cambia el SVG al icono de ojo
      toggleIcon.innerHTML = `
        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
        <circle cx="12" cy="12" r="3"></circle>
      `;
    }
  }