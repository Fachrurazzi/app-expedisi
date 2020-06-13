<!DOCTYPE html>
<html>
<head>
  <title>Login | Expedisi</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css') ?>">
</head>
<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <!-- Login Form -->
      <form id="form-login">
        <input type="text" id="login" class="fadeIn second" name="username" placeholder="Masukkan username">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Masukkan password">
        <input type="submit" class="fadeIn fourth" id="masuk" value="Masuk">
      </form>

    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      $(document).on('submit','#form-login',function(event){
        event.preventDefault();
        $.ajax({
          url: '<?php echo site_url('login/aksi_login') ?>',
          data: $(this).serialize(),
          dataType: 'JSON',
          method: 'POST',
          success: function(response){
            if (response.status == "success") {
              Toast.fire({
                type: 'success',
                title: 'Berhasil masuk.'
              });
              window.location.href="<?php echo site_url('/'); ?>";
            } else {
              msg = ""
              if (response.msg) {
                $.each(response.msg,function(i,value){
                  msg += '* ' + response.msg[i] + "<br>";
                });
                Swal.fire({
                  type: 'error',
                  title: 'Oops...',
                  html: msg,
                });
              }            
            }
          },
          error: function(){
            Toast.fire({
              type: 'error',
              title: '<p style="color:red; font-size:12px">Kesalahan Internal.</p>'
            });
          }
        });
      });
    });
  </script>
</body>
</html>
