<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Register</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<div class="form-signin w-100 m-auto">
  <form>
    <img class="mb-4" src="/images/logosisima.png" alt="" width="120" height="60">
    <h4 class="h5 mb-3 fw-normal">Registration Form</h4>
    <div class="form-floating">
      <input type="text" name="name" class="form-control" id="name" placeholder="Name">
      <label for="name">Name</label>
    </div>
    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="username" placeholder="Username">
      <label for="username">Username</label>
    </div>
    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
      <label for="password">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Register</button>
  </form>
  <small class="d-block text-center">Already registered?<a href="/login">Login</a></small>
</div>


    
  </body>
</html>
