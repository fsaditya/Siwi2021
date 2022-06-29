<style>
    .mySlides {display: none;}
    .imgSlides {vertical-align: middle;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;border-radius: 0.5rem}

    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
      margin-top: 20px;
    }

    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 0px 12px;
      position: absolute;
      bottom: 2px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      -webkit-animation-name: fade;
      -webkit-animation-duration: 10s;
      animation-name: fade;
      animation-duration: 10s;
    }

    @-webkit-keyframes fade {
      from {opacity: .5}
      to {opacity: 1}
    }

    @keyframes fade {
      from {opacity: .5}
      to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
      .text {font-size: 11px}
    }
    </style>

    </head>
    <body>

    <div class="slideshow-container">

    @foreach ($banners as $ban)
        <div class="mySlides fade">
            <a @if($ban->link == NULL) @else href="{{ $ban->link}}" target="_blank" @endif>
                <img class="imgSlides" src="{{ asset($ban->bannername) }}" style="width:100%" alt="{{$ban->bannername}}">
            </a>
        </div>
    @endforeach


    <div class="text">
        @foreach ($banners as $id => $pic)
            <span class="dot"></span>
        @endforeach
    </div>

    </div>


    <script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 7000); // Change image every
    }
    </script>

    </body>
    </html>
