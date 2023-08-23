
from flask import Flask, render_template, request, jsonify
from keras.models import load_model

from keras_preprocessing.image import load_img
from keras_preprocessing.image import img_to_array 


#import tensorflow as tf
import tensorflow as tf

from tensorflow import keras
from skimage import transform, io
import numpy as np
import os
from PIL import Image
from datetime import datetime
from keras_preprocessing import image
from flask_cors import CORS
os.environ['TF_CPP_MIN_LOG_LEVEL'] = '2'  # Hanya tampilkan pesan kesalahan dan lebih tinggi, hilangkan pesan informasi.

# Atur variabel lingkungan untuk memaksa TensorFlow menggunakan CPU
os.environ['CUDA_VISIBLE_DEVICES'] = '-1'  # Menggunakan GPU dengan ID -1 (artinya tidak ada GPU yang digunakan)

app = Flask(__name__)

# load model for prediction

#modelcnn = load_model("./model/buahP2.h5")
#modelcnn2 = load_model("./model/buahP3.h5")
#modelcnn3 = load_model("./model/buahPerc3.h5")

modelVGG = tf.keras.models.load_model("./model/final_model9010.h5")


UPLOAD_FOLDER = 'static/uploads/'
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER
ALLOWED_EXTENSIONS = {'png', 'jpg', 'jpeg', 'gif', 'tiff', 'webp', 'jfif'}

def allowed_file(filename):
    return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

# routes
@app.route("/", methods=['GET', 'POST'])
def main():
	return render_template("landingpage.php")

@app.route("/cnn", methods=['GET', 'POST'])
def cnn():
	return render_template("cnn.php")

@app.route("/classification", methods = ['GET', 'POST'])
def classification():
	return render_template("classifications.php")

@app.route('/submit', methods=['POST'])
def predict():
    if 'file' not in request.files:
        resp = jsonify({'message': 'No image in the request'})
        resp.status_code = 400
        return resp
    files = request.files.getlist('file')
    filename = "temp_image.png"
    errors = {}
    success = False
    for file in files:
        if file and allowed_file(file.filename):
            file.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))
            success = True
        else:
            errors["message"] = 'File type of {} is not allowed'.format(file.filename)

    if not success:
        resp = jsonify(errors)
        resp.status_code = 400
        return resp
    img_url = os.path.join(app.config['UPLOAD_FOLDER'], filename)

    # convert image to RGB
    img = Image.open(img_url).convert('RGB')
    now = datetime.now()
    predict_image_path = 'static/uploads/' + now.strftime("%d%m%y-%H%M%S") + ".png"
    image_predict = predict_image_path
    img.convert('RGB').save(image_predict, format="png")
    img.close()

    # prepare image for prediction
    img = image.load_img(predict_image_path, target_size=(180, 180, 3))
    x = image.img_to_array(img)
    x = np.expand_dims(x, axis=0)
    images = np.vstack([x])
    
    # predict
    #prediction_array_cnn = modelcnn.predict(images)
    #prediction_array_cnn2 = modelcnn2.predict(images)
    #prediction_array_cnn3 = modelcnn3.predict(images)
    prediction_array_vgg16 = modelVGG.predict(images)
    

    # prepare api response\]
    class_names = ['Organic',
                    'Recycle']
    #class_names = ['Apple','Avocado','Banana','Dates','Grape Blue','Grape White','Kiwi','Lemon','Lychee','Mango','Orange','Papaya','Pear','Strawberry','Tomato','Watermelon']
    #vitaminA = ['ya','ya','ya','no','no','no','ya','ya','ya','no','ya','ya','ya','no','ya','ya']
    #vitaminC = ['no','ya','ya','ya','ya','ya','ya','ya','ya','ya','ya','ya','ya','ya','ya','ya']
    #vitaminE = ['ya','ya','no','no','no','ya','no','ya','ya','no','no','no','no','no','no','ya']
    #vitaminK = ['ya','no','no','no','no','ya','no','ya','ya','ya','no','no','no','no','no','ya']
    #vitaminB1 = ['no','no','ya','ya','ya','no','no','no','no','no','ya','no','no','no','no','no']
    #vitaminB2 = ['no','no','ya','no','no','no','no','no','no','ya','ya','no','no','ya','no','no']
    #vitaminB3 = ['no','no','ya','no','no','no','no','no','no','ya','no','no','no','no','no','no']
    # result = {
    #     "filename" : predict_image_path,
    #     "prediction": class_names[np.argmax(prediction_array)],
    #     "confidence": '{:2.0f}%'.format(100 * np.max(prediction_array))
    # }
	
    return render_template("classifications.php", img_path = predict_image_path, 
                        #predictioncnn = class_names[np.argmax(prediction_array_cnn)],
                        #predictioncnn2 = class_names[np.argmax(prediction_array_cnn2)],
                        #predictioncnn3 = class_names[np.argmax(prediction_array_cnn3)],
                        predictionvgg = class_names[np.argmax(prediction_array_vgg16)],
                        #vA = vitaminA[np.argmax(prediction_array_vgg16)],
                        #vC = vitaminC[np.argmax(prediction_array_vgg16)],
                        #vE = vitaminE[np.argmax(prediction_array_vgg16)],
                        #vK = vitaminK[np.argmax(prediction_array_vgg16)],
                        #vB1 = vitaminB1[np.argmax(prediction_array_vgg16)],
                        #vB2 = vitaminB2[np.argmax(prediction_array_vgg16)],
                        #vB3 = vitaminB3[np.argmax(prediction_array_vgg16)]
                        )

if __name__ =='__main__':
	#app.debug = True
	app.run(host="0.0.0.0", port="5000", debug = True)
