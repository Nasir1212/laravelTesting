

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

       

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

        section.from {
        display: flex;
        justify-content: center;
        }

        .form-sectio {
    padding: 3rem 2rem;
    background: linear-gradient(181deg, yellow, green,grey);
    border-radius: 1rem;
    box-shadow: 0px 0px 7px 2px;
    margin-top: 3rem;
}

table tr td input {
    height: 1.7rem;
    border: none;
    border-radius: 4px;
    padding-left: 0.7rem;
}



table tr td button {
    width: 100%;
    height: 2rem;
    background: lightcoral;
    border: none;
    border-radius: 4px;
    color: white;
    font-weight: bold;
    font-size: 1rem;
    cursor: pointer;
}


.code-login {
    color: white;
    cursor: pointer;
}
.code-login:hover{
    color: yellow;

}
@keyframes move{
    10%{
        opacity:0.1;
    }
    100%{
        opacity:1;
    }
}

.animate{
    animation: move;
    animation-duration: 1s
}
/*.animate
User Data Page
*/
.user-data-show{
    display: flex;
    justify-content: center;
  }
 ul li {
    list-style: none;
    font-size: 1.5rem;
}

ul li button {
    height: 2rem;
    background-color: tomato;
    color: white;
    border: none;
    border-radius: 0.3rem;
    cursor: pointer;
    width: 16rem;
    font-size: 1rem;
    font-family: fantasy;
}

.overlay {
    position: fixed;
    width: 100%;
    height: 100%;
    background: #000000c9;
    top: 0;
    bottom: 0;
}
.Change-Profile-context {
    display: flex;
    justify-content: center;
    
}



.overlay-after{
    position: absolute;
    top: 3rem
}
.close-icon {
    width: 50px;
    height: 50px;
    position: absolute;
    display: flex;
    justify-content: center;
    background: red;
    align-items: center;
    border-radius: 6rem;
    cursor: pointer;
    font-size: 2rem;
    color: white;
    z-index: 10;
    top: 6rem;
    right: 34%;
}
   </style>
    </head>
    <body>
        @yield('content')
      
    </body>
</html>
