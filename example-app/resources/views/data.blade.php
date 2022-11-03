
     @extends('Layout.MasterLayout')
     @section('content')
         

     <div class="user-data-show">
      
       <ul id="ShowData">
        
       </ul>
     </div>


     <div class="Change-Profile-container" style="display: none">
<div class="close-icon"  onclick="closeModel();"><b> &#x2716;</b></div>
       <div class="overlay"></div>
       <div class="Change-Profile-context">
         <div class="form-sectio overlay-after">
          <form action="" name="userInfor">
            <table>
                <tr>
                 <td><label for="firstName">First Name</label></td>
                <td><input type="text" id="firstName" name="firstName" placeholder="Enter first name"></td>
                </tr>
                <tr>
                 <td><label for="lastName">Last Name</label></td>
                 <td><input type="text" id="lastName" name="lastName" placeholder="Enter last name"></td>
                </tr>
                <tr>
                  <td><label for="address">Address</label></td>
                  <td>
                    <textarea  id="address" cols="22" name="address" rows="5"  placeholder="Enter address"></textarea>
                  </td>
                 </tr>
                <tr>
                    <td><label for="Image">Image</label></td>
                    <td><input type="file" id="Image" ></td>
                   </tr>
    
                <tr>
                    <td ></td><td><button type="button" onclick="UploadData();">Upload</button></td></tr>
                  
                   
                       
                    
            </table>
        </form>
         </div>
      
       </div>
    
     </div>
        <script>

          let UploadData = ()=>{
            let MyData = Object.fromEntries(new FormData(document.forms['userInfor']));
                      let appending = new FormData();

            appending.append('address',MyData['address']);
            appending.append('firstName',MyData['firstName']);
            appending.append('lastName',MyData['lastName']);
            appending.append('UserEmail',sessionStorage.getItem("em"));
            appending.append('image',document.getElementById("Image").files[0]);
           if(document.getElementById("Image").files[0]===undefined){
            appending.append('haveImage',0);

           }else{
            appending.append('haveImage',1);
           }
          //  console.log(document.getElementById("Image").files[0])
           console.log(appending['image'])

           

           Upload('/UploadData',appending);
          }

let ChangeProfileContainer = document.getElementsByClassName("Change-Profile-container");
          let ShowModel = ()=>{
            
        
       
            ChangeProfileContainer[0].style.cssText=`display: block`;
       
          }

          let closeModel = ()=>{
            ChangeProfileContainer[0].style.cssText=`display: none`;
          }

          let Upload = (url,Formdata)=>{
        fetch(url, {
    method: 'POST',
    body: Formdata
  })
  .then(response => response.json())
  .then(data => {
    if(data['isInsert']==true){
      alert("Data Updated")
    }else if(data['isInsert']==false){
      alert("Data Update Failed")
    }
    console.log(data)
   
  })
  .catch(error => {
    console.error(error)
  })
     }

     window.onload= function(){
       
let apnd = new FormData();
apnd.append('email', sessionStorage.getItem("em"))
       fetch('/getData', {
    method: 'POST',
    body:apnd
  })
  .then(response => response.json())
  .then(data => {
mapingData(data);
    console.log(data)

   
  })
  .catch(error => {
    console.error(error)
  })
     }

     function mapingData(data){

document.getElementById("ShowData").innerHTML= /*html*/`
<li><b>Name </b> : ${data[0]['fname']}  ${data[0]['lname']}</li>
         <li><b>Email </b> :${data[0]['email']}</li>
         <li><b>Phone </b> : ${data[0]['phone']}</li>
         <li><b>Address </b> : ${data[0]['address']}</li>
         <li><img src="${data[0]['img_url']}" alt="${data[0]['img_url']}"></li>
        <li> <button onclick="ShowModel();">Update Profile</button></li>
`;

     }
        </script>
     @endsection