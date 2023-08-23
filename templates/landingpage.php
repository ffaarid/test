{% extends 'layouts.php'%}{% block content %}
        <div class="content">
            <div class="row " style="background-color:#4E31AA;">
                <div class="col-lg-6 m-auto text-white">
                    <h2>Klasifikasi Buah <i class="fa fa-search" style="color: #b565d2;"></i></h2> <br>
                    <h2>Menggunakan Metode <i class="fa fa-music" style="color: #b565d2;"></i></h2> <br>
                    <h2>Convolution Neural Network <i class="fa fa-cloud" style="color: #b565d2;"></i></h2> <br>
                    <a href="{{ url_for('classification') }}" type="button" class="btn btn-primary" style="border-radius: 25px;" > Try Me  <i class="fa fa-arrow-right rounded" style="color: white; "></i></a>
                </div>
                <div class="col-lg-6" style="displas: block;  margin-left: auto; margin-right: auto;">
                    <lottie-player src="https://assets7.lottiefiles.com/private_files/lf30_ykyhvkwp.json"  background="transparent"  speed="1"  style="width: 500px; height: 500px;"  loop autoplay></lottie-player>
                </div>
            </div>
        </div>
    </div>
{% endblock %}