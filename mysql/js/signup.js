$('#txtNewsletter').on('change', function(){
    this.value = this.checked ? 1 : 0;
     }).change();

// $('#frmSignup').submit(function(e){
//     e.preventDefault()

$(document).on('click', '#btnSignup', function(){
    // validate

    var sName             = $('#txtName').val()
    var sLastName         = $('#txtLastName').val()
    var sAddress          = $('#txtAddress').val()
    var sCity             = $('#txtCity').val()
    var iZipcode          = $('#txtZipcode').val()
    var sEmail            = $('#txtEmail').val()
    var sPassword         = $('#txtPassword').val()
    var sConfirmPassword  = $('#txtConfirmPassword').val()
    var iNewsletter       = $('#txtNewsletter').val()


    $('#invalidName, #invalidLastName, #invalidAddress, #invalidCity, #invalidZipCode, #invalidEmail, #invalidPassword, #invalidConfirmPassword').hide()

    var bErrorsFound = false

    if(!fnIsEmailValid(sEmail)){
      $('#invalidEmail').show()
      bErrorsFound = true
    }

    if( sPassword.length < 6 || sPassword.length > 20 ){
      $('#invalidPassword').show()
      bErrorsFound = true
    }

    if(bErrorsFound){
      return
    }




    $.ajax({
      url: "mysql/apis/api-signup.php",
      method: "POST",
      data: {sName:sName, sLastName:sLastName, sAddress:sAddress, sCity:sCity, iZipcode:iZipcode, sEmail:sEmail, sPassword:sPassword, iNewsletter:iNewsletter},
      dataType: "JSON"
    }).always(function(jData){
      console.log(jData)
      if(jData.status == 1){
        location.href="login.php?message=signedin"
        return
      }

      $('h1').text('Incorrect signup')
    })

  })




  function fnIsEmailValid(sEmail) {
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(String(sEmail).toLowerCase()); // true or false
  }




