    document.getElementById('pass').addEventListener('keyup', function () {
      event.preventDefault();
      strongPassword();
    });
    function strongPassword() {
      var i = 0;
      let password = document.getElementById('pass').value;
      let errorText = document.getElementById('errorText')
      if (password.match(/[a-z]+/)) {
        i +=1;
      }
      if (password.match(/[A-Z]+/)) {
        i +=1;
      }
      if (password.match(/[0-9]+/)) {
        i +=1;
      }
      if (password.match(/[@#$&!+()-]+/)) {
        i +=1;
      }
      if (password.length > 6 ) {
        i +=1;
      }
      if (password.length > 7 ) {
        i +=1;
      }
      errorText.style.display = "block";
      if (i == 0) {
        errorText.style.color = "red";
        errorText.textContent = "Parolni to'ldiring!";
      }else if (i == 1) {
        errorText.style.color = "red";
        errorText.textContent = "Parolni eng kamida 6tadan iborat bo'lishi katta kichik harflar va simbollar bo'lsihligi zarur!";
      }else if (i == 2) {
        errorText.style.color = "red";
        errorText.textContent = "Parolni eng kamida 6tadan iborat bo'lishi katta kichik harflar va simbollar bo'lsihligi zarur!";
      }else if (i == 3) {
        errorText.style.color = "#9c9e11";
        errorText.textContent = "Parolni eng kamida 6tadan iborat bo'lishi katta kichik harflar va simbollar bo'lsihligi zarur!";
      }else if (i > 4) {
        errorText.style.color = "#0905f0";
        errorText.textContent = "Strong password";
      }else if (i > 5) {
        errorText.style.color = "#0905f0";
        errorText.textContent = "Strong password";
      }
    }