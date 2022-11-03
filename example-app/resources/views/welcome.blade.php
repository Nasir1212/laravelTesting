@extends('Layout.MasterLayout')

@section('content')


<section class="from">
   
    <div class="form-sectio ">
        <div class="login-form-section animate" style="display: none">
         <form action="" name="LogIn">
             <table>
                 <tr>
                  <td><label for="Email">Email</label></td>
                 <td><input type="text" id="Email" name="Email" placeholder="Enter Email"></td>
                 </tr>
                 <tr>
                  <td><label for="password">Password</label></td>
                  <td><input type="password" id="password" name="password" placeholder="Enter Password"></td>
                 </tr>

                 <tr>
                     <td></td><td><button type="button" onclick="logIn();" >LogIn</button></td></tr>
             </table>
         </form>
        </div>
        
        <div class="Register-form-login-section">
         <form name="Regis">
             <table>
                 <tr>
                  <td><label for="Email">Email</label></td>
                 <td><input type="text" id="Email" name="Email" placeholder="Enter Email"></td>
                 </tr>
                 <tr>
                  <td><label for="Phone">Phone</label></td>
                  <td><input type="text" id="Phone" name="Phone" placeholder="Enter Phone number"></td>
                 </tr>

                 <tr>
                     <td><label for="password">Password</label></td>
                     <td><input type="password" id="password" name="password" placeholder="Enter Password"></td>
                    </tr>

                 <tr>
                     <td ></td><td><button type="button" onclick="Registetion();">Registetion</button></td></tr>
                    <tr>
                  <td colspan="2"> Have you an acount? <code class="code-login" onclick="changeButton();">Login</code></td>
                    </tr>
                    
                        
                     
             </table>
         </form>
        </div>

        


    </div>
 </section>

 <script>

    let logIn = ()=>{
        let MyData = Object.fromEntries(new FormData(document.forms['LogIn']));


UploadData('/LogIn',new FormData(document.forms['LogIn']));
    }

     let changeButton = ()=>{
        let loginFormSection = document.getElementsByClassName("login-form-section");
        let RegisterFormLoginSection = document.getElementsByClassName("Register-form-login-section");
       
        loginFormSection[0].style.cssText=`display: block`;
        RegisterFormLoginSection[0].style.cssText=`display: none`;
     }

     let Registetion = ()=>{
          let MyData = Object.fromEntries(new FormData(document.forms['Regis']));

        console.log(MyData)
        UploadData('Register',new FormData(document.forms['Regis']));


     }

     let UploadData = (url,Formdata)=>{
        fetch(url, {
    method: 'POST',
    body: Formdata
  })
  .then(response => response.json())
  .then(data => {
    console.log(data)
    if(data['isLogin']==true){
        sessionStorage.setItem("em", data['user_email']);
        alert("Success")
        window.location.href='/data'
    }
    if(data['check']==1){
        alert("Email is Collected")
    }
  })
  .catch(error => {
    console.error(error)
  })
     }
 </script>
     
@endsection