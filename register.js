function checkForm(form)
  {
    if(form.name.value == "") {
      alert("Error: name cannot be blank!");
      form.name.focus();
      return false;
    }
   var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(form.email.value)) {
      alert("Error:Email is blank or invaild format");
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
      
      var x=form.password.value;
var y=form.confirm.value;
var z=x.length;
if((x!=y || !x))
{
alert("Password does not match!!! Please give correct password");
return false;
}
    return true;
  }