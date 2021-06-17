import pickle,sys
from keras.applications.mobilenet import MobileNet
import keras
from keras.models import Model
import cv2
import time
import operator
import warnings
warnings.filterwarnings("ignore")

DIM=224
IMG_DIM = (DIM, DIM)
input_shape = (DIM, DIM, 3)

def loadModel(nmModel):
    f = open(nmModel, 'rb')
    model = pickle.load(f)
    return model

def createMobileNet():
    mobileNet =  MobileNet(include_top=False, weights='imagenet', 
                                     input_shape=input_shape)

    output    = mobileNet.layers[-1].output
    output    = keras.layers.Flatten()(output)
    ModelmobileNet = Model(inputs=mobileNet.input, outputs=output)# base_model.get_layer('custom').output)

    ModelmobileNet.trainable = False
    for layer in ModelmobileNet.layers:
        layer.trainable = False
    return ModelmobileNet

def prediksiImg(nmFile,model):
    t = time.time()
    img = cv2.imread(nmFile)
    if img is None:
        return t,"REJECTED, not valid file , cant be predict"
    
    img = cv2.resize(img, IMG_DIM)
    img=img/255
    img=img.reshape(1,img.shape[0],img.shape[1],img.shape[2])
    ModelmobileNet = createMobileNet()

    ftr_np = ModelmobileNet(img)
    
    predicted_proba = model.predict_proba(ftr_np)
    res = {}
    prob = -1
    for i in range(len(model.classes_)):
        res[model.classes_[i]] = predicted_proba[0][i]
    res = sorted(res.items(), key=operator.itemgetter(1))
    res.reverse()
    
    rank = 0
    prev_val = 0
    huruf = ''
    for key, val in res:
        if val >= prev_val:
            rank += 1
            prob = val
            huruf = key
        prev_val = val
        # rank += 1
        # if key == huruf:
        #     prob = val
        #     break
    score = round(prob*100,2)

    if rank <= 5 and score > 60:
        result = "ACCEPTED,"

    else:
        result = "REJECTED,"

    # return t,"%s %s mobileNet score %g  rank %g" %(result,huruf,score,rank)
    return result

def cobak(nmFile, model):
    t = time.time()
    img = cv2.imread(nmFile)
    if img is None:
        return t,"REJECTED, not valid file , cant be predict"

    img = cv2.resize(img, IMG_DIM)
    img=img/255
    img=img.reshape(1,img.shape[0],img.shape[1],img.shape[2])
    ModelmobileNet = createMobileNet()

    ftr_np = ModelmobileNet(img)

    predicted_proba = model.predict_proba(ftr_np)

    rank = 1
    score = 99
    if rank <= 5 and score > 60:
        result = "ACCEPTED,"

    else:
        result = "REJECTED,"

    return predicted_proba

if __name__ == '__main__':
    filemodel = sys.argv[2]
    nmFile = sys.argv[1]

    # t,r=prediksiImg(nmFile,model)
    # elapsed = time.time() - t
    # r=prediksiImg(nmFile, filemodel)
    # print("%s"%(r))

    
    r=cobak(nmFile, filemodel)
    t = time.ctime()
    print("Success %s %s"%(t, r))
