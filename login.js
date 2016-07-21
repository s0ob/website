function checkForm(form)
  {
    if(form.email.value == "") {
      alert("Error: email cannot be blank!");
      form.email.focus();
      return false;
    }
 if(form.password.value == "") {
      alert("Error: Password cannot be blank!");
      form.password.focus();
      return false;
    }
      if(form.password.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.password.focus();
        return false;
      }
   header('Location:Home.php');
    return true;
    
  }