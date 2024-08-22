<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สำนักงานคณะกรรมการป้องกันและปราบปรามยาเสพติด</title>
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
   <!-- Favicon -->
   <link rel="shortcut icon" href="logooncb-onweb_png.png" type="image/x-icon">
    <!-- Custom Fonts Css -->
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/custom_fonts/fonts.css">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome Css -->
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/fontawesome/css/all.min.css">
    <!-- Elegant Icons Css -->
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/elegant/css/style.css">
    <!-- Owl Carousel Css -->
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/owl_carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/owl_carousel/css/owl.theme.default.css">
    <!-- Custom Style Css -->
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/css/style.css">
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/css/responsive.css">


    <!-- Require -->
    <link href="{base_url}assets/bootstrap_extras/select2/select2.css" rel="stylesheet">
    <link href="{base_url}assets/css/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">

    {another_css}
    <script>
        var baseURL = '{base_url}/';
        var siteURL = '{site_url}/';
        var csrf_token_name = '{csrf_token_name}';
        var csrf_cookie_name = '{csrf_cookie_name}';
    </script>

</head>

<body>

    <!-- Body Wrapper -->
    <div id="homepage-three" class="overflow-hidden">
        <!-- Header Section -->
        <header class="position-absolute">
            <!-- Navbar -->
            {top_navbar}
        </header>

        <!-- Banner Section -->
        <section class="inner-bnr">
            <div class="container">
                <div class="row">
                    <div class="col-12" class="text">
                        <span class="text">Activities</span>
                        <h3 class="hero-text">กิจกรรม</h3>
                        <h5><a href="index.html" class="text">Home</a> - Activities</h5>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blogs Section -->
        <section class="pad-100">
            <h2 class="d-none"></h2>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="primary-content-area text-center">
                            <div class="row">
                                <?php foreach ($cms_posts as $row) { ?>
                                    <div class="col-md-3">
                                        <article class="ms-news-grid-sidebar">
                                            <div class="ms-image-sec">
                                                <img src="{base_url}<?php echo $row->image ?>" class="img-fluid" alt="News Image">
                                            </div>
                                            <div class="ms-content-area bg-white">
                                                <span class="ms-title-15 mr-4"><a href="#."><span class="ms-title-15"><?php echo $row->title ?></span>
                                                        <!-- <h4 class="font-weight-bold mt-3 ms-news-title"><?php echo $row->message ?></a></h4> -->
                                                        <a href="{site_url}activities/preview/<?php echo $row->id ?>" class="btn ms-secondary-btn mt-4">Read More</a>
                                            </div>
                                        </article>
                                    </div>

                                <?php } ?>
                            </div>
                            <!-- <div class="ms-spacer-30"></div>
                            <a href="news_grid.html" class="btn ms-secondary-btn"><i class="fas fa-redo mr-2"></i> More News</a> -->
                        </div>
                    </div>
                    <!-- <div class="col-lg-4">
                        <aside class="secondary-content-area">
                            <section class="widget widget-search">
                                <h2 class="d-none">Dummy Heading, not in use</h2>
                                <form class="position-relative">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn ms-search-btn position-absolute" type="submit"><span class="fs1" aria-hidden="true" data-icon="&#x55;"></span></button>
                                </form>
                            </section>

                            <section class="widget widget-categories">
                                <h4 class="font-weight-bold mb-4">Categories</h4>
                                <ul class="pl-0">
                                    <li class="py-3">
                                        <span class="font-weight-bold"><a href="#.">Health</a></span>
                                        <span class="font-weight-bold float-right color-text">(12)</span>
                                    </li>
                                    <li class="py-3">
                                        <span class="font-weight-bold"><a href="#.">Corona Virus</a></span>
                                        <span class="font-weight-bold float-right color-text">(08)</span>
                                    </li>
                                    <li class="py-3">
                                        <span class="font-weight-bold"><a href="#.">COVID - 19</a></span>
                                        <span class="font-weight-bold float-right color-text">(23)</span>
                                    </li>
                                    <li class="py-3">
                                        <span class="font-weight-bold"><a href="#.">Prevention</a></span>
                                        <span class="font-weight-bold float-right color-text">(43)</span>
                                    </li>
                                    <li class="py-3">
                                        <span class="font-weight-bold"><a href="#.">Virus</a></span>
                                        <span class="font-weight-bold float-right color-text">(16)</span>
                                    </li>
                                </ul>
                            </section>

                        </aside>
                    </div> -->
                </div>
            </div>
        </section>

       <!-- Footer Section -->
       <footer id="footer-home-three" class="pad-100">
            <div class="container">
                <div class="row text-center text-md-left">
                    <div class="col-md-3 col-lg-2 mt-md-5 ms-border-right mb-4 mb-md-0">
                        <img src="https://upload.wikimedia.org/wikipedia/th/thumb/2/20/Office_of_the_Narcotics_Control_Board_Logo.png/220px-Office_of_the_Narcotics_Control_Board_Logo.png" style="height: 100px;" class="img-fluid" alt="Logo">
                        <h6 class="footer-nav-heading mt-3">&copy; 2022 - ONCB</h6>
                    </div>
                    <div class="col-md-3 col-lg-3 mb-4 mb-md-0">
                        <h6 class="footer-nav-heading mb-3">Navigation</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <p><a href="{site_url}home">หน้าหลัก </a></p>
                                <p><a href="{site_url}about">เกี่ยวกับเรา </a></p>
                                <p><a href="{site_url}news_research_info">โครงการวิจัย </a></p>
                                <p><a href="{site_url}announcement">ข่าวสาร</a></p>
                                <p><a href="{site_url}asked_questions">FAQ</a></p>
                                <p><a href="{site_url}contactus">ติดต่อเรา</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-lg-block col-lg-1"></div>
                    <div class="col-md-3 col-lg-3 mb-4 mb-md-0">
                        <h6 class="footer-nav-heading mb-3">สำนักงานคณะกรรมการป้องกันและปราบปรามยาเสพติด</h6>
                        <p>เลขที่ 5 ถนนดินแดง แขวงสามเสนใน เขตพญาไท กรุงเทพมหานคร 104000</p>
                        <h6 class="footer-nav-heading mb-3">โทรศัพท์ติดต่อ</h6>
                        <p><a href="tel:+12345671313">โทรศัพท์ 02-247-0901-19</a></p>
                        <h6 class="footer-nav-heading mb-3">นโยบายการใช้งาน</h6>
                        <p><a  target="_blank" href="https://www.oncb.go.th/Documents/%E0%B8%99%E0%B9%82%E0%B8%A2%E0%B8%9A%E0%B8%B2%E0%B8%A2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%A3%E0%B8%B1%E0%B8%81%E0%B8%A9%E0%B8%B2%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%A1%E0%B8%B1%E0%B9%88%E0%B8%99%E0%B8%84%E0%B8%87%E0%B8%9B%E0%B8%A5%E0%B8%AD%E0%B8%94%E0%B8%A0%E0%B8%B1%E0%B8%A2%E0%B8%94%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B9%80%E0%B8%97%E0%B8%84%E0%B9%82%E0%B8%99%E0%B9%82%E0%B8%A5%E0%B8%A2%E0%B8%B5%E0%B8%AA%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%99%E0%B9%80%E0%B8%97%E0%B8%A8%20(%E0%B8%89%E0%B8%9A%E0%B8%B1%E0%B8%9A%E0%B8%9C%E0%B9%88%E0%B8%B2%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%A3%E0%B8%B1%E0%B8%9A%E0%B8%A3%E0%B8%AD%E0%B8%87%E0%B8%88%E0%B8%B2%E0%B8%81%20%E0%B8%84%E0%B8%98%E0%B8%AD).pdf">นโยบายการใช้งานเว็บไซต์</a></p>
                        <p><a  target="_blank" href="https://www.oncb.go.th/Documents/%E0%B8%99%E0%B9%82%E0%B8%A2%E0%B8%9A%E0%B8%B2%E0%B8%A2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%84%E0%B8%B8%E0%B9%89%E0%B8%A1%E0%B8%84%E0%B8%A3%E0%B8%AD%E0%B8%87%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%A1%E0%B8%B9%E0%B8%A5%E0%B8%AA%E0%B9%88%E0%B8%A7%E0%B8%99%E0%B8%9A%E0%B8%B8%E0%B8%84%E0%B8%84%E0%B8%A5.pdf">นโยบายการคุ้มครองข้อมูลส่วนบุคคล</a></p>

                    </div>
                    <div class="col-md-3 col-lg-3">
                        <h6 class="footer-nav-heading mb-3">email</h6>
                        <p><a href="mailto:contact@coroso.com">contact@oncb.go.th</a></p>
                        <h6 class="footer-nav-heading mb-3">แหล่งทุนวิจัย</h6>
                        <p>

                            <span class="mr-3"><a href="https://www.nrct.go.th/" target="_blank" data-toggle="tooltip" data-placement="top" title="สำนักงานการวิจัยแห่งชาติ (วช.)"><img style="height: 45px;width: 45px;" src="https://www.job-108.com/icon/1575089961.jpg?v=1"></a></span>
                            <span class="mr-3"><a href="https://www.tsri.or.th/" target="_blank" data-toggle="tooltip" data-placement="top" title="สำนักงานคณะกรรมการส่งเสริมวิทยาศาสตร์ วิจัยและนวัตกรรม (สกสว.)"><img style="height: 45px;width: 45px;" src="https://riie.wu.ac.th/wp-content/uploads/2021/04/%E0%B8%81%E0%B8%AD%E0%B8%87%E0%B8%97%E0%B8%B8%E0%B8%99%E0%B8%AA%E0%B9%88%E0%B8%87%E0%B9%80%E0%B8%AA%E0%B8%A3%E0%B8%B4%E0%B8%A1%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%A8%E0%B8%B2%E0%B8%AA%E0%B8%95%E0%B8%A3%E0%B9%8C-%E0%B8%A7%E0%B8%B4%E0%B8%88%E0%B8%B1%E0%B8%A2-%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B8%99%E0%B8%A7%E0%B8%B1%E0%B8%95%E0%B8%81%E0%B8%A3%E0%B8%A3%E0%B8%A1-%E0%B8%81%E0%B8%AA%E0%B8%A7.-230x300.png"></a></span>
                            <span class="mr-3"><a href="https://www.hsri.or.th/researcher" target="_blank" data-toggle="tooltip" data-placement="top" title="สถาบันวิจัยระบบสาธารณสุข"><img style="height: 45px;width: 45px;" src="https://www.hitap.net/wp-content/uploads/2019/11/%E0%B8%AA%E0%B8%A7%E0%B8%A3%E0%B8%AA_1-300x300.png"></a></span>
                        </p>
                        <div class="ms-spacer-30"></div>
                        <h6 class="footer-nav-heading mb-3">ภาคีเครือข่าย</h6>
                        <p>
                            <span class="mr-3"><a href="https://www.oncb.go.th/Pages/main.aspx" target="_blank" data-toggle="tooltip" data-placement="top" title="ปปส "><img style="height: 45px;width: 45px;" src="https://upload.wikimedia.org/wikipedia/th/thumb/2/20/Office_of_the_Narcotics_Control_Board_Logo.png/220px-Office_of_the_Narcotics_Control_Board_Logo.png"></a></span>
                            <span class="mr-3"><a href="https://www.nhso.go.th/" target="_blank" data-toggle="tooltip" data-placement="top" title="สปสช"><img style="height: 45px;width: 45px;" src="https://www.nhso.go.th/storage/uploads/news/20220517180205212.png"></a></span>
                            <span class="mr-3"><a href="https://www.moj.go.th/index.php" target="_blank" data-toggle="tooltip" data-placement="top" title="กระทรวงยุติธรรม"><img style="height: 45px;width: 45px;" src="https://www.moj.go.th/img/all_logo/00.png"></a></span>
                        </p>

                        <div class="ms-spacer-30"></div>
                        <h6 class="footer-nav-heading mb-3">Open data </h6>
                        <p>
                            <span class="mr-3"><a href="https://www.oncb.go.th/Pages/main.aspx"
                             target="_blank" data-toggle="tooltip"
                              data-placement="top" title="ปปส ">
                              <img 
                               src="{base_url}/assets/images/creative_common.png">
                            </a></span>
                            
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    </div> <!-- Body Wrapper Ends -->

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Banner Section Video Button Modal Box -->
    <div class="modal fade" id="msvideobox" tabindex="-1" role="dialog" aria-labelledby="msvideobox" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <iframe width="auto" height="auto" src="https://www.youtube.com/embed/T9oDbdsyjrM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- General Js -->
    <script src="{base_url}assets/themes/front-end/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap Js -->
    <script src="{base_url}assets/themes/front-end/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Font Awesome Js -->
    <script src="{base_url}assets/themes/front-end/vendor/fontawesome/js/all.min.js"></script>
    <!-- Elegant Icons Css -->
    <script src="{base_url}assets/themes/front-end/vendor/elegant/js/lte-ie7.js"></script>
    <!-- Owl Carousel Js -->
    <script src="{base_url}assets/themes/front-end/vendor/owl_carousel/js/owl.carousel.min.js"></script>
    <!-- Themes's Custom Js -->
    <script src="{base_url}assets/themes/front-end/js/theme.js"></script>

    <!-- Require -->
    <script src="{base_url}assets/js/jquery-ui.min.js"></script>
    <script src="{base_url}assets/bootstrap_extras/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{base_url}assets/bootstrap_extras/bootstrap-notify.min.js"></script>
    <script src="{base_url}assets/bootstrap_extras/select2/select2.min.js"></script>
    <script src="{base_url}assets/js/jquery.cookie.min.js"></script>
    <script src="{base_url}assets/js/ci_utilities.js?ver=1541805506"></script>

    <!-- {another_js} -->

</body>

</html>
