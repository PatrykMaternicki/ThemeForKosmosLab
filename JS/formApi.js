
document.getElementById("button-click").addEventListener("click",apiRun);
function apiRun(){
  var formApi = new FormAPI();
  formApi.run();
  if (!formApi.isCorrectValid()){
    formApi.printException();
  }
  else{
    formApi.sendMail();
  }

}
function FormAPI(){
  this.valid = true;
  this.packet = new Array();
  this.client = [
  this.nameClient = document.getElementById("name"),
  this.firstNameClient = document.getElementById("firstname"),
  this.email= document.getElementById("email"),
  this.message = document.getElementById("message"),
  ];
  this.run = function (){
    if (this.isEmpty()){
      this.exception = "Pola nie mogą być puste";
      this.valid = false;
      return;
    }
    if(!this.isWrongEmail()){
      this.exception = "Podany email jest błędny";
      this.valid = false;
      return;
    }

  }
  this.isEmpty = function(){
    var isEmptyField;
    this.client.forEach(
      (element)=>{
        console.log(this.deleteWhiteChar(element).length);
        if (this.deleteWhiteChar(element).length == 0){
          isEmptyField = true;
        }
      }
    );
    return isEmptyField;
  }
  this.deleteWhiteChar = function(element){
    return element.value.replace(/\s+/, "");
  }
  this.isWrongEmail = function(){
    var re = /[^\s@]+@[^\s@]+\.[^\s@]+/;
    console.log(re.test(this.client[2].value));
    return re.test(this.client[2].value);

  }
  this.isCorrectValid = function (){
    return this.valid;
  }
  this.printException = function(){
    console.log(this.exception);
  }
  this.sendMail = function (){
    this.parseStringToJSON();
    this.postJSON();
  }
  this.parseStringToJSON = function (){
    this.client.forEach(
      (element) => {
        console.log(JSON.stringify(element.value));
        this.packet.push(JSON.stringify(element.value));
      }
    );
  }
  this.postJSON = function (){
    var src = this.getCookie("src")+'/mail.php';
    console.log(src);
    jQuery.ajax({
    type: 'POST',
    url: src,
    data: {json: JSON.stringify(this.packet)},
    dataType: 'json'
  });
  }
  this.getCookie = function (sKey) {
      if (!sKey) { return null; }
      return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;
    }

}
