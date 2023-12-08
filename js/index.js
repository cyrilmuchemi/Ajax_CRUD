$(document).ready(function(){
    insert_record();
})

//insert record into the database

function insert_record()
{
   $(document).on('click','#register',function(){
    let user = $('#username').val();
    let email = $('#email').val();
    let password = $('#password').val();

    console.log(user, email, password);
   })
}