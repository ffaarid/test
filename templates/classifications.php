{% extends 'layouts.php'%}{% block content %}
        <div class="content mt-3">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4>Input Gambar</h4>
                        </div>
                        <div class="card-body">
                            <form action="/submit" method="post" enctype="multipart/form-data">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Input FIle</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file" name="file"
                                            class="form-control-file">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary" style="border-radius: 25px;" value="Upload">Submit</button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card" style="min-height:165px">
                        <div class="card-header text-center">
                            <h4>Hasil Klasifikasi</h4>
                        </div>
                        <div class="card-body text-center">
                            {% if  predictionvgg %}
                            <img class="mb-4 mt-4" src="{{img_path}}" alt="gambar prediksi" height="40%"
                                width="40%"><br>
                            <h4 class="mb-2"> Model VGG16</h4>        
                            <P>Prediction : <i> {{predictionvgg}} </i></p>
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mr-auto ml-auto">
                    <div class="card text-center" style="min-height:165px">
                        <div class="card-header">
                            <h4>Kandungan Vitamin</h4>
                        </div>
                        <div class="card-body" style="color: black;">
                            {% if vA == 'ya' %}
                                <p > Vitamin A</p>
                            {% endif %}
                            {% if vC == 'ya' %}
                                <p > Vitamin C</p>
                            {% endif %}
                            {% if vE == 'ya' %}
                                <p > Vitamin E</p>
                            {% endif %}
                            {% if vK == 'ya' %} 
                                <p > Vitamin K</p>
                            {% endif %}
                            {% if vB1 == 'ya' %}
                                <p > Vitamin B1</p>
                            {% endif %}
                            {% if vB2 == 'ya' %}
                                <p > Vitamin B2</p>
                            {% endif %}
                            {% if vB3 == 'ya' %}
                                <p > Vitamin B3</p>
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            const form = document.querySelector("form");
            const confidencenasnet = document.getElementById("confidencenasnet");
            const predictionnasnet = document.getElementById("predictionnasnet");
            const confidencevgg = document.getElementById("confidencevgg");
            const predictionvgg = document.getElementById("predictionvgg");
            const confidenceexception = document.getElementById("confidenceexception");
            const predictionxception = document.getElementById("predictionxception");
            const confidencecnn = document.getElementById("confidencecnn");
            const predictioncnn = document.getElementById("predictioncnn");

            form.addEventListener("submit", (e) => {
                confidencenasnet.innerHTML = '';
                predictionnasnet.innerHTML = '';
                confidencevgg.innerHTML = '';
                predictionvgg.innerHTML = '';
                confidenceexception.innerHTML = '';
                predictionxception.innerHTML = '';
                confidencecnn.innerHTML = '';
                predictioncnn.innerHTML = '';
                e.preventDefault();
                const formData = new FormData(form);
                axios
                    .post("/submit", formData, {
                        headers: {
                            "Content-Type": "multipart/form-data",
                        },
                    })
                    .then((res) => {
                        document.getElementById("image").src = `${res.data.data.filename}`;
                        confidencenasnet.append(res.data.data.confidencenasnet);
                        predictionnasnet.append(res.data.data.predictionnasnet);
                        confidencevgg.append(res.data.data.confidencevgg);
                        predictionvgg.append(res.data.data.predictionvgg);
                        confidencexception.append(res.data.data.confidenceexception);
                        predictionxception.append(res.data.data.predictionxception);
                        confidencecnn.append(res.data.data.confidencecnn);
                        predictioncnn.append(res.data.data.predictioncnn);
                        console.log(res.data.data);
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            });
        </script>
{% endblock %}