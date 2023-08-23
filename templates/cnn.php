{% extends 'layouts.php'%}{% block content %}        
        <div class="content mt-3">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Result Tab</h4>
                    </div>
                    <div class="card-body">
                        <div class="custom-tab">

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab"
                                        href="#custom-nav-home" role="tab" aria-controls="custom-nav-home"
                                        aria-selected="true">Chart</a>
                                    <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab"
                                        href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile"
                                        aria-selected="false">Confusion Matrix</a>
                                </div>
                            </nav>
                            <div class="tab-content pl-3 pt-2 text-center" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel"
                                    aria-labelledby="custom-nav-home-tab">
                                    <h4>Percobaan A-CNN from Scratch</h4>
                                    <img src="/static/hasilA.png" alt="">
                                    <h4><br/>Percobaan B-CNN add model VGG16</h4>
                                    <img src="/static/hasilB.png" alt="">
                                </div>
                                <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel"
                                    aria-labelledby="custom-nav-profile-tab">
                                    <h4>Hasil Prediksi Model A-CNN from Scratch</h4>
                                    <img src="/static/cmA.png" alt="" height="400px" width="400px">
                                    <h4><br/>Hasil Prediksi Model B-CNN add model VGG16</h4>
                                    <img src="/static/cmB.png" alt="" height="400px" width="400px">
                                    
                                </div>
                                <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel"
                                    aria-labelledby="custom-nav-contact-tab">
                                    <img src="/static/Picture3.png" alt="" height="400px" width="400px">
                                </div>
                                <div class="tab-pane fade" id="custom-nav-rgb" role="tabpanel"
                                    aria-labelledby="custom-nav-rgb-tab">
                                    <img src="/static/rgb.png" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-link text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Accuracy A</div>
                                <div class="stat-digit">85.66%</div>
                                <div class="stat-text">Accuracy B</div>
                                <div class="stat-digit">82.57%</div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-link text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Precision A</div>
                                <div class="stat-digit">85.78%</div>
                                <div class="stat-text">Precision B</div>
                                <div class="stat-digit">82.93%</div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-link text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Recall A</div>
                                <div class="stat-digit">85.66%</div>
                                <div class="stat-text">Recall B</div>
                                <div class="stat-digit">82.57%</div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-link text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">F1 Score A</div>
                                <div class="stat-digit">85.61%</div>
                                <div class="stat-text">F1 Score B</div>
                                <div class="stat-digit">82.47%</div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}