<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jqvmap/jqvmap.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css?v=3.2.0">

  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">
  
  <!--Custom Style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
  <script nonce="a1342d7e-aaa4-46ff-82c4-c1d96250fb9b">
    (function(w, d) {
      ! function(a, e, t, r, z) {
        a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zarazData.tracks = [], a.zaraz = {
          deferred: []
        };
        var s = e.getElementsByTagName("title")[0];
        s && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.w = a.screen.width, a.zarazData.h = a.screen.height, a.zarazData.j = a.innerHeight, a.zarazData.e = a.innerWidth, a.zarazData.l = a.location.href, a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a.zarazData.n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), a.dataLayer = a.dataLayer || [], a.zaraz.track = (e, t) => {
          for (key in a.zarazData.tracks.push(e), t) a.zarazData["z_" + key] = t[key]
        }, a.zaraz._preSet = [], a.zaraz.set = (e, t, r) => {
          a.zarazData["z_" + e] = t, a.zaraz._preSet.push([e, t, r])
        }, a.dataLayer.push({
          "zaraz.start": (new Date).getTime()
        }), a.addEventListener("DOMContentLoaded", (() => {
          var t = e.getElementsByTagName(r)[0],
            z = e.createElement(r);
          z.defer = !0, z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z, t)
        }))
      }(w, d, 0, "script");
    })(window, document);
  </script>

  <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

  <script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>

  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="<?= base_url() ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="<?= base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/sparklines/sparkline.js"></script>
  <script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="<?= base_url() ?>assets/dist/js/adminlte.js?v=3.2.0"></script>
  <script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url('dashboard') ?>" class="nav-link active">Home</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
           <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                <span class="user-image online">
				    <img src="<?= base_url(); ?>assets/<?= !empty($_SESSION['user']->foto) ? 'foto/' . $_SESSION['user']->foto : 'dist/img/avatar8.png';?>" alt="">
				</span>
				<span class="hidden-xs"><span class="text-info">Welcome, 
				</span><?= empty($_SESSION['user']->nama) ? 'Admin Website' : $_SESSION['user']->nama; ?></span> 
				<!--<span class="text-warning"><i class="fa fa-caret-down"></i></span>-->
           </a>
           <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 70px; right: inherit;">
              <?php if ($_SESSION['user']->username != 'admin') : ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('profile') ?>">
                  <i class="fas fa-sign-out-alt"></i> Profile
                </a>
              </li>
              <li class="dropdown-divider"></li>
              <?php endif; ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </li>
           </ul>
        </li>
        <!--<li class="nav-item">-->
        <!--  <a class="nav-link" href="<?= base_url('auth/logout') ?>">-->
        <!--    <i class="fas fa-sign-out-alt"></i> Logout-->
        <!--  </a>-->
        <!--</li>-->
      </ul>
    </nav>
    </header>