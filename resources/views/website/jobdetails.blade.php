


@extends('website.layout.front_en')
@section('content')
<?php 
$cities = App\model\jobcity::where('job_id',$job->id)->get();
$program = App\model\program::where('id',$job->category)->first();

 ?>
   <!-- Breadcumb Sections -->
    <section class="breadcumb-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-lg-10">
            <div class="breadcumb-style1 mb10-xs">
              <div class="breadcumb-list">
                <a href="#">Home</a>
                <a href="#">Jobs</a>
                <a href="#">{{$job->title}}({{$job->vacancy}})</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-lg-2">
            <div class="d-flex align-items-center justify-content-sm-end">
              <div class="share-save-widget d-flex align-items-center">
        <div id="fb-root"></div>
        
<div class="fb-share-button" data-href="https://GOLDEN-job.org/jobdetails/{{$job->id}}" data-layout="" data-size=""><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2FGOLDEN-job.org%2Fjobdetails%2F{{$job->id}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>


              </div>
              



              </div>
        
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcumb Sections -->
    <section class="breadcumb-section pt-0">
      <div class="cta-job-v1 freelancer-single-style mx-auto maxw1700 pt120 pt60-sm pb120 pb60-sm bdrs16 position-relative overflow-hidden d-flex align-items-center mx20-lg px30-lg">
        <img class="left-top-img wow zoomIn" src="images/vector-img/left-top.png" alt="">
        <img class="right-bottom-img wow zoomIn" src="images/vector-img/right-bottom.png" alt="">
        <div class="container">
          <div class="row wow fadeInUp">
            <div class="col-xl-8 mx-auto">
              <div class="position-relative">
                <div class="list-meta d-lg-flex align-items-end justify-content-between">
                  <div class="wrapper d-sm-flex align-items-center mb20-md">
                    <a class="position-relative freelancer-single-style" href="#">
                      <img class="wa" src="images/team/job-single.png" alt="">
                    </a>
                    <div class="ml20 ml0-xs mt15-sm">
                      <h4 class="title">{{$job->title}}({{$job->vacancy}})</h4>
                      <h6 class="mb-3 text-thm">{{$job->yoe}}</h6>
                      <h6 class="list-inline-item mb-0">{{$program->name_en ?? ""}}</h6>
                      <h6 class="list-inline-item mb-0 bdrl-eunry pl15">Duration:{{$job->duration}}</h6>
                      <h6 class="list-inline-item mb-0 bdrl-eunry pl15">Gender:{{$job->gender}}</h6>
                      <h6 class="list-inline-item mb-0 bdrl-eunry pl15">Number of jobs:{{$job->noj}}</h6>
                    </div>
                  </div>
                  


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>صفحه جزئیات وظیفه</title>

    <!-- آیکن‌ها (Font Awesome) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Bootstrap برای ظاهر زیبا -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- آیکن‌ها -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </style>
    
    <style>
        
        .job-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 25px;
            transition: 0.3s;
        }
        .job-card:hover {
            transform: translateY(-5px);
        }
        .icon-btn {
            border: none;
            background: none;
            font-size: 20px;
            margin: 0 10px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .icon-btn:hover {
            transform: scale(1.2);
        }
        .fa-heart { color: #e63946; }
        .fa-share-nodes { color: #0d6efd; }
        .fa-bookmark { color: #f0ad4e; }
        .fa-eye { color: #6c757d; }
        .fa-location-dot { color: #0d6efd; }
        .fa-dollar-sign { color: #28a745; }
        .reaction-msg {
            color: #198754;
            font-weight: bold;
            margin-top: 10px;
        }
        .comment-box {
            margin-top: 25px;
            display: none;
        }
        .comment-item {
            background: #f1f1f1;
            border-radius: 10px;
            padding: 10px 15px;
            margin-top: 10px;
        }
        .company-info {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 15px;
            margin-top: 20px;
        }
    
        body {
            background-color: #f4f4f9;
            direction: ltr;
            text-align: lift;
            font-family: "Vazirmatn", sans-serif;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            background: #fff;
            padding: 25px;
        }
        .icons {
            margin-top: 15px;
        }
        .reaction-btn {
            border: none;
            background: none;
            font-size: 22px;
            margin: 0 10px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .reaction-btn:hover {
            transform: scale(1.2);
        }
        .fa-heart { color: #e63946; }
        .fa-thumbs-up { color: #28a745; }
        .fa-thumbs-down { color: #dc3545; }
        .fa-comment { color: #0d6efd; }
        .comment-box {
            margin-top: 25px;
            display: none;
        }
        .comment-item {
            background: #f1f1f1;
            border-radius: 10px;
            padding: 10px 15px;
            margin-top: 10px;
        }
            document.getElementById('sendComment').onclick = () => {
        const text = document.getElementById('commentText').value.trim();
        if (text) {
            const commentList = document.getElementById('commentList');
            const div = document.createElement('div');
            div.className = 'comment-item';
            div.textContent = text;
            commentList.appendChild(div);
            document.getElementById('commentText').value = '';
        }

    </style>

</head>
<body>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1354845579740725"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-1354845579740725"
     data-ad-slot="8380448586"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

<div class="container mt-5">
    <div class="card">
        
        <div class="icons mt-3">
            <button class="reaction-btn" id="likeBtn"><i class="fa-solid fa-heart"></i></button>
            <button class="reaction-btn" id="thumbUp"><i class="fa-solid fa-thumbs-up"></i></button>
            <button class="reaction-btn" id="thumbDown"><i class="fa-solid fa-thumbs-down"></i></button>
            <button class="reaction-btn" id="commentBtn"><i class="fa-solid fa-comment"></i></button>
        </div>

        <div class="mt-3" id="reactionMessage" style="color:green; font-weight:bold;"></div>

        <!-- قسمت نظر دادن -->
        <div class="comment-box" id="commentSection">
            <label class="form-label mt-3">نظر خود را بنویسید:</label>
            <textarea id="commentText" class="form-control" rows="3" placeholder="نظر خود را بنویسید..."></textarea>
            <button class="btn btn-primary mt-2" id="sendComment">ارسال نظر</button>
            <div id="commentList" class="mt-3"></div>
        </div>
    </div>
</div>

<script>
    const likeBtn = document.getElementById('likeBtn');
    const thumbUp = document.getElementById('thumbUp');
    const thumbDown = document.getElementById('thumbDown');
    const commentBtn = document.getElementById('commentBtn');
    const commentSection = document.getElementById('commentSection');
    const reactionMessage = document.getElementById('reactionMessage');

    likeBtn.onclick = () => {
        reactionMessage.textContent = "شما این وظیفه را پسندیدید ❤️";
    };
    thumbUp.onclick = () => {
        reactionMessage.textContent = "شما نظر مثبت دادید 👍";
    };
    thumbDown.onclick = () => {
        reactionMessage.textContent = "شما نظر منفی دادید 👎";
    };
    commentBtn.onclick = () => {
        commentSection.style.display = 'block';
    };

    
    
</script>


<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1354845579740725"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-1354845579740725"
     data-ad-slot="3504857353"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

    <!-- Service Details -->
    <section class="pt10 pb90 pb30-md">
      <div class="container">
        <div class="row wow fadeInUp">
          <div class="col-lg-8 mx-auto">
            <div class="row">
              <div class="col-sm-6 col-xl-3">
                <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                  <div class="icon flex-shrink-0"><span class="flaticon-calendar"></span></div>
                  <div class="details">
                    <h5 class="title">Date Posted</h5>
                    <p class="mb-0 text">{{$job->start_date}}</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                  <div class="icon flex-shrink-0"><span class="flaticon-place"></span></div>
                  <div class="details">
                    <h5 class="title">Location</h5>
                    @foreach($cities as $city)
                    <?php 
                    $cityd = App\model\states::where('id',$city->city_id)->first();
                    ?>
                    @if($cityd)
                    <p class="mb-0 text">{{$cityd->name ?? ""}},</p>
                    @endif
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                  <div class="icon flex-shrink-0"><span class="flaticon-fifteen"></span></div>
                  <div class="details">
                    <h5 class="title">Employeement type</h5>
                    <p class="mb-0 text">{{$job->employment_type}}</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                  <div class="icon flex-shrink-0"><span class="flaticon-pay-day"></span></div>
                  <div class="details">
                    <h5 class="title">Salary</h5>
                    <p class="mb-0 text">{{$job->salary}}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="service-about">
              <h4 class="mb-4">Description</h4>
                <?php echo $job->description;?>
              
              
            </div>
          </div>
        </div>
      </div>
    </section>
    @if(Auth::check())
  <div class="search-modal">
    <div class="modal fade" id="apply" aria-hidden="true" aria-labelledby="applymodal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="applymodal"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fal fa-xmark"></i></button>
          </div>
          <div class="modal-body">
            {{ Form::open(array('url'=>'/apply','files'=>true)) }}
            <div class="col-xl-12 mx-auto">
              <div class="log-reg-form search-modal form-style1 bgc-white p50 p30-sm default-box-shadow1 bdrs12">
                <div class="mb30">
                

</body>
</html>
                  <h4>We're glad to see you again!<br>
                  Please Upload your CV here.
                </h4>
                
                </div>
              <input type="hidden" name="type" value="1" class="form-control" placeholder="">
                  <input type="hidden" name="id" value="{{$job->id}}" class="form-control" placeholder="">
                <div class="mb15">
                  <label class="form-label fw600 dark-color"><?php echo trans('messages.password');?></label>
                  <input type="file" name="file" class="form-control" placeholder="file">
                </div>
               
                <div class="d-grid mb20">
                  <button class="ud-btn btn-thm" type="submit">Apply <i class="fal fa-arrow-right-long"></i></button>
                </div>
               
              </div>
            </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
@stop